<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Buzón de Quejas y Sugerencias - Poder Judicial Tamaulipas</title>
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
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            border-radius: 0.5rem;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
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
        .main-content { background-color: #f8f9fa; min-height: 100vh; } 
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
        
        /* Estilos específicos para las pestañas del buzón (mantener por si se reintroduce) */
        .nav-tabs .nav-link {
            color: #1f5582; /* Color de texto para las pestañas no activas */
            border-radius: 0.5rem 0.5rem 0 0; /* Bordes redondeados en la parte superior */
        }
        .nav-tabs .nav-link.active {
            background-color: #1f5582; /* Color de fondo para la pestaña activa */
            color: white; /* Color de texto para la pestaña activa */
            border-color: #1f5582 #1f5582 #fff; /* Borde inferior blanco para fusionar con el contenido */
        }
        .nav-tabs .nav-link:hover {
            border-color: #e9ecef #e9ecef #dee2e6; /* Mantener bordes al pasar el ratón */
        }
        .tab-content {
            border: 1px solid #dee2e6;
            border-top: none;
            padding: 1.5rem;
            border-radius: 0 0 0.5rem 0.5rem; /* Bordes redondeados en la parte inferior */
            background-color: white;
        }

        /* Centrar el formulario y ajustar su ancho */
        .centered-form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 150px); /* Ajustar altura para que ocupe casi todo el espacio vertical disponible */
            padding: 20px 0; /* Padding vertical para no pegar a los bordes */
        }
        .form-card {
            max-width: 600px; /* Ancho máximo para el formulario */
            width: 100%; /* Asegura que ocupe el ancho disponible hasta el max-width */
            padding: 2rem;
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            background-color: white;
        }

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
                    <!-- Este enlace es ahora la página actual del buzón de quejas/sugerencias -->
                    <a class="nav-item nav-link active" aria-current="page" href="{{ route('buzon') }}">📧 Buzón</a>
                    <a class="nav-item nav-link" href="{{ route('homeayuda') }}">❓ Ayuda</a>
                </div>
            </div>
        </nav>

        <!-- Banner superior -->
        <div class="bg-primary text-white text-center py-2">
            <small>IR A LA PÁGINA OFICIAL DEL PODER JUDICIAL TAMAULIPAS</small>
        </div>

        <div class="container-fluid">
            <div class="row">
                <!-- Se ha eliminado el sidebar para centrar el contenido -->
                
                <!-- Main Content: Formulario de Quejas y Sugerencias centrado -->
                <div class="col-12 d-flex justify-content-center">
                    <div class="form-card my-4"> <!-- Añadir my-4 para margen vertical -->
                        <h3 class="text-center text-primary mb-3">Buzón de Quejas y Sugerencias</h3>
                        <p class="text-center text-muted mb-4">
                            Tu opinión es importante para nosotros. Por favor, utiliza este formulario
                            para enviarnos tus comentarios, quejas o sugerencias.
                        </p>
                        <form>
                            <div class="mb-3">
                                <label for="nombre" class="form-label"><i class="fas fa-user me-2"></i>Tu Nombre (Opcional):</label>
                                <input type="text" class="form-control rounded-md" id="nombre" placeholder="Ingresa tu nombre">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label"><i class="fas fa-envelope me-2"></i>Tu Correo Electrónico (Opcional):</label>
                                <input type="email" class="form-control rounded-md" id="email" placeholder="Ingresa tu correo electrónico">
                            </div>
                            <div class="mb-3">
                                <label for="asunto" class="form-label"><i class="fas fa-bookmark me-2"></i>Asunto:</label>
                                <input type="text" class="form-control rounded-md" id="asunto" placeholder="Ej: Problema técnico, Sugerencia de mejora" required>
                            </div>
                            <div class="mb-4">
                                <label for="mensaje" class="form-label"><i class="fas fa-comment-dots me-2"></i>Mensaje:</label>
                                <textarea class="form-control rounded-md" id="mensaje" rows="6" placeholder="Describe tu queja o sugerencia aquí..." required></textarea>
                            </div>
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    Enviar Queja/Sugerencia
                                </button>
                            </div>
                            <div class="text-center">
                                <a href="{{ route('homepage') }}" class="text-primary">Volver al Inicio</a>
                            </div>
                        </form>
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
    <!-- No se necesita el JavaScript de las pestañas ya que han sido eliminadas -->
</body>
</html>

