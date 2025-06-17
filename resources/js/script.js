document.addEventListener('DOMContentLoaded', () => {
    // Aquí es donde añadirías JavaScript para el comportamiento dinámico.

    // Ejemplo: Resaltar el enlace activo de la barra lateral
    const sidebarLinks = document.querySelectorAll('.sidebar ul li a');
    sidebarLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // e.preventDefault(); // Descomentar si no quieres que el enlace navegue inmediatamente
            sidebarLinks.forEach(innerLink => innerLink.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // Ejemplo: Envío de formulario simple (solo para demostración, no enviará datos realmente)
    const loginForm = document.querySelector('.login-form');
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault(); // Previene el envío real del formulario
            alert('¡Botón de Iniciar Sesión clicado! (Esto es una demostración)');
            // En una aplicación real, enviarías datos a un servidor aquí
        });
    }

    const registerButton = document.querySelector('.register-button');
    if (registerButton) {
        registerButton.addEventListener('click', function() {
            alert('¡Botón de Registrarse clicado! (Esto es una demostración)');
            // En una aplicación real, redirigirías o abrirías un formulario de registro
        });
    }

    // Aquí puedes añadir JS más complejo para:
    // - Manejar clics en "Ver Acuerdo", "Ver Video", "Ver Tutorial" (por ejemplo, abrir modales)
    // - Cualquier validación de formularios
    // - Animaciones o elementos interactivos
});