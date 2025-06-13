<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tribunal Electrónico - Poder Judicial</title>
    @vite(['resources/css/style.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header class="main-header">
        <div class="header-content">
            <div class="logo">
                <img src="https://i.imgur.com/kS9lY4v.png" alt="Logo Tribunal Electrónico">
            </div>
            <nav class="top-nav">
                <ul>
                    <li><a href="#"><i class="fas fa-home"></i> Inicio</a></li>
                    <li><a href="#"><i class="fas fa-envelope"></i> Buzón</a></li>
                    <li><a href="#"><i class="fas fa-question-circle"></i> Ayuda</a></li>
                </ul>
            </nav>
        </div>
        <div class="banner">
            <p>IR A LA PÁGINA OFICIAL DEL PODER JUDICIAL TAMAULIPAS</p>
        </div>
    </header>

    <main class="main-container">
        <aside class="sidebar">
            <div class="sidebar-section active">
                <a href="#" class="sidebar-title"><i class="fas fa-book"></i> BOLETÍN JUDICIAL</a>
                <ul>
                    <li><a href="#"><i class="fas fa-unlock-alt"></i> Acceso Libre</a></li>
                    <li><a href="#"><i class="fas fa-list-alt"></i> Listas de Acuerdos</a></li>
                    <li><a href="#"><i class="fas fa-dice"></i> Sorteo de Pleno</a></li>
                    <li><a href="#"><i class="fas fa-scroll"></i> Edictos</a></li>
                </ul>
            </div>
        </aside>

        <section class="content-area">
            <div class="button-group top-buttons">
                <button class="button active">PREGUNTAS FRECUENTES</button>
                <button class="button">UBICACIÓN DE BUZONES</button>
                <button class="button">DIRECTORIO TELEFÓNICO</button>
                <button class="button active">EXPEDIENTE ELECTRÓNICO</button>
            </div>

            <div class="main-content-grid">
                <div class="left-column">
                    <div class="card electronic-service">
                        <h2>¡NUEVO SERVICIO ELECTRÓNICO!</h2>
                        <div class="service-details">
                            <img src="https://i.imgur.com/bZ6W6G1.png" alt="Ícono Servicio Electrónico" class="service-icon">
                            <div class="service-text">
                                <p>Pliego de Posiciones protegido por <strong>CONTRASEÑA</strong></p>
                                <p>Conozca como enviar sus Pliegos de Posiciones de manera <span class="highlight">SEGURA</span>:</p>
                                <button class="action-button">VER ACUERDO</button>
                                <button class="action-button">VER VIDEO</button>
                                <button class="action-button">VER TUTORIAL</button>
                            </div>
                        </div>
                    </div>

                    <div class="card registration-card">
                        <h2>REGISTRO DE USUARIOS <br> Y <br> FIRMA ELECTRÓNICA AVANZADA</h2>
                        <img src="https://i.imgur.com/v8tT4d3.png" alt="Imagen de Registro" class="registration-image">
                        <div class="distance-info">
                            <p>A DISTANCIA</p>
                            <a href="#" class="click-here-link">CLICK AQUÍ</a>
                        </div>
                    </div>

                    <div class="formats-section">
                        <h3><i class="fas fa-file-alt"></i> Formatos</h3>
                        <ul>
                            <li>> EJEMPLOS DE PROMOCIÓN SOLICITANDO MEDIOS ELECTRÓNICOS.</li>
                            <li>> EJEMPLOS DE PROMOCIÓN SOLICITANDO MEDIOS ELECTRÓNICOS (ORALIDAD PENAL).</li>
                            <li>> EJEMPLOS DE PROMOCIÓN SOLICITANDO SE PUBLIQUE ACUERDO.</li>
                            <li>> EJEMPLO DE PROMOCIÓN SOLICITANDO SE PUBLIQUE ACUERDO (MISMO PLENAL).</li>
                            <li>> EJEMPLO DE PROMOCIÓN SOLICITANDO SE PUBLIQUE NOTIFICACIÓN PERSONAL ELECTRÓNICA.</li>
                            <li>> EJEMPLO DE PROMOCIÓN SOLICITANDO ENVIAR PROMOCIÓN ELECTRÓNICA.</li>
                        </ul>
                    </div>

                    <div class="information-section">
                        <h3><i class="fas fa-info-circle"></i> Información</h3>
                        <ul>
                            <li>> PROCEDIMIENTO PARA CONSULTA DEL EXPEDIENTE ELECTRÓNICO.</li>
                            <li>> FUNCIONALIDADES DEL TRIBUNAL ELECTRÓNICO.</li>
                            <li>> PROCEDIMIENTO PARA PROMOCIÓN ELECTRÓNICA.</li>
                        </ul>
                    </div>
                </div>

                <div class="right-column">
                    <div class="card login-card">
                        <h3><i class="fas fa-user-circle"></i> EXPEDIENTE ELECTRÓNICO</h3>
                        <form class="login-form">
                            <div class="input-group">
                                <i class="fas fa-user"></i>
                                <input type="text" placeholder="Usuario:" aria-label="Usuario">
                            </div>
                            <div class="input-group">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Contraseña:" aria-label="Contraseña">
                            </div>
                            <button type="submit" class="enter-button">ENTRAR</button>
                        </form>
                        <p class="forgot-password"><a href="#">¿OLVIDÓ SU CONTRASEÑA? CLICK AQUÍ</a></p>
                    </div>

                    <div class="card register-users">
                        <h3><i class="fas fa-user-plus"></i> Registro de usuarios</h3>
                        <img src="https://i.imgur.com/vHqQ9Y6.png" alt="Imagen de Registro Principal" class="register-image-main">
                        <button class="register-button">REGÍSTRESE AQUÍ</button>
                    </div>

                    <div class="card resend-receipt">
                        <h3><i class="fas fa-receipt"></i> Reenviar comprobante de registro</h3>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="main-footer">
        <div class="footer-content">
            <div class="footer-left">
                <img src="https://i.imgur.com/kS9lY4v.png" alt="Logo Poder Judicial">
                <p>PODER JUDICIAL</p>
                <p>TRIBUNAL ELECTRÓNICO</p>
            </div>
            <div class="footer-center">
                <p>&copy; Derechos Reservados Poder Judicial Tamaulipas 2025</p>
            </div>
            <div class="footer-right">
                <h4>CONTACTO</h4>
                <p>Dirección: Boulevard Práxedis Balboa # 2207</p>
                <p>entre López Velarde y Díaz Mirón</p>
                <p>Col. Miguel Hidalgo C.P. 87090,</p>
                <p>tribunalelectronico@pjtamaulipas.gob.mx</p>
                <p>Cd. Victoria, Tamaulipas.</p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
    @vite(['resources/js/app.js'])
</body>
</html>