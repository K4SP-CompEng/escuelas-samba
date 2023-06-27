<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ColaboradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('colaborador.colaborador');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('colaborador.colaborador_crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $colab = new Colaborador();
        $colab->id = (int) DB::select("select max(id_colaborador) max from JAM_colaborador")[0]->max + 1;
        $colab->docidentidad = $request->docidentidad_colab;
        $colab->primer_nombre = $request->primer_nombre_colab;
        $colab->segundo_nombre = $request->segundo_nombre_colab;
        $colab->primer_apellido = $request->primer_apellido_colab;
        $colab->segundo_apellido = $request->segundo_apellido_colab;
        $colab->apodo = $request->apodo_colab;
        $colab->fecha_nacimiento = $request->nacimiento_colab;
        $colab->genero = $request->genero_colab;
        $colab->nacionalidad = $request->nacion_colab;
        $colab->direccion = DB::select("select id_lugar from JAM_lugar where nombre = '".$request->direccion_colab."'")[0]->id_lugar;
        $colab->escuela = DB::select("select id_escuela from JAM_escuela where nombre = '".$request->escuela_colab."'")[0]->id_escuela;

        DB::select("insert into JAM_colaborador (id_colaborador, docidentidad, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, apodo, fecha_nacimiento, genero, nacionalidad, direccion_colab, escuela_colab)
                    values (".$colab->id.", ".$colab->docidentidad.", '".$colab->primer_nombre."', coalesce(nullif('".$colab->segundo_nombre."', ''), 'NULL'), '".$colab->primer_apellido."', coalesce(nullif('".$colab->segundo_apellido."', ''), 'NULL'), '".$colab->apodo."', TO_DATE('".$colab->fecha_nacimiento."', 'YYYY-MM-DD'), '".$colab->genero."', '".$colab->nacionalidad."', ".$colab->direccion.", ".$colab->escuela.") returning 'id'");

        return redirect()->route('buscar_colaborador');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        return view('colaborador.colaborador_mostrar', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('colaborador.colaborador_editar', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $colab = new Colaborador();
        $colab->id = $request->id_colab;
        $colab->docidentidad = $request->docidentidad_colab;
        $colab->primer_nombre = $request->primer_nombre_colab;
        $colab->segundo_nombre = $request->segundo_nombre_colab;
        $colab->primer_apellido = $request->primer_apellido_colab;
        $colab->segundo_apellido = $request->segundo_apellido_colab;
        $colab->apodo = $request->apodo_colab;
        $colab->fecha_nacimiento = $request->nacimiento_colab;
        $colab->genero = $request->genero_colab;
        $colab->nacionalidad = $request->nacion_colab;
        $colab->direccion = DB::select("select id_lugar from JAM_lugar where nombre = '".$request->direccion_colab."'")[0]->id_lugar;
        $colab->escuela = DB::select("select id_escuela from JAM_escuela where nombre = '".$request->escuela_colab."'")[0]->id_escuela;

        DB::select("update JAM_colaborador set docidentidad = ".$colab->docidentidad.",
                                               primer_nombre = '".$colab->primer_nombre."',
                                               segundo_nombre = '".$colab->segundo_nombre."',
                                               primer_apellido = '".$colab->primer_apellido."',
                                               segundo_apellido = '".$colab->segundo_apellido."',
                                               apodo = '".$colab->apodo."',
                                               fecha_nacimiento = TO_DATE('".$colab->fecha_nacimiento."', 'YYYY-MM-DD'),
                                               genero = '".$colab->genero."',
                                               nacionalidad = '".$colab->nacionalidad."',
                                               direccion_colab = ".$colab->direccion.",
                                               escuela_colab = ".$colab->escuela."
                                           where id_colaborador = ".$colab->id);

        return redirect()->route('buscar_colaborador');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::select("delete from JAM_colaborador where id_colaborador = ".$id);
        return redirect()->route('buscar_colaborador');
    }
}
