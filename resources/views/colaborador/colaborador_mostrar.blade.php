@extends('layouts.landing')

@section('title', 'Colabradores')

@php
    $colaborador = DB::select("select * from JAM_colaborador where id_colaborador = ".$id)[0];
    $apodos = DB::select("select distinct apodo from JAM_colaborador where apodo <> 'NULL' order by apodo");
    $escuela = DB::select('select nombre from JAM_escuela where id_escuela = '.$colaborador->escuela_colab)[0];
    $nacionalidad = DB::select('select distinct nacionalidad from JAM_colaborador order by nacionalidad');
    $lugar = DB::select("select nombre as direccion from JAM_lugar where id_lugar = ".$colaborador->direccion_colab)[0];
@endphp

@section('content')
    <a href="{{ route('buscar_colaborador') }}">Buscar colaboradores</a>
    <a href="">Eliminar colaboradores</a>
    <form style="display:flex; flex-direction: column;">
        @csrf
        <h1>Encuentra colaboradores de las escuelas:</h1>
        <label for="docidentidad_colab">Número de cédula:
            <input type="number" name="docidentidad_colab" id="docidentidad_colab" value="{{ $colaborador->docidentidad }}" readonly>
        </label>
        <label for="primer_nombre_colab">Primer nombre:
            <input type="text" name="primer_nombre_colab" id="primer_nombre_colab" value="{{ $colaborador->primer_nombre }}" readonly>
        </label>
        <label for="segundo_nombre_colab">Segundo nombre:
            <input type="text" name="segundo_nombre_colab" id="segundo_nombre_colab" value="{{ $colaborador->segundo_nombre }}" readonly>
        </label>
        <label for="primer_apellido_colab">Primer apellido:
            <input type="text" name="primer_apellido_colab" id="primer_apellido_colab" value="{{ $colaborador->primer_apellido }}" readonly>
        </label>
        <label for="segundo_apellido_colab">Segundo apellido:
            <input type="text" name="segundo_apellido_colab" id="segundo_apellido_colab" value="{{ $colaborador->segundo_apellido }}" readonly>
        </label>
        <label for="apodo_colab">Apodo:
            <input type="text" name="apodo_colab" id="apodo_colab" value="{{ $colaborador->apodo }}" readonly>
        </label>
        <label for="nacimiento_colab">Fecha de nacimiento:
            <input type="date" name="nacimiento_colab" id="nacimiento_colab" value="{{ $colaborador->fecha_nacimiento }}" readonly>
        </label>
        <label for="genero_colab">Género:
            <input type="text" name="genero_colab" id="genero_colab" value="{{ $colaborador->genero }}" readonly>
        </label>
        <label for="nacion_colab">Nacionalidad:
            <input type="text" name="nacion_colab" id="nacion_colab" value="{{ $colaborador->nacionalidad }}" readonly>
        </label>
        <label for="direccion_colab">Dirección:
            <input type="text" name="nacion_colab" id="nacion_colab" value="{{ $lugar->direccion }}" readonly>
        </label>
        <label for="escuela_colab">Escuela:
            <input type="text" name="nacion_colab" id="nacion_colab" value="{{ $escuela->nombre }}" readonly>
        </label>
    </form>
@endsection
