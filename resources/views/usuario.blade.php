<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard - Tribunal Electrónico - Poder Judicial Tamaulipas</title>
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

        /* Estilos específicos para el dashboard del usuario */
        .user-welcome { 
            background: linear-gradient(135deg, #1f5582, #2a6ba8); 
            border-radius: 0.5rem; /* Bordes redondeados */
        }
        .stats-card { 
            transition: transform 0.2s ease, box-shadow 0.2s ease; 
            border-radius: 0.5rem; /* Bordes redondeados para las tarjetas de estadísticas */
            cursor: pointer;
        }
        .stats-card:hover { 
            transform: translateY(-5px); 
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15); /* Sombra más pronunciada al pasar el ratón */
        }
        .stats-card .display-4 {
            font-size: 2.5rem; /* Tamaño de los íconos/números grandes */
        }
        .stats-card .card-title {
            font-size: 1.1rem;
            font-weight: 600;
        }
        .table-hover tbody tr:hover { 
            background-color: #f0f2f5; /* Color más claro para el hover de la tabla */
        }
        .btn-outline-primary {
            border-color: #1f5582;
            color: #1f5582;
            border-radius: 0.5rem;
            transition: all 0.2s ease-in-out;
        }
        .btn-outline-primary:hover {
            background-color: #1f5582;
            color: white;
        }
        .btn-outline-success {
            border-color: #28a745;
            color: #28a745;
            border-radius: 0.5rem;
            transition: all 0.2s ease-in-out;
        }
        .btn-outline-success:hover {
            background-color: #28a745;
            color: white;
        }
        .btn-outline-info {
            border-color: #17a2b8;
            color: #17a2b8;
            border-radius: 0.5rem;
            transition: all 0.2s ease-in-out;
        }
        .btn-outline-info:hover {
            background-color: #17a2b8;
            color: white;
        }
        .btn-outline-warning {
            border-color: #ffc107;
            color: #ffc107;
            border-radius: 0.5rem;
            transition: all 0.2s ease-in-out;
        }
        .btn-outline-warning:hover {
            background-color: #ffc107;
            color: white;
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
        /* Estilos para el modal */
        #expedienteDetailModal .modal-header {
            background-color: #1f5582;
            color: white;
            border-top-left-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
        }
        #expedienteDetailModal .modal-content {
            border-radius: 0.5rem;
        }
        #expedienteDetailModal .modal-body .detail-label {
            font-weight: 600;
            color: #1f5582;
            margin-bottom: 0.25rem;
            display: block;
        }
        #expedienteDetailModal .modal-body .detail-value {
            background-color: #f0f2f5;
            padding: 0.5rem 0.75rem;
            border-radius: 0.3rem;
            margin-bottom: 0.75rem;
        }
        #expedienteDetailModal .modal-body .detail-value-observaciones {
            background-color: #f0f2f5;
            padding: 0.75rem;
            border-radius: 0.3rem;
            white-space: pre-wrap; /* Mantiene saltos de línea del texto */
            word-wrap: break-word; /* Rompe palabras largas */
        }
        #expedienteDetailModal .modal-footer {
            border-top: none;
        }

        /* Estilos específicos para el modo de edición en el modal */
        /* Por defecto, los elementos de vista se muestran y los de edición se ocultan */
        .modal-body .view-mode { display: block; }
        .modal-body .edit-mode { display: none; }
        /* Cuando el modal tiene la clase 'edit-active', invertimos la visibilidad */
        #expedienteDetailModal.edit-active .modal-body .view-mode { display: none !important; }
        #expedienteDetailModal.edit-active .modal-body .edit-mode { display: block !important; }

        /* Botones del footer del modal */
        #modalViewModeButtons { display: flex !important; justify-content: flex-end; } /* Visible por defecto */
        #modalEditModeButtons { display: none !important; justify-content: flex-end; } /* Oculto por defecto */

        /* Cuando el modal está en modo edición */
        #expedienteDetailModal.edit-active #modalViewModeButtons { display: none !important; }
        #expedienteDetailModal.edit-active #modalEditModeButtons { display: flex !important; }

        /* Alineación del estado actual en el modal */
        #modalEstadoActual .badge {
            display: inline-block; /* Para que el badge no ocupe todo el ancho si está en un div */
            padding: 0.35em 0.65em; /* Ajuste de padding para badges */
            font-size: 0.75em; /* Tamaño de fuente para badges */
            font-weight: 700; /* Negrita para badges */
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25rem; /* Bordes redondeados para badges */
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
                            
                            <li><a class="dropdown-item" href="{{ route('buzon') }}"><i class="fas fa-envelope me-2"></i>Mensajes</a></li>
                            <li><a class="dropdown-item" href="{{ route('notificaciones.index') }}"><i class="fas fa-bell me-2"></i>Notificaciones</a></li>
                            <li><a class="dropdown-item" href="{{ route('soporte') }}"><i class="fas fa-question-circle me-2"></i>soporte</a></li>
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
                <div class="col-md-3 bg-light py-4 border-end"> <!-- Añadir border-end para un separador visual -->
                    <div class="list-group rounded-md">
                        <a href="{{ route('usuario') }}" class="list-group-item list-group-item-action active" aria-current="true">
                            <i class="fas fa-home me-2"></i> Dashboard
                        </a>
                        <a href="{{ route('promociones.index') }}" class="list-group-item list-group-item-action"> {{-- Ruta corregida --}}
                            <i class="fas fa-file-contract me-2"></i> Promociones Electrónicas
                        </a>
                        <a href="{{ route('expedientes.index') }}" class="list-group-item list-group-item-action"> {{-- Ruta corregida --}}
                            <i class="fas fa-folder-open me-2"></i> Mis Expedientes
                        </a>
                        <a href="{{ route('notificaciones.index') }}" class="list-group-item list-group-item-action">
                            <i class="fas fa-bell me-2"></i> Notificaciones
                        </a>
                        <a href="{{ route('reportes.index') }}" class="list-group-item list-group-item-action">
                            <i class="fas fa-chart-bar me-2"></i> Reportes
                        </a>
                        
                    </div>

                    <div class="mt-4">

                    </div>
                </div>

                <!-- Main Content for Dashboard -->
                <div class="col-md-9 py-4">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show rounded-md" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show rounded-md" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="user-welcome text-white p-4 mb-4">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h2>¡Bienvenido, {{ Auth::user()->name ?? 'Usuario' }}! 👋</h2>
                                <p class="mb-0">Panel de Control del Tribunal Electrónico</p>
                                <small>Último acceso: {{ now()->format('d/m/Y H:i:s') }}</small>
                            </div>
                            <div class="col-md-4 text-end">
                                <div class="bg-white bg-opacity-25 p-3 rounded"> <!-- Aumentado opacidad para mejor visibilidad -->
                                    <h5 class="mb-0 fs-3">{{ now()->format('d') }}</h5> <!-- Tamaño de fuente más grande -->
                                    <small class="fs-6">{{ now()->format('M Y') }}</small> <!-- Tamaño de fuente ajustado -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3 mb-3">
                            <div class="card stats-card border-primary">
                                <div class="card-body text-center">
                                    <div>
                                        <i class="fas fa-file-alt display-4 text-primary mb-2"></i>
                                        <h5 class="card-title">Promociones</h5>
                                        <h3 class="text-primary fw-bold">{{ $promocionesCount ?? 0 }}</h3>
                                        <small class="text-muted">Promociones activas</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card stats-card border-success">
                                <div class="card-body text-center">
                                    <div>
                                        <i class="fas fa-folder-open display-4 text-success mb-2"></i>
                                        <h5 class="card-title">Expedientes</h5>
                                        <h3 class="text-success fw-bold">{{ $totalExpedientesCount ?? '0' }}</h3>
                                        <small class="text-muted">Expedientes asignados</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card stats-card border-warning">
                                <div class="card-body text-center">
                                    <div>
                                        <i class="fas fa-envelope-open-text display-4 text-warning mb-2"></i>
                                        <h5 class="card-title">Notificaciones</h5>
                                        <h3 class="text-warning fw-bold">0</h3>
                                        <small class="text-muted">Sin leer</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card stats-card border-info">
                                <div class="card-body text-center">
                                    <div>
                                        <i class="fas fa-check-circle display-4 text-info mb-2"></i>
                                        <h5 class="card-title">Completadas</h5>
                                        <h3 class="text-info fw-bold">0</h3>
                                        <small class="text-muted">Este mes</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 mb-4">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0"><i class="fas fa-file-signature me-2"></i> Promociones Electrónicas Recientes</h5>
                                </div>
                                <div class="card-body">
                                    <div class="alert alert-info rounded-md">
                                        <h6><i class="fas fa-info-circle me-2"></i> Información importante</h6>
                                        <p class="mb-2">El Pleno del Consejo de la Judicatura del Estado, en sesión extraordinaria del 8 de enero de 2021, determinó prorrogar los efectos del Acuerdo General 15/2020 que reactiva los plazos y términos procesales a través de la impartición de justicia en línea.</p>
                                        <p class="mb-0">Durante dicho período, el Tribunal Electrónico recibirá promociones de los procedimientos judiciales únicamente en días hábiles y durante el horario de las 8:00 a las 24:00 horas; sin embargo, los usuarios podrán consultar sus expedientes y notificaciones electrónicas en días inhábiles y en cualquier horario.</p>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-hover table-striped"> <!-- Añadido table-striped para alternar colores de fila -->
                                            <thead>
                                                <tr>
                                                    <th>Expediente</th>
                                                    <th>Juzgado</th>
                                                    <th>Materia</th>
                                                    <th>Estado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- INICIO: Bucle para mostrar los expedientes recientes --}}
                                                @forelse($expedientesRecientes as $expediente)
                                                <tr data-expediente-id="{{ $expediente->id }}"> {{-- ¡IMPORTANTE! Añadido data-expediente-id a la fila para una fácil selección --}}
                                                    <td>{{ $expediente->numero_expediente }}</td>
                                                    <td>{{ $expediente->juzgado }}</td>
                                                    <td>{{ $expediente->juicio }}</td>
                                                    <td>
                                                        @if($expediente->estado_actual == 'en_tramite')
                                                            <span class="badge bg-warning text-dark">En Trámite</span>
                                                        @elseif($expediente->estado_actual == 'finalizado')
                                                            <span class="badge bg-success">Finalizado</span>
                                                        @elseif($expediente->estado_actual == 'archivado')
                                                            <span class="badge bg-secondary">Archivado</span>
                                                        @else
                                                            <span class="badge bg-info">Pausado</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{-- ENLACE PARA ABRIR EL MODAL DE DETALLES --}}
                                                        <button type="button" class="btn btn-sm btn-info me-1 view-expediente-btn"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#expedienteDetailModal"
                                                                data-expediente-id="{{ $expediente->id }}">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        {{-- El botón de editar ha sido REMOVIDO de aquí y movido al modal --}}
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="5" class="text-center text-muted">No hay expedientes registrados para este usuario.</td>
                                                </tr>
                                                @endforelse
                                                {{-- FIN: Bucle para mostrar los expedientes recientes --}}
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="text-center mt-3">
                                        <a href="{{ route('promociones.index') }}" class="btn btn-primary rounded-md"> {{-- Ruta corregida --}}
                                            <i class="fas fa-eye me-2"></i> Ver Todas las Promociones
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-header bg-success text-white">
                                    <h5 class="mb-0"><i class="fas fa-rocket me-2"></i> Acciones Rápidas</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-grid gap-3"> <!-- Aumentado el gap entre botones -->
                                        <a href="{{ route('promociones.create') }}" class="btn btn-outline-primary btn-lg"> <!-- Botones más grandes --> {{-- Ruta corregida --}}
                                            <i class="fas fa-plus-circle me-2"></i> Nueva Promoción Electrónica
                                        </a>
                                        <a href="{{ route('expedientes.index') }}" class="btn btn-outline-success btn-lg"> {{-- Cambiado a index para ver lista/buscar --}}
                                            <i class="fas fa-search-plus me-2"></i> Consultar Expediente
                                        </a>
                                        <a href="#" class="btn btn-outline-info btn-lg">
                                            <i class="fas fa-envelope-open me-2"></i> Ver Notificaciones
                                        </a>
                                        <a href="#" class="btn btn-outline-warning btn-lg">
                                            <i class="fas fa-file-export me-2"></i> Generar Reporte
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-4">
                                <div class="card-header bg-info text-white">
                                    <h5 class="mb-0"><i class="fas fa-chart-line me-2"></i> Estado del Sistema</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text fw-bold text-primary">
                                        El sistema se encuentra <span class="text-success">operativo</span>.
                                    </p>
                                    <p class="card-text text-muted">
                                        Tiempo de actividad: <strong class="text-success">99.9%</strong>
                                    </p>
                                    <hr>
                                    <small class="text-muted">Última actualización: {{ now()->format('d/m/Y H:i:s') }}</small>
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

    <!-- Modal para el detalle/edición del expediente -->
    <div class="modal fade" id="expedienteDetailModal" tabindex="-1" aria-labelledby="expedienteDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content rounded-md">
                <div class="modal-header">
                    <h5 class="modal-title" id="expedienteDetailModalLabel"><i class="fas fa-folder-open me-2"></i>Detalles del Expediente</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editExpedienteForm">
                        <input type="hidden" id="editExpedienteId"> {{-- Campo oculto para el ID del expediente --}}
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <span class="detail-label">Juzgado:</span>
                                <div class="view-mode detail-value" id="viewJuzgado"></div>
                                <div class="edit-mode">
                                    <input type="text" class="form-control" id="editJuzgado" name="juzgado" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <span class="detail-label">Número de Expediente:</span>
                                <div class="view-mode detail-value" id="viewNumeroExpediente"></div>
                                <div class="edit-mode">
                                    <input type="text" class="form-control" id="editNumeroExpediente" name="numero_expediente" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <span class="detail-label">Tipo de Juicio:</span>
                                <div class="view-mode detail-value" id="viewJuicio"></div>
                                <div class="edit-mode">
                                    <input type="text" class="form-control" id="editJuicio" name="juicio" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <span class="detail-label">Promovente(s):</span>
                                <div class="view-mode detail-value" id="viewPromovente"></div>
                                <div class="edit-mode">
                                    <input type="text" class="form-control" id="editPromovente" name="promovente" required>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <span class="detail-label">Demandado(s):</span>
                                <div class="view-mode detail-value" id="viewDemandado"></div>
                                <div class="edit-mode">
                                    <input type="text" class="form-control" id="editDemandado" name="demandado" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <span class="detail-label">Fecha de Inicio:</span>
                                <div class="view-mode detail-value" id="viewFechaInicio"></div>
                                <div class="edit-mode">
                                    <input type="date" class="form-control" id="editFechaInicio" name="fecha_inicio" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <span class="detail-label">Estado Actual:</span>
                                <div class="view-mode detail-value" id="viewEstadoActual"></div>
                                <div class="edit-mode">
                                    <select class="form-select" id="editEstadoActual" name="estado_actual" required>
                                        <option value="en_tramite">En Trámite</option>
                                        <option value="finalizado">Finalizado</option>
                                        <option value="archivado">Archivado</option>
                                        <option value="pausado">Pausado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <span class="detail-label">Observaciones Adicionales:</span>
                                <div class="view-mode detail-value-observaciones" id="viewObservaciones"></div>
                                <div class="edit-mode">
                                    <textarea class="form-control" id="editObservaciones" name="observaciones" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                    {{-- Contenedor para mensajes de error de validación AJAX --}}
                    <div id="modal-validation-errors" class="alert alert-danger d-none mt-3 rounded-md">
                        <ul class="mb-0 ps-3"></ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <div id="modalViewModeButtons" class="w-100 d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary rounded-md me-2" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-warning rounded-md" id="toggleEditModeBtn"><i class="fas fa-edit me-2"></i>Editar Expediente</button>
                    </div>
                    <div id="modalEditModeButtons" classw-100 d-flex justify-content-end"> 
                        <button type="button" class="btn btn-secondary rounded-md me-2" id="cancelEditBtn">Cancelar</button>
                        <button type="button" class="btn btn-primary rounded-md" id="saveChangesBtn"><i class="fas fa-save me-2"></i>Guardar Cambios</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Pasar los datos de los expedientes directamente a JavaScript
        const expedientesData = @json($expedientesRecientes);
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Referencias a los elementos del modal y errores, inicializadas en DOMContentLoaded
        let expedienteDetailModalElement;
        let modalValidationErrorsDiv; 

        // Función para alternar entre el modo de vista y edición en el modal
        function toggleModalEditMode(isEditMode) {
            // Se asume que expedienteDetailModalElement ya fue inicializado en DOMContentLoaded
            if (!expedienteDetailModalElement) {
                console.error("Error: 'expedienteDetailModalElement' no está definido al llamar a toggleModalEditMode. El modal podría no haberse cargado correctamente.");
                return; // Salir de la función si el modal no existe
            }

            if (isEditMode) {
                expedienteDetailModalElement.classList.add('edit-active');
            } else {
                expedienteDetailModalElement.classList.remove('edit-active');
                if (modalValidationErrorsDiv) { // Solo si el div de errores también se encontró
                    modalValidationErrorsDiv.classList.add('d-none'); // Ocultar errores al salir del modo edición
                }
            }
        }

        // Función para rellenar el modal en modo de vista
        function populateModalViewMode(expediente) {
            document.getElementById('viewJuzgado').textContent = expediente.juzgado;
            document.getElementById('viewNumeroExpediente').textContent = expediente.numero_expediente;
            document.getElementById('viewJuicio').textContent = expediente.juicio;
            document.getElementById('viewPromovente').textContent = expediente.promovente;
            document.getElementById('viewDemandado').textContent = expediente.demandado;

            const fechaInicio = new Date(expediente.fecha_inicio + 'T00:00:00'); // Añadir 'T00:00:00' para consistencia
            document.getElementById('viewFechaInicio').textContent = fechaInicio.toLocaleDateString('es-ES', {
                day: '2-digit', month: '2-digit', year: 'numeric'
            });

            let estadoBadge = '';
            switch(expediente.estado_actual) {
                case 'en_tramite':
                    estadoBadge = '<span class="badge bg-warning text-dark">En Trámite</span>';
                    break;
                case 'finalizado':
                    estadoBadge = '<span class="badge bg-success">Finalizado</span>';
                    break;
                case 'archivado':
                    estadoBadge = '<span class="badge bg-secondary">Archivado</span>';
                    break;
                case 'pausado':
                    estadoBadge = '<span class="badge bg-info">Pausado</span>';
                    break;
                default:
                    estadoBadge = '<span class="badge bg-light text-dark">Desconocido</span>';
            }
            document.getElementById('viewEstadoActual').innerHTML = estadoBadge;
            document.getElementById('viewObservaciones').textContent = expediente.observaciones || 'No hay observaciones adicionales.';
        }

        // Función para rellenar el modal en modo de edición
        function populateModalEditMode(expediente) {
            document.getElementById('editExpedienteId').value = expediente.id;
            document.getElementById('editJuzgado').value = expediente.juzgado;
            document.getElementById('editNumeroExpediente').value = expediente.numero_expediente;
            document.getElementById('editJuicio').value = expediente.juicio;
            document.getElementById('editPromovente').value = expediente.promovente;
            document.getElementById('editDemandado').value = expediente.demandado;
            document.getElementById('editFechaInicio').value = expediente.fecha_inicio; // La fecha en formato YYYY-MM-DD para input[type="date"]
            document.getElementById('editEstadoActual').value = expediente.estado_actual;
            document.getElementById('editObservaciones').value = expediente.observaciones || '';
        }

        // Función para mostrar errores de validación
        function showValidationErrors(errors) {
            if (!modalValidationErrorsDiv) {
                console.error('Validation errors div not found to display errors!');
                return;
            }
            const errorsList = modalValidationErrorsDiv.querySelector('ul');
            if (!errorsList) {
                console.error('Validation errors list (ul) not found to display errors!');
                return;
            }
            errorsList.innerHTML = ''; // Clear previous errors

            for (const field in errors) {
                errors[field].forEach(error => {
                    const li = document.createElement('li');
                    li.textContent = error;
                    errorsList.appendChild(li);
                });
            }
            modalValidationErrorsDiv.classList.remove('d-none');
        }

        // Función para ocultar errores de validación
        function hideValidationErrors() {
            if (modalValidationErrorsDiv) {
                modalValidationErrorsDiv.classList.add('d-none');
            }
        }

        // Función para actualizar la fila de la tabla (¡CORRECCIÓN CLAVE AQUÍ!)
        function updateTableRow(expedienteId, updatedData) {
            // Se busca directamente la fila TR usando el data-expediente-id
            const rowToUpdate = document.querySelector(`tr[data-expediente-id="${expedienteId}"]`);
            if (!rowToUpdate) {
                console.warn('WARNING: Table row not found in DOM for ID:', expedienteId, '. La fila de la tabla no se actualizará visualmente. Esto puede ocurrir si el contenido de la tabla se vuelve a renderizar por otros medios después de la carga inicial de la página.');
                return false; // Retorna falso si no se encuentra la fila
            }

            // Actualizar las celdas de la tabla
            rowToUpdate.children[0].textContent = updatedData.numero_expediente; // Columna Expediente
            rowToUpdate.children[1].textContent = updatedData.juzgado; // Columna Juzgado
            rowToUpdate.children[2].textContent = updatedData.juicio; // Columna Materia (Juicio)

            // Actualizar el estado con el badge
            let newEstadoBadge = '';
            switch(updatedData.estado_actual) {
                case 'en_tramite':
                    newEstadoBadge = '<span class="badge bg-warning text-dark">En Trámite</span>';
                    break;
                case 'finalizado':
                    newEstadoBadge = '<span class="badge bg-success">Finalizado</span>';
                    break;
                case 'archivado':
                    newEstadoBadge = '<span class="badge bg-secondary">Archivado</span>';
                    break;
                case 'pausado':
                    newEstadoBadge = '<span class="badge bg-info">Pausado</span>';
                    break;
                default:
                    newEstadoBadge = '<span class="badge bg-light text-dark">Desconocido</span>';
            }
            rowToUpdate.children[3].innerHTML = newEstadoBadge; // Columna Estado (asumiendo que es la 4ta columna, índice 3)

            return true; // Retorna verdadero si se actualizó
        }


        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM loaded, initializing event listeners...');

            // ***** PUNTOS CRÍTICOS DE INICIALIZACIÓN *****
            expedienteDetailModalElement = document.getElementById('expedienteDetailModal');
            modalValidationErrorsDiv = document.getElementById('modal-validation-errors');
            const saveBtn = document.getElementById('saveChangesBtn');
            const editForm = document.getElementById('editExpedienteForm');
            const toggleEditModeBtn = document.getElementById('toggleEditModeBtn');
            const cancelEditBtn = document.getElementById('cancelEditBtn');

            if (!expedienteDetailModalElement) {
                console.error("CRÍTICO: El modal con ID 'expedienteDetailModal' NO FUE ENCONTRADO en el DOM al cargar la página. Funcionalidad de modal no disponible.");
                return; 
            } else {
                console.log("INFO: Modal 'expedienteDetailModal' encontrado y referenciado.");
            }
            if (!saveBtn) { console.error("CRÍTICO: Botón 'saveChangesBtn' NO FUE ENCONTRADO."); return; }
            if (!editForm) { console.error("CRÍTICO: Formulario 'editExpedienteForm' NO FUE ENCONTRADO."); return; }
            if (!toggleEditModeBtn) { console.warn("WARNING: Botón 'toggleEditModeBtn' no encontrado."); }
            if (!cancelEditBtn) { console.warn("WARNING: Botón 'cancelEditBtn' no encontrado."); }
            if (!modalValidationErrorsDiv) { console.warn("WARNING: Div de errores 'modal-validation-errors' no encontrado."); }

            console.log('All required elements found, proceeding with initialization...');

            // Auto-hide alerts after 5 seconds
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                setTimeout(function() {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 5000);
            });

            // Event listener para los botones "Ver Detalles"
            document.querySelectorAll('.view-expediente-btn').forEach(button => {
                button.addEventListener('click', function() {
                    console.log('View button clicked for expediente:', this.dataset.expedienteId);
                    const expedienteId = this.dataset.expedienteId;
                    const expediente = expedientesData.find(exp => exp.id == expedienteId);

                    if (expediente) {
                        populateModalViewMode(expediente);
                        populateModalEditMode(expediente); // Rellena también los campos de edición, aunque estén ocultos
                        toggleModalEditMode(false); // Asegúrate de que el modal esté en modo vista al abrir
                        hideValidationErrors(); // Limpiar errores anteriores
                    } else {
                        console.error('Expediente not found with ID:', expedienteId);
                    }
                });
            });

            // Event listener para el botón "Editar Expediente" dentro del modal
            if (toggleEditModeBtn) {
                toggleEditModeBtn.addEventListener('click', function() {
                    console.log('Edit mode toggle clicked');
                    toggleModalEditMode(true); // Cambia a modo edición
                    hideValidationErrors(); // Limpiar errores al entrar en modo edición
                });
            }

            // Event listener para el botón "Cancelar" en el modo de edición del modal
            if (cancelEditBtn) {
                cancelEditBtn.addEventListener('click', function() {
                    console.log('Cancel edit clicked');
                    toggleModalEditMode(false); // Vuelve a modo vista
                    hideValidationErrors(); // Limpiar errores al cancelar
                });
            }

            // Event listener para el botón "Guardar Cambios" en el modo de edición del modal
            if (saveBtn) {
                saveBtn.addEventListener('click', async function() {
                    console.log('Save changes button clicked');

                    const expedienteId = document.getElementById('editExpedienteId').value;
                    if (!expedienteId) {
                        console.error('No expediente ID found');
                        alert('Error: No se pudo identificar el expediente a actualizar.');
                        return;
                    }

                    // Deshabilitar el botón mientras se procesa
                    saveBtn.disabled = true;
                    saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Guardando...';

                    hideValidationErrors(); // Limpiar errores anteriores

                    try {
                        // Construir la URL - asegúrate de que esta ruta existe en tu Laravel routes
                        // Se usa POST pero se simula PUT con _method: 'PUT'
                        const url = `/expedientes/${expedienteId}/update-modal`; 

                        // Obtener los datos del formulario manualmente y enviar como JSON
                        const formData = {
                            juzgado: document.getElementById('editJuzgado').value,
                            numero_expediente: document.getElementById('editNumeroExpediente').value,
                            juicio: document.getElementById('editJuicio').value,
                            promovente: document.getElementById('editPromovente').value,
                            demandado: document.getElementById('editDemandado').value,
                            fecha_inicio: document.getElementById('editFechaInicio').value,
                            estado_actual: document.getElementById('editEstadoActual').value,
                            observaciones: document.getElementById('editObservaciones').value,
                            _method: 'PUT', // Campo especial para Laravel para simular PUT/PATCH
                            _token: csrfToken // CSRF token para seguridad
                        };

                        console.log('Sending data:', formData);

                        const response = await fetch(url, {
                            method: 'POST', // Siempre usa POST para Laravel con _method: 'PUT'
                            headers: {
                                'Content-Type': 'application/json', // Indicamos que enviamos JSON
                                'Accept': 'application/json',      // Indicamos que esperamos JSON de vuelta
                                'X-CSRF-TOKEN': csrfToken,         // Token CSRF en el encabezado
                                'X-Requested-With': 'XMLHttpRequest' // Para que Laravel detecte que es una petición AJAX
                            },
                            body: JSON.stringify(formData) // Convertir el objeto JS a una cadena JSON
                        });

                        console.log('Response status:', response.status);

                        const result = await response.json();
                        console.log('Response data:', result);

                        if (response.ok) {
                            // Actualizar los datos en el array `expedientesData` (local)
                            const expedienteIndex = expedientesData.findIndex(exp => exp.id == expedienteId);
                            if (expedienteIndex !== -1) {
                                // Copiar los datos actualizados del formulario al objeto en memoria
                                // Usamos Object.assign o el spread operator para fusionar objetos
                                Object.assign(expedientesData[expedienteIndex], formData);
                                // No es necesario borrar _method y _token de la copia local, pero se puede hacer por limpieza
                                delete expedientesData[expedienteIndex]._method;
                                delete expedientesData[expedienteIndex]._token;
                            }

                            // Actualizar la fila visualmente en la tabla
                            if (updateTableRow(expedienteId, expedientesData[expedienteIndex] || formData)) { // Pasa los datos actualizados
                                console.log('Table updated successfully');
                            } else {
                                console.warn('Table update failed for visual element, but data was saved in backend.');
                            }

                            // Actualizar la vista del modal con los datos nuevos
                            populateModalViewMode(expedientesData[expedienteIndex] || formData);

                            // Volver al modo vista
                            toggleModalEditMode(false);

                            // Mostrar mensaje de éxito (considera un toast en producción)
                            alert(result.message || 'Expediente actualizado correctamente');

                            // Si necesitas recargar la página completamente (menos ideal para UX)
                            // window.location.reload(); 

                        } else if (response.status === 422) {
                            // Errores de validación (HTTP 422 Unprocessable Entity)
                            console.log('Validation errors:', result.errors);
                            if (result.errors) {
                                showValidationErrors(result.errors);
                            } else {
                                alert('Error de validación: ' + (result.message || 'Datos inválidos'));
                            }
                        } else {
                            // Otros errores del servidor (ej. 403 Forbidden, 500 Internal Server Error)
                            console.error('Server error:', result);
                            alert('Error del servidor: ' + (result.message || 'Error inesperado. Revisa la consola para más detalles.'));
                        }

                    } catch (error) {
                        // Errores de red o inesperados (ej. CORS, JSON malformado)
                        console.error('Network or unexpected error:', error);
                        alert('Error de conexión o inesperado: ' + error.message);
                    } finally {
                        // Rehabilitar el botón
                        saveBtn.disabled = false;
                        saveBtn.innerHTML = '<i class="fas fa-save me-2"></i>Guardar Cambios';
                    }
                });
            }

            // Cuando el modal se cierra, asegurar que regrese al modo de vista
            if (expedienteDetailModalElement) {
                expedienteDetailModalElement.addEventListener('hidden.bs.modal', function () {
                    console.log('Modal hidden, resetting to view mode');
                    toggleModalEditMode(false);
                    hideValidationErrors();
                });
            }
            console.log('Event listeners initialized successfully');
        });
    </script>
</body>
</html>
