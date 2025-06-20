<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Recuperar Contraseña - Tribunal Electrónico</title>
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

        /* Contenido principal: formulario de recuperación de contraseña */
        .password-recovery-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 1; /* Permite que el contenedor crezca y empuje el footer */
            padding: 20px 0;
        }
        .recovery-card {
            max-width: 500px; /* Ancho máximo para el formulario */
            width: 100%;
            background-color: white;
            padding: 2.5rem;
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            text-align: center; /* Centrar el contenido dentro de la tarjeta */
        }
        .recovery-card .form-group label {
            text-align: left; /* Alinea la etiqueta a la izquierda */
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }
        .recovery-card .form-control {
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
        }
        .recovery-card .btn-primary {
            width: 100%; /* Botón de ancho completo */
            padding: 0.75rem 1rem; /* Aumentar padding para el botón */
            font-size: 1.1rem;
        }
        .text-muted {
            font-size: 0.95em; /* Ajustar tamaño para mejor legibilidad */
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
                    <a class="nav-item nav-link" href="{{ route('homeayuda') }}">❓ Ayuda</a>
                    <a class="nav-item nav-link" href="{{ route('registro') }}">📝 Registro</a>
                    <!-- No hay un enlace directo en la navbar para "Recuperar Contraseña", 
                         pero lo he añadido por si acaso lo deseas. -->
                    {{-- <a class="nav-item nav-link active" aria-current="page" href="{{ route('password.request') }}">🔑 Recuperar Contraseña</a> --}}
                </div>
            </div>
        </nav>

        <!-- Banner superior -->
        <div class="bg-primary text-white text-center py-2">
            <small>IR A LA PÁGINA OFICIAL DEL PODER JUDICIAL TAMAULIPAS</small>
        </div>

        <div class="container-fluid d-flex password-recovery-container">
            <!-- Contenido principal: Formulario de Recuperación de Contraseña centrado -->
            <div class="recovery-card">
                <h3 class="text-primary mb-3">Recuperar Contraseña</h3>
                <p class="text-muted mb-4">
                    Ingresa tu dirección de correo electrónico y te enviaremos un
                    enlace para restablecer tu contraseña.
                </p>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf {{-- Token CSRF por seguridad --}}

                    <div class="mb-4 form-group">
                        <label for="email"><i class="fas fa-envelope me-2"></i>Correo Electrónico:</label>
                        <input type="email" class="form-control" id="email" name="email" 
                               placeholder="Ingresa tu correo electrónico" required value="{{ old('email') }}">
                        @error('email') 
                            <div class="text-danger mt-2">{{ $message }}</div> 
                        @enderror
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success mb-4" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Enviar Enlace de Restablecimiento
                        </button>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('login') }}" class="text-primary">Volver al Inicio de Sesión</a>
                    </div>
                </form>
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
