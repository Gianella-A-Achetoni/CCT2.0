<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCT</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tu CSS opcional -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style.min.css">
</head>
<body>
    <header>
        <nav class="navbar fixed-top" style="background-color: #0A3981; height: 72px; z-index: 1050;">
            <div class="container h-100 d-flex justify-content-between align-items-center ml-0">
                <!-- Logo -->
                <a class="navbar-brand d-flex align-items-center text-white fw-bold fs-4 h-100" href="{{route('estudiantes')}}">
                    <img src="img/casa.png" alt="home" style="height:55px;">
                </a>

                <!-- Menú -->
                <div class="custom-bg-blue h-100 d-flex align-items-center" id="navbarMenu">
                    <ul class="navbar-nav d-flex flex-row gap-3 align-items-center fw-medium fs-5 mb-0 h-100">
                        <li class="nav-item h-100 d-flex align-items-center">
                            <a class="nav-link px-4 py-2 rounded text-white" 
                            href="{{route('iniciodeseccion')}}" 
                            style="background-color: #1F509A;">
                                Cerrar Sección
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
    <footer class="bg-primary text-light small py-3 mt-0" style="background-color: #1F509A;">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center px-3">
            <p class="mb-0">© <span id="current-year"></span> CCT/FP 6-401. Todos los derechos reservados.</p>
            <p class="mb-0">
                Contacto: 
                <a href="mailto:codigofrsr@gmail.com" class="text-light text-decoration-underline hover-white">
                    codigofrsr@gmail.com
                </a>
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS (de la carpeta o CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Tus scripts -->
    <script src="js/bootstrap.js"></script>
    <script src="js/app.js"></script>
    <script src="js/butonfilter.js"></script>

    <!-- JS para el año -->
    <script>
        document.getElementById("current-year").textContent = new Date().getFullYear();
    </script>
</body>
</html>