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
    <a href="{{ route('crear_colaborador') }}">Insertar colaboradores</a>
    <a href="">Eliminar colaboradores</a>
    <form style="display:flex; flex-direction: column;">
        <h1>Encuentra colaboradores de las escuelas:</h1>
        <label for="colab-por-nombre">Por nombre:
            <select name="colab-por-nombre" id="colab-por-nombre">
                <option value="" selected>Elegir nombre...</option>
                @foreach ($colaboradores as $colaborador)
                    <option value="{{ $colaborador->nombre_completo }}">{{ $colaborador->nombre_completo }}</option>
                @endforeach
            </select>
        </label>
        <label for="colab-por-apodo">Por nombre:
            <select name="colab-por-apodo" id="colab-por-apodo">
                <option value="" selected>Elegir apodo...</option>
                @foreach ($apodos as $apodo)
                    <option value="{{ $apodo->apodo }}">{{ $apodo->apodo }}</option>
                @endforeach
            </select>
        </label>
        <label for="colab-por-escuela">Por escuela:
            <select name="colab-por-escuela" id="colab-por-escuela">
                <option value="" selected>Elegir escuela...</option>
                @foreach ($escuelas as $escuela)
                    <option value="{{ $escuela->nombre }}">{{ $escuela->nombre }}</option>
                @endforeach
            </select>
        </label>
        <label for="colab-por-genero">Por género:
            <select name="colab-por-genero" id="colab-por-genero">
                <option value="" selected>Elegir género...</option>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
            </select>
        </label>
        <label for="colab-por-nacion">Por nacionalidad:
            <select name="colab-por-nacion" id="colab-por-nacion">
                <option value="" selected>Elegir nacionalidad...</option>
                @foreach ($nacionalidad as $nacion)
                    <option value="{{ $nacion->nacionalidad }}">{{ $nacion->nacionalidad }}</option>
                @endforeach
            </select>
        </label>
        <label for="colab-retirado">Retirado:
            <input type="checkbox" name="colab-retirado" id="colab-retirado">
        </label>
        <input type="submit" value="Enviar">
    </form>
@endsection
