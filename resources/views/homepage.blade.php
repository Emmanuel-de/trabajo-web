<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tribunal Electrónico - Poder Judicial Tamaulipas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Asegura que el cuerpo ocupe al menos toda la altura de la ventana */
        }
        .content-wrap {
            flex: 1; /* Esto empuja el footer hacia abajo */
        }
        .bg-primary { background-color: #1f5582 !important; }
        .btn-primary { background-color: #1f5582; border-color: #1f5582; }
        .btn-primary:hover { background-color: #164566; border-color: #164566; }
        .text-primary { color: #1f5582 !important; }
        /* Ajuste para que el texto y el logo estén alineados y el texto no sea demasiado grande */
        .navbar-brand { 
            display: flex; 
            align-items: center; 
            font-weight: bold; 
            color: white; /* Color del texto del brand */
        }
        .navbar-brand img { 
            height: 40px; 
            margin-right: 10px; 
        }
        .navbar-brand small {
            font-size: 0.7em; 
            display: block; 
            color: #ccc; /* Color más claro para el subtítulo */
        }
        /* CAMBIO AQUÍ: Estilo para el nuevo color de encabezado */
        .header-navbar {
            background-color: #343a40 !important; /* Gris oscuro similar al footer */
        }
        .header-navbar .nav-link {
            color: white !important; /* Color de los enlaces a blanco */
            transition: color 0.3s ease-in-out;
        }
        .header-navbar .nav-link:hover {
            color: #ccc !important; /* Ligeramente más claro al pasar el ratón */
        }

        .main-content { background-color: #f8f9fa; min-height: 100vh; } 
        .info-section { background-color: #d1ecf1; }
        .login-section { background-color: white; }
        .alert-custom { background-color: #d1ecf1; border-color: #bee5eb; color: #0c5460; }

        /* Estilos del pie de página */
        footer {
            background-color: #343a40; /* Color de fondo oscuro, similar al de la imagen */
            color: white;
            padding: 30px 0;
            margin-top: auto; /* Empuja el footer hacia la parte inferior de la página */
        }
        footer .footer-logo img {
            max-height: 80px; /* Tamaño del logo en el pie de página */
            margin-bottom: 15px;
        }
        footer p, footer small, footer a {
            color: #ccc; /* Color de texto más claro para contraste */
            font-size: 0.9em;
        }
        footer a:hover {
            color: white;
            text-decoration: underline;
        }
        footer h6 {
            color: white;
            font-weight: bold;
            margin-bottom: 15px;
        }
        /* Estilo para el nuevo banner de registro */
        .registration-banner-container {
            text-align: center;
            margin-bottom: 25px; /* Espacio debajo del banner */
        }
        .registration-banner-container img {
            max-width: 100%; /* Asegura que la imagen sea responsiva */
            height: auto;
            border-radius: 8px; /* Bordes ligeramente redondeados */
            box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Sombra sutil */
            display: block; /* Para centrar la imagen */
            margin: 0 auto; /* Centrar la imagen */
            cursor: pointer; /* Indica que es clicable */
            transition: transform 0.2s ease-in-out; /* Animación al pasar el ratón */
        }
        .registration-banner-container img:hover {
            transform: translateY(-3px); /* Efecto al pasar el ratón */
        }
    </style>
</head>
<body>
    <div class="content-wrap">
        <!-- Header -->
        <nav class="navbar navbar-expand-lg navbar-dark header-navbar">
            <div class="container">
                <a class="navbar-brand" href="{{ route('homepage') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Tribunal Electrónico">
                    <div>
                        TRIBUNAL ELECTRÓNICO
                        <small>PODER JUDICIAL TAMAULIPAS</small>
                    </div>
                </a>
                <div class="navbar-nav ms-auto">
                    <a class="nav-item nav-link" href="{{ route('homepage') }}">🏠 Inicio</a>
                    <a class="nav-item nav-link" href="{{ route('buzon') }}">📧 Buzón</a>
                    <a class="nav-item nav-link" href="{{ route('homeayuda') }}">❓ Ayuda</a>
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
                        <a class="list-group-item list-group-item-action" href="https://tribunalelectronico.gob.mx/TE/acceso-libre/listas-acuerdos/seleccione-municipio" target="_blank">
                          📄 Listas de Acuerdos
                        </a>
                        <a class="list-group-item list-group-item-action" href="https://tribunalelectronico.gob.mx/TE/acceso-libre/sorteo-pleno/consultar" target="_blank">
                            🎯 Sorteo de Pleno
                        </a>
                        <a class="list-group-item list-group-item-action" href="https://tribunalelectronico.gob.mx/TE/acceso-libre/edictos/seleccione-municipio" target="_blank">
                            📚 Edictos
                        </a>
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
                                        <img src="{{ asset('images/escudo.png') }}" alt="Icono Servicio Electrónico" width="50">
                                    </div>
                                    <div>
                                        <p class="mb-1">Pliego de Posiciones protegido por <strong>CONTRA SEÑA</strong></p>
                                        <p class="mb-0">Conozca como enviar sus Pliegos de Posiciones de manera <strong>SEGURA</strong>.</p>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    {{-- CAMBIO AQUÍ: Botón "VER ACUERDO" convertido en enlace --}}
                                    <a href="https://www.pjetam.gob.mx/doc/legislacion/circulares_acuerdos/2025/OCJ20250305.pdf" target="_blank" class="btn btn-primary me-2">VER ACUERDO</a>
                                    {{-- CAMBIO AQUÍ: Botón "VER VIDEO" convertido en enlace --}}
                                    <a href="https://youtu.be/WhDX_p-RvKs?si=9O0AzB1KmTzZiNPk" target="_blank" class="btn btn-primary me-2">VER VIDEO</a>
                                    {{-- CAMBIO AQUÍ: Botón "VER TUTORIAL" convertido en enlace --}}
                                    <a href="https://tribunalelectronico.gob.mx/TE/Documentos/Pliego_Posiciones_Protegido.pdf?v=2025" target="_blank" class="btn btn-primary">VER TUTORIAL</a>
                                </div>
                            </div>

                            <!-- Sección del banner de registro principal -->
                            <div class="registration-banner-container">
                                <a href="{{ route('registro') }}">
                                    <img src="{{ asset('images/bannerRegistroDistancia_o.png') }}" 
                                         alt="Registro de Usuarios y Firma Electrónica Avanzada a Distancia">
                                </a>
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
                                            <a href="{{ route('password.request') }}" class="text-primary small">¿OLVIDÓ SU CONTRASEÑA?<br>CLICK AQUÍ</a>
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
    </div>

    </div> <!-- Cierre de content-wrap -->

    <!-- Pie de página -->
    <footer>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 text-center text-md-start">
                    <div class="footer-logo">
                        <img src="{{ asset('images/logo.png') }}" alt="Poder Judicial Tamaulipas Logo">
                    </div>
                    <p class="mb-0">PODER JUDICIAL TAMAULIPAS</p>
                    <p class="mb-0">TRIBUNAL ELECTRÓNICO</p>
                </div>
                <div class="col-md-4 text-center">
                    <p class="mb-0">&copy; {{ date('Y') }} Derechos Reservados Poder Judicial Tamaulipas</p>
                </div>
                <div class="col-md-4 text-center text-md-end">
                    <h6>CONTACTO</h6>
                    <p class="mb-0">Dirección de Informática.</p>
                    <p class="mb-0">Boulevard Praxedis Balboa # 2207</p>
                    <p class="mb-0">entre López Velarde y Díaz Mirón</p>
                    <p class="mb-0">Col. Miguel Hidalgo C.P. 87090.</p>
                    <p class="mb-0"><a href="mailto:tribunalelectronico@tamaulipas.gob.mx">tribunalelectronico@tamaulipas.gob.mx</a></p>
                    <p class="mb-0">Cd. Victoria, Tamaulipas.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
