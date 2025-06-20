<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Centro de Ayuda Pública - Poder Judicial Tamaulipas</title>
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
        .btn-outline-primary {
            border-color: #1f5582;
            color: #1f5582;
            border-radius: 0.5rem;
        }
        .btn-outline-primary:hover {
            background-color: #1f5582;
            color: white;
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
        
        /* Estilos específicos para la sección de ayuda */
        .help-center-card {
            max-width: 800px; /* Ancho máximo para el contenido de ayuda */
            width: 100%;
            padding: 2rem;
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            background-color: white;
        }

        .accordion-button {
            background-color: #f8f9fa; /* Fondo ligero para los botones de acordeón */
            color: #1f5582; /* Color de texto primario */
            font-weight: bold;
            border-radius: 0.5rem; /* Bordes redondeados */
            transition: background-color 0.2s ease-in-out;
        }
        .accordion-button:not(.collapsed) {
            background-color: #1f5582; /* Fondo oscuro cuando está abierto */
            color: white;
        }
        .accordion-item {
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            margin-bottom: 0.5rem; /* Espacio entre los elementos del acordeón */
        }
        .accordion-item:last-of-type {
            margin-bottom: 0;
        }
        .accordion-body {
            border-top: 1px solid #dee2e6;
            padding-top: 1rem;
        }

        .divider-line {
            border-bottom: 1px solid #dee2e6;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }
        .question-section-title {
            color: #1f5582;
            font-weight: bold;
            margin-bottom: 1.5rem;
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
                    <a class="nav-item nav-link" href="{{ route('buzon') }}">📧 Buzón</a>
                    <!-- Este enlace es ahora la página actual del centro de ayuda -->
                    <a class="nav-item nav-link active" aria-current="page" href="{{ route('homeayuda') }}">❓ Ayuda</a>
                </div>
            </div>
        </nav>

        <!-- Banner superior -->
        <div class="bg-primary text-white text-center py-2">
            <small>IR A LA PÁGINA OFICIAL DEL PODER JUDICIAL TAMAULIPAS</small>
        </div>

        <div class="container-fluid d-flex justify-content-center py-4">
            <!-- Contenido principal: Centro de Ayuda Pública centrado -->
            <div class="help-center-card">
                <h3 class="text-center text-primary mb-4">Centro de Ayuda Pública</h3>
                
                <!-- Sección de Preguntas Frecuentes -->
                <div class="mb-5">
                    <h5 class="question-section-title"><i class="fas fa-question-circle me-2"></i>Preguntas Frecuentes</h5>
                    <div class="accordion" id="faqAccordion">
                        <!-- Pregunta 1 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    ¿Qué es el Tribunal Electrónico?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    El Tribunal Electrónico es una plataforma digital del Poder Judicial de Tamaulipas que permite a los ciudadanos y abogados realizar trámites judiciales en línea, consultar expedientes, recibir notificaciones electrónicas y acceder a diversos servicios sin necesidad de acudir físicamente a las instalaciones del tribunal.
                                </div>
                            </div>
                        </div>
                        <!-- Pregunta 2 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    ¿Cómo puedo registrarme para acceder a los servicios?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Para registrarte, debes ir a la sección "Registro de Usuarios" en la página de inicio o directamente en la opción de registro. Se te pedirá completar un formulario con tus datos personales y adjuntar la documentación requerida para la verificación de tu identidad. Una vez aprobado tu registro, podrás acceder a los servicios completos del Tribunal Electrónico.
                                </div>
                            </div>
                        </div>
                        <!-- Pregunta 3 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    ¿Qué documentos puedo consultar con Acceso Libre?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Con Acceso Libre, puedes consultar el Boletín Judicial, las Listas de Acuerdos, los Edictos y el Sorteo de Pleno. Para acceder a expedientes específicos y notificaciones personales, es necesario estar registrado y autenticado en la plataforma.
                                </div>
                            </div>
                        </div>
                        <!-- Pregunta 4 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    ¿Cómo puedo contactar al soporte técnico?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Puedes contactar al soporte técnico enviando un mensaje a través de nuestro "Buzón de Quejas y Sugerencias" disponible en la navegación principal. También puedes consultar la sección de "Contacto" en el pie de página para obtener información de correo electrónico y dirección física de la Dirección de Informática.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sección "¿No encuentras lo que buscas?" -->
                <div class="text-center mt-5">
                    <div class="divider-line"></div>
                    <h5 class="text-primary mb-3">¿No encuentras lo que buscas?</h5>
                    <p class="text-muted mb-4">
                        Si tu pregunta no ha sido respondida, puedes contactarnos a través de nuestro buzón de quejas y sugerencias o iniciar sesión para acceder al asistente de IA.
                    </p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="{{ route('buzon') }}" class="btn btn-outline-primary btn-lg rounded-md">
                            <i class="fas fa-inbox me-2"></i> Ir al Buzón
                        </a>
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg rounded-md">
                            <i class="fas fa-sign-in-alt me-2"></i> Iniciar Sesión
                        </a>
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

