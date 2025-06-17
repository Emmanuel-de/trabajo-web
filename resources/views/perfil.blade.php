<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil - Tribunal Electrónico</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .header-bg {
            background: linear-gradient(135deg, #2c5aa0 0%, #1e4176 100%);
            color: white;
            padding: 15px 0;
        }
        
        .sidebar {
            background-color: #f8f9fa;
            min-height: calc(100vh - 80px);
            border-right: 1px solid #dee2e6;
        }
        
        .nav-link {
            color: #495057;
            padding: 12px 20px;
            border-radius: 0;
            transition: all 0.3s;
        }
        
        .nav-link:hover, .nav-link.active {
            background-color: #007bff;
            color: white;
        }
        
        .card-stats {
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        
        .card-stats:hover {
            transform: translateY(-2px);
        }
        
        .stats-icon {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        
        .profile-form {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            padding: 30px;
        }
        
        .form-section {
            margin-bottom: 30px;
            padding: 20px;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            background-color: #f8f9fa;
        }
        
        .section-title {
            color: #2c5aa0;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #2c5aa0;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            border: none;
            padding: 10px 30px;
            border-radius: 5px;
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
            border: none;
            padding: 10px 30px;
            border-radius: 5px;
        }
        
        .info-display {
            background-color: #e9ecef;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        
        .edit-mode {
            display: none;
        }
        
        .view-mode .edit-mode {
            display: none;
        }
        
        .edit-active .view-mode {
            display: none;
        }
        
        .edit-active .edit-mode {
            display: block;
        }
        
        .welcome-banner {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }
        
        .profile-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header-bg">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="d-flex align-items-center">
                        <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCA0MCA0MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjQwIiBoZWlnaHQ9IjQwIiByeD0iOCIgZmlsbD0id2hpdGUiLz4KPHN2ZyB4PSI4IiB5PSI4IiB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSI+CjxwYXRoIGQ9Ik0xMiAyMkM2LjQ3NzE1IDIyIDIgMTcuNTIyOCAyIDEyQzIgNi40NzcxNSA2LjQ3NzE1IDIgMTIgMkMxNy41MjI4IDIgMjIgNi40NzcxNSAyMiAxMkMyMiAxNy41MjI4IDE3LjUyMjggMjIgMTIgMjJaIiBzdHJva2U9IiMyYzVhYTAiIHN0cm9rZS13aWR0aD0iMiIvPgo8cGF0aCBkPSJNMTIgNlYxMkw5IDE1IiBzdHJva2U9IiMyYzVhYTAiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIi8+Cjwvc3ZnPgo8L3N2Zz4K" alt="Logo Tribunal Electrónico" class="me-3">
                        <div>
                            <h4 class="mb-0">TRIBUNAL ELECTRÓNICO</h4>
                            <small>PODER JUDICIAL TAMAULIPAS</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <div class="d-flex align-items-center justify-content-end">
                        <span class="me-3">Bienvenido, {{ $user->nombre ?? 'Usuario' }}</span>
                        <div class="dropdown">
                            <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                {{ $user->nombre ?? 'Usuario' }}
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('perfil') }}"><i class="fas fa-user me-2"></i>Mi Perfil</a></li>
                                <li><a class="dropdown-item" href="#">⚙️ Configuración</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-0">
                <div class="nav flex-column">
                    <a href="{{ route('usuario') }}" class="nav-link">
                        <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                    </a>
                    <a href="{{ route('promociones') }}" class="nav-link">
                        <i class="fas fa-file-alt me-2"></i> Promociones Electrónicas
                    </a>
                    <a href="{{ route('expedientes') }}" class="nav-link">
                        <i class="fas fa-folder me-2"></i> Mis Expedientes
                    </a>
                    <a href="#" class="nav-link">
                        <i class="fas fa-bell me-2"></i> Notificaciones
                    </a>
                    <a href="#" class="nav-link">
                        <i class="fas fa-chart-bar me-2"></i> Reportes
                    </a>
                    <a href="{{ route('perfil') }}" class="nav-link active">
                        <i class="fas fa-user me-2"></i> Mi Perfil
                    </a>
                    <a href="#" class="nav-link">
                        <i class="fas fa-cog me-2"></i> Configuración
                    </a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 p-4">
                <!-- Welcome Banner -->
                <div class="welcome-banner">
                    <div class="row align-items-center">
                        <div class="col-md-1">
                            <div class="profile-avatar">
                                {{ strtoupper(substr($user->nombre ?? 'U', 0, 1)) }}{{ strtoupper(substr($user->apellido_paterno ?? 'U', 0, 1)) }}
                            </div>
                        </div>
                        <div class="col-md-11">
                            <h3 class="mb-1">Mi Perfil de Usuario</h3>
                            <p class="mb-0">Gestiona tu información personal y configuraciones de cuenta</p>
                        </div>
                    </div>
                </div>

                <!-- Profile Form -->
                <div class="profile-form" id="profileForm">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <ul class="mb-0">
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
                        <div class="form-section">
                            <h5 class="section-title">
                                <i class="fas fa-user me-2"></i>Información Personal
                            </h5>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Nombre *</label>
                                    <div class="view-mode">
                                        <div class="info-display">{{ $user->nombre ?? 'No especificado' }}</div>
                                    </div>
                                    <div class="edit-mode">
                                        <input type="text" class="form-control" name="nombre" value="{{ $user->nombre ?? '' }}" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <label class="form-label">Apellido Paterno *</label>
                                    <div class="view-mode">
                                        <div class="info-display">{{ $user->apellido_paterno ?? 'No especificado' }}</div>
                                    </div>
                                    <div class="edit-mode">
                                        <input type="text" class="form-control" name="apellido_paterno" value="{{ $user->apellido_paterno ?? '' }}" required>
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
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="form-label">Género *</label>
                                    <div class="view-mode">
                                        <div class="info-display">
                                            @if($user->genero == 'masculino')
                                                Masculino
                                            @elseif($user->genero == 'femenino')
                                                Femenino
                                            @else
                                                No especificado
                                            @endif
                                        </div>
                                    </div>
                                    <div class="edit-mode">
                                        <select class="form-select" name="genero" required>
                                            <option value="">Seleccione</option>
                                            <option value="masculino" {{ ($user->genero ?? '') == 'masculino' ? 'selected' : '' }}>Masculino</option>
                                            <option value="femenino" {{ ($user->genero ?? '') == 'femenino' ? 'selected' : '' }}>Femenino</option>
                                        </select>
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
                                            <option value="primaria" {{ ($user->escolaridad ?? '') == 'primaria' ? 'selected' : '' }}>Primaria</option>
                                            <option value="secundaria" {{ ($user->escolaridad ?? '') == 'secundaria' ? 'selected' : '' }}>Secundaria</option>
                                            <option value="preparatoria" {{ ($user->escolaridad ?? '') == 'preparatoria' ? 'selected' : '' }}>Preparatoria</option>
                                            <option value="licenciatura" {{ ($user->escolaridad ?? '') == 'licenciatura' ? 'selected' : '' }}>Licenciatura</option>
                                            <option value="maestria" {{ ($user->escolaridad ?? '') == 'maestria' ? 'selected' : '' }}>Maestría</option>
                                            <option value="doctorado" {{ ($user->escolaridad ?? '') == 'doctorado' ? 'selected' : '' }}>Doctorado</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Información de Contacto -->
                        <div class="form-section">
                            <h5 class="section-title">
                                <i class="fas fa-phone me-2"></i>Información de Contacto
                            </h5>
                            
                            <div class="row">
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
                            </div>
                            
                            <div class="row mt-3">
                                <div class="col-md-12">
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
                        <div class="form-section">
                            <h5 class="section-title">
                                <i class="fas fa-map-marker-alt me-2"></i>Información de Domicilio
                            </h5>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label">Calle y Número</label>
                                    <div class="view-mode">
                                        <div class="info-display">{{ $user->calle ?? 'No especificado' }}</div>
                                    </div>
                                    <div class="edit-mode">
                                        <input type="text" class="form-control" name="calle" value="{{ $user->calle ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label class="form-label">Colonia</label>
                                    <div class="view-mode">
                                        <div class="info-display">{{ $user->colonia ?? 'No especificado' }}</div>
                                    </div>
                                    <div class="edit-mode">
                                        <input type="text" class="form-control" name="colonia" value="{{ $user->colonia ?? '' }}">
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <label class="form-label">Código Postal</label>
                                    <div class="view-mode">
                                        <div class="info-display">{{ $user->codigo_postal ?? 'No especificado' }}</div>
                                    </div>
                                    <div class="edit-mode">
                                        <input type="text" class="form-control" name="codigo_postal" value="{{ $user->codigo_postal ?? '' }}">
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <label class="form-label">Municipio</label>
                                    <div class="view-mode">
                                        <div class="info-display">{{ $user->municipio ?? 'No especificado' }}</div>
                                    </div>
                                    <div class="edit-mode">
                                        <input type="text" class="form-control" name="municipio" value="{{ $user->municipio ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Información de Cuenta -->
                        <div class="form-section">
                            <h5 class="section-title">
                                <i class="fas fa-envelope me-2"></i>Información de Cuenta
                            </h5>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Correo Electrónico *</label>
                                    <div class="view-mode">
                                        <div class="info-display">{{ $user->email ?? 'No especificado' }}</div>
                                    </div>
                                    <div class="edit-mode">
                                        <input type="email" class="form-control" name="email" value="{{ $user->email ?? '' }}" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label">Fecha de Registro</label>
                                    <div class="info-display">{{ $user->created_at ? $user->created_at->format('d/m/Y H:i') : 'No disponible' }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Botones de Acción -->
                        <div class="text-center mt-4">
                            <div class="view-mode">
                                <button type="button" class="btn btn-primary me-3" onclick="toggleEditMode()">
                                    <i class="fas fa-edit me-2"></i>Editar Información
                                </button>
                                {{-- CAMBIO AQUÍ: Ahora es un enlace que usa route() --}}
                                <a href="{{ route('usuario') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>Regresar
                                </a>
                            </div>
                            
                            <div class="edit-mode">
                                <button type="submit" class="btn btn-primary me-3">
                                    <i class="fas fa-save me-2"></i>Guardar Cambios
                                </button>
                                <button type="button" class="btn btn-secondary" onclick="toggleEditMode()">
                                    <i class="fas fa-times me-2"></i>Cancelar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-light text-center text-lg-start mt-4 py-3">
        <div class="container">
            <p class="mb-0 text-muted">
                &copy; {{ date('Y') }} Tribunal Electrónico - Poder Judicial de Tamaulipas. Todos los derechos reservados.
            </p>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleEditMode() {
            const form = document.getElementById('profileForm');
            form.classList.toggle('edit-active');
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
        });
    </script>
</body>
</html>
