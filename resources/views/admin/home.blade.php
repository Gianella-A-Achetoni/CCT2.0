@extends('admin.layout')

@section('contenido')
    <section class="full-height position-relative">
        <div class="row justify-content-center position-absolute top-50 start-50 translate-middle text-center">
            <div class="col-auto">
                <a href="{{route('usuarios')}}" class="nav-link btn p-2 text-white fs-3" style="background-color:#1F509A;">
                    USUARIOS
                </a>
            </div>
            <div class="col-auto">
                <a href="{{route('subir')}}" class="nav-link btn p-2 text-white fs-3" style="background-color:#1F509A;">
                    CALENDARIO
                </a>
            </div>
        </div>
    </section>



@endsection