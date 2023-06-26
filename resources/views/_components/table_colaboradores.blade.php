@extends('layouts.landing')

@section('title', 'Datos')

<table style="background-color: #ffffffaa">
    <tr>
        <th>Nombre</th>
        <th>Cédula</th>
        <th>Apodo</th>
        <th>Escuela</th>
        <th></th>
        <th></th>
    </tr>
    @foreach ($select as $row)
        <tr>
            <td>{{ $row->nombre_completo }}</td>
            <td>{{ $row->docidentidad }}</td>
            <td>{{ $row->apodo }}</td>
            <td>{{ $row->escuela }}</td>
            <td><a href="">Ver</a></td>
            <td><a href="">Editar</a></td>
            <td><a href="">Eliminar</a></td>
        </tr>
    @endforeach
</table>