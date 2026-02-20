@extends('students.layaut')

@section('contenido')
<section class="mb-0 min-vh-100">
    <div class="container my-0 pb-5 pt-5">
        <!-- Buscador y filtro -->
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
                    <li><a class="dropdown-item" href="#" data-filter="programacion">Programación</a></li>
                    <li><a class="dropdown-item" href="#" data-filter="diseno">Diseño</a></li>
                    <li><a class="dropdown-item" href="#" data-filter="marketing">Marketing</a></li>
                    <li><a class="dropdown-item" href="#" data-filter="todos">Todos</a></li>
                </ul>
            </div>
        </div>

        <!-- Sección Todos los cursos -->
        <h3 class="pb-4 fw-bold mt-5">Todos los cursos</h3>
        <div class="row g-3">
            @php
                // Simulando cursos que vienen de la base de datos
                $cursos = [
                    ['nombre' => 'Programación Web', 'profesor' => 'Juan Pérez', 'categoria' => 'programacion'],
                    ['nombre' => 'Base de Datos', 'profesor' => 'María Gómez', 'categoria' => 'programacion'],
                    ['nombre' => 'Diseño UX/UI', 'profesor' => 'Laura Sánchez', 'categoria' => 'diseno'],
                    ['nombre' => 'Marketing Digital', 'profesor' => 'Carlos López', 'categoria' => 'marketing'],
                    ['nombre' => 'Redes Sociales', 'profesor' => 'Ana Torres', 'categoria' => 'marketing'],
                    ['nombre' => 'Illustrator', 'profesor' => 'Marina Díaz', 'categoria' => 'diseno'],
                ];
            @endphp

            @foreach($cursos as $curso)
            <a href="{{ route('cursos.show', $curso->id ?? 1) }}" class="text-decoration-none">
                <div class="card text-white bg-primary shadow-sm h-100 curso-click">
                    <div class="card-body">
                        <h5 class="card-title">{{ $curso['nombre'] ?? $curso->nombre }}</h5>
                        <p class="card-text">
                            Profesor: {{ $curso['profesor'] ?? $curso->profesor }}
                        </p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

    </div>
</section>

<!-- Script para filtro (opcional) -->
<script>
    document.querySelectorAll('.dropdown-item').forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const filter = this.getAttribute('data-filter');
            document.querySelectorAll('.curso-card').forEach(card => {
                if(filter === 'todos' || card.dataset.categoria === filter) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // Buscador simple
    document.getElementById('searchInput').addEventListener('input', function() {
        const term = this.value.toLowerCase();
        document.querySelectorAll('.curso-card').forEach(card => {
            const nombre = card.querySelector('.card-title').textContent.toLowerCase();
            card.style.display = nombre.includes(term) ? 'block' : 'none';
        });
    });
</script>
@endsection