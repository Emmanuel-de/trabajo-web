<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Generador y Visor de Reportes - Tribunal Electrónico - Poder Judicial Tamaulipas</title>
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

        /* Estilos específicos para reportes */
        .form-container, .table-container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-bottom: 2rem;
        }
        .welcome-banner {
            background: linear-gradient(135deg, #17a2b8, #138496); /* Color cyan para reportes */
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
        .form-control:focus {
            border-color: #1f5582;
            box-shadow: 0 0 0 0.2rem rgba(31, 85, 130, 0.25);
        }
        .table {
            border-radius: 0.5rem;
            overflow: hidden;
        }
        .table thead th {
            background-color: #f8f9fa;
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
        .action-link.delete {
            color: #dc3545;
        }
        .action-link.delete:hover {
            color: #c82333;
        }

        /* Estilos para modales de reportes */
        .modal-header.bg-primary {
            background-color: #1f5582 !important;
        }
        .modal-header.bg-warning {
            background-color: #f0ad4e !important;
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
                        <a href="{{ route('notificaciones.index') }}" class="list-group-item list-group-item-action">
                            <i class="fas fa-bell me-2"></i> Notificaciones
                        </a>
                        <a href="{{ route('reportes.index') }}" class="list-group-item list-group-item-action active" aria-current="true">
                            <i class="fas fa-chart-bar me-2"></i> Reportes
                        </a>
                        <a href="{{ route('perfil') }}" class="list-group-item list-group-item-action">
                            <i class="fas fa-user-circle me-2"></i> Mi Perfil
                        </a>
                        
                    </div>
                </div>

                <!-- Main Content: Generador de Reportes -->
                <div class="col-md-9 py-4">
                    <!-- Welcome Banner de Reportes -->
                    <div class="welcome-banner d-flex align-items-center">
                        <i class="fas fa-chart-line me-3" style="font-size: 3rem;"></i>
                        <div>
                            <h3 class="mb-1 text-white">Generador y Visor de Reportes</h3>
                            <p class="mb-0 text-white">Crea y gestiona reportes del sistema judicial de manera eficiente</p>
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

                    <!-- Sección de Creación de Reportes -->
                    <div class="form-container">
                        <h2 class="text-2xl font-bold text-center mb-4 text-dark">
                            <i class="fas fa-plus-circle me-2"></i>Crear Nuevo Reporte
                        </h2>
                        
                        <form id="report-form" method="POST" action="{{ route('reportes.store') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="report-title" class="form-label">Título del Reporte *</label>
                                    <input type="text" class="form-control" id="report-title" name="report-title" required 
                                           placeholder="Ingrese el título del reporte">
                                </div>
                                
                                <div class="col-12">
                                    <label for="report-description" class="form-label">Descripción *</label>
                                    <textarea class="form-control" id="report-description" name="report-description" rows="4" required 
                                              placeholder="Describa el contenido y objetivo del reporte"></textarea>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="report-date" class="form-label">Fecha *</label>
                                    <input type="date" class="form-control" id="report-date" name="report-date" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="report-type" class="form-label">Tipo de Reporte</label>
                                    <select class="form-select" id="report-type" name="report-type">
                                        <option value="expedientes">Expedientes</option>
                                        <option value="promociones">Promociones</option>
                                        <option value="estadisticas">Estadísticas</option>
                                        <option value="general">General</option>
                                    </select>
                                </div>
                                
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-save me-2"></i>Generar Reporte
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Separador -->
                    <hr class="my-4">

                    <!-- Sección de Visualización de Reportes -->
                    <div class="table-container">
                        <h2 class="text-2xl font-bold text-center mb-4 text-dark">
                            <i class="fas fa-table me-2"></i>Reportes Existentes
                        </h2>
                        
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-3 py-3">ID</th>
                                        <th scope="col" class="px-3 py-3">Título</th>
                                        <th scope="col" class="px-3 py-3">Tipo</th>
                                        <th scope="col" class="px-3 py-3">Fecha</th>
                                        <th scope="col" class="px-3 py-3">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="reports-table-body">
                                    @forelse($reportes as $reporte)
                                        <tr>
                                            <td class="px-3 py-3 text-muted">#{{ $reporte->id_formateado }}</td>
                                            <td class="px-3 py-3 font-weight-bold text-dark">{{ $reporte->titulo }}</td>
                                            <td class="px-3 py-3">
                                                <span class="badge bg-secondary">{{ $reporte->tipo_nombre }}</span>
                                            </td>
                                            <td class="px-3 py-3 text-muted">{{ $reporte->fecha_formateada }}</td>
                                            <td class="px-3 py-3">
                                                <button type="button" class="action-link border-0 bg-transparent p-0" 
                                                        onclick="viewReport({{ $reporte->id }}, '{{ addslashes($reporte->titulo) }}', '{{ addslashes($reporte->descripcion) }}', '{{ $reporte->tipo }}', '{{ $reporte->fecha_formateada }}', '{{ addslashes($reporte->getResumenContenido()) }}', '{{ $reporte->estado }}')">
                                                    <i class="fas fa-eye me-1"></i>Ver
                                                </button>
                                                <button type="button" class="action-link border-0 bg-transparent p-0 ms-2" 
                                                        onclick="editReport({{ $reporte->id }}, '{{ addslashes($reporte->titulo) }}', '{{ addslashes($reporte->descripcion) }}', '{{ $reporte->tipo }}', '{{ $reporte->fecha_reporte }}', '{{ $reporte->estado }}')">
                                                    <i class="fas fa-edit me-1"></i>Editar
                                                </button>
                                                <form method="POST" action="{{ route('reportes.destroy', $reporte) }}" class="d-inline ms-2" onsubmit="return confirmDelete(event, '{{ $reporte->id_formateado }}')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="action-link delete border-0 bg-transparent p-0">
                                                        <i class="fas fa-trash me-1"></i>Eliminar
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted py-4">
                                                <i class="fas fa-file-alt me-2"></i>
                                                No hay reportes creados aún. Utiliza el formulario superior para crear tu primer reporte.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Modal para Ver Reporte -->
                    <div class="modal fade" id="viewReportModal" tabindex="-1" aria-labelledby="viewReportModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="viewReportModalLabel">
                                        <i class="fas fa-file-alt me-2"></i>Detalles del Reporte
                                    </h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <span class="detail-label">ID del Reporte:</span>
                                            <div class="detail-value" id="viewReportId"></div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <span class="detail-label">Estado:</span>
                                            <div class="detail-value" id="viewReportEstado"></div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <span class="detail-label">Título:</span>
                                            <div class="detail-value" id="viewReportTitulo"></div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <span class="detail-label">Descripción:</span>
                                            <div class="detail-value" id="viewReportDescripcion"></div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <span class="detail-label">Tipo de Reporte:</span>
                                            <div class="detail-value" id="viewReportTipo"></div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <span class="detail-label">Fecha del Reporte:</span>
                                            <div class="detail-value" id="viewReportFecha"></div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <span class="detail-label">Resumen de Contenido:</span>
                                            <div class="detail-value" id="viewReportResumen"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary" onclick="switchToEditMode()">
                                        <i class="fas fa-edit me-2"></i>Editar Reporte
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal para Editar Reporte -->
                    <div class="modal fade" id="editReportModal" tabindex="-1" aria-labelledby="editReportModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-warning text-dark">
                                    <h5 class="modal-title" id="editReportModalLabel">
                                        <i class="fas fa-edit me-2"></i>Editar Reporte
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="editReportForm">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" id="editReportId" name="reporte_id">
                                        
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <label for="editReportTitulo" class="form-label">Título del Reporte *</label>
                                                <input type="text" class="form-control" id="editReportTitulo" name="titulo" required>
                                            </div>
                                            
                                            <div class="col-12 mb-3">
                                                <label for="editReportDescripcion" class="form-label">Descripción *</label>
                                                <textarea class="form-control" id="editReportDescripcion" name="descripcion" rows="4" required></textarea>
                                            </div>
                                            
                                            <div class="col-md-6 mb-3">
                                                <label for="editReportFecha" class="form-label">Fecha *</label>
                                                <input type="date" class="form-control" id="editReportFecha" name="fecha_reporte" required>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="editReportTipo" class="form-label">Tipo de Reporte</label>
                                                <select class="form-select" id="editReportTipo" name="tipo">
                                                    <option value="expedientes">Expedientes</option>
                                                    <option value="promociones">Promociones</option>
                                                    <option value="estadisticas">Estadísticas</option>
                                                    <option value="general">General</option>
                                                </select>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label for="editReportEstado" class="form-label">Estado</label>
                                                <select class="form-select" id="editReportEstado" name="estado">
                                                    <option value="activo">Activo</option>
                                                    <option value="archivado">Archivado</option>
                                                    <option value="finalizado">Finalizado</option>
                                                    <option value="pausado">Pausado</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                    
                                    <!-- Contenedor para mensajes de error de validación AJAX -->
                                    <div id="edit-modal-validation-errors" class="alert alert-danger d-none mt-3">
                                        <ul class="mb-0 ps-3"></ul>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-primary" onclick="saveReportChanges()">
                                        <i class="fas fa-save me-2"></i>Guardar Cambios
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
        // Obtener el formulario y el cuerpo de la tabla por su ID
        const form = document.getElementById('report-form');
        const tableBody = document.getElementById('reports-table-body');
        
        let reportIdCounter = 1;

        // Establecer fecha actual como valor por defecto
        document.getElementById('report-date').valueAsDate = new Date();

        // Remove the form event listener to allow normal server submission
        // The form will now submit to the Laravel controller

        // Variables globales para los modales
        let currentReportId = null;
        
        // Función para mostrar alertas
        function showAlert(type, message) {
            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
            alertDiv.innerHTML = `
                <i class="fas fa-check-circle me-2"></i>
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            
            const container = document.querySelector('.form-container');
            container.insertBefore(alertDiv, container.firstChild);
            
            // Auto-hide after 3 seconds
            setTimeout(() => {
                if (alertDiv.parentNode) {
                    alertDiv.remove();
                }
            }, 3000);
        }

        // Función para ver reporte en modal
        function viewReport(id, titulo, descripcion, tipo, fecha, resumen, estado) {
            currentReportId = id;
            
            // Llenar los campos del modal de visualización
            document.getElementById('viewReportId').textContent = '#' + String(id).padStart(3, '0');
            document.getElementById('viewReportTitulo').textContent = titulo;
            document.getElementById('viewReportDescripcion').textContent = descripcion;
            document.getElementById('viewReportTipo').textContent = getTipoNombre(tipo);
            document.getElementById('viewReportFecha').textContent = fecha;
            document.getElementById('viewReportResumen').textContent = resumen;
            document.getElementById('viewReportEstado').innerHTML = getEstadoBadge(estado);
            
            // Mostrar el modal
            const modal = new bootstrap.Modal(document.getElementById('viewReportModal'));
            modal.show();
        }

        // Función para editar reporte en modal
        function editReport(id, titulo, descripcion, tipo, fechaReporte, estado) {
            currentReportId = id;
            
            // Llenar los campos del formulario de edición
            document.getElementById('editReportId').value = id;
            document.getElementById('editReportTitulo').value = titulo;
            document.getElementById('editReportDescripcion').value = descripcion;
            document.getElementById('editReportTipo').value = tipo;
            document.getElementById('editReportFecha').value = fechaReporte;
            document.getElementById('editReportEstado').value = estado;
            
            // Limpiar errores previos
            hideValidationErrors();
            
            // Mostrar el modal
            const modal = new bootstrap.Modal(document.getElementById('editReportModal'));
            modal.show();
        }

        // Función para cambiar del modal de vista al modal de edición
        function switchToEditMode() {
            // Cerrar modal de vista
            const viewModal = bootstrap.Modal.getInstance(document.getElementById('viewReportModal'));
            viewModal.hide();
            
            // Obtener datos del reporte actual desde la tabla
            const row = document.querySelector(`tr:has(button[onclick*="${currentReportId}"])`);
            if (row) {
                const cells = row.querySelectorAll('td');
                const titulo = cells[1].textContent.trim();
                
                // Buscar el botón de editar para obtener los datos
                const editButton = row.querySelector('button[onclick*="editReport"]');
                if (editButton) {
                    const onclickAttr = editButton.getAttribute('onclick');
                    const matches = onclickAttr.match(/editReport\((\d+),\s*'([^']*)',\s*'([^']*)',\s*'([^']*)',\s*'([^']*)',\s*'([^']*)'\)/);
                    if (matches) {
                        const [, id, titulo, descripcion, tipo, fechaReporte, estado] = matches;
                        editReport(id, titulo, descripcion, tipo, fechaReporte, estado);
                    }
                }
            }
        }

        // Función para guardar cambios del reporte
        function saveReportChanges() {
            const form = document.getElementById('editReportForm');
            const formData = new FormData(form);
            
            // Convertir FormData a objeto JSON
            const data = {};
            formData.forEach((value, key) => {
                data[key] = value;
            });
            
            // Realizar petición AJAX
            fetch(`/reportes/${currentReportId}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success || data.message) {
                    // Cerrar modal
                    const modal = bootstrap.Modal.getInstance(document.getElementById('editReportModal'));
                    modal.hide();
                    
                    // Mostrar mensaje de éxito
                    showAlert('success', data.message || 'Reporte actualizado exitosamente');
                    
                    // Recargar la página para mostrar los cambios
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                } else {
                    showValidationErrors(data.errors || { general: ['Error al actualizar el reporte'] });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showValidationErrors({ general: ['Error de conexión al actualizar el reporte'] });
            });
        }

        // Función para mostrar errores de validación
        function showValidationErrors(errors) {
            const errorContainer = document.getElementById('edit-modal-validation-errors');
            const errorList = errorContainer.querySelector('ul');
            
            errorList.innerHTML = '';
            
            Object.values(errors).flat().forEach(error => {
                const li = document.createElement('li');
                li.textContent = error;
                errorList.appendChild(li);
            });
            
            errorContainer.classList.remove('d-none');
        }

        // Función para ocultar errores de validación
        function hideValidationErrors() {
            const errorContainer = document.getElementById('edit-modal-validation-errors');
            errorContainer.classList.add('d-none');
        }

        // Función para confirmar eliminación
        function confirmDelete(event, reporteId) {
            event.preventDefault();
            
            if (confirm(`¿Está seguro que desea eliminar el reporte ${reporteId}?`)) {
                event.target.submit();
                return true;
            }
            return false;
        }

        // Funciones auxiliares para obtener nombres y badges
        function getTipoNombre(tipo) {
            const tipos = {
                'expedientes': 'Expedientes',
                'promociones': 'Promociones',
                'estadisticas': 'Estadísticas',
                'general': 'General'
            };
            return tipos[tipo] || 'Desconocido';
        }

        function getEstadoBadge(estado) {
            const badges = {
                'activo': '<span class="badge bg-success">Activo</span>',
                'archivado': '<span class="badge bg-secondary">Archivado</span>',
                'finalizado': '<span class="badge bg-primary">Finalizado</span>',
                'pausado': '<span class="badge bg-warning">Pausado</span>'
            };
            return badges[estado] || '<span class="badge bg-dark">Desconocido</span>';
        }

        // Auto-hide alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
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