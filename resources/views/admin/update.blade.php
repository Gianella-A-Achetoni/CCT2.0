@extends('admin.layout')

@section('contenido')
    <section class="full-height">
        <!-- Formulario -->
        <div class="container py-4">
            <div class="bg-azul text-white rounded shadow p-5">
                <form id="dateForm">
                    <input type="hidden" id="editIndex"> <!-- Para saber si estoy editando -->

                    <div class="mb-4">
                        <label for="date" class="form-label fs-5">Fecha:</label>
                        <input type="date" name="date" id="date" class="form-control">
                    </div>

                    <div class="mb-4">
                        <label for="titulo" class="form-label fs-5">Título:</label>
                        <input type="text" name="titulo" id="titulo" class="form-control">
                    </div>

                    <div class="mb-4">
                        <label for="descripcion" class="form-label fs-5">Descripción:</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control">
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn text-white fs-5" style="background-color: #1F509A;">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabla -->
        <div class="py-4 px-4">
            <table class="table table-striped-columns" id="dateTable">
                <thead>
                    <tr>
                        <th>FECHA</th>
                        <th>TITULO</th>
                        <th>DESCRIPCION</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </section>

    <script>
        let fechas = [
            {fecha: "2025-04-22", titulo: "dsgysdgff", descripcion:"dsugfisf"},
            {fecha: "2025-08-25", titulo: "sdnisghif", descripcion:"sdhifgs"},
            {fecha: "2025-10-24", titulo: "sdgffuysf", descripcion:"dsnhfiusiu"},
            {fecha: "2025-07-09", titulo: "dg", descripcion:"shfyugf"}
        ];

        const form = document.getElementById("dateForm");
        const tableBody = document.querySelector("#dateTable tbody");

        function renderTable() {
            tableBody.innerHTML = "";
            fechas.forEach((evento, index) => {
                let row = `
                    <tr>
                        <td>${evento.fecha}</td>
                        <td>${evento.titulo}</td>
                        <td>${evento.descripcion}</td>
                        <td class="d-flex gap-2">
                            <button class="btn text-white fs-6 nav-link p-2" style="background-color:#1F509A;" onclick="editDate(${index})">MODIFICAR</button>
                            <button class="btn text-white fs-6 nav-link-borrar p-2" style="background-color:#1F509A;" onclick="deleteDate(${index})">ELIMINAR</button>
                        </td>
                    </tr>
                `;
                tableBody.innerHTML += row;
            });
        }

        form.addEventListener("submit", function(e) {
            e.preventDefault();
            const fecha = document.getElementById("date").value;
            const titulo = document.getElementById("titulo").value;
            const descripcion = document.getElementById("descripcion").value;
            const editIndex = document.getElementById("editIndex").value;

            if (editIndex === "") {
                // Crear nuevo
                fechas.push({fecha, titulo, descripcion});
            } else {
                // Editar existente
                fechas[editIndex] = {fecha, titulo, descripcion};
                document.getElementById("editIndex").value = "";
            }

            form.reset();
            renderTable();
        });

        function editDate(index) {
            const evento = fechas[index];
            document.getElementById("date").value = evento.fecha;
            document.getElementById("titulo").value = evento.titulo;
            document.getElementById("descripcion").value = evento.descripcion;
            document.getElementById("editIndex").value = index;
        }

        function deleteDate(index) {
            const evento = fechas[index];
            const confirmDelete = confirm(`¿Seguro que deseas eliminar el evento del día: ${evento.fecha} (Título: ${evento.titulo})?`);

            if (confirmDelete) {
                fechas.splice(index, 1);
                renderTable();
            }
        }

        renderTable();
    </script>
@endsection
