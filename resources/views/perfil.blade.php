<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mi Perfil - Tribunal Electrónico - Poder Judicial Tamaulipas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome para iconos (URL actualizada a una más estándar) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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

        /* Estilos específicos del perfil de usuario */
        .profile-form-wrapper {
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075);
            padding: 2rem;
        }
        .welcome-banner {
            background: linear-gradient(135deg, #28a745, #20c997); /* Color verde, diferente al dashboard para diferenciar */
            color: white;
            padding: 2rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
        }
        .profile-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #007bff, #0056b3); /* Azul como en el ejemplo original */
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            font-weight: bold;
            flex-shrink: 0; /* Evita que el avatar se encoja */
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
        .info-display {
            background-color: #e9ecef; /* Color de fondo claro para la información en modo vista */
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem; /* Espacio debajo de cada campo de info */
            min-height: 44px; /* Altura mínima para que coincida con inputs */
            display: flex; /* Para centrar el texto verticalmente si es corto */
            align-items: center;
            color: #343a40; /* Color de texto más oscuro */
            font-weight: 500;
        }
        .form-label {
            font-weight: 600; /* Etiquetas más negritas */
        }
        .form-control, .form-select {
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
        }

        /* INICIO DE LAS REGLAS DE VISIBILIDAD DE EDICIÓN/VISUALIZACIÓN - CORREGIDAS */
        /* Por defecto, los elementos de vista se muestran y los de edición se ocultan */
        .view-mode {
            display: block; 
        }
        .edit-mode {
            display: none;
        }

        /* Cuando el contenedor principal del formulario tiene la clase 'edit-active' */
        .profile-form-wrapper.edit-active .view-mode {
            display: none; /* Oculta los elementos de solo lectura */
        }
        .profile-form-wrapper.edit-active .edit-mode {
            display: block; /* Muestra los campos editables */
        }

        /* Control de visibilidad de los botones: */
        #viewModeButtons {
            display: block; /* Visibles al inicio */
        }
        #editModeButtons {
            display: none; /* Ocultos al inicio */
        }
        /* Cuando el modo de edición está activo, invertimos la visibilidad de los botones */
        #profileForm.edit-active #viewModeButtons {
            display: none;
        }
        #profileForm.edit-active #editModeButtons {
            display: block;
            /* Para que los botones se comporten como d-grid/d-md-block en el modo edición */
            display: grid; /* o flex, según el layout deseado */
            gap: 0.5rem; /* Ajusta el espacio entre botones si usas grid/flex */
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); /* Ejemplo para hacerlos responsive */
            justify-content: center;
        }
        @media (min-width: 768px) {
            #profileForm.edit-active #editModeButtons {
                display: block; /* Para alinear horizontalmente en desktop */
            }
        }
        /* FIN DE LAS REGLAS DE VISIBILIDAD CORREGIDAS */


        /* Alineación del botón de regresar en el section-title */
        .section-title .btn {
            margin-left: auto; /* Empuja el botón a la derecha */
        }

        /* Estilos del pie de página */
        footer {
            background-color: #343a40; /* Color de fondo oscuro, similar al del header */
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
                            <li><a class="dropdown-item active" aria-current="page" href="{{ route('perfil') }}"><i class="fas fa-file-alt me-2"></i>Mi Perfil</a></li>
                            
                            <li><a class="dropdown-item" href="{{ route('buzon') }}"><i class="fas fa-envelope me-2"></i>Mensajes</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-bell me-2"></i>Notificaciones</a></li>
                            {{-- AQUÍ LA CORRECCIÓN: CAMBIADO DE 'homeayuda' A 'soporte' --}}
                            <li><a class="dropdown-item" href="{{ route('soporte') }}"><i class="fas fa-question-circle me-2"></i>Soporte</a></li>
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
                        {{-- CORRECCIÓN AQUÍ: Cambiado de 'expedientes' a 'expedientes.create' --}}
                        <a href="{{ route('expedientes.index') }}" class="list-group-item list-group-item-action">
                            <i class="fas fa-folder-open me-2"></i> Mis Expedientes
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-bell me-2"></i> Notificaciones
                        </a>
                        <a href="{{ route('reportes.index') }}" class="list-group-item list-group-item-action">
                            <i class="fas fa-chart-bar me-2"></i> Reportes
                        </a>
                        <a href="{{ route('perfil') }}" class="list-group-item list-group-item-action active" aria-current="true">
                            <i class="fas fa-user-circle me-2"></i> Mi Perfil
                        </a>
                        
                        {{-- CORRECCIÓN AQUÍ: CAMBIADO DE 'homeayuda' A 'soporte' --}}
                        <a href="{{ route('soporte') }}" class="list-group-item list-group-item-action">
                            <i class="fas fa-question-circle me-2"></i> Soporte
                        </a>
                    </div>

                    
                </div>

                <!-- Main Content: Profile Form -->
                <div class="col-md-9 py-4">
                    <!-- Welcome Banner del perfil -->
                    <div class="welcome-banner d-flex align-items-center">
                        <div class="profile-avatar me-3">
                            {{ strtoupper(substr($user->nombre ?? 'U', 0, 1)) }}{{ strtoupper(substr($user->apellido_paterno ?? 'U', 0, 1)) }}
                        </div>
                        <div>
                            <h3 class="mb-1 text-white">Mi Perfil de Usuario</h3>
                            <p class="mb-0 text-white">Gestiona tu información personal y configuraciones de cuenta</p>
                        </div>
                    </div>

                    <!-- Profile Form -->
                    <div class="profile-form-wrapper" id="profileForm">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show rounded-md" role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show rounded-md" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <ul class="mb-0 ps-3">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form action="{{ route('perfil.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Información Personal -->
                            <div class="mb-4">
                                <h5 class="section-title">
                                    <i class="fas fa-user me-2"></i>Información Personal
                                </h5>
                                
                                <div class="row g-3"> <!-- g-3 para un gap entre columnas y filas -->
                                    <div class="col-md-4">
                                        <label class="form-label">Nombre *</label>
                                        <div class="view-mode">
                                            <div class="info-display">{{ $user->nombre ?? 'No especificado' }}</div>
                                        </div>
                                        <div class="edit-mode">
                                            <input type="text" class="form-control" name="nombre" value="{{ $user->nombre ?? '' }}" required>
                                            @error('nombre') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label class="form-label">Apellido Paterno *</label>
                                        <div class="view-mode">
                                            <div class="info-display">{{ $user->apellido_paterno ?? 'No especificado' }}</div>
                                        </div>
                                        <div class="edit-mode">
                                            <input type="text" class="form-control" name="apellido_paterno" value="{{ $user->apellido_paterno ?? '' }}" required>
                                            @error('apellido_paterno') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label class="form-label">Apellido Materno</label>
                                        <div class="view-mode">
                                            <div class="info-display">{{ $user->apellido_materno ?? 'No especificado' }}</div>
                                        </div>
                                        <div class="edit-mode">
                                            <input type="text" class="form-control" name="apellido_materno" value="{{ $user->apellido_materno ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Género *</label>
                                        <div class="view-mode">
                                            <div class="info-display">
                                                @if(isset($user->genero))
                                                    @if($user->genero == 'masculino') Masculino
                                                    @elseif($user->genero == 'femenino') Femenino
                                                    @else Otro
                                                    @endif
                                                @else
                                                    No especificado
                                                @endif
                                            </div>
                                        </div>
                                        <div class="edit-mode">
                                            <select class="form-select" name="genero" required>
                                                <option value="">Seleccione</option>
                                                <option value="masculino" {{ (isset($user->genero) && $user->genero == 'masculino') ? 'selected' : '' }}>Masculino</option>
                                                <option value="femenino" {{ (isset($user->genero) && $user->genero == 'femenino') ? 'selected' : '' }}>Femenino</option>
                                                <option value="otro" {{ (isset($user->genero) && $user->genero == 'otro') ? 'selected' : '' }}>Otro</option>
                                            </select>
                                            @error('genero') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label">Escolaridad *</label>
                                        <div class="view-mode">
                                            <div class="info-display">{{ $user->escolaridad ?? 'No especificado' }}</div>
                                        </div>
                                        <div class="edit-mode">
                                            <select class="form-select" name="escolaridad" required>
                                                <option value="">Seleccione</option>
                                                <option value="primaria" {{ (isset($user->escolaridad) && $user->escolaridad == 'primaria') ? 'selected' : '' }}>Primaria</option>
                                                <option value="secundaria" {{ (isset($user->escolaridad) && $user->escolaridad == 'secundaria') ? 'selected' : '' }}>Secundaria</option>
                                                <option value="bachillerato" {{ (isset($user->escolaridad) && $user->escolaridad == 'bachillerato') ? 'selected' : '' }}>Bachillerato</option>
                                                <option value="licenciatura" {{ (isset($user->escolaridad) && $user->escolaridad == 'licenciatura') ? 'selected' : '' }}>Licenciatura</option>
                                                <option value="posgrado" {{ (isset($user->escolaridad) && $user->escolaridad == 'posgrado') ? 'selected' : '' }}>Posgrado</option>
                                            </select>
                                            @error('escolaridad') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Información de Contacto -->
                            <div class="mb-4">
                                <h5 class="section-title">
                                    <i class="fas fa-phone me-2"></i>Información de Contacto
                                </h5>
                                
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="form-label">Teléfono Oficina</label>
                                        <div class="view-mode">
                                            <div class="info-display">{{ $user->telefono_oficina ?? 'No especificado' }}</div>
                                        </div>
                                        <div class="edit-mode">
                                            <input type="tel" class="form-control" name="telefono_oficina" value="{{ $user->telefono_oficina ?? '' }}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label class="form-label">Teléfono Particular</label>
                                        <div class="view-mode">
                                            <div class="info-display">{{ $user->telefono_particular ?? 'No especificado' }}</div>
                                        </div>
                                        <div class="edit-mode">
                                            <input type="tel" class="form-control" name="telefono_particular" value="{{ $user->telefono_particular ?? '' }}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label class="form-label">Teléfono Celular</label>
                                        <div class="view-mode">
                                            <div class="info-display">{{ $user->telefono_celular ?? 'No especificado' }}</div>
                                        </div>
                                        <div class="edit-mode">
                                            <input type="tel" class="form-control" name="telefono_celular" value="{{ $user->telefono_celular ?? '' }}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <label class="form-label">Extensión</label>
                                        <div class="view-mode">
                                            <div class="info-display">{{ $user->extension ?? 'No especificado' }}</div>
                                        </div>
                                        <div class="edit-mode">
                                            <input type="text" class="form-control" name="extension" value="{{ $user->extension ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Información de Domicilio -->
                            <div class="mb-4">
                                <h5 class="section-title">
                                    <i class="fas fa-map-marker-alt me-2"></i>Información de Domicilio
                                </h5>
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Calle *</label>
                                        <div class="view-mode">
                                            <div class="info-display">{{ $user->calle ?? 'No especificado' }}</div>
                                        </div>
                                        <div class="edit-mode">
                                            <input type="text" class="form-control" name="calle" value="{{ $user->calle ?? '' }}" required>
                                            @error('calle') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label">Número *</label>
                                        <div class="view-mode">
                                            <div class="info-display">{{ $user->numero ?? 'No especificado' }}</div>
                                        </div>
                                        <div class="edit-mode">
                                            <input type="text" class="form-control" name="numero" value="{{ $user->numero ?? '' }}" required>
                                            @error('numero') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <label class="form-label">Entre Calles</label>
                                        <div class="view-mode">
                                            <div class="info-display">{{ $user->entre_calles ?? 'No especificado' }}</div>
                                        </div>
                                        <div class="edit-mode">
                                            <input type="text" class="form-control" name="entre_calles" value="{{ $user->entre_calles ?? '' }}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label">Colonia</label>
                                        <div class="view-mode">
                                            <div class="info-display">{{ $user->colonia ?? 'No especificado' }}</div>
                                        </div>
                                        <div class="edit-mode">
                                            <input type="text" class="form-control" name="colonia" value="{{ $user->colonia ?? '' }}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label">Código Postal</label>
                                        <div class="view-mode">
                                            <div class="info-display">{{ $user->codigo_postal ?? 'No especificado' }}</div>
                                        </div>
                                        <div class="edit-mode">
                                            <input type="text" class="form-control" name="codigo_postal" value="{{ $user->codigo_postal ?? '' }}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <label class="form-label">País</label>
                                        <div class="view-mode">
                                            <div class="info-display">{{ $user->pais ?? 'No especificado' }}</div>
                                        </div>
                                        <div class="edit-mode">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="pais_mexico" name="pais" value="México" {{ (isset($user->pais) && $user->pais == 'México') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="pais_mexico">MÉXICO</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="pais_otro" name="pais" value="Otro" {{ (isset($user->pais) && $user->pais == 'Otro') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="pais_otro">OTRO</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Estado</label>
                                        <div class="view-mode">
                                            <div class="info-display">{{ $user->estado ?? 'No especificado' }}</div>
                                        </div>
                                        <div class="edit-mode">
                                            <input type="text" class="form-control" name="estado" value="{{ $user->estado ?? 'TAMAULIPAS' }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Municipio *</label>
                                        <div class="view-mode">
                                            <div class="info-display">{{ $user->municipio ?? 'No especificado' }}</div>
                                        </div>
                                        <div class="edit-mode">
                                            <select class="form-select" name="municipio" required>
                                                <option value="">Seleccione</option>
                                                <option value="ciudad_victoria" {{ (isset($user->municipio) && $user->municipio == 'ciudad_victoria') ? 'selected' : '' }}>Ciudad Victoria</option>
                                                <option value="tampico" {{ (isset($user->municipio) && $user->municipio == 'tampico') ? 'selected' : '' }}>Tampico</option>
                                                <option value="reynosa" {{ (isset($user->municipio) && $user->municipio == 'reynosa') ? 'selected' : '' }}>Reynosa</option>
                                                {{-- Añadir más municipios según sea necesario --}}
                                            </select>
                                            @error('municipio') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Información de Cuenta -->
                            <div class="mb-4">
                                <h5 class="section-title">
                                    <i class="fas fa-lock me-2"></i>Información de Cuenta
                                </h5>
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Correo Electrónico *</label>
                                        <div class="view-mode">
                                            <div class="info-display">{{ $user->email ?? 'No especificado' }}</div>
                                        </div>
                                        <div class="edit-mode">
                                            <input type="email" class="form-control" name="email" value="{{ $user->email ?? '' }}" required>
                                            @error('email') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label">Fecha de Registro</label>
                                        <div class="info-display">{{ $user->created_at ? $user->created_at->format('d/m/Y H:i') : 'No disponible' }}</div>
                                    </div>
                                </div>
                                <div class="row g-3 edit-mode mt-3"> <!-- Campos de contraseña solo visibles en modo edición -->
                                    <div class="col-md-6">
                                        <label class="form-label">Nueva Contraseña (Dejar vacío para no cambiar)</label>
                                        <input type="password" class="form-control" name="password">
                                        @error('password') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Confirmar Nueva Contraseña</label>
                                        <input type="password" class="form-control" name="password_confirmation">
                                    </div>
                                </div>
                            </div>

                            <!-- Botones de Acción -->
                            <div class="text-center mt-5">
                                {{-- View Mode Buttons --}}
                                <div id="viewModeButtons">
                                    <button type="button" class="btn btn-primary btn-lg me-3" onclick="toggleEditMode()">
                                        <i class="fas fa-edit me-2"></i>Editar Información
                                    </button>
                                    <a href="{{ route('usuario') }}" class="btn btn-secondary btn-lg">
                                        <i class="fas fa-arrow-left me-2"></i>Regresar al Dashboard
                                    </a>
                                </div>
                                
                                {{-- Edit Mode Buttons --}}
                                <div id="editModeButtons">
                                    <button type="submit" class="btn btn-primary btn-lg me-md-3 mb-2 mb-md-0">
                                        <i class="fas fa-save me-2"></i>Guardar Cambios
                                    </button>
                                    <button type="button" class="btn btn-secondary btn-lg" onclick="toggleEditMode()">
                                        <i class="fas fa-times me-2"></i>Cancelar
                                    </button>
                                </div>
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
    <script>
        function toggleEditMode() {
            const formWrapper = document.getElementById('profileForm');
            const viewButtons = document.getElementById('viewModeButtons');
            const editButtons = document.getElementById('editModeButtons');

            // Alternar la clase 'edit-active' en el contenedor principal del formulario
            formWrapper.classList.toggle('edit-active');

            // Alternar la visibilidad de los conjuntos de botones
            if (formWrapper.classList.contains('edit-active')) {
                viewButtons.style.display = 'none';
                editButtons.style.display = 'block'; // Usar 'block' para que los estilos de Bootstrap controlen el layout (d-grid/d-md-block)
            } else {
                viewButtons.style.display = 'block';
                editButtons.style.display = 'none';
            }
        }

        // Auto-hide alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                setTimeout(function() {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 5000);
            });
            // Al cargar la página, asegurarse de que los botones de edición estén ocultos
            document.getElementById('editModeButtons').style.display = 'none';
            document.getElementById('viewModeButtons').style.display = 'block';
        });
    </script>
</body>
</html>
