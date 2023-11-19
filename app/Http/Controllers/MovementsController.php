<?php

namespace App\Http\Controllers;
use App\Models\Movements;
use App\Models\Supplies;
use App\Models\Departaments;
use App\Models\MovementTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MovementsController extends Controller
{
    public function index()
    {
        $movements = Movements::with('supplies', 'departaments', 'movement_types')->get();
        $heads = [
            'ID',
            'Insumo',
            'Tipo Movimiento',
            'Lote',
            'Departamento',
            'Stock',
            'Acciones',
        ];
        return view::make('panel.inventario.insumos.movimientos.lista', compact('movements', 'heads'));
    }

    public function create()
    {
        $supplies = Supplies::all();
        $movement_types = MovementTypes::all();
        $departaments = Departaments::all();

        return view('panel.inventario.insumos.movimientos.registro', compact('supplies', 'departaments', 'movement_types'));
    }
    public function store(Request $request)
    {
        // Define las reglas de validación
        $rules = [
            'movement_types_fke' => 'required',
            'supply_fke' => 'required',
            'departament_fke' => 'required',
            'movement_stock' => 'required|integer|min:1|max:100',
            'movement_expiration_date' => 'required|date|after_or_equal:' . now()->toDateString() . '|before_or_equal:' . now()->addYears(5)->toDateString(),
            'movement_batch' => 'required|regex:/^[A-Z0-9]{6,12}$/|min:6|max:12',
        ];

        // Define los mensajes de error personalizados si lo deseas
        $messages = [
            'movement_stock.required' => 'El campo Cantidad es requerido.',
            'supply_fke.required' => 'El campo insumo es requerido.',
            'movement_types_fke.required' => 'El campo tipo de movimiento es requerido.',
            'departament_fke.required' => 'El campo departamento es requerido.',
            'movement_stock.integer' => 'El campo Cantidad debe ser un número entero.',
            'movement_stock.min' => 'El campo Cantidad debe ser al menos 1.',
            'movement_stock.max' => 'El campo Cantidad debe ser maximo de 100.',
            'movement_expiration_date.required' => 'El campo Fecha de caducidad es requerido.',
            'movement_expiration_date.date' => 'El campo Fecha de caducidad debe ser una fecha válida.',
            'movement_expiration_date.after_or_equal' => 'La Fecha de caducidad debe ser igual o después de hoy.',
            'movement_expiration_date.before_or_equal' => 'La Fecha de caducidad debe ser igual o antes de ' . now()->addYears(5)->format('Y-m-d') . '.',
            'movement_batch.required' => 'El campo lote es requerido.',
            'movement_batch.min' => 'El campo lote debe ser minimo de 6 caracteres.',
            'movement_batch.max' => 'El campo lote debe ser maximo de 12 caracteres.',
        ];

        // Valida las reglas
        $validatedData = $request->validate($rules, $messages);

        // Verifica si el stock disponible es suficiente para un movimiento de egreso

        if ($validatedData['movement_types_fke'] == 2) {
            $supply = Supplies::find($validatedData['supply_fke']);
            if ($supply && $supply->supply_stock < $validatedData['movement_stock']) {
                // Manejar el escenario de stock insuficiente
                return redirect()->route('inventario.movimientos.lista')->with('nocreado', 'error');
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
        $movement->departament_fke = $validatedData['departament_fke'];
        $movement->movement_expiration_date = $validatedData['movement_expiration_date'];
        $movement->movement_batch = $validatedData['movement_batch'];
        $movement->save();

        return redirect()->route('inventario.movimientos.lista')->with('creado', 'ok');
    }

    public function show($id)
    {
        $movement = Movements::with('supplies', 'departaments', 'movement_types')->findOrFail($id);
        $departament = Departaments::findOrFail($movement->departament_fke);
        return view('panel.inventario.insumos.movimientos.show', compact('movement', 'departament'));
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
