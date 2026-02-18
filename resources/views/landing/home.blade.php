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
                <h2 class="mb-5 text-center text-primary border-bottom pb-2 fs-1">Personal</h2>
                <h3 class="mb-4 text-center">Director</h3>
                <div class="row justify-content-center mb-5">
                    <div class="col-md-4 col-sm-6">
                    <div class="card text-center h-100 shadow">
                        <img src="img/director.jpg" class="card-img-top" alt="Director">
                        <div class="card-body">
                        <h5 class="card-title">Carlos Rivera</h5>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- DOCENTES -->
                <h3 class="mb-4 text-center">Docentes</h3>
                <div class="row g-4">

                    <div class="col-md-4 col-sm-6">
                    <div class="card h-100 shadow text-center">
                        <img src="https://res.cloudinary.com/dobrqphwu/image/upload/v1755701631/WhatsApp_Image_2025-08-13_at_16.59.39_mfobj4.jpg" class="card-img-top" alt="">
                        <div class="card-body">
                        <h5 class="card-title">Fernando Felizia</h5>
                        <p class="card-text">Docente del Módulo informática aplicada a la industria textil.</p>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                    <div class="card h-100 shadow text-center">
                        <img src="https://res.cloudinary.com/dobrqphwu/image/upload/v1755701618/WhatsApp_Image_2025-08-13_at_19.30.36_u0ctbe.jpg" class="card-img-top" alt="">
                        <div class="card-body">
                        <h5 class="card-title">Noelia Tobio</h5>
                        <p class="card-text">Docente de los Módulos de administración Textil / Electricidad / Soldadura.</p>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                    <div class="card h-100 shadow text-center">
                        <img src="https://res.cloudinary.com/dobrqphwu/image/upload/v1755701681/IMG_20250617_142436_aldila.jpg" class="card-img-top" alt="">
                        <div class="card-body">
                        <h5 class="card-title">Miguel Litwinczuk</h5>
                        <p class="card-text">Docente del Trayecto formativo gastronomía: Panadero / Cocinero.</p>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                    <div class="card h-100 shadow text-center">
                        <img src="https://res.cloudinary.com/dobrqphwu/image/upload/v1755701721/IMG_20250617_142649_a7aidp.jpg" class="card-img-top" alt="">
                        <div class="card-body">
                        <h5 class="card-title">Miriam Gatica</h5>
                        <p class="card-text">Docente del trayecto formativo de textil.</p>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                    <div class="card h-100 shadow text-center">
                        <img src="https://res.cloudinary.com/diue0jbyq/image/upload/v1771421716/WhatsApp_Image_2026-02-18_at_10.30.05_AM_x88ksg.jpg" class="card-img-top" alt="">
                        <div class="card-body">
                        <h5 class="card-title">Facundo López</h5>
                        <p class="card-text">Docente del trayecto formativo Electricidad.</p>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                    <div class="card h-100 shadow text-center">
                        <img src="https://res.cloudinary.com/diue0jbyq/image/upload/v1771422764/WhatsApp_Image_2026-02-18_at_10.52.17_AM_geeizu.jpg" class="card-img-top" alt="">
                        <div class="card-body">
                        <h5 class="card-title">Romina Bulos</h5>
                        <p class="card-text">Docente del Módulo idioma aplicado al sector gastronómico.</p>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                    <div class="card h-100 shadow text-center">
                        <img src="https://res.cloudinary.com/diue0jbyq/image/upload/v1771423056/user_nmvbtl.jpg" class="card-img-top" alt="">
                        <div class="card-body">
                        <h5 class="card-title">Mariana Ojeda</h5>
                        <p class="card-text">Docente del módulo de diseño de indumentaria y objetos textiles.</p>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                    <div class="card h-100 shadow text-center">
                        <img src="img/director.jpg" class="card-img-top" alt="">
                        <div class="card-body">
                        <h5 class="card-title">Carlos Rivas</h5>
                        <p class="card-text">Docente del Trayecto formativo Soldador.</p>
                        </div>
                    </div>
                    </div>

                </div>

                <!-- MANTENIMIENTO -->
                <h3 class="mt-5 mb-4 text-center">Mantenimiento</h3>
                <div class="row justify-content-center">
                    <div class="col-md-4 col-sm-6">
                    <div class="card text-center h-100 shadow">
                        <img src="https://res.cloudinary.com/dobrqphwu/image/upload/v1755701657/IMG_20250617_150656_kzhtq9.jpg" class="card-img-top" alt="">
                        <div class="card-body">
                        <h5 class="card-title">Iris Fagetti</h5>
                        </div>
                    </div>
                    </div>
                </div>

                

            </section>
        </div>
    </section class=mb-0>
@endsection