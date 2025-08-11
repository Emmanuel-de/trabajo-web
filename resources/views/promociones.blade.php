<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Nueva Promoción Electrónica - Tribunal Electrónico - Poder Judicial Tamaulipas</title>
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

        /* Estilos específicos del formulario de Nueva Promoción */
        .new-promo-wrapper {
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075);
            padding: 2rem;
        }
        .welcome-banner {
            background: linear-gradient(135deg, #007bff, #0056b3); /* Azul para promociones */
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
        .form-label {
            font-weight: 600; /* Etiquetas más negritas */
        }
        .form-control, .form-select, .form-control-plaintext {
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
        }
        .info-display-static { /* Para mostrar info estática como la del expediente */
            background-color: #e9ecef;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            min-height: 44px;
            display: flex;
            align-items: center;
            color: #343a40;
            font-weight: 500;
        }
        .warning-text {
            color: #dc3545; /* Rojo de Bootstrap para advertencias */
            font-weight: bold;
            margin-top: 1rem;
            margin-bottom: 1rem;
            padding: 0.75rem;
            border: 1px solid #dc3545;
            border-radius: 0.5rem;
            background-color: #f8d7da; /* Fondo suave para la advertencia */
        }
        .file-input-group {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }
        .file-input-group input[type="file"] {
            flex-grow: 1;
            margin-right: 0.5rem;
        }
        .file-input-group .btn {
            flex-shrink: 0;
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
                            <li><a class="dropdown-item" href="{{ route('homeayuda') }}"><i class="fas fa-question-circle me-2"></i>Soporte</a></li>
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
                        <a href="{{ route('promociones.index') }}" class="list-group-item list-group-item-action active" aria-current="true">
                            <i class="fas fa-file-contract me-2"></i> Promociones Electrónicas
                        </a>
                        <a href="{{ route('expedientes.index') }}" class="list-group-item list-group-item-action">
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
                        <a href="{{ route('homeayuda') }}" class="list-group-item list-group-item-action">
                            <i class="fas fa-question-circle me-2"></i> Soporte
                        </a>
                    </div>
                </div>

                <!-- Main Content: New Electronic Promotion Form -->
                <div class="col-md-9 py-4">
                    <!-- Top Section with Title and Regresar Button -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="mb-0 text-primary">NUEVA PROMOCIÓN ELECTRÓNICA</h3>
                        <a href="{{ route('usuario') }}" class="btn btn-secondary btn-lg">
                            <i class="fas fa-arrow-left me-2"></i>Regresar
                        </a>
                    </div>

                    <!-- Info Alert for Word/PDF -->
                    <div class="alert alert-info border-info text-center rounded-md mb-4" role="alert">
                        Si ya tiene su Promoción/Escrito redactado en un archivo de Word o tiene el archivo PDF de la información.
                        <button type="button" class="btn btn-dark btn-sm ms-3">HAGACLICK AQUÍ</button>
                    </div>

                    <div class="new-promo-wrapper">
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

                        <form action="{{ route('promociones.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Información del Expediente -->
                            <div class="mb-4 pb-3 border-bottom">
                                <h5 class="section-title">
                                    <i class="fas fa-info-circle me-2"></i>Información del Expediente
                                </h5>

                                <!-- Selector de Expediente -->
                                <div class="row g-2 mb-3">
                                    <div class="col-md-12">
                                        <label class="form-label fw-bold">Seleccionar Expediente:</label>
                                        <select class="form-select" id="expedienteSelector" name="expediente_id" required>
                                            <option value="">-- Seleccione un expediente --</option>
                                            @foreach($expedientes as $exp)
                                                <option value="{{ $exp->id }}" 
                                                        data-juzgado="{{ $exp->juzgado }}"
                                                        data-numero="{{ $exp->numero_expediente }}"
                                                        data-juicio="{{ $exp->juicio }}"
                                                        data-promovente="{{ $exp->promovente }}"
                                                        data-demandado="{{ $exp->demandado }}">
                                                    {{ $exp->numero_expediente }} - {{ $exp->juicio }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Información del Expediente Seleccionado -->
                                <div class="row g-2" id="expedienteInfo" style="display: none;">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Juzgado:</label>
                                        <div class="info-display-static" id="infoJuzgado">-</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Número de Expediente:</label>
                                        <div class="info-display-static" id="infoNumero">-</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Juicio:</label>
                                        <div class="info-display-static" id="infoJuicio">-</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Promovente(s):</label>
                                        <div class="info-display-static" id="infoPromovente">-</div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label fw-bold">Demandado(s):</label>
                                        <div class="info-display-static" id="infoDemandado">-</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Contenido de la Promoción Electrónica -->
                            <div class="mb-4 pb-3 border-bottom">
                                <h5 class="section-title">
                                    <i class="fas fa-edit me-2"></i>Contenido de la Promoción Electrónica
                                </h5>
                                <div class="mb-3">
                                    <label for="nombre_promocion" class="form-label">Escriba un nombre para su Promoción Electrónica</label>
                                    <input type="text" class="form-control" id="nombre_promocion" name="nombre_promocion" placeholder="Ej: Demanda inicial, contestación, etc." value="{{ old('nombre_promocion') }}">
                                    @error('nombre_promocion') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="redactar_promocion" class="form-label">Redacte su Promoción</label>
                                    <textarea class="form-control" id="redactar_promocion" name="redactar_promocion" rows="10" placeholder="Redacte aquí el contenido de su promoción...">
Nuila convallis elit. Sollicitudin bibendum mi purus id velit. Nulla auctor bibendum nulla, vel pellentesque ex euismod nec. Suspendisse congue mattis lorem, malesuadatod commodo non sagittis et. Vivamus lobortis est rhoncus, fringilla augue sit amet, imperdiet sem.

Nulla vitae tempus neque. Fusce eu tellus ut velit scelerisque tincidunt facilisis vel augue. Cras nec consequat dui, quis rhoncus dui. Suspendisse elementum semper urna ac molestie. Duis nec tellus ornare lectus euismod volutpat ac sed nisi. Nam turpis magna, condimentum at egestas sit amet, malesuada nec elit. Ut vulputate, sapien quis lacus mattis, nunc quam porta justo, nec suscipit libero ipsum in ipsum. Suspendisse ut ante ac neque viverra porta non a turpis. Sed tempus eget libero vitae iaculis. Praesent congue, diam vitae ullamcorper volutpat, nulla lacinia finibus eros. Nec sollicitudin libero neque at sapien. In convallis sem quis justo efficitur posuere. Fusce elementum quis velit eu tincidunt. Nunc auctor, risus sed vestibulum tincidunt, erat ex hendrerit orci, ut porta tortor nisi non mauris. Curabitur condimentum egestas mi et hendrerit. In eu semper velit.

Nulla facilisi. Fusce vel mauris ultricies, eleifend eros vel, tristique purus. Proin ac ultricies metus, sit amet vulputate justo. Cras hendrerit scelerisque velit id consectetur. Aliquam at erat elit. Vivamus vel augue in risus dignissim fermentum non in neque.
                                    </textarea>
                                    @error('redactar_promocion') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-lg mt-3" name="action" value="generar_promocion">
                                        <i class="fas fa-file-export me-2"></i>Generar Promoción
                                    </button>
                                    <p class="warning-text mt-3">IMPORTANTE: Haga click en el botón Generar Promoción después de haber redactado su promoción.</p>
                                </div>
                            </div>

                            <!-- Seleccione los archivos de anexos -->
                            <div class="mb-4 pb-3 border-bottom">
                                <h5 class="section-title">
                                    <i class="fas fa-paperclip me-2"></i>Seleccione los archivos de anexos
                                </h5>
                                
                                @if(session('promocion_generada_id'))
                                    <div class="alert alert-info mb-3">
                                        <i class="fas fa-info-circle me-2"></i>
                                        Se ha generado la promoción #{{ session('promocion_generada_id') }}. Puede agregar archivos anexos a esta promoción.
                                        <input type="hidden" name="promocion_id" value="{{ session('promocion_generada_id') }}">
                                    </div>
                                @endif
                                
                                <div class="file-input-group">
                                    <input type="file" class="form-control" id="anexo_file" name="anexo_file">
                                    <button type="submit" class="btn btn-secondary" name="action" value="subir_anexo">
                                        @if(session('promocion_generada_id'))
                                            Agregar a Promoción #{{ session('promocion_generada_id') }}
                                        @else
                                            Subir
                                        @endif
                                    </button>
                                </div>
                                <p class="text-muted">
                                    @if(session('promocion_generada_id'))
                                        Agregue archivos anexos a la promoción generada #{{ session('promocion_generada_id') }}.
                                    @else
                                        No hay archivos anexos para esta promoción electrónica.
                                    @endif
                                </p>
                                @error('anexo_file') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                            </div>

                            <!-- Firma Electrónica -->
                            <div class="mb-4">
                                <h5 class="section-title">
                                    <i class="fas fa-signature me-2"></i>Firma Electrónica
                                </h5>
                                <p class="warning-text">IMPORTANTE: Antes de Firmar y enviar, asegúrese que el contenido de la promoción que se generó esté correcto. En caso de no haber generado la promoción haga click en el botón de Generar Promoción ubicado abajo del cuadro de texto.</p>
                                <div class="mb-3">
                                    <label for="certificado" class="form-label">Seleccione su Certificado ******</label>
                                    <select class="form-select" id="certificado" name="certificado">
                                        <option value="">----- Seleccione su Certificado -----</option>
                                        <option value="certificado1">Certificado de Ejemplo 1</option>
                                        <option value="certificado2">Certificado de Ejemplo 2</option>
                                    </select>
                                    @error('certificado') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                </div>
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg" name="action" value="firmar_enviar">
                                        <i class="fas fa-paper-plane me-2"></i>Firmar y Enviar
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const expedienteSelector = document.getElementById('expedienteSelector');
            const expedienteInfo = document.getElementById('expedienteInfo');

            // Actualizar información del expediente cuando se selecciona uno
            expedienteSelector.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];

                if (this.value) {
                    // Mostrar información del expediente
                    document.getElementById('infoJuzgado').textContent = selectedOption.dataset.juzgado || '-';
                    document.getElementById('infoNumero').textContent = selectedOption.dataset.numero || '-';
                    document.getElementById('infoJuicio').textContent = selectedOption.dataset.juicio || '-';
                    document.getElementById('infoPromovente').textContent = selectedOption.dataset.promovente || '-';
                    document.getElementById('infoDemandado').textContent = selectedOption.dataset.demandado || '-';

                    expedienteInfo.style.display = 'block';

                    // Actualizar todos los campos ocultos de expediente_id en los formularios
                    updateAllFormExpedienteId(this.value);
                } else {
                    expedienteInfo.style.display = 'none';
                }
            });

            function updateAllFormExpedienteId(expedienteId) {
                // Buscar todos los inputs con name="expediente_id" y actualizarlos
                const expedienteInputs = document.querySelectorAll('input[name="expediente_id"]');
                expedienteInputs.forEach(input => {
                    input.value = expedienteId;
                });
            }
        });
    </script>
</body>
</html>