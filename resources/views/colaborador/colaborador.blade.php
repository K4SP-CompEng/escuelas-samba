@extends('layouts.landing')

@section('title', 'Colabradores')

@section('content')
    <a href="{{ route('crear_colaborador') }}" style="background-color: #ffffffaa;">Insertar colaboradores</a>
    <h1 style="background-color: #ffffffaa; padding: 8px;">Encuentra colaboradores de las escuelas:</h1>

    @component('_components.table_colaboradores')
        @slot('select', DB::select("select c.id_colaborador, coalesce(nullif(c.primer_apellido, 'NULL'), '') || case when c.segundo_apellido = 'NULL' then '' else ' ' end || coalesce(nullif(c.segundo_apellido, 'NULL'), '') || ', ' || coalesce(nullif(c.primer_nombre, 'NULL'), '') || case when c.segundo_nombre = 'NULL' then '' else ' ' end || coalesce(nullif(c.segundo_nombre, 'NULL'), '') nombre_completo, c.docidentidad docidentidad, coalesce(nullif(c.apodo, 'NULL'), '') apodo, e.nombre escuela from jam_colaborador c inner join jam_escuela e on c.escuela_colab = e.id_escuela"))
    @endcomponent
@endsection
