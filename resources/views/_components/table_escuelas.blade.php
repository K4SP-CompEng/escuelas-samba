@extends('layouts.landing')

@section('title', 'Datos')

<table style="background-color: #ffffffaa">
    <tr>
        <th>Nombre</th>
        <th>Dirección</th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    @foreach ($select as $row)
        <tr>
            <td>{{ $row->nombre }}</td>
            <td>{{ $row->direccion }}</td>
            <td><a href="{{ route('mostrar_escuela', ['id' => $row->id_escuela]) }}">Ver</a></td>
            <td><a href="{{ route('editar_escuela', ['id' => $row->id_escuela]) }}">Editar</a></td>
            <td>
                <form method="POST" action="{{ route('escuela_eliminada', ['id' => $row->id_escuela]) }}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Eliminar">
                </form>
            </td>
        </tr>
    @endforeach
</table>
