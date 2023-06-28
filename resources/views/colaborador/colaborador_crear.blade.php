@extends('layouts.landing')

@section('title', 'Colabradores')

@php


    $escuelas = DB::select('select distinct nombre from JAM_escuela order by nombre');
    $lugares = DB::select("select c.nombre || ', ' || e.nombre as direccion, c.nombre as ciudad from JAM_lugar c inner join JAM_lugar e on c.cod_ubicacion = e.id_lugar where c.tipo = 'ciudad' and e.tipo = 'estado' order by direccion");
@endphp

@section('content')
    <a href="{{ route('buscar_colaborador') }}">Buscar colaboradores</a>
    <form action="{{ route('colaborador_creado') }}" method="POST" style="display:flex; flex-direction: column;">
        @csrf
        <h1>Añade a un nuevo colaborador:</h1>
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
            <input type="text" name="apodo_colab" id="apodo_colab">
        </label>
        <label for="nacimiento_colab">Fecha de nacimiento:
            <input type="date" name="nacimiento_colab" id="nacimiento_colab" required>
        </label>
        <label for="genero_colab">Género:
            <input type="radio" name="genero_colab" id="genero_colab" value="m">Masculino
            <input type="radio" name="genero_colab" id="genero_colab" value="f">Femenino
        </label>
        <label for="nacion_colab">Nacionalidad:
            <input type="text" name="nacion_colab" id="nacion_colab" required>
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
        <input type="submit" value="Enviar">
    </form>
@endsection
