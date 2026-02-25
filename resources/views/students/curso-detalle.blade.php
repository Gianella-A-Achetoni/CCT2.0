@extends($layoutView ?? 'students.layaut')

@section('contenido')
<section class="container py-5 min-vh-100">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <h2 class="fw-bold mb-2">{{ $course->nombre }}</h2>
    <p class="mb-1"><strong>Profesor:</strong> {{ $course->teacher?->name ?? 'Sin asignar' }}</p>
    <p class="mb-1"><strong>Categoría:</strong> {{ $course->categoria ?? 'Sin categoría' }}</p>
    <p class="mb-4">
        <strong>Fecha de apertura:</strong>
        {{ optional($course->fecha_apertura)->format('d/m/Y') ?? 'Sin fecha' }}
    </p>

    @if ($course->descripcion)
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Descripción</h5>
                <p class="card-text mb-0">{{ $course->descripcion }}</p>
            </div>
        </div>
    @endif

    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Noticias del curso</h5>
                    @forelse($course->news as $news)
                        <article class="border rounded p-3 mb-3">
                            <h6 class="mb-1">{{ $news->title }}</h6>
                            <small class="text-muted d-block mb-2">
                                {{ optional($news->published_at)->format('d/m/Y H:i') ?? '-' }}
                                @if($news->author)
                                    | {{ $news->author->name }}
                                @endif
                            </small>
                            <p class="mb-0">{{ $news->content }}</p>
                        </article>
                    @empty
                        <p class="text-muted mb-0">No hay noticias cargadas.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Materiales</h5>
                    @forelse($course->materials as $material)
                        <article class="border rounded p-3 mb-3">
                            <h6 class="mb-1">{{ $material->title }}</h6>
                            @if($material->description)
                                <p class="mb-2">{{ $material->description }}</p>
                            @endif
                            @if($material->type === 'file' && $material->file_path)
                                <a href="{{ asset('storage/'.$material->file_path) }}" target="_blank" rel="noopener">
                                    Descargar archivo
                                </a>
                            @elseif($material->type === 'link' && $material->external_url)
                                <a href="{{ $material->external_url }}" target="_blank" rel="noopener">
                                    Abrir enlace
                                </a>
                            @endif
                        </article>
                    @empty
                        <p class="text-muted mb-0">No hay materiales cargados.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    @if($canManageCourse)
        <hr class="my-5">
        <h4 class="fw-bold mb-3">Gestión del curso</h4>

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h6>Agregar alumno por correo</h6>
                        <form method="POST" action="{{ route('cursos.students.store', $course) }}">
                            @csrf
                            <div class="mb-3">
                                <input type="email" name="student_email" class="form-control" placeholder="alumno@correo.com" required>
                            </div>
                            <button class="btn btn-primary w-100" type="submit">Agregar alumno</button>
                        </form>

                        <hr>
                        <h6 class="mt-3">Alumnos actuales</h6>
                        <ul class="mb-0">
                            @forelse($course->students as $student)
                                <li>{{ $student->name }} ({{ $student->email }})</li>
                            @empty
                                <li class="text-muted">Sin alumnos todavía.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h6>Publicar noticia</h6>
                        <form method="POST" action="{{ route('cursos.news.store', $course) }}">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="title" class="form-control" placeholder="Título" required>
                            </div>
                            <div class="mb-3">
                                <textarea name="content" class="form-control" rows="4" placeholder="Contenido" required></textarea>
                            </div>
                            <button class="btn btn-primary w-100" type="submit">Publicar noticia</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h6>Subir material</h6>
                        <form method="POST" action="{{ route('cursos.materials.store', $course) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="title" class="form-control" placeholder="Título" required>
                            </div>
                            <div class="mb-3">
                                <textarea name="description" class="form-control" rows="2" placeholder="Descripción"></textarea>
                            </div>
                            <div class="mb-3">
                                <select name="type" class="form-select" required>
                                   <!--  <option value="file">Archivo</option> -->
                                    <option value="link">Enlace</option>
                                </select>
                            </div>
                            <!-- <div class="mb-3">
                                <label class="form-label">Archivo (si elegís tipo archivo)</label>
                                <input type="file" name="file" class="form-control">
                            </div> -->
                            <div class="mb-3">
                                <label class="form-label">URL (si elegís tipo enlace)</label>
                                <input type="url" name="external_url" class="form-control" placeholder="https://...">
                            </div>
                            <button class="btn btn-primary w-100" type="submit">Guardar material</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</section>
@endsection
