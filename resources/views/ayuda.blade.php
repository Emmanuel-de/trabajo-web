<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayuda y Soporte - Tribunal Electrónico</title>
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
        
        .help-container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            padding: 30px;
        }
        
        .help-section {
            margin-bottom: 30px;
            padding: 25px;
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
        
        .contact-card {
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            transition: all 0.3s;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .contact-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        
        .contact-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: white;
            margin-bottom: 15px;
        }
        
        .icon-phone { background: linear-gradient(135deg, #28a745 0%, #20c997 100%); }
        .icon-email { background: linear-gradient(135deg, #007bff 0%, #0056b3 100%); }
        .icon-location { background: linear-gradient(135deg, #fd7e14 0%, #e65100 100%); }
        .icon-time { background: linear-gradient(135deg, #6f42c1 0%, #5a2d82 100%); }
        .icon-emergency { background: linear-gradient(135deg, #dc3545 0%, #c82333 100%); }
        
        .btn-primary {
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            border: none;
            padding: 12px 30px;
            border-radius: 5px;
            font-weight: 500;
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
            border: none;
            padding: 12px 30px;
            border-radius: 5px;
            font-weight: 500;
        }
        
        .welcome-banner {
            background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
            color: white;
            padding: 25px;
            border-radius: 8px;
            margin-bottom: 30px;
        }
        
        .help-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.5rem;
        }
        
        .info-badge {
            background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
            display: inline-block;
            margin-bottom: 10px;
        }
        
        .urgent-notice {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 25px;
            border-left: 5px solid #fff;
        }
        
        .faq-item {
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            margin-bottom: 15px;
            overflow: hidden;
        }
        
        .faq-header {
            background: #f8f9fa;
            padding: 15px 20px;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .faq-header:hover {
            background: #e9ecef;
        }
        
        .faq-content {
            padding: 20px;
            display: none;
        }
        
        .faq-content.show {
            display: block;
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
                        {{-- CAMBIO AQUÍ: Usar $user->name en lugar de $user->nombre --}}
                        <span class="me-3">Bienvenido, {{ $user->name ?? 'Usuario' }}</span>
                        <div class="dropdown">
                            <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                {{-- CAMBIO AQUÍ: Usar $user->name en lugar de $user->nombre --}}
                                {{ $user->name ?? 'Usuario' }}
                            </button>
                            <ul class="dropdown-menu">
                                {{-- Enlaces actualizados para usar nombres de ruta consistentes --}}
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
                    {{-- Enlaces actualizados para usar nombres de ruta consistentes --}}
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
                    <a href="{{ route('perfil') }}" class="nav-link">
                        <i class="fas fa-user me-2"></i> Mi Perfil
                    </a>
                    <a href="#" class="nav-link">
                        <i class="fas fa-cog me-2"></i> Configuración
                    </a>
                    <a href="{{ route('ayuda') }}" class="nav-link active">
                        <i class="fas fa-question-circle me-2"></i> Ayuda
                    </a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 p-4">
                <!-- Welcome Banner -->
                <div class="welcome-banner">
                    <div class="row align-items-center">
                        <div class="col-md-1">
                            <div class="help-avatar">
                                <i class="fas fa-headset"></i>
                            </div>
                        </div>
                        <div class="col-md-11">
                            <h3 class="mb-1">Centro de Ayuda y Soporte Técnico</h3>
                            <p class="mb-0">Encuentra la asistencia que necesitas para el uso del Tribunal Electrónico</p>
                        </div>
                    </div>
                </div>

                <!-- Urgent Notice -->
                <div class="urgent-notice">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-exclamation-triangle me-3" style="font-size: 1.5rem;"></i>
                        <div>
                            <h6 class="mb-1">Aviso Importante</h6>
                            <p class="mb-0">En caso de emergencia técnica durante horarios no laborables, contacte al número de emergencia. Para consultas generales, utilice los medios de contacto regulares.</p>
                        </div>
                    </div>
                </div>

                <!-- Help Container -->
                <div class="help-container">
                    
                    <!-- Contacto Directo -->
                    <div class="help-section">
                        <h5 class="section-title">
                            <i class="fas fa-phone-alt me-2"></i>Contacto Directo de Soporte Técnico
                        </h5>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="contact-card">
                                    <div class="contact-icon icon-phone">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <h6 class="fw-bold">Mesa de Ayuda Principal</h6>
                                    <div class="info-badge">Línea Directa</div>
                                    <p class="mb-2"><strong>Teléfono:</strong> (834) 318-1800</p>
                                    <p class="mb-2"><strong>Extensión:</strong> 1025</p>
                                    <p class="mb-0 text-muted">Atención personalizada para resolver problemas técnicos</p>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="contact-card">
                                    <div class="contact-icon icon-emergency">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </div>
                                    <h6 class="fw-bold">Emergencias Técnicas</h6>
                                    <div class="info-badge">24/7</div>
                                    <p class="mb-2"><strong>Teléfono:</strong> (834) 318-1800</p>
                                    <p class="mb-2"><strong>Extensión:</strong> 1000</p>
                                    <p class="mb-0 text-muted">Solo para emergencias críticas del sistema</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="contact-card">
                                    <div class="contact-icon icon-email">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <h6 class="fw-bold">Soporte por Email</h6>
                                    <div class="info-badge">Respuesta en 24hrs</div>
                                    <p class="mb-2"><strong>Email:</strong> soporte.tribunalelectronico@pjtam.gob.mx</p>
                                    <p class="mb-2"><strong>Email Alternativo:</strong> mesadeayuda@pjtam.gob.mx</p>
                                    <p class="mb-0 text-muted">Para consultas detalladas y seguimiento de casos</p>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="contact-card">
                                    <div class="contact-icon icon-time">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <h6 class="fw-bold">Horarios de Atención</h6>
                                    <div class="info-badge">Lunes a Viernes</div>
                                    <p class="mb-2"><strong>Horario:</strong> 8:00 AM - 5:00 PM</p>
                                    <p class="mb-2"><strong>Zona Horaria:</strong> Centro (GMT-6)</p>
                                    <p class="mb-0 text-muted">Atención presencial y telefónica</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Información de Ubicación -->
                    <div class="help-section">
                        <h5 class="section-title">
                            <i class="fas fa-map-marker-alt me-2"></i>Ubicación de Oficinas
                        </h5>
                        
                        <div class="contact-card">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <div class="contact-icon icon-location">
                                        <i class="fas fa-building"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <h6 class="fw-bold">Departamento de Sistemas - Poder Judicial de Tamaulipas</h6>
                                    <p class="mb-2"><strong>Dirección:</strong> Palacio de Justicia, Calle 13 y 14, Zona Centro</p>
                                    <p class="mb-2"><strong>Ciudad:</strong> Ciudad Victoria, Tamaulipas, México</p>
                                    <p class="mb-2"><strong>Código Postal:</strong> 87000</p>
                                    <p class="mb-0"><strong>Piso:</strong> Planta Baja, Ala Oriente</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Preguntas Frecuentes -->
                    <div class="help-section">
                        <h5 class="section-title">
                            <i class="fas fa-question-circle me-2"></i>Preguntas Frecuentes
                        </h5>
                        
                        <div class="faq-item">
                            <div class="faq-header" onclick="toggleFaq(this)">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">¿Cómo puedo resetear mi contraseña?</h6>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                            <div class="faq-content">
                                <p>Para resetear su contraseña, puede:</p>
                                <ul>
                                    <li>Utilizar la opción "¿Olvidaste tu contraseña?" en la página de inicio de sesión</li>
                                    <li>Contactar a mesa de ayuda al (834) 318-1800 ext. 1025</li>
                                    <li>Enviar un correo a soporte.tribunalelectronico@pjtam.gob.mx</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="faq-item">
                            <div class="faq-header" onclick="toggleFaq(this)">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">¿Qué navegadores son compatibles?</h6>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                            <div class="faq-content">
                                <p>El Tribunal Electrónico es compatible con:</p>
                                <ul>
                                    <li>Google Chrome (versión 90 o superior)</li>
                                    <li>Mozilla Firefox (versión 88 o superior)</li>
                                    <li>Microsoft Edge (versión 90 o superior)</li>
                                    <li>Safari (versión 14 o superior)</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="faq-item">
                            <div class="faq-header" onclick="toggleFaq(this)">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">¿Cómo puedo subir documentos al sistema?</h6>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                            <div class="faq-content">
                                <p>Para subir documentos:</p>
                                <ol>
                                    <li>Acceda a la sección "Promociones Electrónicas"</li>
                                    <li>Seleccione "Nueva Promoción"</li>
                                    <li>Complete los campos requeridos</li>
                                    <li>Adjunte sus documentos en formato PDF</li>
                                    <li>Verifique la información antes de enviar</li>
                                </ol>
                            </div>
                        </div>
                        
                        <div class="faq-item">
                            <div class="faq-header" onclick="toggleFaq(this)">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">¿Qué hago si el sistema está lento?</h6>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                            <div class="faq-content">
                                <p>Si experimenta lentitud en el sistema:</p>
                                <ul>
                                    <li>Verifique su conexión a internet</li>
                                    <li>Cierre otras pestañas del navegador</li>
                                    <li>Limpie el caché del navegador</li>
                                    <li>Reinicie el navegador</li>
                                    <li>Si persiste, contacte a soporte técnico</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Botones de Acción -->
                    <div class="text-center mt-4">
                        {{-- CAMBIO AQUÍ: Usar 'usuario' para el enlace al Dashboard --}}
                        <a href="{{ route('usuario') }}" class="btn btn-primary me-3">
                            <i class="fas fa-arrow-left me-2"></i>Regresar al Dashboard
                        </a>
                        <a href="mailto:soporte.tribunalelectronico@pjtam.gob.mx" class="btn btn-secondary">
                            <i class="fas fa-envelope me-2"></i>Enviar Consulta por Email
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleFaq(element) {
            const content = element.nextElementSibling;
            const icon = element.querySelector('.fa-chevron-down');
            
            if (content.classList.contains('show')) {
                content.classList.remove('show');
                icon.style.transform = 'rotate(0deg)';
            } else {
                // Cerrar otros FAQs
                document.querySelectorAll('.faq-content.show').forEach(item => {
                    item.classList.remove('show');
                });
                document.querySelectorAll('.fa-chevron-down').forEach(icon => {
                    icon.style.transform = 'rotate(0deg)';
                });
                
                // Abrir el FAQ actual
                content.classList.add('show');
                icon.style.transform = 'rotate(180deg)';
            }
        }

        // Smooth scroll para enlaces internos
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>

