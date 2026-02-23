@extends('teachers.layaut')

@section('contenido')
<section class="mb-0 min-vh-100">
    <div class="container my-0 pb-5 pt-5">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">Mis cursos como profesor</h3>
            <a href="{{ route('creacursoprofesor') }}" class="btn btn-primary">
                Crear curso
            </a>
        </div>

        <div class="row g-3">
            @forelse($cursos as $curso)
                <div class="col-md-4">
                    <a href="{{ route('cursos.show', $curso) }}" class="text-decoration-none">
                        <div class="card text-white bg-primary shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $curso->nombre }}</h5>
                                <p class="card-text mb-1">
                                    Categoría: {{ $curso->categoria ?? 'Sin categoría' }}
                                </p>
                                <p class="card-text mb-0">
                                    Alumnos inscriptos: {{ $curso->students_count }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">
                        Todavía no creaste cursos.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
