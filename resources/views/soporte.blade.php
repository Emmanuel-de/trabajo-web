<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ayuda y Soporte - Tribunal Electrónico - Poder Judicial Tamaulipas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Estilos generales del cuerpo y layout */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Asegura que el cuerpo ocupe al menos toda la altura de la ventana */
            font-family: 'Inter', sans-serif; /* Se recomienda usar Inter para consistencia */
            background-color: #f8f9fa; /* Color de fondo ligero */
        }
        .content-wrap {
            flex: 1; /* Esto empuja el footer hacia abajo */
        }

        /* Colores primarios y botones */
        .bg-primary { background-color: #1f5582 !important; }
        .btn-primary { 
            background-color: #1f5582; 
            border-color: #1f5582; 
            border-radius: 0.5rem; /* Bordes redondeados para botones */
        }
        .btn-primary:hover { 
            background-color: #164566; 
            border-color: #164566; 
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            border-radius: 0.5rem;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
        .text-primary { color: #1f5582 !important; }

        /* Estilos de la barra de navegación (header) */
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
        .header-navbar {
            background-color: #343a40 !important; /* Gris oscuro similar al footer */
        }
        .header-navbar .nav-link {
            color: white !important; /* Color de los enlaces a blanco */
            transition: color 0.3s ease-in-out;
            border-radius: 0.5rem; /* Bordes redondeados para enlaces de nav */
        }
        .header-navbar .nav-link:hover {
            color: #ccc !important; /* Ligeramente más claro al pasar el ratón */
        }
        .header-navbar .nav-link.active { /* Estilo para el enlace activo */
            background-color: #164566;
            color: white !important;
            border-radius: 0.5rem;
        }

        /* Contenido principal y secciones específicas */
        .alert-custom { 
            background-color: #d1ecf1; 
            border-color: #bee5eb; 
            color: #0c5460; 
            border-radius: 0.5rem; /* Bordes redondeados */
        }
        .card { 
            border-radius: 0.5rem; 
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075); /* Sombra sutil para las tarjetas */
        }
        .card-header { 
            border-top-left-radius: 0.5rem !important; 
            border-top-right-radius: 0.5rem !important; 
        }
        .list-group-item {
            border-radius: 0.5rem !important; /* Bordes redondeados para elementos de lista */
            margin-bottom: 0.25rem; /* Pequeño margen entre elementos de lista */
        }
        .list-group-item:last-child {
            margin-bottom: 0;
        }
        .list-group-item.active {
            background-color: #1f5582 !important;
            border-color: #1f5582 !important;
        }

        /* Estilos específicos del contenido de ayuda */
        .help-content-wrapper {
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075);
            padding: 2rem;
        }
        .welcome-banner {
            background: linear-gradient(135deg, #17a2b8, #20c997); /* Color azul/verde para ayuda */
            color: white;
            padding: 2rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
        }
        .section-title {
            color: #1f5582; /* Usar el primary color para los títulos de sección */
            font-weight: bold;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #1f5582;
            display: flex;
            align-items: center;
        }
        .contact-info-item {
            display: flex;
            align-items: flex-start; /* Alinea los ítems al inicio para multilínea */
            margin-bottom: 15px; /* Más espacio entre ítems */
        }
        .contact-info-item i {
            margin-right: 15px; /* Más espacio entre icono y texto */
            color: #1f5582; /* Iconos en color primario */
            font-size: 1.5rem; /* Iconos un poco más grandes */
            flex-shrink: 0; /* Evita que el icono se encoja */
        }
        .contact-info-item p {
            margin-bottom: 0;
            line-height: 1.4; /* Mejora la legibilidad en multilínea */
        }
        .contact-info-item .fw-bold {
            display: block; /* Asegura que el título esté en su propia línea si es necesario */
        }

        /* Estilos del pie de página - ACTUALIZADOS */
        footer {
            background-color: #343a40 !important; /* Mismo color que el header */
            color: white;
            padding: 2rem 0;
            margin-top: auto;
        }
        footer h6 {
            color: white;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        footer p {
            color: #ccc; /* Color más claro para el texto del footer */
            margin-bottom: 0.5rem;
        }
        footer a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }
        footer a:hover {
            color: white;
        }
        .footer-logo img {
            height: 80px;
            margin-bottom: 10px;
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

                <div class="navbar-nav ms-auto d-flex flex-row align-items-center">
                    <span class="navbar-text me-3 text-white">
                        Bienvenido <strong>{{ Auth::user()->name ?? 'Usuario' }}</strong>
                    </span>
                    <div class="dropdown">
                        <button class="btn btn-outline-light btn-sm dropdown-toggle rounded-md" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->name ?? 'Usuario' }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><h6 class="dropdown-header">Opciones de Usuario</h6></li>
                            <li><a class="dropdown-item" href="{{ route('perfil') }}"><i class="fas fa-file-alt me-2"></i>Mi Perfil</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Configuración</a></li>
                            <li><a class="dropdown-item" href="{{ route('buzon') }}"><i class="fas fa-envelope me-2"></i>Mensajes</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-bell me-2"></i>Notificaciones</a></li>
                            <li><a class="dropdown-item active" aria-current="page" href="{{ route('soporte') }}"><i class="fas fa-question-circle me-2"></i>Soporte</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt me-2"></i> Cerrar Sesión
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Banner superior -->
        <div class="bg-primary text-white text-center py-2">
            <small>IR A LA PÁGINA OFICIAL DEL PODER JUDICIAL TAMAULIPAS</small>
        </div>

        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-3 bg-light py-4 border-end">
                    <div class="list-group rounded-md">
                        <a href="{{ route('usuario') }}" class="list-group-item list-group-item-action">
                            <i class="fas fa-home me-2"></i> Dashboard
                        </a>
                        <a href="{{ route('promociones.index') }}" class="list-group-item list-group-item-action">
                            <i class="fas fa-file-contract me-2"></i> Promociones Electrónicas
                        </a>
                        <a href="{{ route('expedientes.create') }}" class="list-group-item list-group-item-action">
                            <i class="fas fa-folder-open me-2"></i> Mis Expedientes
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-bell me-2"></i> Notificaciones
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-chart-bar me-2"></i> Reportes
                        </a>
                        <a href="{{ route('perfil') }}" class="list-group-item list-group-item-action">
                            <i class="fas fa-user-circle me-2"></i> Mi Perfil
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-cogs me-2"></i> Configuración
                        </a>
                        <a href="{{ route('soporte') }}" class="list-group-item list-group-item-action active" aria-current="true">
                            <i class="fas fa-question-circle me-2"></i> Ayuda
                        </a>
                    </div>

                    {{-- Sección de "Servicios Rápidos" eliminada --}}
                </div>

                <!-- Main Content: Help and Support Information -->
                <div class="col-md-9 py-4">
                    <!-- Welcome Banner de Ayuda -->
                    <div class="welcome-banner d-flex align-items-center">
                        <i class="fas fa-headset me-3" style="font-size: 3rem;"></i>
                        <div>
                            <h3 class="mb-1 text-white">Centro de Ayuda y Soporte</h3>
                            <p class="mb-0 text-white">Información de contacto para asistencia técnica</p>
                        </div>
                    </div>

                    <!-- Sección de Información de Contacto de Soporte -->
                    <div class="help-content-wrapper">
                        <h5 class="section-title mb-4">
                            <i class="fas fa-info-circle me-2"></i>Información de Contacto de Soporte Técnico
                        </h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="contact-info-item">
                                    <i class="fas fa-phone-alt"></i>
                                    <div>
                                        <p class="fw-bold mb-0">Teléfono:</p>
                                        <p class="mb-0">(834) 318 8400 Ext. 6200, 6203, 6204</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-info-item">
                                    <i class="fas fa-envelope"></i>
                                    <div>
                                        <p class="fw-bold mb-0">Correo Electrónico:</p>
                                        <p class="mb-0"><a href="mailto:soporte@tribunalelectronico.gob.mx" class="text-decoration-none text-primary">soporte@tribunalelectronico.gob.mx</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-info-item">
                                    <i class="fas fa-clock"></i>
                                    <div>
                                        <p class="fw-bold mb-0">Horario de Atención:</p>
                                        <p class="mb-0">Lunes a Viernes, de 8:00 a 18:00 hrs (Hora Central)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-info-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <div>
                                        <p class="fw-bold mb-0">Ubicación:</p>
                                        <p class="mb-0">Dirección de Informática, Boulevard Praxedis Balboa #2207, Col. Miguel Hidalgo, C.P. 87090, Cd. Victoria, Tamaulipas.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center mt-4">
                                <a href="{{ route('usuario') }}" class="btn btn-secondary btn-lg">
                                    <i class="fas fa-arrow-left me-2"></i>Regresar al Dashboard
                                </a>
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
    <script>
        // Auto-hide alerts after 5 seconds - still useful if we decide to add alerts for other reasons
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                setTimeout(function() {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 5000);
            });
        });
    </script>
</body>
</html>
