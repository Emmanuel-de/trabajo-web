<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tribunal Electrónico - Panel de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bg-primary { background-color: #1f5582 !important; }
        .btn-primary { background-color: #1f5582; border-color: #1f5582; }
        .btn-primary:hover { background-color: #164566; border-color: #164566; }
        .text-primary { color: #1f5582 !important; }
        .navbar-brand { font-weight: bold; }
        .user-welcome { background: linear-gradient(135deg, #1f5582, #2a6ba8); }
        .stats-card { transition: transform 0.2s; }
        .stats-card:hover { transform: translateY(-5px); }
        .table-hover tbody tr:hover { background-color: #f8f9fa; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('usuario') }}">
                TRIBUNAL ELECTRÓNICO
                <small class="d-block" style="font-size: 0.7em;">PODER JUDICIAL TAMAULIPAS</small>
            </a>

            <div class="navbar-nav ms-auto d-flex flex-row align-items-center">
                <span class="navbar-text me-3">
                    Bienvenido <strong>{{ Auth::user()->name ?? 'Usuario' }}</strong>
                </span>
                <div class="dropdown">
                    <button class="btn btn-outline-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name ?? 'Usuario' }}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('perfil') }}">📄 Mi Perfil</a></li>
                        <li><a class="dropdown-item" href="#">⚙️ Configuración</a></li>
                        <li><a class="dropdown-item" href="#">📧 Mensajes</a></li>
                        <li><a class="dropdown-item" href="#">🔔 Notificaciones</a></li>
                        {{-- CAMBIO AQUÍ: Enlace a la página de ayuda --}}
                        <li><a class="dropdown-item" href="{{ route('ayuda') }}">❓ Ayuda</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="dropdown-item">🚪 Cerrar Sesión</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 bg-light py-4">
                <div class="list-group">
                    <a href="{{ route('usuario') }}" class="list-group-item list-group-item-action active">
                        🏠 Dashboard
                    </a>
                    <a href="{{ route('promociones') }}" class="list-group-item list-group-item-action">
                        📋 Promociones Electrónicas
                    </a>
                    <a href="{{ route('expedientes') }}" class="list-group-item list-group-item-action">
                        📁 Mis Expedientes
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        📧 Notificaciones
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        📊 Reportes
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        ⚙️ Configuración
                    </a>
                </div>

                <div class="mt-4">
                    <h6 class="text-muted">SERVICIOS RÁPIDOS</h6>
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary btn-sm">Nueva Promoción</button>
                        <button class="btn btn-outline-primary btn-sm">Consultar Expediente</button>
                        <button class="btn btn-outline-primary btn-sm">Ver Notificaciones</button>
                    </div>
                </div>
            </div>

            <div class="col-md-9 py-4">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="user-welcome text-white p-4 rounded mb-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h2>¡Bienvenido, {{ Auth::user()->name }}! 👋</h2>
                            <p class="mb-0">Panel de Control del Tribunal Electrónico</p>
                            <small>Último acceso: {{ now()->format('d/m/Y H:i:s') }}</small>
                        </div>
                        <div class="col-md-4 text-end">
                            <div class="bg-white bg-opacity-20 p-3 rounded">
                                <h5 class="mb-0">{{ now()->format('d') }}</h5>
                                <small>{{ now()->format('M Y') }}</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card stats-card border-primary">
                            <div class="card-body text-center">
                                <div class="display-4 text-primary">📋</div>
                                <h5 class="card-title">Promociones</h5>
                                <h3 class="text-primary">0</h3>
                                <small class="text-muted">Promociones activas</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stats-card border-success">
                            <div class="card-body text-center">
                                <div class="display-4 text-success">📁</div>
                                <h5 class="card-title">Expedientes</h5>
                                <h3 class="text-success">0</h3>
                                <small class="text-muted">Expedientes asignados</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stats-card border-warning">
                            <div class="card-body text-center">
                                <div class="display-4 text-warning">📧</div>
                                <h5 class="card-title">Notificaciones</h5>
                                <h3 class="text-warning">0</h3>
                                <small class="text-muted">Sin leer</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stats-card border-info">
                            <div class="card-body text-center">
                                <div class="display-4 text-info">✅</div>
                                <h5 class="card-title">Completadas</h5>
                                <h3 class="text-info">0</h3>
                                <small class="text-muted">Este mes</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">📋 Promociones Electrónicas Recientes</h5>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-info">
                                    <h6>ℹ️ Información importante</h6>
                                    <p class="mb-2">El Pleno del Consejo de la Judicatura del Estado, en sesión extraordinaria del 8 de enero de 2021, determinó prorrogar los efectos del Acuerdo General 15/2020 que reactiva los plazos y términos procesales a través de la impartición de justicia en línea.</p>
                                    <p class="mb-0">Durante dicho período, el Tribunal Electrónico recibirá promociones de los procedimientos judiciales únicamente en días hábiles y durante el horario de las 8:00 a las 24:00 horas; sin embargo, los usuarios podrán consultar sus expedientes y notificaciones electrónicas en días inhábiles y en cualquier horario.</p>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-hover">
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
                                            <tr>
                                                <td class="text-muted">No hay promociones registradas</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="text-center mt-3">
                                    <a href="{{ route('promociones') }}" class="btn btn-primary">Ver Todas las Promociones</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header bg-success text-white">
                                <h5 class="mb-0">🚀 Acciones Rápidas</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-outline-primary">
                                        📝 Nueva Promoción Electrónica
                                    </button>
                                    <button class="btn btn-outline-success">
                                        🔍 Consultar Expediente
                                    </button>
                                    <button class="btn btn-outline-info">
                                        📧 Ver Notificaciones
                                    </button>
                                    <button class="btn btn-outline-warning">
                                        📊 Generar Reporte
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header bg-info text-white">
                                <h5 class="mb-0">📊 Estado del Sistema</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    El sistema se encuentra <strong>operativo</strong>.
                                </p>
                                <p class="card-text">
                                    Tiempo de actividad: <span class="text-success">99.9%</span>
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

    <footer class="bg-light text-center text-lg-start mt-4 py-3">
        <div class="container">
            <p class="mb-0 text-muted">
                &copy; {{ date('Y') }} Tribunal Electrónico - Poder Judicial de Tamaulipas. Todos los derechos reservados.
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
