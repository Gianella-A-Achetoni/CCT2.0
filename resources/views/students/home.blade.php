@extends('students.layaut')

@section('contenido')
<section class="mb-0 min-vh-100">
    <div class="container my-0 pb-5 pt-5">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="d-flex gap-2 align-items-center my-3 mx-5" style="max-width: 450px;">
            <input
                type="text"
                id="searchInput"
                class="form-control form-control-sm"
                placeholder="Buscar curso..."
            >
            <div class="dropdown">
                <button
                    class="btn btn-sm btn-primary dropdown-toggle"
                    type="button"
                    data-bs-toggle="dropdown"
                >
                    Filtrar
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#" data-filter="fp-gastronomia-panadero">F.P. Gastronomía-Panadero</a></li>
                    <li><a class="dropdown-item" href="#" data-filter="fp-soldador">F.P. Soldador</a></li>
                    <li><a class="dropdown-item" href="#" data-filter="fp-textil">F.P. Textil</a></li>
                    <li><a class="dropdown-item" href="#" data-filter="cc-operador-de-pc">C.C. Operador de Pc</a></li>
                    <li><a class="dropdown-item" href="#" data-filter="fp-auxiliar-electricista-de-redes">F.P. Auxiliar electricista de redes</a></li>
                    <li><a class="dropdown-item" href="#" data-filter="todos">Todos</a></li>
                </ul>
            </div>
        </div>

        <h3 class="pb-4 fw-bold mt-5">Mis cursos</h3>
        <div class="row g-3">
            @forelse($cursos as $curso)
                <div class="col-md-4 curso" data-categoria="{{ \Illuminate\Support\Str::slug($curso->categoria ?? 'otros') }}">
                    <a href="{{ route('cursos.show', $curso) }}" class="text-decoration-none">
                        <div class="card text-white bg-primary shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $curso->nombre }}</h5>
                                <p class="card-text mb-1">
                                    Profesor: {{ $curso->teacher?->name ?? 'Sin asignar' }}
                                </p>
                                <p class="card-text mb-0">
                                    Categoría: {{ $curso->categoria ?? 'Sin categoría' }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">
                        No estás inscripto en cursos todavía.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
