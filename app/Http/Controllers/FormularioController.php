<?php

namespace App\Http\Controllers;

use App\Formulario;
use Validator;
use Illuminate\Http\Request;

class FormularioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('formulario.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entrada= $request->all();
        // dd($entrada);
        $validador = Validator::make($entrada, [
            'nombre' => ['string', 'max:255'],
            'codigo' => ['string', 'max:20'],
            'version' => ['string', 'max:10'],
        ]);
        if($validador->fails()){
            return response()->json(['errors' => $validador->errors()], 422);
        }

        Formulario::create($entrada);

        return redirect('/home');

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
    public function edit($id)
    {
        return view('formulario.edit', ["formulario"=>Formulario::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $formulario= Formulario::find($id);
        $entrada = $request->all();

        $formulario->update($entrada);

        return redirect("/home");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formulario= Formulario::find($id);

        $formulario->delete();

        return redirect("/home");
    }
}
