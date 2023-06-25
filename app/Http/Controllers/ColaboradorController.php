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
        $colab->id = DB::select("select max(id_escuela) from JAM_escuela")[0]->id_escuela + 1;
        $colab->docidentidad = $request->docidentidad_colab;
        $colab->primer_nombre = $request->primer_nombre_colab;
        $colab->segundo_nombre = $request->segundo_nombre_colab;
        $colab->primer_apellido = $request->primer_apellido_colab;
        $colab->segundo_apellido = $request->segundo_apellido_colab;
        $colab->apodo = $request->apodo_colab;
        $colab->fecha_nacimiento = $request->nacimiento_colab;
        $colab->genero = $request->genero_colab;
        $colab->nacionalidad = $request->nacion_colab;
        $colab->direccion = $request->direccion_colab;
        $colab->escuela = DB::select("select id_escuela from JAM_escuela where nombre = ".$request->escuela_colab.";")[0]->id_escuela;
        $colab->save();

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
