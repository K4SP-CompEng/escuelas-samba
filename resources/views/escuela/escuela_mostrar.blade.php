@extends('layouts.landing')

@section('title', 'Colabradores')

@php
    $escuela = DB::select('select * from JAM_escuela where id_escuela = '.$id)[0];
@endphp

@section('content')
    <a href="{{ route('buscar_escuela') }}">Buscar escuelas</a>
    <form style="display:flex; flex-direction: column;">
        @csrf
        <h1>Ve más información sobre la escuela:</h1>
        <label for="nombre_esc">Nombre:
            <input type="text" name="nombre_esc" id="nombre_esc" value="{{ $escuela->nombre }}" readonly>
        </label>
        <label for="fundacion_esc">Fecha de fundación:
            <input type="date" name="fundacion_esc" id="fundacion_esc" value="{{ $escuela->fecha_fundacion }}" readonly>
        </label>
        <label for="historia_esc">Resumen histórico:
            <textarea name="historia_esc" id="historia_esc" cols="120" rows="10" readonly>{{ $escuela->resumen_hist }}</textarea>
        </label>
        <label for="direccion_colab">Dirección:
            <input type="text" name="nacion_colab" id="nacion_colab" value="{{ $escuela->direccion }}" readonly>
        </label>
    </form>
@endsection
