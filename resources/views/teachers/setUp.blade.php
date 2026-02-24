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

                <select id="categoria" name="categoria" class="form-select" required>
                    <option value="">Seleccionar categoría</option>
                    <option value="F.P. Gastronomía-Panadero">F.P. Gastronomía-Panadero</option>
                    <option value="F.P. Soldador">F.P. Soldador</option>
                    <option value="F.P. Textil">F.P. Textil</option>
                    <option value="C.C. Operador de Pc">C.C. Operador de Pc</option>
                    <option value="F.P. Auxiliar electricista de redes">F.P. Auxiliar electricista de redes</option>
                </select>

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
