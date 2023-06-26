@extends('layouts.landing')

@section('title', 'Colabradores')

@php
    $colaborador = DB::select("select * from JAM_colaborador where id_colaborador = ".$id)[0];
    $apodos = DB::select("select distinct apodo from JAM_colaborador where apodo <> 'NULL' order by apodo");
    $escuelas = DB::select('select distinct nombre from JAM_escuela order by nombre');
    $nacionalidad = DB::select('select distinct nacionalidad from JAM_colaborador order by nacionalidad');
    $lugares = DB::select("select c.nombre || ', ' || e.nombre as direccion, c.nombre as ciudad from JAM_lugar c inner join JAM_lugar e on c.cod_ubicacion = e.id_lugar where c.tipo = 'Ciudad' and e.tipo = 'Estado' order by direccion");
@endphp

@section('content')
    <a href="{{ route('buscar_colaborador') }}">Buscar colaboradores</a>
    <a href="">Eliminar colaboradores</a>
    <form action="" method="POST" style="display:flex; flex-direction: column;">
        @csrf
        <h1>Encuentra colaboradores de las escuelas:</h1>
        <label for="docidentidad_colab">Número de cédula:
            <input type="number" name="docidentidad_colab" id="docidentidad_colab" value="{{ $colaborador->docidentidad }}">
        </label>
        <label for="primer_nombre_colab">Primer nombre:
            <input type="text" name="primer_nombre_colab" id="primer_nombre_colab" value="{{ $colaborador->primer_nombre }}" required>
        </label>
        <label for="segundo_nombre_colab">Segundo nombre:
            <input type="text" name="segundo_nombre_colab" id="segundo_nombre_colab" value="{{ $colaborador->segundo_nombre }}">
        </label>
        <label for="primer_apellido_colab">Primer apellido:
            <input type="text" name="primer_apellido_colab" id="primer_apellido_colab" value="{{ $colaborador->primer_apellido }}" required>
        </label>
        <label for="segundo_apellido_colab">Segundo apellido:
            <input type="text" name="segundo_apellido_colab" id="segundo_apellido_colab" value="{{ $colaborador->segundo_apellido }}">
        </label>
        <label for="apodo_colab">Apodo:
            <input type="text" name="apodo_colab" id="apodo_colab" value="{{ $colaborador->apodo }}">
        </label>
        <label for="nacimiento_colab">Fecha de nacimiento:
            <input type="date" name="nacimiento_colab" id="nacimiento_colab" value="{{ $colaborador->fecha_nacimiento }}" required>
        </label>
        <label for="genero_colab">Género:
            <input type="radio" name="genero_colab" id="genero_colab" value="M">Masculino
            <input type="radio" name="genero_colab" id="genero_colab" value="F">Femenino
        </label>
        <label for="nacion_colab">Nacionalidad:
            <input type="text" name="nacion_colab" id="nacion_colab" value="{{ $colaborador->nacionalidad }}" required>
        </label>
        <label for="direccion_colab">Dirección:
            <select name="direccion_colab" id="direccion_colab" required>
                <option value="" disabled selected hidden>Elegir lugar...</option>
                @foreach ($lugares as $lugar)
                    <option value="{{ $lugar->ciudad }}">{{ $lugar->direccion }}</option>
                @endforeach
            </select>
        </label>
        <label for="escuela_colab">Escuela:
            <select name="escuela_colab" id="escuela_colab" required>
                <option value="" disabled selected hidden>Elegir escuela...</option>
                @foreach ($escuelas as $escuela)
                    <option value="{{ $escuela->nombre }}">{{ $escuela->nombre }}</option>
                @endforeach
            </select>
        </label>
        <input type="submit" value="Actualizar">
    </form>
@endsection
