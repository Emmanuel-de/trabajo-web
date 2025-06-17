<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Tribunal Electrónico</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <style>
        /* Estilos básicos para propósitos de demostración.
           Deberás reemplazar esto con tu framework CSS real o estilos personalizados. */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #004d99; /* Azul oscuro de la imagen del encabezado */
            color: white;
            padding: 15px;
            text-align: center;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .header img {
            height: 40px; /* Ajustar según sea necesario */
        }
        .header nav a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }
        h2 {
            color: #333;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .form-section {
            margin-bottom: 30px;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"],
        .form-group select {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* Incluye padding y borde en el ancho/alto total del elemento */
        }
        .form-group .half-width {
            width: calc(50% - 15px); /* Ajustar según sea necesario para el espaciado */
            display: inline-block;
            vertical-align: top;
            margin-right: 10px; /* Espacio entre inputs de ancho medio */
        }
        .form-group .radio-group input[type="radio"] {
            margin-right: 5px;
        }
        .form-group .radio-group label {
            display: inline;
            font-weight: normal;
            margin-right: 20px;
        }
        .button-group {
            text-align: center;
            margin-top: 30px;
        }
        .button-group button {
            background-color: #007bff;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .button-group button:hover {
            background-color: #0056b3;
        }
        .return-link {
            background-color: #6c757d;
            color: white;
            padding: 8px 15px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
        }
        .return-link:hover {
            background-color: #5a6268;
            color: white;
            text-decoration: none;
        }
        .footer {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 0.9em;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .footer .contact-info {
            text-align: right;
            font-size: 0.8em;
        }
        .footer .contact-info p {
            margin: 0;
            line-height: 1.4;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="https://i.imgur.com/eQJtN9Q.png" alt="Logo Tribunal Electrónico">
        <div>
            <nav>
                <a href="{{ route('homepage') }}">INICIO</a>
                <a href="#">BUZÓN</a>
                <a href="#">AYUDA</a>
            </nav>
            <a href="#" style="margin-left: 30px; font-size: 0.8em; color: lightgray;">IR A LA PÁGINA OFICIAL DEL PODER JUDICIAL TAMAULIPAS</a>
        </div>
    </div>

    <div class="container">
        <h2>
            REGISTRO A DISTANCIA PARA EL TRIBUNAL ELECTRÓNICO (USUARIO Y FELAVPI)
            <a href="{{ route('homepage') }}" class="return-link">REGRESAR</a>
        </h2>

        <p>Favor de llenar los siguientes datos. Los campos marcados con asterisco (*) son obligatorios.</p>

        {{-- Apertura del formulario Laravel --}}
        <form method="POST" action="{{ route('registro.store') }}">
            @csrf {{-- Token CSRF por seguridad --}}

            <div class="form-section">
                <h3>Personal</h3>
                <div class="form-group">
                    <label for="nombre">Nombre*</label>
                    <input type="text" id="nombre" name="nombre" required value="{{ old('nombre') }}">
                    @error('nombre') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="apellido_paterno">Apellido Paterno*</label>
                    <input type="text" id="apellido_paterno" name="apellido_paterno" required value="{{ old('apellido_paterno') }}">
                    @error('apellido_paterno') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="apellido_materno">Apellido Materno</label>
                    <input type="text" id="apellido_materno" name="apellido_materno" value="{{ old('apellido_materno') }}">
                </div>
                <div class="form-group">
                    <label for="genero">Género*</label>
                    <select id="genero" name="genero" required>
                        <option value="">Seleccione</option>
                        <option value="masculino" {{ old('genero') == 'masculino' ? 'selected' : '' }}>Masculino</option>
                        <option value="femenino" {{ old('genero') == 'femenino' ? 'selected' : '' }}>Femenino</option>
                        <option value="otro" {{ old('genero') == 'otro' ? 'selected' : '' }}>Otro</option>
                    </select>
                    @error('genero') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="escolaridad">Escolaridad*</label>
                    <select id="escolaridad" name="escolaridad" required>
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

            <div class="form-section">
                <h3>Teléfonos</h3>
                <p>Para brindarle una mejor atención, le sugerimos ingresar por lo menos un número de teléfono. Ingresar los 10 dígitos correspondientes a su(s) número(s).</p>
                <div class="form-group">
                    <div class="half-width">
                        <label for="telefono_oficina">Teléfono Oficina</label>
                        <input type="text" id="telefono_oficina" name="telefono_oficina" maxlength="10" value="{{ old('telefono_oficina') }}">
                    </div>
                    <div class="half-width">
                        <label for="extension">Extensión</label>
                        <input type="text" id="extension" name="extension" value="{{ old('extension') }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="half-width">
                        <label for="telefono_particular">Teléfono Particular</label>
                        <input type="text" id="telefono_particular" name="telefono_particular" maxlength="10" value="{{ old('telefono_particular') }}">
                    </div>
                    <div class="half-width">
                        <label for="telefono_celular">Teléfono Celular</label>
                        <input type="text" id="telefono_celular" name="telefono_celular" maxlength="10" value="{{ old('telefono_celular') }}">
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h3>Domicilio</h3>
                <div class="form-group">
                    <div class="half-width">
                        <label for="calle">Calle*</label>
                        <input type="text" id="calle" name="calle" required value="{{ old('calle') }}">
                        @error('calle') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="half-width">
                        <label for="numero">Número*</label>
                        <input type="text" id="numero" name="numero" required value="{{ old('numero') }}">
                        @error('numero') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="entre_calles">Entre Calles</label>
                    <input type="text" id="entre_calles" name="entre_calles" value="{{ old('entre_calles') }}">
                </div>
                <div class="form-group">
                    <div class="half-width">
                        <label for="colonia">Colonia</label>
                        <input type="text" id="colonia" name="colonia" value="{{ old('colonia') }}">
                    </div>
                    <div class="half-width">
                        <label for="codigo_postal">Código Postal</label>
                        <input type="text" id="codigo_postal" name="codigo_postal" maxlength="5" value="{{ old('codigo_postal') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label>País</label>
                    <div class="radio-group">
                        <input type="radio" id="pais_mexico" name="pais" value="México" {{ old('pais', 'México') == 'México' ? 'checked' : '' }}>
                        <label for="pais_mexico">MÉXICO</label>
                        <input type="radio" id="pais_otro" name="pais" value="Otro" {{ old('pais') == 'Otro' ? 'checked' : '' }}>
                        <label for="pais_otro">OTRO</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <input type="text" id="estado" name="estado" value="TAMAULIPAS" readonly>
                    {{-- Podrías querer hacer esto un select si otras ciudades son posibles en el futuro --}}
                </div>
                <div class="form-group">
                    <label for="municipio">Municipio*</label>
                    <select id="municipio" name="municipio" required>
                        <option value="">Seleccione</option>
                        {{-- Popular con municipios de Tamaulipas --}}
                        <option value="ciudad_victoria" {{ old('municipio') == 'ciudad_victoria' ? 'selected' : '' }}>Ciudad Victoria</option>
                        <option value="tampico" {{ old('municipio') == 'tampico' ? 'selected' : '' }}>Tampico</option>
                        <option value="reynosa" {{ old('municipio') == 'reynosa' ? 'selected' : '' }}>Reynosa</option>
                        {{-- Añadir más municipios según sea necesario --}}
                    </select>
                    @error('municipio') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="form-section">
                <h3>Cuenta</h3>
                <p>El correo electrónico que aquí registre, servirá como nombre de usuario para acceder a su sesión en el Tribunal Electrónico. Debe ser un correo electrónico válido en el que pueda recibir mensajes.</p>
                <div class="form-group">
                    <label for="correo_electronico">Correo Electrónico*</label>
                    <input type="email" id="correo_electronico" name="email" required value="{{ old('email') }}">
                    @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="password">Contraseña (para mi usuario del Tribunal Electrónico)*</label>
                    <input type="password" id="password" name="password" required>
                    @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirme su Contraseña*</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>
            </div>

            <div class="button-group">
                <button type="submit">Registrar</button>
            </div>
        </form>
    </div>

    <div class="footer">
        <div>
            <img src="https://i.imgur.com/eQJtN9Q.png" alt="Logo Poder Judicial" style="height: 30px;">
        </div>
        <div>
            <p>&copy; Derechos Reservados Poder Judicial Tamaulipas 2025</p>
        </div>
        <div class="contact-info">
            <p>Dirección de Informática.</p>
            <p>Boulevard Práxedis Balboa # 2207,</p>
            <p>entre 2 y 3 Ceros, Colonia Miguel Hidalgo C.P. 87090,</p>
            <p>tribunal.electronico@tamaulipas.gob.mx</p>
            <p>Cd. Victoria, Tamaulipas.</p>
        </div>
    </div>
</body>
</html>