<?php

namespace App\Http\Controllers;
use App\Models\Movements;
use App\Models\Supplies;
use App\Models\MovementTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MovementsController extends Controller
{
    public function index()
    {
        $movements = Movements::with('supplies', 'movement_types')->get();
        $heads = [
            'ID',
            'Insumo',
            'Tipo Movimiento',
            'Descrición',
            'Stock',
            'Acciones',
        ];
        return view::make('panel.inventario.insumos.movimientos.lista', compact('movements', 'heads'));
    }

    public function create()
    {
        $supplies = Supplies::all();
        $movement_types = MovementTypes::all();

        return view('panel.inventario.insumos.movimientos.registro', compact('supplies', 'movement_types'));
    }
    public function store(Request $request)
    {
        //
        $movement = new Movements();
        $movement->movement_types_fke = $request->movement_types_fke;
        $movement->movement_desc = $request->movement_desc;
        $movement->supply_fke = $request->supply_fke;
        $movement->movement_stock = $request->movement_stock;
        $movement->save();
        return redirect()->route('inventario.movimientos.lista');
    }

    public function update(Request $request, $id)
    {
        $movement = Movements::findOrFail($request->id);
        $movement->movement_types_fke = $request->movement_types_fke;
        $movement->movement_desc = $request->movement_desc;
        $movement->supply_fke = $request->supply_fke;
        $movement->movement_stock = $request->movement_stock;
        $movement->save();
        return redirect()->route('inventario.movimientos.lista');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $movement = Movements::findOrFail($id);
        $movementDesc = Movements::pluck('movement_desc');
        $supplies = Supplies::all();
        $movement_types= MovementTypes::all();
        return view('panel.inventario.insumos.movimientos.edit', compact('movement', 'movementDesc', 'supplies', 'movement_types'));
    }

    public function show($id)
    {
        $movement = Movements::findOrFail($id);
        return view('panel.inventario.insumos.movimientos.show', compact('movement'));
    }

    public function destroy($id)
    {
        $movement = Movements::findorFail($id);
        $movement->delete();
        return redirect()->route('inventario.movimientos.lista')->with('eliminar', 'ok');
    }
}
