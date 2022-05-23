<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\User;

class ProyectoController extends Controller
{

    function _construct()
    {
        this->middleware('permission:ver-proyecto | crear-proyecto | editar-proyecto | borrar-proyecto', ['only'=>['index']]);
        this->middleware('permission:crear-proyecto', ['only'=>['create','store']]);
        this->middleware('permission:editar-proyecto', ['only'=>['edit','update']]);
        this->middleware('permission:borrar-proyecto', ['only'=>['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyecto::paginate(10);
        return view('proyectos.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name','id')->all();
        return view('proyectos.crear', compact('users'));
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

        $nuevoProyecto = new Proyecto();
        $nuevoProyecto->titulo = $request->input('titulo');
        $nuevoProyecto->contenido = $request->input('contenido');
        $nuevoProyecto->id_user = $request->input('id_user');
        $nuevoProyecto->save();

        return redirect()->route('proyectos.index');
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
    public function edit(Proyecto $proyecto)
    {
        $users = User::pluck('name','id')->all();
        return view('proyectos.editar', compact('proyecto','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        request()->validate([
            'titulo' => 'required',
            'contenido' => 'required'
        ]);

        $proyecto->titulo = $request->input('titulo');
        $proyecto->contenido = $request->input('contenido');
        $proyecto->id_user = $request->input('id_user');
        $proyecto->save();

        return redirect()->route('proyectos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();
        return redirect()->route('proyectos.index');
    }
}
