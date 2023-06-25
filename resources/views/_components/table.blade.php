@extends('layouts.landing')

@section('title', 'Datos')

<table>
    @foreach ($select as $row)
        <tr>
            @foreach($row as $element)
                <td>{{ $row->$element }}</td>
            @endforeach
        </tr>
    @endforeach
</table>
