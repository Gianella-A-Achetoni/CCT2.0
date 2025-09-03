@extends('landing.layaut')

@section('contenido')
    <section>
        <!-- Carrusel -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"></button>
            </div>

            <div class="carousel-inner carousel-custom">
                <div class="carousel-item active">
                    <img src="https://res.cloudinary.com/dobrqphwu/image/upload/v1755701702/IMG_20250617_151902_opfqm8.jpg"
                    class="d-block w-100 h-100 object-fit-cover" alt="Estudiantes en clase">
                </div>
                <div class="carousel-item">
                    <img src="https://res.cloudinary.com/dobrqphwu/image/upload/v1755702709/IMG-20241016-WA0069_-_copia_yu3hmf.jpg"
                    class="d-block w-100 h-100 object-fit-cover" alt="Grupo de estudio">
                </div>
                <div class="carousel-item">
                    <img src="https://res.cloudinary.com/dobrqphwu/image/upload/v1755703009/Clase_de_soldadura_LE_upscale_balanced_x4_sdacjm.jpg"
                    class="d-block w-100 h-100 object-fit-cover" alt="Estudiantes soldadura">
                </div>
                <div class="carousel-item">
                    <img src="https://res.cloudinary.com/dobrqphwu/image/upload/v1755703149/WhatsApp_Image_2025-08-12_at_17.23.20_dpd8dt.jpg"
                    class="d-block w-100 h-100 object-fit-cover" alt="Estudiantes soldadura">
                </div>
                <div class="carousel-item">
                    <img src="https://res.cloudinary.com/dobrqphwu/image/upload/v1755702755/Alumnos_de_soldadura_uzmomq.jpg"
                    class="d-block w-100 h-100 object-fit-cover" alt="Estudiantes soldadura">
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>


        <!-- Contenido -->
        <div class="container py-5">

            <!-- OBJETIVOS -->
            <section id="objetivos" class="mb-5">
                <h2 class="text-center text-primary border-bottom pb-2">OBJETIVOS</h2>
                <p class="mt-3 fs-5 text-justify">
                    Nuestro propósito es ofrecer una formación profesional de calidad, acorde al contexto social y laboral actual. Promovemos el desarrollo de competencias técnicas y humanas que permitan a los estudiantes insertarse eficazmente en el mundo del trabajo, ya sea en relación de dependencia o de manera independiente.
                </p>
                <p class="fs-5 text-justify">
                    Valoramos la convivencia, la solidaridad y la articulación con la comunidad. Acompañamos el crecimiento de nuestros docentes mediante la capacitación continua y fomentamos un entorno institucional colaborativo y en mejora constante.
                </p>
            </section>

            <!-- QUIÉNES SOMOS -->
            <section id="quienes-somos" class="mb-5">
                <h2 class="text-center text-primary border-bottom pb-2">¿QUIÉNES SOMOS?</h2>
                <p class="mt-3 fs-5 text-justify">
                    Somos una institución educativa abierta, participativa y comprometida con una enseñanza que estimula el pensamiento crítico, la creatividad y la formación integral del alumno. Promovemos la equidad en las oportunidades, el respeto por la diversidad y el desarrollo de competencias personales y profesionales.
                </p>
                <p class="fs-5 text-justify">
                    Trabajamos en un clima de convivencia saludable, sostenido por la profesionalidad del equipo docente y la integración con otras organizaciones que enriquecen la experiencia educativa.
                </p>
            </section>

            <!-- QUÉ BUSCAMOS -->
            <section id="que-buscamos" class="mb-0">
                <h2 class="text-center text-primary border-bottom pb-2">¿QUÉ BUSCAMOS?</h2>
                <p class="mt-3 fs-5 text-justify">
                    Buscamos acompañar al estudiante en su formación como persona íntegra, capaz de actuar con responsabilidad, compromiso y sensibilidad social. Nuestro enfoque educativo promueve el desarrollo cultural, social y estético de cada individuo, respetando sus tiempos, intereses y capacidades.
                </p>
                <p class="fs-5 text-justify mb-0">
                    Creemos en una educación que transforme, que despierte el deseo de aprender y que permita construir un futuro con sentido, tanto a nivel personal como colectivo.
                </p>
            </section>

            <section class="mb-0 mt-5">
                <h2 class="mb-5">Personal</h2>
                <div>
                    <h3>Director:</h3>
                    <img src="" alt="">
                    <h4>Carlos Rivera</h4>
                </div>
                <div>
                    <h3>Docentes:</h3>
                    <div>
                        <img src="https://res.cloudinary.com/dobrqphwu/image/upload/v1755701631/WhatsApp_Image_2025-08-13_at_16.59.39_mfobj4.jpg" alt="" class="" style="width: 150px;">
                        <h4>Fernando Felizia</h4>
                        <h4>Profesor de informatica</h4>
                    </div>
                    <div>
                        <img src="https://res.cloudinary.com/dobrqphwu/image/upload/v1755701618/WhatsApp_Image_2025-08-13_at_19.30.36_u0ctbe.jpg" alt="" style="width: 150px;">
                        <h4>Noelia Tobio</h4>
                        <h4>Profesora de administración</h4>
                    </div>
                    <div>
                        <img src="https://res.cloudinary.com/dobrqphwu/image/upload/v1755701681/IMG_20250617_142436_aldila.jpg" alt="" style="width: 150px;">
                        <h4></h4>
                        <h4></h4>
                    </div>
                    <div>
                        <img src="https://res.cloudinary.com/dobrqphwu/image/upload/v1755701721/IMG_20250617_142649_a7aidp.jpg" alt="" style="width: 150px;">
                        <h4></h4>
                        <h4></h4>
                    </div>
                </div>
                <div>
                    <h3>Mantenimiento:</h3>
                    <img src="https://res.cloudinary.com/dobrqphwu/image/upload/v1755701657/IMG_20250617_150656_kzhtq9.jpg" alt="" style="width: 150px;">
                    <h4></h4>
                </div>
            </section>
        </div>
    </section class=mb-0>
@endsection