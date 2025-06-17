<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tribunal Electrónico - Poder Judicial Tamaulipas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bg-primary { background-color: #1f5582 !important; }
        .btn-primary { background-color: #1f5582; border-color: #1f5582; }
        .btn-primary:hover { background-color: #164566; border-color: #164566; }
        .text-primary { color: #1f5582 !important; }
        /* Ajuste para que el texto y el logo estén alineados y el texto no sea demasiado grande */
        .navbar-brand { 
            display: flex; /* Usar flexbox para alinear el logo y el texto */
            align-items: center; /* Centrar verticalmente los elementos */
            font-weight: bold; /* Hacer el texto del brand en negritas */
        }
        .navbar-brand img { 
            height: 40px; 
            margin-right: 10px; /* Espacio entre el logo y el texto */
        }
        .navbar-brand small {
            font-size: 0.7em; /* Reducir el tamaño de la letra para el subtítulo */
            display: block; /* Para que el subtítulo esté en su propia línea */
        }
        .main-content { background-color: #f8f9fa; min-height: 100vh; }
        .info-section { background-color: #d1ecf1; }
        .login-section { background-color: white; }
        .alert-custom { background-color: #d1ecf1; border-color: #bee5eb; color: #0c5460; }
    </style>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('homepage') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Tribunal Electrónico">
                {{-- CAMBIO AQUÍ: Añadiendo el texto al lado del logo --}}
                <div>
                    TRIBUNAL ELECTRÓNICO
                    <small>PODER JUDICIAL TAMAULIPAS</small>
                </div>
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-item nav-link" href="{{ route('homepage') }}">🏠 Inicio</a>
                <a class="nav-item nav-link" href="#">📧 Buzón</a>
                <a class="nav-item nav-link" href="{{ route('ayuda') }}">❓ Ayuda</a>
            </div>
        </div>
    </nav>

    <!-- Banner -->
    <div class="bg-primary text-white text-center py-2">
        <small>IR A LA PÁGINA OFICIAL DEL PODER JUDICIAL TAMAULIPAS</small>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 bg-light py-4">
                <div class="list-group">
                    <a class="list-group-item list-group-item-action bg-primary text-white">
                        📋 BOLETÍN JUDICIAL
                    </a>
                    <a class="list-group-item list-group-item-action">
                        🔓 Acceso Libre
                    </a>
                    <a class="list-group-item list-group-item-action">
                        📄 Listas de Acuerdos
                    </a>
                    <a class="list-group-item list-group-item-action">
                        🎯 Sorteo de Pleno
                    </a>
                    <a class="list-group-item list-group-item-action">
                        📚 Edictos
                    </a>
                </div>

                <div class="mt-4">
                    <button class="btn btn-outline-primary mb-2 w-100">PREGUNTAS FRECUENTES</button>
                    <button class="btn btn-outline-primary mb-2 w-100">UBICACIÓN DE BUZONES</button>
                    <button class="btn btn-outline-primary mb-2 w-100">DIRECTORIO TELEFÓNICO</button>
                    <button class="btn btn-primary w-100">EXPEDIENTE ELECTRÓNICO</button>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 py-4">
                <!-- Alerts -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="row">
                    <!-- Information Section -->
                    <div class="col-md-8">
                        <div class="alert-custom p-4 rounded mb-4">
                            <h3 class="text-primary">¡NUEVO SERVICIO ELECTRÓNICO!</h3>
                            <div class="d-flex align-items-center mb-3">
                                <div class="me-3">
                                    <img src="/icon-service.png" alt="Icono Servicio Electrónico" width="50">
                                </div>
                                <div>
                                    <p class="mb-1">Pliego de Posiciones protegido por <strong>CONTRA SEÑA</strong></p>
                                    <p class="mb-0">Conozca como enviar sus Pliegos de Posiciones de manera <strong>SEGURA</strong>.</p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary me-2">VER ACUERDO</button>
                                <button class="btn btn-primary me-2">VER VIDEO</button>
                                <button class="btn btn-primary">VER TUTORIAL</button>
                            </div>
                        </div>

                        <!-- Esta sección de Registro de Usuarios ahora contendrá solo el texto y el botón "A DISTANCIA" -->
                        <div class="text-center mb-4">
                            <h4 class="text-primary">REGISTRO DE USUARIOS</h4>
                            <p>FIRMA ELECTRÓNICA AVANZADA</p>
                            <p><strong>A DISTANCIA</strong> <a href="{{ route('registro') }}" class="btn btn-warning">CLICK AQUÍ</a></p>
                        </div>

                        <!-- Formatos Section -->
                        <div class="mb-4">
                            <h5>📋 Formatos</h5>
                            <ul class="list-unstyled">
                                <li>> EJEMPLOS DE PROMOCIÓN SOLICITANDO MEDIOS ELECTRÓNICOS</li>
                                <li>> EJEMPLOS DE PROMOCIÓN SOLICITANDO MEDIOS ELECTRÓNICOS</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Login Section -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header bg-primary text-white text-center">
                                <h5 class="mb-0">EXPEDIENTE ELECTRÓNICO</h5>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="usuario" class="form-label">👤 Usuario:</label>
                                        <input type="text" 
                                               class="form-control @error('usuario') is-invalid @enderror" 
                                               id="usuario" 
                                               name="usuario" 
                                               value="{{ old('usuario') }}" 
                                               placeholder="Ingrese su usuario o email"
                                               required>
                                        @error('usuario')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">🔒 Contraseña:</label>
                                        <input type="password" 
                                               class="form-control @error('password') is-invalid @enderror" 
                                               id="password" 
                                               name="password" 
                                               placeholder="Ingrese su contraseña"
                                               required>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    @error('login')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">ENTRAR</button>
                                    </div>

                                    <div class="text-center mt-3">
                                        <a href="#" class="text-primary small">¿OLVIDÓ SU CONTRASEÑA?<br>CLICK AQUÍ</a>
                                    </div>
                                </form>

                                <hr>

                                <div class="text-center">
                                    <p class="mb-2">👥 <a href="{{ route('registro') }}" class="text-primary">Registro de usuarios</a></p>
                                    
                                    <img src="{{ asset('images/registro-aqui.jpg') }}" alt="Regístrese Aquí" class="img-fluid mb-2" width="auto" height="auto" style="max-width: 250px;">
                                    
                                    <div class="d-grid">
                                        <a href="{{ route('registro') }}" class="btn btn-danger">REGÍSTRESE AQUÍ</a>
                                    </div>
                                </div>

                                <hr>

                                <div class="text-center">
                                    <small class="text-muted">— Reenviar comprobante de</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

