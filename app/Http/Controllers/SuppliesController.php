<?php

namespace App\Http\Controllers;
use App\Models\Supplies;
use Illuminate\Http\Request;

class SuppliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplies = Supplies::all();
        return $supplies;
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
        $supply = new Supplies();
        $supply->state_fke = $request->state_fke;
        $supply->supply_name = $request->supply_name;
        $supply->supply_weight = $request->supply_weight;
        $supply->supply_posology = $request->supply_posology;
        $supply->supply_desc = $request->supply_desc;
        $supply->supply_stock = $request->supply_stock;
        $supply->save();
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
        $supply = Supplies::find($id);
        return $supply;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Función para actualizar en el CRUD
    public function update(Request $request, $id)
    {
        $supply = Supplies::findOrFail($request->id);
        $supply->state_fke = $request->state_fke;
        $supply->supply_name = $request->supply_name;
        $supply->supply_weight = $request->supply_weight;
        $supply->supply_posology = $request->supply_posology;
        $supply->supply_desc = $request->supply_desc;
        $supply->supply_stock = $request->supply_stock;
        $supply->save();
        return $supply;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supply = Supplies::destroy($id);
        return $supply;
    }
}
