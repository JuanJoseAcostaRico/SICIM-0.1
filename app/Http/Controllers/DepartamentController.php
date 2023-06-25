<?php

namespace App\Http\Controllers;
use App\Models\Departaments;
use Illuminate\Http\Request;

class DepartamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departaments = Departaments::all();
        return $departaments;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Función Guardar del CRUD
    public function store(Request $request)
    {
        $departament = new Departaments();
        $departament->departament_name = $request->departament_name;
        $departament->state_fke = $request->state_fke;
        $departament->user_id = $request->user_id;
        $departament->save();
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
        $user = Departaments::find($id);
        return $user;
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
        $departament = Departaments::findOrFail($request->id);
        $departament->departament_name = $request->departament_name;
        $departament->state_fke = $request->state_fke;
        $departament->user_id = $request->user_id;
        $departament->save();
        return $departament;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departament = Departaments::destroy($id);
        return $departament;
    }
}
