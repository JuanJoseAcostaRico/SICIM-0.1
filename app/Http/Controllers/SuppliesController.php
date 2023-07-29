<?php

namespace App\Http\Controllers;
use App\Models\Supplies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\States;

class SuppliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplies = Supplies::with('states')->get();
        $heads = [
            'ID',
            'Nombre suministro',
            'Descrición',
            'Peso',
            'Stock',
            'Estado',
            'Acciones',
        ];
        return view::make('panel.inventario.insumos.listaInsumos', compact('supplies', 'heads'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $states = States::all();

        return view('panel.inventario.insumos.registroInsumos', compact('states'));
    }

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
        return redirect()->route('inventario.insumos.lista');
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
        $supply = Supplies::findOrFail($id);
        return view('panel.inventario.insumos.show', compact('supply'));
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
        return redirect()->route('inventario.insumos.lista');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $supply = Supplies::findorFail($id);
        $supply->delete();
        return redirect()->route('inventario.insumos.lista');
    }

    public function edit($id)
    {
        $supply = Supplies::findOrFail($id);
        $supplyNames = Supplies::pluck('supply_name');
        $states = States::all();
        return view('panel.inventario.insumos.edit', compact('supply', 'supplyNames', 'states'));
    }
}
