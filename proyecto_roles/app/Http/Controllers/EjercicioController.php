<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ejercicio;
use App\Models\User;
use App\Models\Proyecto;

class EjercicioController extends Controller
{

    function _construct()
    {
        this->middleware('permission:ver-ejercicio | crear-ejercicio | editar-ejercicio | borrar-ejercicio', ['only'=>['index']]);
        this->middleware('permission:crear-ejercicio', ['only'=>['create','store']]);
        this->middleware('permission:editar-ejercicio', ['only'=>['edit','update']]);
        this->middleware('permission:borrar-ejercicio', ['only'=>['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ejercicios = Ejercicio::paginate(10);
        return view('ejercicios.index', compact('ejercicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name','id')->all();
        $proyectos = Proyecto::pluck('titulo','id')->all();
        return view('ejercicios.crear', compact('users','proyectos'));
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

        $nuevoEjercicio = new Ejercicio();
        $nuevoEjercicio->titulo = $request->input('titulo');
        $nuevoEjercicio->contenido = $request->input('contenido');
        $nuevoEjercicio->id_user = $request->input('id_user');
        $nuevoEjercicio->id_proyecto = $request->input('id_proyecto');
        $nuevoEjercicio->save();

        return redirect()->route('ejercicios.index');
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
    public function edit(Ejercicio $ejercicio)
    {
        $users = User::pluck('name','id')->all();
        $proyectos = Proyecto::pluck('titulo','id')->all();
        return view('ejercicios.editar', compact('ejercicio','users','proyectos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ejercicio $ejercicio)
    {
        request()->validate([
            'titulo' => 'required',
            'contenido' => 'required'
        ]);

        $ejercicio->titulo = $request->input('titulo');
        $ejercicio->contenido = $request->input('contenido');
        $ejercicio->id_user = $request->input('id_user');
        $ejercicio->id_proyecto = $request->input('id_proyecto');
        $ejercicio->save();

        return redirect()->route('ejercicios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ejercicio $ejercicio)
    {
        $ejercicio->delete();
        return redirect()->route('ejercicios.index');
    }
}
