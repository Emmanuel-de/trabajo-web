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
                        <a href="#" class="list-group-item list-group-item-action">
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

                    <!-- Sección de Creación de Reportes -->
                    <div class="form-container">
                        <h2 class="text-2xl font-bold text-center mb-4 text-dark">
                            <i class="fas fa-plus-circle me-2"></i>Crear Nuevo Reporte
                        </h2>
                        
                        <form id="report-form">
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
                                    <!-- Aquí se insertarán las filas de la tabla dinámicamente -->
                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-4">
                                            <i class="fas fa-file-alt me-2"></i>
                                            No hay reportes creados aún. Utiliza el formulario superior para crear tu primer reporte.
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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

        // Añadir un "event listener" para el envío del formulario
        form.addEventListener('submit', function(event) {
            // Prevenir el comportamiento por defecto del formulario (recargar la página)
            event.preventDefault();

            // Obtener los valores del formulario
            const title = document.getElementById('report-title').value;
            const description = document.getElementById('report-description').value;
            const date = document.getElementById('report-date').value;
            const type = document.getElementById('report-type').value;

            // Limpiar la fila de "no hay reportes" si existe
            const noReportsRow = tableBody.querySelector('tr td[colspan="5"]');
            if (noReportsRow) {
                noReportsRow.parentElement.remove();
            }

            // Crear una nueva fila para la tabla
            const newRow = document.createElement('tr');

            // Formatear la fecha para mostrar
            const formattedDate = new Date(date).toLocaleDateString('es-ES', {
                year: 'numeric',
                month: 'short',
                day: 'numeric'
            });

            // Formatear el tipo de reporte
            const typeLabels = {
                'expedientes': 'Expedientes',
                'promociones': 'Promociones',
                'estadisticas': 'Estadísticas',
                'general': 'General'
            };

            // Llenar la nueva fila con los datos del reporte
            newRow.innerHTML = `
                <td class="px-3 py-3 text-muted">#${reportIdCounter.toString().padStart(3, '0')}</td>
                <td class="px-3 py-3 font-weight-bold text-dark">${title}</td>
                <td class="px-3 py-3">
                    <span class="badge bg-secondary">${typeLabels[type]}</span>
                </td>
                <td class="px-3 py-3 text-muted">${formattedDate}</td>
                <td class="px-3 py-3">
                    <a href="#" class="action-link" onclick="viewReport(${reportIdCounter}, '${title}', '${description}')">
                        <i class="fas fa-eye me-1"></i>Ver
                    </a>
                    <a href="#" class="action-link" onclick="editReport(${reportIdCounter})">
                        <i class="fas fa-edit me-1"></i>Editar
                    </a>
                    <a href="#" class="action-link delete" onclick="deleteReport(this, ${reportIdCounter})">
                        <i class="fas fa-trash me-1"></i>Eliminar
                    </a>
                </td>
            `;

            // Agregar la nueva fila al cuerpo de la tabla
            tableBody.appendChild(newRow);

            // Mostrar mensaje de éxito
            showAlert('success', 'Reporte creado exitosamente!');

            // Incrementar contador y limpiar formulario
            reportIdCounter++;
            form.reset();
            document.getElementById('report-date').valueAsDate = new Date();
        });

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

        // Función para ver reporte (placeholder)
        function viewReport(id, title, description) {
            alert(`Ver Reporte #${id}\nTítulo: ${title}\nDescripción: ${description}`);
        }

        // Función para editar reporte (placeholder)
        function editReport(id) {
            alert(`Editar reporte #${id} - Esta funcionalidad se implementará próximamente`);
        }

        // Función para eliminar reporte
        function deleteReport(element, id) {
            if (confirm(`¿Está seguro que desea eliminar el reporte #${id}?`)) {
                element.closest('tr').remove();
                showAlert('warning', `Reporte #${id} eliminado correctamente`);
                
                // Si no quedan reportes, mostrar mensaje
                if (tableBody.children.length === 0) {
                    const emptyRow = document.createElement('tr');
                    emptyRow.innerHTML = `
                        <td colspan="5" class="text-center text-muted py-4">
                            <i class="fas fa-file-alt me-2"></i>
                            No hay reportes creados aún. Utiliza el formulario superior para crear tu primer reporte.
                        </td>
                    `;
                    tableBody.appendChild(emptyRow);
                }
            }
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