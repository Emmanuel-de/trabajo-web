    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Mis Expedientes - Tribunal Electrónico - Poder Judicial Tamaulipas</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome para iconos -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

            /* Estilos específicos para la página de expedientes */
            .welcome-banner {
                background: linear-gradient(135deg, #6f42c1, #8a2be2); /* Color morado para expedientes */
                color: white;
                padding: 2rem;
                border-radius: 0.5rem;
                margin-bottom: 1.5rem;
                display: flex;
                align-items: center;
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
            .table-hover tbody tr:hover { 
                background-color: #f0f2f5;
            }
            .badge {
                display: inline-block;
                padding: 0.35em 0.65em;
                font-size: 0.75em;
                font-weight: 700;
                line-height: 1;
                text-align: center;
                white-space: nowrap;
                vertical-align: baseline;
                border-radius: 0.25rem;
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

            /* Estilos para el modal de detalles/edición (copia del usuario.blade.php) */
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
            .modal-body .view-mode { display: block; }
            .modal-body .edit-mode { display: none; }
            #expedienteDetailModal.edit-active .modal-body .view-mode { display: none !important; }
            #expedienteDetailModal.edit-active .modal-body .edit-mode { display: block !important; }
            #modalViewModeButtons { display: flex !important; justify-content: flex-end; }
            #modalEditModeButtons { display: none !important; justify-content: flex-end; }
            #expedienteDetailModal.edit-active #modalViewModeButtons { display: none !important; }
            #expedienteDetailModal.edit-active #modalEditModeButtons { display: flex !important; }
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
                            <a href="{{ route('expedientes.index') }}" class="list-group-item list-group-item-action active" aria-current="true">
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
                            <a href="{{ route('soporte') }}" class="list-group-item list-group-item-action">
                                <i class="fas fa-question-circle me-2"></i> Soporte
                            </a>
                        </div>

                        <div class="mt-4">
                            
                        </div>
                    </div>

                    <!-- Main Content: Expediente Form -->
                    <div class="col-md-9 py-4">
                        <!-- Welcome Banner de Expedientes -->
                        <div class="welcome-banner d-flex align-items-center">
                            <i class="fas fa-folder-plus me-3" style="font-size: 3rem;"></i>
                            <div>
                                <h3 class="mb-1 text-white">Registrar Nuevo Expediente</h3>
                                <p class="mb-0 text-white">Ingresa la información detallada para un nuevo expediente judicial</p>
                            </div>
                        </div>

                        <div class="expediente-form-wrapper">
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

                            <form action="{{ route('expedientes.store') }}" method="POST">
                                @csrf

                                <!-- Información del Expediente -->
                                <div class="mb-4 pb-3 border-bottom">
                                    <h5 class="section-title">
                                        <i class="fas fa-info-circle me-2"></i>Información General del Expediente
                                    </h5>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="juzgado" class="form-label">Juzgado *</label>
                                            <input type="text" class="form-control" id="juzgado" name="juzgado" value="{{ old('juzgado') }}" placeholder="Ej: MARCOS GARCÍA VÁZQUEZ TRIBUNAL ELECTRÓNICO (VICTORIA)" required>
                                            @error('juzgado') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="numero_expediente" class="form-label">Número de Expediente *</label>
                                            <input type="text" class="form-control" id="numero_expediente" name="numero_expediente" value="{{ old('numero_expediente') }}" placeholder="Ej: 00149/2011" required>
                                            @error('numero_expediente') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="juicio" class="form-label">Tipo de Juicio *</label>
                                            <input type="text" class="form-control" id="juicio" name="juicio" value="{{ old('juicio') }}" placeholder="Ej: EJECUTIVO MERCANTIL" required>
                                            @error('juicio') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="promovente" class="form-label">Promovente(s) *</label>
                                            <input type="text" class="form-control" id="promovente" name="promovente" value="{{ old('promovente') }}" placeholder="Ej: MARCOS GARCÍA VÁZQUEZ" required>
                                            @error('promovente') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="demandado" class="form-label">Demandado(s) *</label>
                                            <input type="text" class="form-control" id="demandado" name="demandado" value="{{ old('demandado') }}" placeholder="Ej: HOMERO ABDIELSELVA ZAVALA" required>
                                            @error('demandado') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="fecha_inicio" class="form-label">Fecha de Inicio *</label>
                                            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{ old('fecha_inicio') }}" required>
                                            @error('fecha_inicio') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="estado_actual" class="form-label">Estado Actual *</label>
                                            <select class="form-select" id="estado_actual" name="estado_actual" required>
                                                <option value="">Seleccione el estado</option>
                                                <option value="en_tramite" {{ old('estado_actual') == 'en_tramite' ? 'selected' : '' }}>En Trámite</option>
                                                <option value="archivado" {{ old('estado_actual') == 'archivado' ? 'selected' : '' }}>Archivado</option>
                                                <option value="finalizado" {{ old('estado_actual') == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
                                                <option value="pausado" {{ old('estado_actual') == 'pausado' ? 'selected' : '' }}>Pausado</option>
                                            </select>
                                            @error('estado_actual') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Observaciones Adicionales -->
                                <div class="mb-4">
                                    <h5 class="section-title">
                                        <i class="fas fa-file-alt me-2"></i>Observaciones Adicionales
                                    </h5>
                                    <div class="col-12">
                                        <label for="observaciones" class="form-label">Notas / Comentarios</label>
                                        <textarea class="form-control" id="observaciones" name="observaciones" rows="4" placeholder="Cualquier información adicional relevante sobre el expediente...">{{ old('observaciones') }}</textarea>
                                        @error('observaciones') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg me-3">
                                        <i class="fas fa-save me-2"></i>Registrar Expediente
                                    </button>
                                    <a href="{{ route('usuario') }}" class="btn btn-secondary btn-lg">
                                        <i class="fas fa-arrow-left me-2"></i>Regresar al Dashboard
                                    </a>
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
            // Auto-hide alerts after 5 seconds
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
    
           
