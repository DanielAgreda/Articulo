{{-- resources/views/auth/register.blade.php --}}

@extends('layouts.public')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
@endpush

@section('title', 'Registro')

@section('content')
    <div class="registro-container">
        <h1>Registro</h1>
        <form method="POST" action="{{ route('register.submit') }}">
            @csrf
            <div class="input-group">
                <label for="nombres">Nombres</label>
                <input
                    type="text"
                    id="nombres"
                    name="nombres"
                    placeholder="Ingresa tus nombres"
                    value="{{ old('nombres') }}"
                    required
                >
                @error('nombres')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-group">
                <label for="apellidos">Apellidos</label>
                <input
                    type="text"
                    id="apellidos"
                    name="apellidos"
                    placeholder="Ingresa tus apellidos"
                    value="{{ old('apellidos') }}"
                    required
                >
                @error('apellidos')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-group">
                <label for="equipo">Equipo</label>
                <input
                    type="text"
                    id="equipo"
                    name="equipo"
                    placeholder="Ingresa tu equipo"
                    value="{{ old('equipo') }}"
                    required
                >
                @error('equipo')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                <input
                    type="date"
                    id="fecha_nacimiento"
                    name="fecha_nacimiento"
                    value="{{ old('fecha_nacimiento') }}"
                    required
                >
                @error('fecha_nacimiento')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-group">
                <label for="sexo">Sexo</label>
                <select id="sexo" name="sexo" required>
                    <option value="">Seleccione sexo</option>
                    <option value="masculino" {{ old('sexo')=='masculino'?'selected':'' }}>Masculino</option>
                    <option value="femenino"  {{ old('sexo')=='femenino' ?'selected':'' }}>Femenino</option>
                </select>
                @error('sexo')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-group">
                <label for="telefono">Teléfono Contacto</label>
                <input
                    type="tel"
                    id="telefono"
                    name="telefono"
                    placeholder="Ingresa teléfono contacto"
                    value="{{ old('telefono') }}"
                    required
                >
                @error('telefono')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-group">
                <label for="email">Correo Electrónico</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Ingresa tu correo"
                    value="{{ old('email') }}"
                    required
                >
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-group">
                <label for="pais">País</label>
                <select id="pais" name="pais" required>
                    <option value="">Selecciona tu país</option>
                    <option value="Alemania"    {{ old('pais')=='Alemania'    ?'selected':'' }}>Alemania</option>
                    <option value="Argentina"   {{ old('pais')=='Argentina'   ?'selected':'' }}>Argentina</option>
                    <option value="Belgica"     {{ old('pais')=='Belgica'     ?'selected':'' }}>Bélgica</option>
                    <option value="Brasil"      {{ old('pais')=='Brasil'      ?'selected':'' }}>Brasil</option>
                    <option value="Bolivia"     {{ old('pais')=='Bolivia'     ?'selected':'' }}>Bolivia</option>
                    <option value="Canada"      {{ old('pais')=='Canada'      ?'selected':'' }}>Canada</option>
                    <option value="China"       {{ old('pais')=='China'       ?'selected':'' }}>China</option>
                    <option value="Chile"       {{ old('pais')=='Chile'       ?'selected':'' }}>Chile</option>
                    <option value="Colombia"    {{ old('pais')=='Colombia'    ?'selected':'' }}>Colombia</option>
                    <option value="Croacia"     {{ old('pais')=='Croacia'     ?'selected':'' }}>Croacia</option>
                    <option value="Ecuador"     {{ old('pais')=='Ecuador'     ?'selected':'' }}>Ecuador</option>
                    <option value="Estados Unidos" {{ old('pais')=='Estados Unidos' ?'selected':'' }}>Estados Unidos</option>
                    <option value="Espana"      {{ old('pais')=='Espana'      ?'selected':'' }}>España</option>
                    <option value="Francia"     {{ old('pais')=='Francia'     ?'selected':'' }}>Francia</option>
                    <option value="Italia"      {{ old('pais')=='Italia'      ?'selected':'' }}>Italia</option>
                    <option value="Mexico"      {{ old('pais')=='Mexico'      ?'selected':'' }}>México</option>
                    <option value="Paraguay"    {{ old('pais')=='Paraguay'    ?'selected':'' }}>Paraguay</option>
                    <option value="Peru"        {{ old('pais')=='Peru'        ?'selected':'' }}>Peru</option>
                    <option value="Rusia"       {{ old('pais')=='Rusia'       ?'selected':'' }}>Rusia</option>
                    <option value="Uruguay"     {{ old('pais')=='Uruguay'     ?'selected':'' }}>Uruguay</option>
                    <option value="Venezuela"   {{ old('pais')=='Venezuela'   ?'selected':'' }}>Venezuela</option>
                </select>
                @error('pais')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-group">
                <label for="ciudad">Ciudad</label>
                <select id="ciudad" name="ciudad" required>
                    <option value="">Selecciona tu ciudad</option>
                    <option value="Asuncion"     {{ old('ciudad')=='Asuncion'     ?'selected':'' }}>Asuncion</option>
                    <option value="Berlin"       {{ old('ciudad')=='Berlin'       ?'selected':'' }}>Berlin</option>
                    <option value="Bogota"       {{ old('ciudad')=='Bogota'       ?'selected':'' }}>Bogotá</option>
                    <option value="Brasilia"     {{ old('ciudad')=='Brasilia'     ?'selected':'' }}>Brasilia</option>
                    <option value="Buenos Aires" {{ old('ciudad')=='Buenos Aires' ?'selected':'' }}>Buenos Aires</option>
                    <option value="Caracas"      {{ old('ciudad')=='Caracas'      ?'selected':'' }}>Caracas</option>
                    <option value="Lima"         {{ old('ciudad')=='Lima'         ?'selected':'' }}>Lima</option>
                    <option value="Madrid"       {{ old('ciudad')=='Madrid'       ?'selected':'' }}>Madrid</option>
                    <option value="Montevideo"   {{ old('ciudad')=='Montevideo'   ?'selected':'' }}>Montevideo</option>
                    <option value="Moscu"        {{ old('ciudad')=='Moscu'        ?'selected':'' }}>Moscu</option>
                    <option value="Ottawa"       {{ old('ciudad')=='Ottawa'       ?'selected':'' }}>Ottawa</option>
                    <option value="Paris"        {{ old('ciudad')=='Paris'        ?'selected':'' }}>Paris</option>
                    <option value="Pekin"        {{ old('ciudad')=='Pekin'        ?'selected':'' }}>Pekin</option>
                    <option value="Quito"        {{ old('ciudad')=='Quito'        ?'selected':'' }}>Quito</option>
                    <option value="Roma"         {{ old('ciudad')=='Roma'         ?'selected':'' }}>Roma</option>
                    <option value="Santiago de Chile" {{ old('ciudad')=='Santiago de Chile' ?'selected':'' }}>Santiago de Chile</option>
                    <option value="Sucre"        {{ old('ciudad')=='Sucre'        ?'selected':'' }}>Sucre</option>
                    <option value="Washington D.C" {{ old('ciudad')=='Washington D.C' ?'selected':'' }}>Washington D.C</option>
                </select>
                @error('ciudad')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-group">
                <label for="direccion">Dirección</label>
                <input
                    type="text"
                    id="direccion"
                    name="direccion"
                    placeholder="Ingresa tu dirección"
                    value="{{ old('direccion') }}"
                    required
                >
                @error('direccion')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-group">
                <label for="password">Contraseña</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Ingresa la contraseña"
                    required
                >
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="checkbox-group">
                <input
                    type="checkbox"
                    id="terminos"
                    name="terminos"
                    {{ old('terminos') ? 'checked' : '' }}
                    required
                >
                <label for="terminos">
                    Acepto los <a href="#">términos y condiciones</a>
                </label>
                @error('terminos')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <button type="submit" class="registro-button">Registrarse</button>
                <p class="login-link">
                    ¿Ya tienes una cuenta?
                    <a href="{{ route('login') }}">Inicia Sesión aquí</a>
                </p>
            </div>
        </form>
    </div>
@endsection
