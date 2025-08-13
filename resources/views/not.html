<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gestión de Notificaciones - Tribunal Electrónico - Poder Judicial Tamaulipas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        /* Estilos generales del cuerpo y layout */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }
        .content-wrap {
            flex: 1;
        }

        /* Colores primarios y botones */
        .bg-primary { background-color: #1f5582 !important; }
        .btn-primary { 
            background-color: #1f5582; 
            border-color: #1f5582; 
            border-radius: 0.5rem;
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
            color: white;
        }
        .navbar-brand img { 
            height: 40px; 
            margin-right: 10px; 
        }
        .navbar-brand small {
            font-size: 0.7em; 
            display: block; 
            color: #ccc;
        }
        .header-navbar {
            background-color: #343a40 !important;
        }
        .header-navbar .nav-link {
            color: white !important;
            transition: color 0.3s ease-in-out;
            border-radius: 0.5rem;
        }
        .header-navbar .nav-link:hover {
            color: #ccc !important;
        }
        .header-navbar .nav-link.active {
            background-color: #164566;
            color: white !important;
            border-radius: 0.5rem;
        }

        /* Contenido principal y secciones específicas */
        .alert-custom { 
            background-color: #d1ecf1; 
            border-color: #bee5eb; 
            color: #0c5460; 
            border-radius: 0.5rem;
        }
        .card { 
            border-radius: 0.5rem; 
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        .card-header { 
            border-top-left-radius: 0.5rem !important; 
            border-top-right-radius: 0.5rem !important; 
        }
        .list-group-item {
            border-radius: 0.5rem !important;
            margin-bottom: 0.25rem;
        }
        .list-group-item:last-child {
            margin-bottom: 0;
        }
        .list-group-item.active {
            background-color: #1f5582 !important;
            border-color: #1f5582 !important;
        }

        /* Estilos específicos para notificaciones */
        .form-container, .table-container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-bottom: 2rem;
        }
        .welcome-banner {
            background: linear-gradient(135deg, #17a2b8, #138496);
            color: white;
            padding: 2rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
        }
        .section-title {
            color: #1f5582;
            font-weight: bold;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #1f5582;
            display: flex;
            align-items: center;
        }
        .form-label {
            font-weight: 600;
        }
        .form-control, .form-select {
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            border: 1px solid #ced4da;
        }
        .form-control:focus, .form-select:focus {
            border-color: #1f5582;
            box-shadow: 0 0 0 0.2rem rgba(31, 85, 130, 0.25);
        }
        .table {
            border-radius: 0.5rem;
            overflow: hidden;
        }
        .table thead th {
            background-color: #1f5582;
            color: white;
            border-bottom: 2px solid #dee2e6;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
        }
        .table tbody tr:hover {
            background-color: #f8f9fa;
            transition: background-color 0.15s ease-in-out;
        }
        .action-link {
            color: #1f5582;
            text-decoration: none;
            font-weight: 500;
            margin-right: 1rem;
        }
        .action-link:hover {
            color: #164566;
            text-decoration: underline;
        }

        /* Estilos para modales */
        .modal-header.bg-primary {
            background-color: #1f5582 !important;
        }
        .detail-label {
            font-weight: 600;
            color: #1f5582;
            margin-bottom: 0.25rem;
            display: block;
        }
        .detail-value {
            background-color: #f0f2f5;
            padding: 0.5rem 0.75rem;
            border-radius: 0.3rem;
            margin-bottom: 0.75rem;
            min-height: 2.5rem;
            display: flex;
            align-items: center;
        }

        /* Estilos del pie de página */
        footer {
            background-color: #343a40;
            color: white;
            padding: 30px 0;
            margin-top: auto;
        }
        footer .footer-logo img {
            max-height: 80px;
            margin-bottom: 15px;
        }
        footer p, footer small, footer a {
            color: #ccc;
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

        /* Estados de notificaciones */
        .estado-pendiente {
            background-color: #fff3cd;
            color: #856404;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.875rem;
        }
        .estado-leido {
            background-color: #d1edff;
            color: #084298;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.875rem;
        }

        /* Responsive */
        @media (max-width: 640px) {
            .table-responsive {
                overflow-x: auto;
            }
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
                            <li><a class="dropdown-item" href="#"><i class="fas fa-bell me-2"></i>Notificaciones</a></li>
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
                        <a href="{{ route('expedientes.index') }}" class="list-group-item list-group-item-action">
                            <i class="fas fa-folder-open me-2"></i> Mis Expedientes
                        </a>
                        <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                            <i class="fas fa-bell me-2"></i> Notificaciones
                        </a>
                        <a href="{{ route('reportes.index') }}" class="list-group-item list-group-item-action">
                            <i class="fas fa-chart-bar me-2"></i> Reportes
                        </a>
                        <a href="{{ route('perfil') }}" class="list-group-item list-group-item-action">
                            <i class="fas fa-user-circle me-2"></i> Mi Perfil
                        </a>
                    </div>
                </div>

                <!-- Main Content: Gestión de Notificaciones -->
                <div class="col-md-9 py-4">
                    <!-- Welcome Banner de Notificaciones -->
                    <div class="welcome-banner d-flex align-items-center">
                        <i class="fas fa-bell me-3" style="font-size: 3rem;"></i>
                        <div>
                            <h3 class="mb-1 text-white">Gestión de Notificaciones</h3>
                            <p class="mb-0 text-white">Crea, gestiona y visualiza notificaciones del sistema judicial</p>
                        </div>
                    </div>

                    <!-- Messages -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <!-- Sección de Creación de Notificaciones -->
                    <div class="form-container">
                        <h2 class="text-2xl font-bold text-center mb-4 text-dark">
                            <i class="fas fa-plus-circle me-2"></i>Crear Nueva Notificación
                        </h2>
                        
                        <form id="notificationForm" method="POST" action="{{ route('notificaciones.store') }}">
                            @csrf
                            <div class="row g-3">
                                <!-- Campo: Tipo de Asunto -->
                                <div class="col-md-6">
                                    <label for="tipoAsunto" class="form-label">Tipo de asunto *</label>
                                    <select id="tipoAsunto" name="tipo_asunto" required class="form-select">
                                        <option value="" disabled selected>Seleccione un tipo</option>
                                        <option value="Legal">Legal</option>
                                        <option value="Administrativo">Administrativo</option>
                                        <option value="Informativo">Informativo</option>
                                        <option value="Financiero">Financiero</option>
                                    </select>
                                </div>

                                <!-- Campo: Estado de la Notificación -->
                                <div class="col-md-6">
                                    <label for="estado" class="form-label">Estado de la notificación *</label>
                                    <select id="estado" name="estado" required class="form-select">
                                        <option value="" disabled selected>Seleccione un estado</option>
                                        <option value="Pendiente">Pendiente</option>
                                        <option value="Leido">Leído</option>
                                    </select>
                                </div>

                                <!-- Campo: Fecha -->
                                <div class="col-md-6">
                                    <label for="fecha" class="form-label">Fecha *</label>
                                    <input type="date" id="fecha" name="fecha" required class="form-control">
                                </div>

                                <!-- Campo: Expediente -->
                                <div class="col-md-6">
                                    <label for="expediente" class="form-label">Número de expediente *</label>
                                    <input type="text" id="expediente" name="expediente" placeholder="Ej: 123456789" required class="form-control">
                                </div>

                                <!-- Campo: Descripción -->
                                <div class="col-12">
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <textarea id="descripcion" name="descripcion" rows="4" placeholder="Escribe una descripción detallada de la notificación..." class="form-control"></textarea>
                                </div>
                                
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg me-2">
                                        <i class="fas fa-save me-2"></i>Crear Notificación
                                    </button>
                                    <button type="button" id="clearButton" class="btn btn-secondary btn-lg">
                                        <i class="fas fa-eraser me-2"></i>Limpiar Formulario
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Separador -->
                    <hr class="my-4">

                    <!-- Sección de Visualización de Notificaciones -->
                    <div class="table-container">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2 class="text-2xl font-bold mb-0 text-dark">
                                <i class="fas fa-table me-2"></i>Lista de Notificaciones
                            </h2>
                        </div>

                        <!-- Campo de búsqueda -->
                        <div class="mb-3">
                            <div class="position-relative">
                                <input type="text" id="searchInput" placeholder="Buscar por número de expediente..." class="form-control ps-5">
                                <div class="position-absolute top-50 start-0 translate-middle-y ms-3">
                                    <i class="fas fa-search text-muted"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Tipo de Asunto</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Expediente</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="notificationsTableBody">
                                    @forelse($notificaciones ?? [] as $notificacion)
                                        <tr>
                                            <td>{{ $notificacion->tipo_asunto }}</td>
                                            <td>
                                                <span class="estado-{{ strtolower($notificacion->estado) }}">
                                                    {{ $notificacion->estado }}
                                                </span>
                                            </td>
                                            <td>{{ $notificacion->fecha }}</td>
                                            <td>{{ $notificacion->expediente }}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-outline-primary details-button" 
                                                        data-bs-toggle="modal" data-bs-target="#detailsModal"
                                                        data-tipo="{{ $notificacion->tipo_asunto }}"
                                                        data-estado="{{ $notificacion->estado }}"
                                                        data-fecha="{{ $notificacion->fecha }}"
                                                        data-expediente="{{ $notificacion->expediente }}"
                                                        data-descripcion="{{ $notificacion->descripcion ?? 'Sin descripción' }}">
                                                    <i class="fas fa-eye me-1"></i>Ver
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted py-4">
                                                <i class="fas fa-bell-slash me-2"></i>
                                                No hay notificaciones creadas aún. Utiliza el formulario superior para crear tu primera notificación.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Modal para Ver Notificación -->
                    <div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="detailsModalLabel">
                                        <i class="fas fa-bell me-2"></i>Detalles de la Notificación
                                    </h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <span class="detail-label">Tipo de Asunto:</span>
                                            <div class="detail-value" id="modalTipoAsunto"></div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <span class="detail-label">Estado:</span>
                                            <div class="detail-value" id="modalEstado"></div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <span class="detail-label">Fecha:</span>
                                            <div class="detail-value" id="modalFecha"></div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <span class="detail-label">Expediente:</span>
                                            <div class="detail-value" id="modalExpediente"></div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <span class="detail-label">Descripción:</span>
                                            <div class="detail-value" id="modalDescripcion"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contenedor del mensaje de creación (modal de confirmación) -->
                    <div class="modal fade" id="messageBox" tabindex="-1" aria-labelledby="messageBoxLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-success text-white">
                                    <h5 class="modal-title" id="messageBoxLabel">
                                        <i class="fas fa-check-circle me-2"></i>Notificación Creada
                                    </h5>
                                </div>
                                <div class="modal-body">
                                    <p id="messageContent">Se ha creado una nueva notificación exitosamente.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="closeButton" class="btn btn-success" data-bs-dismiss="modal">
                                        <i class="fas fa-check me-2"></i>Aceptar
                                    </button>
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
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('notificationForm');
            const clearButton = document.getElementById('clearButton');
            const searchInput = document.getElementById('searchInput');
            const tableBody = document.getElementById('notificationsTableBody');
            
            // Modales
            const messageBox = document.getElementById('messageBox');
            const messageContent = document.getElementById('messageContent');
            const detailsModal = document.getElementById('detailsModal');

            // Array para almacenar las notificaciones en memoria (para el cliente)
            let notifications = [];

            // Establecer fecha actual como valor por defecto
            document.getElementById('fecha').valueAsDate = new Date();

            // Función para renderizar la tabla con las notificaciones dadas
            function renderTable(data) {
                // Si no hay datos del servidor, usar el array local
                if (data.length === 0 && notifications.length > 0) {
                    data = notifications;
                }

                // Limpia el cuerpo de la tabla
                tableBody.innerHTML = '';

                // Si no hay datos, muestra un mensaje
                if (data.length === 0) {
                    const row = document.createElement('tr');
                    row.innerHTML = `<td colspan="5" class="text-center text-muted py-4">
                        <i class="fas fa-bell-slash me-2"></i>
                        No se encontraron notificaciones.
                    </td>`;
                    tableBody.appendChild(row);
                    return;
                }

                // Crea una fila por cada notificación
                data.forEach((notification, index) => {
                    const row = document.createElement('tr');
                    row.classList.add('table-row-hover');
                    
                    const estadoClass = notification.estado === 'Pendiente' ? 'estado-pendiente' : 'estado-leido';
                    
                    row.innerHTML = `
                        <td class="align-middle">${notification.tipo_asunto || notification.tipoAsunto}</td>
                        <td class="align-middle">
                            <span class="${estadoClass}">${notification.estado}</span>
                        </td>
                        <td class="align-middle">${notification.fecha}</td>
                        <td class="align-middle">${notification.expediente}</td>
                        <td class="align-middle">
                            <button type="button" class="btn btn-sm btn-outline-primary details-button" 
                                    data-index="${index}"
                                    data-tipo="${notification.tipo_asunto || notification.tipoAsunto}"
                                    data-estado="${notification.estado}"
                                    data-fecha="${notification.fecha}"
                                    data-expediente="${notification.expediente}"
                                    data-descripcion="${notification.descripcion || 'Sin descripción'}">
                                <i class="fas fa-eye me-1"></i>Ver
                            </button>
                        </td>
                    `;
                    tableBody.appendChild(row);
                });
            }

            // Función para mostrar el mensaje personalizado de creación
            function showCreationMessage(message) {
                messageContent.textContent = message;
                const modal = new bootstrap.Modal(messageBox);
                modal.show();
            }

            // Función para mostrar la ventana modal de detalles
            function showDetailsModal(notification) {
                document.getElementById('modalTipoAsunto').textContent = notification.tipo_asunto || notification.tipoAsunto;
                document.getElementById('modalEstado').textContent = notification.estado;
                document.getElementById('modalFecha').textContent = notification.fecha;
                document.getElementById('modalExpediente').textContent = notification.expediente;
                document.getElementById('modalDescripcion').textContent = notification.descripcion || 'Sin descripción';
            }

            // Manejador del evento 'submit' del formulario (solo para la funcionalidad en memoria)
            form.addEventListener('submit', (e) => {
                // Si estamos usando Laravel, no prevenir el submit por defecto
                // e.preventDefault();

                // Para funcionalidad en memoria cuando no hay backend:
                /*
                const newNotification = {
                    tipoAsunto: document.getElementById('tipoAsunto').value,
                    estado: document.getElementById('estado').value,
                    fecha: document.getElementById('fecha').value,
                    expediente: document.getElementById('expediente').value,
                    descripcion: document.getElementById('descripcion').value
                };

                notifications.push(newNotification);
                showCreationMessage('Se ha creado una nueva notificación.');
                renderTable(notifications);
                form.reset();
                */
            });

            // Manejador del botón "Limpiar Formulario"
            clearButton.addEventListener('click', () => {
                form.reset();
                // Volver a establecer la fecha actual
                document.getElementById('fecha').valueAsDate = new Date();
            });

            // Manejador del campo de búsqueda para filtrar la tabla
            searchInput.addEventListener('keyup', (e) => {
                const searchTerm = e.target.value.toLowerCase();
                const rows = tableBody.querySelectorAll('tr');
                
                rows.forEach(row => {
                    const expedienteCell = row.querySelector('td:nth-child(4)');
                    if (expedienteCell) {
                        const expedienteText = expedienteCell.textContent.toLowerCase();
                        if (expedienteText.includes(searchTerm)) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    }
                });

                // Si no hay filas visibles, mostrar mensaje
                const visibleRows = Array.from(rows).filter(row => row.style.display !== 'none');
                if (visibleRows.length === 0 && searchTerm) {
                    tableBody.innerHTML = `<tr><td colspan="5" class="text-center text-muted py-4">
                        <i class="fas fa-search me-2"></i>
                        No se encontraron notificaciones que coincidan con "${searchTerm}".
                    </td></tr>`;
                } else if (visibleRows.length === 0 && !searchTerm) {
                    renderTable([]);
                }
            });

            // Manejador del clic en el cuerpo de la tabla para abrir el modal de detalles
            tableBody.addEventListener('click', (e) => {
                const button = e.target.closest('.details-button');
                if (button) {
                    const notificationData = {
                        tipo_asunto: button.dataset.tipo,
                        estado: button.dataset.estado,
                        fecha: button.dataset.fecha,
                        expediente: button.dataset.expediente,
                        descripcion: button.dataset.descripcion
                    };
                    
                    // Cambiar el estado a "Leído" si estaba "Pendiente" (solo para funcionalidad en memoria)
                    const index = button.dataset.index;
                    if (index && notifications[index] && notifications[index].estado === 'Pendiente') {
                        notifications[index].estado = 'Leido';
                        notificationData.estado = 'Leido';
                        renderTable(notifications);
                    }

                    showDetailsModal(notificationData);
                    const modal = new bootstrap.Modal(detailsModal);
                    modal.show();
                }
            });

            // Manejador para los botones de detalles que vienen del servidor (Bootstrap modal)
            document.addEventListener('click', (e) => {
                if (e.target.closest('[data-bs-target="#detailsModal"]')) {
                    const button = e.target.closest('[data-bs-target="#detailsModal"]');
                    const notificationData = {
                        tipo_asunto: button.dataset.tipo,
                        estado: button.dataset.estado,
                        fecha: button.dataset.fecha,
                        expediente: button.dataset.expediente,
                        descripcion: button.dataset.descripcion
                    };
                    showDetailsModal(notificationData);
                }
            });

            // Auto-hide alerts after 5 seconds
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                setTimeout(function() {
                    if (alert.parentNode) {
                        const bsAlert = new bootstrap.Alert(alert);
                        bsAlert.close();
                    }
                }, 5000);
            });
        });
    </script>
</body>
</html>