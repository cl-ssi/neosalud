<?php

namespace App\Http\Controllers\Samu;

use App\Http\Controllers\Controller;
use App\Models\Samu\Key;
use Illuminate\Http\Request;

class KeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //busqueda de codigos de clave
        $search_key = $request->get('search_key');
        $keys = Key::when($search_key!=null, function ($query) use ($search_key){
                    $query->where('key','like','%'.$search_key.'%');
                })->paginate(200);

        return view ('samu.key.index' , compact('keys','search_key'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $keys = Key::all(); // guarda todos los datos de la tabla
        return view ('samu.key.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        Key::create($request->all());
        $request->session()->flash('success', 'Creado satisfactoriamente.');
        return redirect()->route('samu.key.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Samu\Key  $key
     * @return \Illuminate\Http\Response
     */
    public function show(Key $key)
    {

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Samu\Key  $key
     * @return \Illuminate\Http\Response
     */
    public function edit(Key $key)
    {
        return view ('samu.key.edit' , compact('key'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Samu\Key  $key
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Key $key)
    {

        $key->fill($request->all());
        $key->update();
        session()->flash('success', ' Actualizado satisfactoriamente.');
        return redirect()->route('samu.key.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Samu\Key  $key
     * @return \Illuminate\Http\Response
     */
    public function destroy(Key $key)
    {
        $key->delete();
        return redirect()->route('samu.key.index')->with('danger', 'Eliminado satisfactoriamente');
    }
}
