@extends('teachers.layaut')

@section('contenido')
    <section class="mb-0 min-vh-100 pt-5">
        <h1 class="text-center text-primary border-bottom pb-2 pt-5">Crear curso</h1>
        <div class="container mt-5" style="max-width: 700px;">
            <div class="card shadow-sm p-4">
                <h4 class="mb-4 fw-bold">Crear nuevo curso</h4>

                <!-- Fila Nombre + Taller -->
                <div class="row g-3 align-items-end">

                    <!-- Nombre -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nombre:</label>
                        <input type="text" id="nombreCurso" class="form-control">
                    </div>

                    <!-- Taller con acordeón -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Un taller:</label>
                        <select id="tallerSeleccionado" class="form-select">
                            <option value="">Seleccionar taller</option>
                            <option value="Programación">F.P. Gastronomía-Panadero</option>
                            <option value="Diseño">F.P. Soldador</option>
                            <option value="Marketing">F.P. Textil</option>
                            <option value="Marketing">C.C. Operador de Pc</option>
                            <option value="Marketing">F.P. Auxiliar electricista de redes</option>
                        </select>
                    </div>

                </div>

                <!-- Botón -->
                <div class="mt-4">
                    <button id="crearCursoBtn" class="btn btn-primary w-100">
                        Crear curso
                    </button>
                </div>

                <!-- Alerta -->
                <div id="alertaError" class="alert alert-danger mt-3 d-none">
                    ⚠️ Debes completar el nombre y seleccionar un taller.
                </div>

                <div id="alertaExito" class="alert alert-success mt-3 d-none">
                    ✅ Curso creado correctamente.
                </div>

            </div>
        </div>
    </section>
@endsection