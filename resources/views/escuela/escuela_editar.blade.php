@extends('layouts.landing')

@section('title', 'Colabradores')

@php
    $escuela = DB::select('select * from JAM_escuela where id_escuela = '.$id)[0];
@endphp

@section('content')
    <a href="{{ route('buscar_escuela') }}">Buscar escuelas</a>
    <form action="{{ route('escuela_actualizada', ['id' => $escuela->id_escuela]) }}" method="POST" style="display:flex; flex-direction: column;">
        @method('put')
        @csrf
        <h1>Edita una escuela:</h1>
        <label for="id_esc">Identificador:
            <input type="text" name="id_esc" id="id_esc" value="{{ $escuela->id_escuela }}" readonly>
        </label>
        <label for="nombre_esc">Nombre:
            <input type="text" name="nombre_esc" id="nombre_esc" value="{{ $escuela->nombre }}">
        </label>
        <label for="fundacion_esc">Fecha de fundación:
            <input type="date" name="fundacion_esc" id="fundacion_esc" value="{{ $escuela->fecha_fundacion }}">
        </label>
        <label for="historia_esc">Resumen histórico:
            <textarea name="historia_esc" id="historia_esc" cols="120" rows="10">{{ $escuela->resumen_hist }}</textarea>
        </label>
        <label for="direccion_esc">Dirección:
            <input type="text" name="direccion_esc" id="direccion_esc" value="{{ $escuela->direccion }}">
        </label>
        <input type="submit" value="Actualizar">
    </form>
@endsection
