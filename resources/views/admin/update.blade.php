@extends('admin.layout')

@section('contenido')
<section class="full-height">
    <div class="container py-4">
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

        <div class="bg-azul text-white rounded shadow p-5">
            <h4 class="mb-3">Crear evento de calendario</h4>
            <form method="POST" action="{{ route('subir.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="start_at" class="form-label fs-5">Inicio</label>
                    <input type="datetime-local" name="start_at" id="start_at" class="form-control" required>
                </div>

                <div class="mb-4">
                    <label for="end_at" class="form-label fs-5">Fin (opcional)</label>
                    <input type="datetime-local" name="end_at" id="end_at" class="form-control">
                </div>

                <div class="mb-4">
                    <label for="title" class="form-label fs-5">Título</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label fs-5">Descripción</label>
                    <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn text-white fs-5" style="background-color: #1F509A;">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="py-4 px-4">
        <table class="table table-striped-columns align-middle">
            <thead>
                <tr>
                    <th>FECHA</th>
                    <th>TÍTULO</th>
                    <th>DESCRIPCIÓN</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @forelse($events as $event)
                    <tr>
                        <td>{{ optional($event->start_at)->format('d/m/Y H:i') }}</td>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->description }}</td>
                        <td>
                            <form method="POST" action="{{ route('subir.destroy', $event) }}" onsubmit="return confirm('¿Eliminar evento?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn text-white fs-6 p-2" style="background-color:#1F509A;">
                                    ELIMINAR
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No hay eventos cargados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection
