<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CalendarEventController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\Admin\UserManagementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'landing.home')->name('inicio');
Route::view('/calendario', 'landing.calendar')->name('calendario');
Route::view('/carreras', 'landing.courses')->name('carreras');
Route::get('/eventos', [CalendarEventController::class, 'feed'])->name('calendar.events.feed');

Route::middleware('guest')->group(function () {
    Route::get('/iniciodeseccion', [SessionController::class, 'create'])->name('iniciodeseccion');
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/iniciodeseccion', [SessionController::class, 'store'])->name('login.attempt');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');
    Route::get('/campus', [CampusController::class, 'redirectByRole'])->name('campus.redirect');

    Route::middleware('role:student')->group(function () {
        Route::get('/estudiantes', [CampusController::class, 'studentHome'])->name('estudiantes');
        Route::get('/cursoestudiantes', [CampusController::class, 'studentCoursePage'])->name('cursoestudiantes');
    });

    Route::middleware('role:teacher')->group(function () {
        Route::get('/profesor', [CampusController::class, 'teacherHome'])->name('profesor');
        Route::get('/cursoprofesor', [CampusController::class, 'teacherCoursePage'])->name('cursoprofesor');
        Route::get('/creacursoprofesor', [CampusController::class, 'teacherCourseSetup'])->name('creacursoprofesor');
        Route::post('/creacursoprofesor', [CourseController::class, 'store'])->name('profesor.cursos.store');
    });

    Route::middleware('role:admin')->group(function () {
        Route::get('/admin', [CampusController::class, 'adminHome'])->name('admin');

        Route::get('/usuarios', [UserManagementController::class, 'index'])->name('usuarios');
        Route::post('/usuarios', [UserManagementController::class, 'store'])->name('usuarios.store');
        Route::delete('/usuarios/{user}', [UserManagementController::class, 'destroy'])->name('usuarios.destroy');

        Route::get('/subir', [CalendarEventController::class, 'index'])->name('subir');
        Route::post('/subir', [CalendarEventController::class, 'store'])->name('subir.store');
        Route::delete('/subir/{event}', [CalendarEventController::class, 'destroy'])->name('subir.destroy');
    });

    Route::middleware('role:admin|teacher|student')->group(function () {
        Route::get('/cursos/{course}', [CourseController::class, 'show'])->name('cursos.show');
    });

    Route::middleware('role:admin|teacher')->group(function () {
        Route::post('/cursos/{course}/students', [CourseController::class, 'enrollStudent'])->name('cursos.students.store');
        Route::post('/cursos/{course}/news', [CourseController::class, 'storeNews'])->name('cursos.news.store');
        Route::post('/cursos/{course}/materials', [CourseController::class, 'storeMaterial'])->name('cursos.materials.store');
    });
});
