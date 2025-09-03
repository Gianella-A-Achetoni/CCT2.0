@extends('admin.layout')

@section('contenido')
    <section class="full-height">
        <!-- formulario -->
        <div class="container py-4">
            <div class="bg-azul text-white rounded shadow p-4">
                <form id="userForm">
                    <input type="hidden" id="editIndex"> <!-- Para saber si estamos editando -->

                    <div class="mb-4">
                        <label class="form-label fs-5">DNI:</label>
                        <input type="number" name="dni" id="dni" class="form-control" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fs-5">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fs-5">Correo:</label>
                        <input type="email" name="correo" id="correo" class="form-control" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fs-5">Contraseña:</label>
                        <input type="text" name="password" id="password" class="form-control" required>
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
        <div class="pb-4 px-4">
            <table class="table table-striped-columns" id="usersTable">
                <thead>
                    <tr>
                        <th>DNI</th>
                        <th>NOMBRE</th>
                        <th>CORREO</th>
                        <th>CONTRASEÑA</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Se llena con JS -->
                </tbody>
            </table>
        </div>
    </section>

    <script>
        let users = [
            {dni: 1, nombre: "Mark", correo: "Otto", password: "@mdo"},
            {dni: 2, nombre: "Jacob", correo: "Thornton", password: "@fat"},
            {dni: 3, nombre: "John", correo: "Doe", password: "@social"}
        ];

        const form = document.getElementById("userForm");
        const tableBody = document.querySelector("#usersTable tbody");

        function renderTable() {
            tableBody.innerHTML = "";
            users.forEach((user, index) => {
                let row = `
                    <tr>
                        <td>${user.dni}</td>
                        <td>${user.nombre}</td>
                        <td>${user.correo}</td>
                        <td>${user.password}</td>
                        <td class="d-flex gap-2">
                            <button class="btn text-white fs-6 nav-link p-2" style="background-color:#1F509A;" onclick="editUser(${index})">MODIFICAR</button>
                            <button class="btn text-white fs-6 nav-link-borrar p-2" style="background-color:#1F509A;" onclick="deleteUser(${index})">ELIMINAR</button>
                        </td>
                    </tr>
                `;
                tableBody.innerHTML += row;
            });
        }

        form.addEventListener("submit", function(e) {
            e.preventDefault();
            const dni = document.getElementById("dni").value;
            const nombre = document.getElementById("nombre").value;
            const correo = document.getElementById("correo").value;
            const password = document.getElementById("password").value;
            const editIndex = document.getElementById("editIndex").value;

            if (editIndex === "") {
                // Crear
                users.push({dni, nombre, correo, password});
            } else {
                // Editar
                users[editIndex] = {dni, nombre, correo, password};
                document.getElementById("editIndex").value = "";
            }

            form.reset();
            renderTable();
        });

        function editUser(index) {
            const user = users[index];
            document.getElementById("dni").value = user.dni;
            document.getElementById("nombre").value = user.nombre;
            document.getElementById("correo").value = user.correo;
            document.getElementById("password").value = user.password;
            document.getElementById("editIndex").value = index;
        }

        function deleteUser(index) {
            const user = users[index];
            const confirmDelete = confirm(`¿Seguro que deseas eliminar al usuario ${user.nombre} (DNI: ${user.dni})?`);

            if (confirmDelete) {
                users.splice(index, 1);
                renderTable();
            }
        }

        renderTable();
    </script>
@endsection
