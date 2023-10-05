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
        // Define las reglas de validación
        $rules = [
            'movement_types_fke' => 'required',
            'supply_fke' => 'required',
            'movement_stock' => 'required|integer|min:1',
        ];

        // Define los mensajes de error personalizados si lo deseas
        $messages = [
            'movement_stock.required' => 'El campo Cantidad es requerido.',
            'movement_stock.integer' => 'El campo Cantidad debe ser un número entero.',
            'movement_stock.min' => 'El campo Cantidad debe ser al menos 1.',
        ];

        // Valida las reglas
        $validatedData = $request->validate($rules, $messages);

        // Verifica si el stock disponible es suficiente para un movimiento de egreso

        if ($validatedData['movement_types_fke'] == 2) {
            $supply = Supplies::find($validatedData['supply_fke']);
            if ($supply && $supply->supply_stock < $validatedData['movement_stock']) {
                // Manejar el escenario de stock insuficiente
                return redirect()->route('inventario.movimientos.lista')->with('creado', 'error');
            }
        }

        //return redirect()->route('inventario.movimientos.lista')->with('creado', 'ok');
        //return redirect()->route('inventario.movimientos.lista')->with('creado', 'error');

        // Crea un nuevo movimiento con los datos validados
        $movement = new Movements();
        $movement->movement_types_fke = $validatedData['movement_types_fke'];
        $movement->movement_desc = $request->movement_desc; // Este campo es opcional
        $movement->supply_fke = $validatedData['supply_fke'];
        $movement->movement_stock = $validatedData['movement_stock'];
        $movement->save();

        return redirect()->route('inventario.movimientos.lista')->with('creado', 'ok');
    }

    public function show($id)
    {
        $movement = Movements::findOrFail($id);
        return view('panel.inventario.insumos.movimientos.show', compact('movement'));
    }

    /*  COMENTADO LAS ACCIONES DE CRUD DE EDITAR, ACTUALIZAR Y ELIMINAR

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


    public function edit($id)
    {
        $movement = Movements::findOrFail($id);
        $movementDesc = Movements::pluck('movement_desc');
        $supplies = Supplies::all();
        $movement_types= MovementTypes::all();
        return view('panel.inventario.insumos.movimientos.edit', compact('movement', 'movementDesc', 'supplies', 'movement_types'));
    }

    public function destroy($id)
    {
        $movement = Movements::findorFail($id);
        $movement->delete();
        return redirect()->route('inventario.movimientos.lista')->with('eliminar', 'ok');
    }
     FIN DE COMENTARIO */
}
