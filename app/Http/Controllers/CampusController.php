<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CampusController extends Controller
{
    public function redirectByRole(Request $request)
    {
        $user = $request->user();

        if ($user->hasRole('admin')) {
            return redirect()->route('admin');
        }

        if ($user->hasRole('teacher')) {
            return redirect()->route('profesor');
        }

        return redirect()->route('estudiantes');
    }

    public function adminHome()
    {
        return view('admin.home');
    }

    public function studentHome(Request $request)
    {
        $cursos = $request->user()
            ->enrolledCourses()
            ->with('teacher')
            ->orderBy('nombre')
            ->get();

        return view('students.home', compact('cursos'));
    }

    public function studentCoursePage()
    {
        return view('students.course');
    }

    public function teacherHome(Request $request)
    {
        $cursos = Course::query()
            ->withCount('students')
            ->where('teacher_id', $request->user()->id)
            ->orderBy('nombre')
            ->get();

        return view('teachers.home', compact('cursos'));
    }

    public function teacherCoursePage()
    {
        return view('teachers.course');
    }

    public function teacherCourseSetup()
    {
        return view('teachers.setUp');
    }
}
