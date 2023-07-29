<?php

namespace App\Http\Controllers;
use App\Models\Conditions;
use Illuminate\Http\Request;

class ConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conditions = Conditions::all();
        return $conditions;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Función Guardar del CRUD
    public function store(Request $request)
    {
        $condition = new Conditions();
        $condition->condition_name = $request->condition_name;
        $condition->save();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//Función para mostrar en el CRUD
    public function show($id)
    {
        $condition = Conditions::find($id);
        return $condition;
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
        $condition = Conditions::findOrFail($request->id);
        $condition->condition_name = $request->condition_name;
        $condition->save();
        return $condition;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $condition = Conditions::destroy($id);
        return $condition;
    }
}
