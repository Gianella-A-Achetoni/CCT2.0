@extends('teachers.layaut')

@section('contenido')
<section class="container py-5 min-vh-100">
    <h2 class="fw-bold mb-4">Crear curso</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form method="POST" action="{{ route('profesor.cursos.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del curso</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
                </div>

                <div class="mb-3">
                    <label for="categoria" class="form-label">Categoría</label>
                    <input type="text" id="categoria" name="categoria" class="form-control" value="{{ old('categoria') }}">
                </div>

                <div class="mb-3">
                    <label for="fecha_apertura" class="form-label">Fecha de apertura</label>
                    <input type="date" id="fecha_apertura" name="fecha_apertura" class="form-control" value="{{ old('fecha_apertura') }}">
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea id="descripcion" name="descripcion" class="form-control" rows="4">{{ old('descripcion') }}</textarea>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">
                        Crear curso
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
