<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
use App\Models\CalendarEvent;
use Illuminate\Database\Seeder;

class CampusDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::updateOrCreate(
            ['email' => 'admin@cct.local'],
            [
                'name' => 'Admin CCT',
                'password' => 'password',
            ]
        );
        $admin->syncRoles(['admin']);

        $teacher = User::updateOrCreate(
            ['email' => 'profesor@cct.local'],
            [
                'name' => 'Profesor Demo',
                'password' => 'password',
            ]
        );
        $teacher->syncRoles(['teacher']);

        $studentOne = User::updateOrCreate(
            ['email' => 'estudiante1@cct.local'],
            [
                'name' => 'Estudiante Uno',
                'password' => 'password',
            ]
        );
        $studentOne->syncRoles(['student']);

        $studentTwo = User::updateOrCreate(
            ['email' => 'estudiante2@cct.local'],
            [
                'name' => 'Estudiante Dos',
                'password' => 'password',
            ]
        );
        $studentTwo->syncRoles(['student']);

        $course = Course::updateOrCreate(
            ['nombre' => 'Programación Web'],
            [
                'teacher_id' => $teacher->id,
                'categoria' => 'programacion',
                'fecha_apertura' => now()->toDateString(),
                'descripcion' => 'Curso inicial del campus para prácticas con Laravel y Blade.',
            ]
        );

        $course->students()->syncWithoutDetaching([$studentOne->id, $studentTwo->id]);

        User::whereHas('coursesTeaching')->get()->each(function (User $user) {
            $user->assignRole('teacher');
        });

        User::whereHas('enrolledCourses')->get()->each(function (User $user) {
            $user->assignRole('student');
        });

        $course->news()->updateOrCreate(
            ['course_id' => $course->id, 'title' => 'Bienvenida al curso'],
            [
                'author_id' => $teacher->id,
                'content' => 'Compartiremos novedades del curso en esta sección.',
                'published_at' => now(),
            ]
        );

        $course->materials()->updateOrCreate(
            ['course_id' => $course->id, 'title' => 'Programa de la materia'],
            [
                'uploaded_by' => $teacher->id,
                'description' => 'Documento base con contenidos y modalidad de cursado.',
                'type' => 'link',
                'external_url' => 'https://laravel.com/docs/9.x',
            ]
        );

        CalendarEvent::updateOrCreate(
            [
                'title' => 'Inicio de clases',
                'start_at' => now()->startOfMonth()->addDays(5)->setTime(9, 0),
            ],
            [
                'description' => 'Presentación general del ciclo lectivo.',
                'end_at' => now()->startOfMonth()->addDays(5)->setTime(11, 0),
                'created_by' => $admin->id,
            ]
        );
    }
}
