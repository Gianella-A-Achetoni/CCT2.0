@extends('landing.layaut')

@section('contenido')
    <section class="full-height">
        <div class="container-fluid p-0 full-height">
            <div class="row g-0 full-height">

                <!-- MOBILE -->
                <div class="d-md-none d-flex align-items-center justify-content-center bg-azul-claro text-white p-4 full-height">
                    <div class="login-card bg-azul p-4 rounded shadow w-100">
                        <div class="text-center mb-4">
                            <i class="bi bi-person-circle" style="font-size: 3rem;"></i>
                        </div>
                        <form method="POST">
                            <div class="mb-3">
                                <label for="usuario" class="form-label">Usuario</label>
                                <input type="text" class="form-control" id="usuario-mobile" name="usuario" placeholder="USUARIO" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password-mobile" name="password" placeholder="CONTRASEÑA" required>
                            </div>
                            <button type="submit" class="btn btn-login w-100 mt-3">Iniciar Sesión</button>
                        </form>
                    </div>
                </div>

                <!-- DESKTOP -->
                <div class="d-none d-md-flex col-md-6 bg-azul-claro text-white align-items-center justify-content-center full-height">
                    <div class="login-card p-4">
                        <div class="text-center mb-4">
                            <i class="bi bi-person-circle" style="font-size: 3rem;"></i>
                        </div>
                        <form method="POST">
                            <div class="mb-3">
                                <label for="usuario" class="form-label fs-5">Usuario</label>
                                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="USUARIO" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label fs-5">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="CONTRASEÑA" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-login px-5 mt-3">Iniciar Sesión</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Panel decorativo -->
                <div class="d-none d-md-block col-md-6 decorativo full-height"></div>

            </div>
        </div>

    </section>

@endsection