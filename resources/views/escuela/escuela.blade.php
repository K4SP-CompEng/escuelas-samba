@extends('layouts.landing')

@section('title', 'Escuela')

@section('content')
    <a href="{{ route('crear_escuela') }}" style="background-color: #ffffffaa;">Insertar escuelas</a>
    <h1 style="background-color: #ffffffaa; padding: 8px;">Encuentra escuelas:</h1>
    @component('_components.table_escuelas')
        @slot('select', DB::select('select * from jam_escuela'))
    @endcomponent
@endsection
