<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Registro de Usuario - Tribunal Electrónico - Poder Judicial Tamaulipas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            border-radius: 0.5rem;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
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

        /* Contenido principal: formulario de registro */
        .registration-form-container {
            display: flex;
            justify-content: center;
            align-items: flex-start; /* Alinea al inicio para formularios largos */
            padding: 20px 0;
        }
        .registration-card {
            max-width: 900px; /* Ancho máximo para el formulario */
            width: 100%;
            background-color: white;
            padding: 2.5rem; /* Aumentar padding para que no se vea apretado */
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        .section-header {
            color: #1f5582;
            font-weight: bold;
            border-bottom: 2px solid #1f5582; /* Línea azul debajo del título de sección */
            padding-bottom: 0.5rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between; /* Para el botón "REGRESAR" */
        }
        .form-group label {
            font-weight: 600; /* Un poco más de peso para las etiquetas */
            margin-bottom: 0.5rem;
            display: block; /* Asegura que la etiqueta esté en su propia línea */
        }
        .form-control, .form-select {
            border-radius: 0.5rem; /* Bordes redondeados para inputs y selects */
            padding: 0.75rem 1rem; /* Aumentar padding para mejor estética */
        }
        /* Estilos para los errores de validación de Laravel */
        .text-danger {
            color: #dc3545;
            font-size: 0.875em;
            margin-top: 0.25rem;
        }
        .form-group .row > div {
            margin-bottom: 1rem; /* Espacio entre columnas en grupos de 2 */
        }
        .form-group .row > div:last-child {
            margin-bottom: 0;
        }
        @media (min-width: 768px) {
            .form-group .row > div {
                margin-bottom: 0;
            }
        }
        .radio-group label {
            font-weight: normal !important; /* Resetear el bold para las etiquetas de radio */
            display: inline-block !important; /* Permitir que las radios estén en línea */
            margin-right: 1.5rem; /* Espacio entre opciones de radio */
        }
        .radio-group input[type="radio"] {
            margin-right: 0.5rem;
        }

        /* Estilos del pie de página */
        footer {
            background-color: #343a40; /* Color de fondo oscuro, similar al de la imagen */
            color: white;
            padding: 30px 0;
            margin-top: auto; /* Empuja el footer hacia la parte inferior de la página */
        }
        footer .footer-logo img {
            max-height: 80px; /* Tamaño del logo en el pie de página */
            margin-bottom: 15px;
        }
        footer p, footer small, footer a {
            color: #ccc; /* Color de texto más claro para contraste */
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
        <nav class="navbar navbar-expand-lg navbar-dark header-navbar">
            <div class="container">
                <a class="navbar-brand" href="{{ route('homepage') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Tribunal Electrónico">
                    <div>
                        TRIBUNAL ELECTRÓNICO
                        <small>PODER JUDICIAL TAMAULIPAS</small>
                    </div>
                </a>
                <div class="navbar-nav ms-auto">
                    <a class="nav-item nav-link" href="{{ route('homepage') }}">🏠 Inicio</a>
                    <a class="nav-item nav-link" href="{{ route('buzon') }}">📧 Buzón</a>
                    <a class="nav-item nav-link" href="{{ route('homeayuda') }}">❓ Ayuda</a>
                    </div>
            </div>
        </nav>

        <div class="bg-primary text-white text-center py-2">
            <small>IR A LA PÁGINA OFICIAL DEL PODER JUDICIAL TAMAULIPAS</small>
        </div>

        <div class="container-fluid registration-form-container">
            <div class="registration-card my-4">
                <h2 class="section-header">
                    REGISTRO A DISTANCIA PARA EL TRIBUNAL ELECTRÓNICO (USUARIO Y FELAVPI)
                    <a href="{{ route('homepage') }}" class="btn btn-outline-primary rounded-md btn-sm">REGRESAR</a>
                </h2>

                <p class="mb-4 text-muted">Favor de llenar los siguientes datos. Los campos marcados con asterisco (*) son obligatorios.</p>

                {{-- Apertura del formulario Laravel --}}
                <form method="POST" action="{{ route('registro.store') }}">
                    @csrf {{-- Token CSRF por seguridad --}}

                    <div class="mb-5">
                        <h4 class="text-primary mb-3"><i class="fas fa-user-circle me-2"></i>Personal</h4>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="nombre">Nombre*</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required value="{{ old('nombre') }}">
                                @error('nombre') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="apellido_paterno">Apellido Paterno*</label>
                                <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" required value="{{ old('apellido_paterno') }}">
                                @error('apellido_paterno') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="apellido_materno">Apellido Materno</label>
                                <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" value="{{ old('apellido_materno') }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="genero">Género*</label>
                                <select class="form-select" id="genero" name="genero" required>
                                    <option value="">Seleccione</option>
                                    <option value="masculino" {{ old('genero') == 'masculino' ? 'selected' : '' }}>Masculino</option>
                                    <option value="femenino" {{ old('genero') == 'femenino' ? 'selected' : '' }}>Femenino</option>
                                    <option value="otro" {{ old('genero') == 'otro' ? 'selected' : '' }}>Otro</option>
                                </select>
                                @error('genero') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="escolaridad">Escolaridad*</label>
                                <select class="form-select" id="escolaridad" name="escolaridad" required>
                                    <option value="">Seleccione</option>
                                    <option value="primaria" {{ old('escolaridad') == 'primaria' ? 'selected' : '' }}>Primaria</option>
                                    <option value="secundaria" {{ old('escolaridad') == 'secundaria' ? 'selected' : '' }}>Secundaria</option>
                                    <option value="bachillerato" {{ old('escolaridad') == 'bachillerato' ? 'selected' : '' }}>Bachillerato</option>
                                    <option value="licenciatura" {{ old('escolaridad') == 'licenciatura' ? 'selected' : '' }}>Licenciatura</option>
                                    <option value="posgrado" {{ old('escolaridad') == 'posgrado' ? 'selected' : '' }}>Posgrado</option>
                                </select>
                                @error('escolaridad') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h4 class="text-primary mb-3"><i class="fas fa-phone-alt me-2"></i>Teléfonos</h4>
                        <p class="text-muted">Para brindarle una mejor atención, le sugerimos ingresar por lo menos un número de teléfono. Ingresar los 10 dígitos correspondientes a su(s) número(s).</p>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="telefono_oficina">Teléfono Oficina</label>
                                <input type="text" class="form-control" id="telefono_oficina" name="telefono_oficina" maxlength="10" value="{{ old('telefono_oficina') }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="extension">Extensión</label>
                                <input type="text" class="form-control" id="extension" name="extension" value="{{ old('extension') }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="telefono_particular">Teléfono Particular</label>
                                <input type="text" class="form-control" id="telefono_particular" name="telefono_particular" maxlength="10" value="{{ old('telefono_particular') }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="telefono_celular">Teléfono Celular</label>
                                <input type="text" class="form-control" id="telefono_celular" name="telefono_celular" maxlength="10" value="{{ old('telefono_celular') }}">
                            </div>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h4 class="text-primary mb-3"><i class="fas fa-home me-2"></i>Domicilio</h4>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="calle">Calle*</label>
                                <input type="text" class="form-control" id="calle" name="calle" required value="{{ old('calle') }}">
                                @error('calle') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="numero">Número*</label>
                                <input type="text" class="form-control" id="numero" name="numero" required value="{{ old('numero') }}">
                                @error('numero') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-12 form-group">
                                <label for="entre_calles">Entre Calles</label>
                                <input type="text" class="form-control" id="entre_calles" name="entre_calles" value="{{ old('entre_calles') }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="colonia">Colonia</label>
                                <input type="text" class="form-control" id="colonia" name="colonia" value="{{ old('colonia') }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="codigo_postal">Código Postal</label>
                                <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" maxlength="5" value="{{ old('codigo_postal') }}">
                            </div>
                            <div class="col-12 form-group">
                                <label class="mb-2">País</label>
                                <div class="radio-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="pais_mexico" name="pais" value="México" {{ old('pais', 'México') == 'México' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="pais_mexico">MÉXICO</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="pais_otro" name="pais" value="Otro" {{ old('pais') == 'Otro' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="pais_otro">OTRO</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="estado">Estado*</label>
                                <select class="form-select" id="estado" name="estado" required>
                                    <option value="">Seleccione un Estado</option>
                                    <option value="Tamaulipas" {{ old('estado') == 'Tamaulipas' ? 'selected' : '' }}>Tamaulipas</option>
                                    <option value="Nuevo León" {{ old('estado') == 'Nuevo León' ? 'selected' : '' }}>Nuevo León</option>
                                    <option value="San Luis Potosí" {{ old('estado') == 'San Luis Potosí' ? 'selected' : '' }}>San Luis Potosí</option>
                                    <option value="Veracruz" {{ old('estado') == 'Veracruz' ? 'selected' : '' }}>Veracruz</option>
                                    <option value="Coahuila" {{ old('estado') == 'Coahuila' ? 'selected' : '' }}>Coahuila</option>
                                    <option value="Hidalgo" {{ old('estado') == 'Hidalgo' ? 'selected' : '' }}>Hidalgo</option>
                                    <option value="Puebla" {{ old('estado') == 'Puebla' ? 'selected' : '' }}>Puebla</option>
                                </select>
                                @error('estado') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="municipio">Municipio*</label>
                                <select class="form-select" id="municipio" name="municipio" required>
                                    <option value="">Seleccione</option>
                                    {{-- Los municipios se cargarán aquí dinámicamente con JavaScript --}}
                                </select>
                                @error('municipio') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h4 class="text-primary mb-3"><i class="fas fa-lock me-2"></i>Cuenta</h4>
                        <p class="text-muted">El correo electrónico que aquí registre, servirá como nombre de usuario para acceder a su sesión en el Tribunal Electrónico. Debe ser un correo electrónico válido en el que pueda recibir mensajes.</p>
                        <div class="form-group">
                            <label for="correo_electronico">Correo Electrónico*</label>
                            <input type="email" class="form-control" id="correo_electronico" name="email" required value="{{ old('email') }}">
                            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña (para mi usuario del Tribunal Electrónico)*</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirme su Contraseña*</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-user-plus me-2"></i> Registrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div> <footer>
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
        document.addEventListener('DOMContentLoaded', function() {
            const estadoSelect = document.getElementById('estado');
            const municipioSelect = document.getElementById('municipio');

            const municipiosPorEstado = {
                "Tamaulipas": [
                    "Abasolo", "Aldama", "Altamira", "Antiguo Morelos", "Burgos", "Bustamante", "Camargo", "Casas", 
                    "Ciudad Madero", "Cruillas", "Gómez Farías", "González", "Güémez", "Guerrero", "Gustavo Díaz Ordaz", 
                    "Hidalgo", "Jaumave", "Jiménez", "Llera", "Mainero", "Mante", "Matamoros", "Méndez", "Mier", 
                    "Miguel Alemán", "Miquihuana", "Nuevo Laredo", "Nuevo Morelos", "Ocampo", "Padilla", "Palmillas", 
                    "Reynosa", "Río Bravo", "San Carlos", "San Fernando", "San Nicolás", "Soto la Marina", "Tampico", 
                    "Tula", "Valle Hermoso", "Victoria", "Villagrán", "Xicoténcatl"
                ],
                "Nuevo León": [
                    "Abasolo", "Agualeguas", "Allende", "Anáhuac", "Apodaca", "Aramberri", "Bustamante", "Cadereyta Jiménez", 
                    "Carmen", "Cerralvo", "China", "Ciénega de Flores", "Doctor Arroyo", "Doctor Coss", "Doctor González", 
                    "Galeana", "García", "San Pedro Garza García", "General Bravo", "General Escobedo", "General Terán", 
                    "General Treviño", "General Zaragoza", "General Zuazua", "Guadalupe", "Hidalgo", "Higueras", "Hualahuises", 
                    "Iturbide", "Juárez", "Lampazos de Naranjo", "Linares", "Marín", "Melchor Ocampo", "Mier y Noriega", 
                    "Mina", "Montemorelos", "Monterrey", "Parás", "Pesquería", "Ramones", "Rayones", "Sabinas Hidalgo", 
                    "Salinas Victoria", "San Nicolás de los Garza", "Santa Catarina", "Santiago", "Vallecillo", "Villaldama"
                ],
                "San Luis Potosí": [
                    "Ahualulco", "Alaquines", "Aquismón", "Armadillo de los Infante", "Axtla de Terrazas", "Cárdenas", 
                    "Catorce", "Cedral", "Cerritos", "Cerro de San Pedro", "Charcas", "Ciudad Fernández", "Ciudad Valles", 
                    "Coxcatlán", "Ebano", "El Naranjo", "Guadalcázar", "Huehuetlán", "Lagunillas", "Matehuala", "Matlapa", 
                    "Mexquitic de Carmona", "Moctezuma", "Rayón", "Rioverde", "Salinas", "San Antonio", "San Ciro de Acosta", 
                    "San Luis Potosí", "San Martín Chalchicuautla", "San Nicolás Tolentino", "Santa Catarina", 
                    "Santa María del Río", "Santo Domingo", "San Vicente Tancuayalab", "Soledad de Graciano Sánchez", 
                    "Tamasopo", "Tamiahua", "Tamuín", "Tancanhuitz", "Tanlajás", "Tanquián de Escobedo", "Tierra Nueva", 
                    "Vanegas", "Venado", "Villa de Arriaga", "Villa de Guadalupe", "Villa de la Paz", "Villa de Ramos", 
                    "Villa de Reyes", "Villa Hidalgo", "Villa Juárez", "Xilitla", "Zaragoza"
                ],
                "Veracruz": [
                    "Acajete", "Acatlán", "Acayucan", "Actopan", "Acula", "Acultzingo", "Agua Dulce", "Altotonga", 
                    "Alvarado", "Amatitlán", "Amatlán de los Reyes", "Angel R. Cabada", "Apazapan", "Aquila", "Astacinga", 
                    "Atlahuilco", "Atoyac", "Atzacan", "Atzalan", "Ayahualulco", "Banderilla", "Benito Juárez", "Boca del Río", 
                    "Calcahualco", "Camarón de Tejeda", "Camerino Z. Mendoza", "Carlos A. Carrillo", "Carrillo Puerto", 
                    "Castillo de Teayo", "Catemaco", "Cazones de Herrera", "Chacaltianguis", "Chalma", "Chiconamel", 
                    "Chiconquiaco", "Chicontepec", "Chinameca", "Chinampa de Gorostiza", "Chocaman", "Chontla", 
                    "Chumatlán", "Citlaltépetl", "Coacoatzintla", "Coahuitlán", "Coatepec", "Coatzacoalcos", "Coatzintla", 
                    "Coetzala", "Colipa", "Comapa", "Córdoba", "Cosamaloapan de Carpio", "Cosautlán de Carvajal", 
                    "Coscomatepec", "Cosoleacaque", "Cotaxtla", "Coxquihui", "Coyutla", "Cuichapa", "Cuitláhuac", 
                    "El Higo", "Emiliano Zapata", "Espinal", "Filomeno Mata", "Fortín", "Gutiérrez Zamora", 
                    "Hidalgotitlán", "Huatusco", "Huayacocotla", "Hueyapan de Ocampo", "Ignacio de la Llave", "Ilamatlán", 
                    "Isla", "Ixcatepec", "Ixhuacán de los Reyes", "Ixhuatlán del Café", "Ixhuatlán del Sureste", 
                    "Ixhuatlancillo", "Ixmatlahuacan", "Ixtaczoquitlán", "Jalacingo", "Jalcomulco", "Jáltipan", "Jamapa", 
                    "Jesús Carranza", "Jilotepec", "Juan Rodríguez Clara", "Juchique de Ferrer", "La Antigua", 
                    "La Perla", "Landero y Coss", "Las Choapas", "Las Minas", "Las Vigas de Ramírez", "Lerdo de Tejada", 
                    "Los Reyes", "Magdalena", "Maltrata", "Manlio Fabio Altamirano", "Mariano Escobedo", "Martínez de la Torre", 
                    "Mecatlán", "Moloacán", "Nanchital de Lázaro Cárdenas del Río", "Naolinco", "Naranjal", "Nautla", 
                    "Nogales", "Oluta", "Omealca", "Orizaba", "Otatitlán", "Oteapan", "Ozuluama de Mascareñas", "Pajapan", 
                    "Pánuco", "Papantla", "Paso de Ovejas", "Paso del Macho", "Perote", "Platón Sánchez", "Playa Vicente", 
                    "Poza Rica de Hidalgo", "Pueblo Viejo", "Puente Nacional", "Rafael Delgado", "Rafael Lucio", "Río Blanco", 
                    "Saltabarranca", "San Andrés Tenejapan", "San Andrés Tuxtla", "San Juan Evangelista", "Santiago Sochiapan", 
                    "Santiago Tuxtla", "Sayula de Alemán", "Soconusco", "Soledad Atzompa", "Soledad de Doblado", 
                    "Tatahuicapan de Juárez", "Tatatila", "Tecolutla", "Tehuipango", "Tempoal", "Tenampa", "Tenochtitlán", 
                    "Teocelo", "Tepatlaxco", "Tepetlán", "Tepetzintla", "Tequila", "Texcatepec", "Texhuacán", "Texistepec", 
                    "Tihuatlán", "Tlachichilco", "Tlacojalpan", "Tlacolulan", "Tlacotalpan", "Tlacotepec de Mejía", 
                    "Tlaltetela", "Tlapacoyan", "Tlaquilpa", "Tlilapan", "Tomatlán", "Tonayán", "Totutla", "Tres Valles", 
                    "Tuxtilla", "Ursulo Galván", "Vega de Alatorre", "Veracruz", "Villa Aldama", "Xalapa", "Xico", 
                    "Zacualpan", "Zaragoza", "Zentla", "Zongolica", "Zontecomatlán de López y Fuentes", "Zozocolco de Hidalgo"
                ],
                "Coahuila": [
                    "Abasolo", "Acuña", "Allende", "Arteaga", "Candela", "Castaños", "Cuatro Ciénegas", "Escobedo", 
                    "Francisco I. Madero", "Frontera", "General Cepeda", "Guerrero", "Hidalgo", "Jiménez", "Juárez", 
                    "Lamadrid", "Matamoros", "Monclova", "Morelos", "Múzquiz", "Nadadores", "Nava", "Ocampo", "Parras", 
                    "Piedras Negras", "Progreso", "Ramos Arizpe", "Sabinas", "Sacramento", "Saltillo", "San Buenaventura", 
                    "San Juan de Sabinas", "San Pedro", "Sierra Mojada", "Torreón", "Viesca", "Villa Unión", "Zaragoza"
                ],
                "Hidalgo": [
                    "Acatlán", "Acaxochitlán", "Actopan", "Agua Blanca de Iturbide", "Ajacuba", "Alfajayucan", 
                    "Almoloya", "Apan", "Atitalaquia", "Atlapexco", "Atotonilco de Tula", "Atotonilco el Grande", 
                    "Calnali", "Cardonal", "Cuautepec de Hinojosa", "Chapantongo", "Chapulhuacán", "Chilcuautla", 
                    "Eloxochitlán", "Emiliano Zapata", "Epazoyucan", "Francisco I. Madero", "Huautla", "Huazalingo", 
                    "Huehuetla", "Huejutla de Reyes", "Huichapan", "Ixmiquilpan", "Jacala de Ledezma", "Jaltocán", 
                    "La Misión", "Lolotla", "Metepec", "Metztitlán", "Mineral de la Reforma", "Mineral del Chico", 
                    "Mineral del Monte", "Mixquiahuala de Juárez", "Molango de Escamilla", "Nicolás Flores", 
                    "Nopala de Villagrán", "Omitlán de Juárez", "Pacula", "Pachuca de Soto", "Pisaflores", 
                    "Progreso de Obregón", "San Agustín Tlaxiaca", "San Felipe Orizatlán", "San Salvador", 
                    "Santiago de Anaya", "Santiago Tulantepec de Lugo Guerrero", "Singuilucan", "Tasquillo", 
                    "Tecozautla", "Tenango de Doria", "Tepeapulco", "Tepehuacán de Guerrero", "Tepeji del Río de Ocampo", 
                    "Tepetitlán", "Tetepango", "Tezontepec de Aldama", "Tianguistengo", "Tizayuca", "Tlahuelilpan", 
                    "Tlahuiltepa", "Tlanalapa", "Tlanchinol", "Tlaxcoapan", "Tolcayuca", "Tula de Allende", 
                    "Tulancingo de Bravo", "Villa de Tezontepec", "Xochiatipan", "Xochicoatlán", "Yahualica", 
                    "Zacualtipán de Ángeles", "Zapotlán de Juárez", "Zempoala", "Zimapan"
                ],
                "Puebla": [
                    "Acateno", "Acatlán", "Acayucan", "Acozautla de la Luz", "Acteopan", "Ahuacatlán", "Ahuatlán", 
                    "Ahuazotepec", "Ahuehuetitla", "Ajalpan", "Albino Zertuche", "Aljojuca", "Altepexi", "Amixtlán", 
                    "Amozoc", "Aquixtla", "Atempan", "Atexcal", "Atlixco", "Atoyatempan", "Atzala", "Atzitzihuacán", 
                    "Atzitzintla", "Axutla", "Ayotoxco de Guerrero", "Calpan", "Caltepec", "Camocuautla", "Cañada Morelos", 
                    "Caxhuacan", "Chalchicomula de Sesma", "Chapulco", "Chiautla", "Chiautzingo", "Chiconcuautla", 
                    "Chichiquila", "Chietla", "Chigmecatitlán", "Chignahuapan", "Chignautla", "Chila de la Sal", 
                    "Chila", "Chilchotla", "Chinantla", "Coatepec", "Coatzingo", "Cohetzala", "Cohuecán", 
                    "Coronango", "Coxcatlán", "Coyomeapan", "Coyotepec", "Cuapiaxtla de Madero", "Cuautempan", 
                    "Cuautinchan", "Cuautlancingo", "Cuayuca de Andrade", "Cuetzalan del Progreso", "Cuyoaco", 
                    "Domingo Arenas", "Eloxochitlán", "Epatlán", "Esperanza", "Francisco Z. Mena", "General Felipe Ángeles", 
                    "Guadalupe Victoria", "Guadalupe", "Hermenegildo Galeana", "Honey", "Huaquechula", "Huatlatlauca", 
                    "Huauchinango", "Huehuetla", "Huehuetlán el Chico", "Huehuetlán el Grande", "Huejotzingo", 
                    "Hueyapan", "Hueytamalco", "Hueyatlaco", "Huitzilan de Serdán", "Huitziltepec", "Ixcamilpa de Guerrero", 
                    "Ixcaquixtla", "Ixtacamaxtitlán", "Ixtepec", "Izúcar de Matamoros", "Jalpan", "Jolalpan", "Jonotla", 
                    "Jopala", "Juan C. Bonilla", "Juan Galindo", "Juan N. Méndez", "La Magdalena Tlatlauquitepec", 
                    "Libres", "Los Reyes de Juárez", "Mazapiltepec de Juárez", "Mixtla", "Molcaxac", "Naupan", 
                    "Nauzontla", "Nealtican", "Nicolás Bravo", "Nopalucan", "Ocotepec", "Oriental", "Pahuatlán", 
                    "Palmar de Bravo", "Pantepec", "Petlalcingo", "Piaxtla", "Puebla", "Quecholac", "Quimixtlán", 
                    "Rafael Lara Grajales", "San Andrés Cholula", "San Antonio Cañada", "San Diego la Mesa Tochimiltzingo", 
                    "San Felipe Teotlalcingo", "San Gabriel Chilac", "San Gregorio Atzompa", "San Jerónimo Tecuanipan", 
                    "San Jerónimo Xayacatlán", "San José Chiapa", "San José Miahuatlán", "San Juan Atzompa", 
                    "San Juan Epatlán", "San Martín Texmelucan", "San Martín Totoltepec", "San Matías Tlalancaleca", 
                    "San Miguel Ixitlán", "San Miguel Xoxtla", "San Nicolás Buenos Aires", "San Nicolás de los Ranchos", 
                    "San Pablo Anicano", "San Pedro Cholula", "San Pedro Yeloixtlahuaca", "San Salvador el Seco", 
                    "San Salvador el Verde", "San Sebastián Tlacotepec", "Santa Catarina Tlaltempan", "Santa Inés Ahuatempan", 
                    "Santa Isabel Cholula", "Santiago Miahuatlán", "Santo Tomás Hueyotlipan", "Soltepec", "Tecali de Herrera", 
                    "Tecamachalco", "Tecomatlán", "Tehuacán", "Teopantlán", "Teotlalco", "Tepanco de López", 
                    "Tepango de Rodríguez", "Tepatlaxco de Hidalgo", "Tepeaca", "Tepehuanes", "Tepeojuma", "Tepetzintla", 
                    "Tepexco", "Tepexi de Rodríguez", "Tepeyahualco", "Tepeyahualco de Cuauhtémoc", "Tetela de Ocampo", 
                    "Teteles de Ávila Castillo", "Teziutlán", "Tianguismanalco", "Tilapa", "Tlachichuca", 
                    "Tlacotepec de Benito Juárez", "Tlacuilotepec", "Tlahuapan", "Tlaltenango", "Tlanepantla", 
                    "Tlaola", "Tlapacoya", "Tlapanalá", "Tlatlauquitepec", "Tlaxco", "Tochimilco", "Tochtepec", 
                    "Totoltepec de Guerrero", "Tulcingo de Valle", "Tuzamapan de Galeana", "Tzicatlacoyan", 
                    "Venustiano Carranza", "Vicente Guerrero", "Xayacatlán de Bravo", "Xicotepec", "Xicotlán", 
                    "Xiutetelco", "Xochiapulco", "Xochiltepec", "Xochitlán de Vicente Suárez", "Xochitlán Todos Santos", 
                    "Zacapala", "Zacapoaxtla", "Zacatlán", "Zapotitlán", "Zapotitlán de Méndez", "Zaragoza", 
                    "Zautla", "Zihuateutla", "Zinacatepec", "Zongozotla", "Zoquiapan", "Zoquitlán"
                ]
            };

            // Function to populate municipalities
            function populateMunicipios(selectedEstado) {
                municipioSelect.innerHTML = '<option value="">Seleccione</option>'; // Clear current options
                if (municipiosPorEstado[selectedEstado]) {
                    municipiosPorEstado[selectedEstado].forEach(municipio => {
                        const option = document.createElement('option');
                        option.value = municipio.toLowerCase().replace(/\s/g, '_'); // Value for internal use
                        option.textContent = municipio;
                        // Keep old value if it exists and matches
                        if ("{{ old('municipio') }}" === option.value) {
                            option.selected = true;
                        }
                        municipioSelect.appendChild(option);
                    });
                }
            }

            // Event listener for state change
            estadoSelect.addEventListener('change', function() {
                populateMunicipios(this.value);
            });

            // Initial population on page load if an old value for estado exists
            if (estadoSelect.value) {
                populateMunicipios(estadoSelect.value);
            }
        });
    </script>
</body>
</html>