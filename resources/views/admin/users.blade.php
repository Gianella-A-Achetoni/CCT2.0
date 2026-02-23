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

        <div class="bg-azul text-white rounded shadow p-4">
            <h4 class="mb-3">Crear usuario</h4>
            <form method="POST" action="{{ route('usuarios.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label fs-6">Nombre</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fs-6">Correo</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fs-6">Contraseña</label>
                    <input type="text" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fs-6">Rol</label>
                    <select name="role" class="form-select" required>
                        <option value="student">Estudiante</option>
                        <option value="teacher">Profesor</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn text-white fs-5" style="background-color: #1F509A;">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="pb-4 px-4">
        <table class="table table-striped-columns align-middle">
            <thead>
                <tr>
                    <th>NOMBRE</th>
                    <th>CORREO</th>
                    <th>ROL</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->roles->pluck('name')->join(', ') ?: 'Sin rol' }}</td>
                        <td>
                            <form method="POST" action="{{ route('usuarios.destroy', $user) }}" onsubmit="return confirm('¿Eliminar usuario?');">
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
                        <td colspan="4">No hay usuarios cargados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection
