<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCT</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS  -->
    <link rel="stylesheet" href="{{ asset('css/carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/calendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.min.css') }}">

    <!-- FullCalendar -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>

</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md fixed-top" style="background-color: #0A3981; height: 72px; z-index: 1050;">
            <div class="container px-4 h-100 d-flex align-items-center">

                <!-- Logo -->
                <a class="navbar-brand text-white fw-bold fs-4" href="{{ route('inicio') }}">CCT</a>

                <!-- Botón toggle menú móvil -->
                <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation" style="color: white;">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Menú -->
                <div class="collapse navbar-collapse custom-bg-blue" id="navbarMenu">
                <ul class="navbar-nav ms-auto d-flex flex-column flex-md-row gap-3 align-items-center fw-medium fs-5 p-3 p-md-0">

                    <li class="nav-item">
                        <a class="nav-link text-white px-3" href="{{route('inicio')}}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white px-3" href="{{route('carreras')}}">Carreras</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white px-3" href="{{route('calendario')}}">Calendario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-4 py-2 rounded text-white" href="{{route('iniciodeseccion')}}" style="background-color: #1F509A;">
                            Campus
                        </a>
                    </li>

                </ul>
                </div>
            </div>
        </nav>
    </header>

     <!-- Aca va lo que se usa como contenido del layaut -->
    <main style="background-color: #D4EBF8;">
        @yield('contenido')
    </main>

    <!-- Footer -->
    <footer class="bg-primary text-light small py-3 mt-auto mt-0" style="background-color: #1F509A;">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center px-3">
            <p class="mb-0">© <span id="current-year"></span> CCT/FP 6-401. Todos los derechos reservados.</p>
            <p class="mb-0">
                Contacto: 
                <a href="mailto:codigofrsr@gmail.com" class="text-light text-decoration-underline hover-white">
                    cct6401sup@gmail.com
                </a>
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS (de la carpeta o CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JS para el año -->
    <script>
        document.getElementById("current-year").textContent = new Date().getFullYear();
    </script>

    <!-- Active para route -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const currentPath = window.location.pathname.replace(/\/$/, ""); // quita slash final
            document.querySelectorAll(".navbar-nav .nav-link").forEach(link => {
                let linkPath = new URL(link.href).pathname.replace(/\/$/, "");
                if (linkPath === currentPath) {
                    link.classList.add("active");
                }
            });
        });
    </script>

        <!-- Para el calendario -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            const eventDetails = document.getElementById('eventoInfo');

            if (!calendarEl) {
                return;
            }

            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'es',
                height: 'auto',
                events: '{{ route('calendar.events.feed') }}',
                eventClick: function(info) {
                    if (!eventDetails) {
                        return;
                    }

                    const evento = `
                        <p><strong>Título:</strong> ${info.event.title}</p>
                        <p><strong>Fecha:</strong> ${info.event.start.toLocaleDateString('es-AR')}</p>
                        <p><strong>Descripción:</strong> ${info.event.extendedProps.descrip || "Sin descripción"}</p>
                    `;
                    eventDetails.innerHTML = evento;
                }
            });

            calendar.render();
        });
    </script>
</body>
</html>
