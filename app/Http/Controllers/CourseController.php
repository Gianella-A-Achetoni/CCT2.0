<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    public function show(Request $request, Course $course)
    {
        $user = $request->user();
        $isAdmin = $user->hasRole('admin');
        $isTeacherOwner = $user->hasRole('teacher') && (int) $course->teacher_id === (int) $user->id;
        $isEnrolledStudent = $user->hasRole('student') && $course->students()->where('users.id', $user->id)->exists();

        abort_unless($isAdmin || $isTeacherOwner || $isEnrolledStudent, 403);

        $course->load([
            'teacher',
            'students:id,name,email',
            'news' => fn ($query) => $query->with('author:id,name')->latest()->limit(20),
            'materials' => fn ($query) => $query->with('uploader:id,name')->latest()->limit(50),
        ]);

        $layoutView = 'students.layaut';
        if ($isTeacherOwner) {
            $layoutView = 'teachers.layaut';
        }
        if ($isAdmin) {
            $layoutView = 'admin.layout';
        }

        return view('students.curso-detalle', [
            'course' => $course,
            'layoutView' => $layoutView,
            'canManageCourse' => $isAdmin || $isTeacherOwner,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'categoria' => ['nullable', 'string', 'max:255'],
            'fecha_apertura' => ['nullable', 'date'],
            'descripcion' => ['nullable', 'string'],
        ]);

        $course = Course::create([
            'nombre' => $request->input('nombre'),
            'teacher_id' => $request->user()->id,
            'categoria' => $request->input('categoria'),
            'fecha_apertura' => $request->input('fecha_apertura'),
            'descripcion' => $request->input('descripcion'),
        ]);

        return redirect()
            ->route('cursos.show', $course)
            ->with('status', 'Curso creado correctamente.');
    }

    public function enrollStudent(Request $request, Course $course)
    {
        abort_unless($this->canManageCourse($request, $course), 403);

        $validated = $request->validate([
            'student_email' => ['required', 'email', Rule::exists('users', 'email')],
        ]);

        $student = User::where('email', $validated['student_email'])->firstOrFail();
        if (! $student->hasRole('student')) {
            $student->assignRole('student');
        }

        $course->students()->syncWithoutDetaching([$student->id]);

        return back()->with('status', 'Alumno agregado al curso.');
    }

    public function storeNews(Request $request, Course $course)
    {
        abort_unless($this->canManageCourse($request, $course), 403);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        $course->news()->create([
            'author_id' => $request->user()->id,
            'title' => $validated['title'],
            'content' => $validated['content'],
            'published_at' => now(),
        ]);

        return back()->with('status', 'Noticia publicada.');
    }

    public function storeMaterial(Request $request, Course $course)
    {
        abort_unless($this->canManageCourse($request, $course), 403);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'type' => ['required', Rule::in(['file', 'link'])],
            'file' => ['nullable', 'file', 'max:10240', 'required_if:type,file'],
            'external_url' => ['nullable', 'url', 'required_if:type,link'],
        ]);

        $filePath = null;
        $externalUrl = null;

        if ($validated['type'] === 'file') {
            $filePath = $request->file('file')->store('materials', 'public');
        } else {
            $externalUrl = $validated['external_url'];
        }

        $course->materials()->create([
            'uploaded_by' => $request->user()->id,
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'type' => $validated['type'],
            'file_path' => $filePath,
            'external_url' => $externalUrl,
        ]);

        return back()->with('status', 'Material cargado.');
    }

    private function canManageCourse(Request $request, Course $course): bool
    {
        $user = $request->user();

        if ($user->hasRole('admin')) {
            return true;
        }

        return $user->hasRole('teacher') && (int) $course->teacher_id === (int) $user->id;
    }
}
