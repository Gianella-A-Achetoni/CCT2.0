<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('landing.home');
})->name('inicio');

Route::get('/calendario', function () {
    return view('landing.calendar');
})->name('calendario');

Route::get('/carreras', function () {
    return view('landing.courses');
})->name('carreras');

Route::get('/iniciodeseccion', function () {
    return view('landing.login');
})->name('iniciodeseccion');

//Route campus alumno
Route::get('/estudiantes', function () {
    return view('students.home');
})->name('campusestudiantes');

Route::get('/estudiantes', function () {
    return view('students.course');
})->name('estudiantes');

//Route campus profesor
Route::get('/profesor', function () {
    return view('teachers.home');
})->name('profesor');

Route::get('/cursoprofesor', function () {
    return view('teachers.course');
})->name('cursoprofesor');

Route::get('/creacursoprofesor', function () {
    return view('teachers.setUp');
})->name('creacursoprofesor');

//Routes Admin
Route::get('/admin', function () {
    return view('admin.home');
})->name('admin');

Route::get('/usuarios', function () {
    return view('admin.users');
})->name('usuarios');

Route::get('/subir', function () {
    return view('admin.update');
})->name('subir');