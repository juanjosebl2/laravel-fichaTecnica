<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencia;
use App\Models\Ejercicio;

class IncidenciaController extends Controller
{

    function _construct()
    {
        this->middleware('permission:ver-incidencia | crear-incidencia | editar-incidencia | borrar-incidencia', ['only'=>['index']]);
        this->middleware('permission:crear-incidencia', ['only'=>['create','store']]);
        this->middleware('permission:editar-incidencia', ['only'=>['edit','update']]);
        this->middleware('permission:borrar-incidencia', ['only'=>['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incidencias = Incidencia::paginate(10);
        return view('incidencias.index', compact('incidencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ejercicios = Ejercicio::pluck('titulo','id')->all();
        return view('incidencias.crear', compact('ejercicios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'titulo' => 'required',
            'contenido' => 'required'
        ]);

        $nuevaIncidencia = new Incidencia();
        $nuevaIncidencia->titulo = $request->input('titulo');
        $nuevaIncidencia->contenido = $request->input('contenido');
        $nuevaIncidencia->id_ejercicio = $request->input('id_ejercicio');
        $nuevaIncidencia->save();
        //dd($nuevaIncidencia);

        return redirect()->route('incidencias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Incidencia $incidencia)
    {
        $ejercicios = Ejercicio::pluck('titulo','id')->all();
        return view('incidencias.editar', compact('incidencia','ejercicios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incidencia $incidencia)
    {
        request()->validate([
            'titulo' => 'required',
            'contenido' => 'required'
        ]);

        $incidencia->titulo = $request->input('titulo');
        $incidencia->contenido = $request->input('contenido');
        $incidencia->id_ejercicio = $request->input('id_ejercicio');
        $incidencia->save();
        
        return redirect()->route('incidencias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incidencia $incidencia)
    {
        $incidencia->delete();
        return redirect()->route('incidencias.index');
    }
}
