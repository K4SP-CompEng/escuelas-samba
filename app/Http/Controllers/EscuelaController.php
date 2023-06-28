<?php

namespace App\Http\Controllers;

use App\Models\Escuela;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EscuelaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('escuela.escuela');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('escuela.escuela_crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $esc = new Escuela();
        $esc->id = (int) DB::select("select max(id_escuela) max from JAM_escuela")[0]->max + 1;
        $esc->nombre = $request->nombre_esc;
        $esc->fecha_fundacion = $request->fundacion_esc;
        $esc->resumen_hist = $request->historia_esc;
        $esc->direccion = $request->direccion_esc;

        DB::select("insert into JAM_escuela (id_escuela, nombre, fecha_fundacion, resumen_hist, direccion)
                    values (".$esc->id.", '".$esc->nombre."', TO_DATE('".$esc->fecha_fundacion."', 'YYYY-MM-DD'), '".$esc->resumen_hist."', '".$esc->direccion."')");

        return redirect()->route('buscar_escuela');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('escuela.escuela_mostrar', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('escuela.escuela_editar', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $esc = new Escuela();
        $esc->id = $request->id_esc;
        $esc->nombre = $request->nombre_esc;
        $esc->fecha_fundacion = $request->fundacion_esc;
        $esc->resumen_hist = $request->historia_esc;
        $esc->direccion = $request->direccion_esc;

        DB::select("update JAM_escuela set nombre = '".$esc->nombre."',
                                           fecha_fundacion = TO_DATE('".$esc->fecha_fundacion."', 'YYYY-MM-DD'),
                                           resumen_hist = '".$esc->resumen_hist."',
                                           direccion = '".$esc->direccion."'
                                       where id_escuela = ".$esc->id);

        return redirect()->route('buscar_escuela');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::select("delete from JAM_escuela where id_escuela = ".$id);
        return redirect()->route('buscar_escuela');
    }
}
