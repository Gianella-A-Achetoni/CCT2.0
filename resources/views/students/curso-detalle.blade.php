@extends('students.layaut')

@section('contenido')
<section class="container py-5 min-vh-100">

    <h2 class="fw-bold mb-3">{{ $curso->nombre }}</h2>

    <p><strong>Profesor:</strong> {{ $curso->profesor }}</p>

    <p><strong>Categoría:</strong> {{ $curso->categoria }}</p>

    <p><strong>Fecha de apertura:</strong> 
        {{ $curso->fecha_apertura }}
    </p>

    <hr>

    <p>
        Aquí va la descripción completa del curso.
        Podés agregar:
        - Programa
        - Duración
        - Modalidad
        - Materiales
        - Botón de inscripción
    </p>

</section>
@endsection