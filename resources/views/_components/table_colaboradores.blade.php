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
        <th></th>
    </tr>
    @foreach ($select as $row)
        <tr>
            <td>{{ $row->nombre_completo }}</td>
            <td>{{ $row->docidentidad }}</td>
            <td>{{ $row->apodo }}</td>
            <td>{{ $row->escuela }}</td>
            <td><a href="{{ route('mostrar_colaborador', ['id' => $row->id_colaborador]) }}">Ver</a></td>
            <td><a href="{{ route('editar_colaborador', ['id' => $row->id_colaborador]) }}">Editar</a></td>
            <td>
                <form method="POST" action="{{ route('colaborador_eliminado', ['id' => $row->id_colaborador]) }}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Eliminar">
                </form>
            </td>
        </tr>
    @endforeach
</table>
