<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Registro de Personal - Ferretería La Bendición</title>
    <link href="{{asset('libs/sbadmin/css/sb-admin-2.min.css')}}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header bg-dark text-white text-center py-4">
                                    <h3 class="font-weight-light my-2">
                                        <i class="fas fa-user-plus text-success me-2"></i>Crear Cuenta de Empleado
                                    </h3>
                                </div>
                                <div class="card-body p-4">
                                    <form action="{{ route('register.post') }}" method="POST">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('name') is-invalid @enderror" id="inputName" type="text" name="name" value="{{ old('name') }}" placeholder="Juan Pérez" required />
                                            <label for="inputName"><i class="fas fa-user me-1"></i>Nombre Completo</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('email') is-invalid @enderror" id="inputEmail" type="email" name="email" value="{{ old('email') }}" placeholder="empleado@disfarma.hn" required />
                                            <label for="inputEmail"><i class="fas fa-envelope me-1"></i>Correo Institucional</label>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control @error('password') is-invalid @enderror" id="inputPassword" type="password" name="password" placeholder="Contraseña" required />
                                                    <label for="inputPassword"><i class="fas fa-lock me-1"></i>Contraseña</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputPasswordConfirm" type="password" name="password_confirmation" placeholder="Confirmar" required />
                                                    <label for="inputPasswordConfirm"><i class="fas fa-check-double me-1"></i>Confirmar Clave</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-success py-2">
                                                    <i class="fas fa-save me-1"></i>Registrar Cuenta y Acceder
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3 bg-light">
                                    <div class="small">
                                        ¿Ya tienes cuenta autorizada? <a href="{{ route('login') }}">Iniciar Sesión</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('libs/sbadmin/js/sb-admin-2.min.js')}}"></script>
</body>

</html>