@extends('layouts.landing')

@section('title', 'Colabradores')

@php
    $escuelas = DB::select('select distinct nombre from JAM_escuela order by nombre');
    $lugares = DB::select("select c.nombre || ', ' || e.nombre as direccion, c.nombre as ciudad from JAM_lugar c inner join JAM_lugar e on c.cod_ubicacion = e.id_lugar where c.tipo = 'Ciudad' and e.tipo = 'Estado' order by direccion");
@endphp

@section('content')
    <a href="{{ route('buscar_escuela') }}">Buscar escuelas</a>
    <form action="{{ route('escuela_creada') }}" method="POST" style="display:flex; flex-direction: column;">
        @csrf
        <h1>Añade una nueva escuela:</h1>
        <label for="nombre_esc">Nombre de la escuela:
            <input type="text" name="nombre_esc" id="nombre_esc" required>
        </label>
        <label for="fundacion_esc">Fecha de fundación:
            <input type="date" name="fundacion_esc" id="fundacion_esc" required>
        </label>
        <label for="historia_esc">Resumen histórico:
            <textarea name="historia_esc" id="historia_esc" cols="120" rows="10" required></textarea>
        </label>
        <label for="direccion_esc">Dirección:
            <input type="text" name="direccion_esc" id="direccion_esc" required>
        </label>
        <input type="submit" value="Enviar">
    </form>
@endsection
