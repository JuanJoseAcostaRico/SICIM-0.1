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

        return view('panel.inventario.insumos.registroinsumos', compact('states'));
    }

// Función Guardar del CRUD
    public function store(Request $request)
    {

        // Definir reglas de validación personalizadas
        $rules = [
            'state_fke' => 'required',
            'supply_name' => 'required',
            'supply_weight' => 'required',
        ];

        // Definir mensajes de error personalizados
        $messages = [
            'state_fke.required' => 'El campo Estado es obligatorio.',
            'supply_name.required' => 'El nombre del insumo es obligatorio.',
            'supply_weight.required' => 'El peso del insumo es obligatorio.',
        ];

        // Validar los datos del formulario usando las reglas y mensajes personalizados
        $validatedData = $request->validate($rules, $messages);

        // Crear un nuevo insumo y asignar los valores validados
        $supply = new Supplies();
        $supply->state_fke = $validatedData['state_fke'];
        $supply->supply_name = $validatedData['supply_name'];
        $supply->supply_weight = $validatedData['supply_weight'];
        $supply->supply_posology = $request->input('supply_posology'); // Puede ser nulo
        $supply->supply_desc = $request->input('supply_desc'); // Puede ser nulo
        $supply->supply_stock = 0;
        $supply->save();

        // Redireccionar a la página deseada después de guardar el insumo
        return redirect()->route('inventario.insumos.lista')->with('creacion', 'ok');
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
        $rules = [
            'state_fke' => 'required',
            'supply_name' => 'required',
            'supply_weight' => 'required',
            'supply_stock' => 'required|numeric|min:0',
        ];

        // Definir mensajes de error personalizados
        $messages = [
            'state_fke.required' => 'El campo Estado es obligatorio.',
            'supply_name.required' => 'El nombre del insumo es obligatorio.',
            'supply_weight.required' => 'El peso del insumo es obligatorio.',
            'supply_stock.required' => 'El stock del insumo es obligatorio.',
            'supply_stock.numeric' => 'El stock debe ser un número.',
            'supply_stock.min' => 'El stock no puede ser menor que cero.',
        ];

        // Validar los datos del formulario usando las reglas y mensajes personalizados
        $validatedData = $request->validate($rules, $messages);

        $supply = Supplies::findOrFail($id);
        $supply->state_fke = $validatedData['state_fke'];
        $supply->supply_name = $validatedData['supply_name'];
        $supply->supply_weight = $validatedData['supply_weight'];
        $supply->supply_posology = $request->input('supply_posology'); // Puede ser nulo
        $supply->supply_desc = $request->input('supply_desc'); // Puede ser nulo
        $supply->supply_stock = $validatedData['supply_stock'];
        $supply->save();

        return redirect()->route('inventario.insumos.lista')->with('edicion', 'ok');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $supply = Supplies::findOrFail($id);
        $supplyNames = Supplies::pluck('supply_name');
        $states = States::all();
        return view('panel.inventario.insumos.edit', compact('supply', 'supplyNames', 'states'));
    }

    public function destroy($id)
    {
        $supply = Supplies::findorFail($id);
        $supply->delete();
        return redirect()->route('inventario.insumos.lista')->with('eliminar', 'ok');
    }

}
