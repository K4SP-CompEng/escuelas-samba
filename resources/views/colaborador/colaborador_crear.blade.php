@extends('layouts.landing')

@section('title', 'Colabradores')

@php
    $colaboradores = DB::select("select coalesce(nullif(col.primer_apellido, 'NULL'), '') || case when col.segundo_apellido = 'NULL' then '' else ' ' end || coalesce(nullif(col.segundo_apellido, 'NULL'), '') || ', ' || coalesce(nullif(col.primer_nombre, 'NULL'), '') || case when col.segundo_nombre = 'NULL' then '' else ' ' end || coalesce(nullif(col.segundo_nombre, 'NULL'), '') as nombre_completo
                                 from JAM_colaborador col
                                 order by primer_apellido");
    $apodos = DB::select("select distinct apodo from JAM_colaborador where apodo <> 'NULL' order by apodo");
    $escuelas = DB::select('select distinct nombre from JAM_escuela order by nombre');
    $nacionalidad = DB::select('select distinct nacionalidad from JAM_colaborador order by nacionalidad')
@endphp

@section('content')
    <a href="{{ route('buscar_colaborador') }}">Buscar colaboradores</a>
    <a href="">Eliminar colaboradores</a>
    <form action="{{ route('colaborador_creado') }}" method="POST" style="display:flex; flex-direction: column;">
        @csrf
        <h1>Encuentra colaboradores de las escuelas:</h1>
        <label for="docidentidad_colab">Número de cédula:
            <input type="number" name="docidentidad_colab" id="docidentidad_colab">
        </label>
        <label for="primer_nombre_colab">Primer nombre:
            <input type="text" name="primer_nombre_colab" id="primer_nombre_colab" required>
        </label>
        <label for="segundo_nombre_colab">Segundo nombre:
            <input type="text" name="segundo_nombre_colab" id="segundo_nombre_colab">
        </label>
        <label for="primer_apellido_colab">Primer apellido:
            <input type="text" name="primer_apellido_colab" id="primer_apellido_colab" required>
        </label>
        <label for="segundo_apellido_colab">Segundo apellido:
            <input type="text" name="segundo_apellido_colab" id="segundo_apellido_colab">
        </label>
        <label for="apodo_colab">Apodo:
            <input type="text" name="apodo_colab" id="apodo_colab" required>
        </label>
        <label for="nacimiento_colab">Fecha de nacimiento:
            <input type="date" name="nacimiento_colab" id="nacimiento_colab" required>
        </label>
        <label for="genero_colab">Género:
            <input type="radio" name="genero_colab" id="genero_colab" value="M">Masculino
            <input type="radio" name="genero_colab" id="genero_colab" value="F">Femenino
        </label>
        <label for="nacion_colab">Nacionalidad:
            <input type="text" name="nacion_colab" id="nacion_colab" required>
        </label>
        <label for="direccion_colab">Dirección:
            <input type="text" name="direccion_colab" id="direccion_colab" required>
        </label>
        <label for="escuela_colab">Escuela:
            <select name="escuela_colab" id="escuela_colab" required>
                <option value="" disabled selected hidden>Elegir escuela...</option>
                @foreach ($escuelas as $escuela)
                    <option value="{{ $escuela->nombre }}">{{ $escuela->nombre }}</option>
                @endforeach
            </select>
        </label>
        <input type="submit" value="Enviar">
    </form>
@endsection
