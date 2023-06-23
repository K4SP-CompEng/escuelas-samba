@extends('layouts.landing')

@section('title', 'Escuela')

@php
    $escuelas = DB::select('select distinct nombre from JAM_escuela order by nombre');
@endphp

@section('content')
    <h1>Encuentra escuelas:</h1>
    <select name="nombre" id="nombre">
        <option value="" selected>Escoger escuela...</option>
        @foreach ($escuelas as $escuela)
            <option value="{{ $escuela->nombre }}">{{ $escuela->nombre }}</option>
        @endforeach
    </select>
@endsection
