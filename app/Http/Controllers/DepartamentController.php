<?php

namespace App\Http\Controllers;
use App\Models\Departaments;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\States;

class DepartamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departaments = Departaments::with('states', 'user')->get();
        $heads = [
            'ID',
            'Nombre departamento',
            'Jefe de departamento',
            'Estado',
            'Acciones',

        ];
        // Retornamos la vista con las 2 variables creadas anteriormente
        return View::make('panel.departamento.listaDep', compact('departaments', 'heads'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Función Guardar del CRUD
    public function create()
    {
        $users = User::all();
        $states = States::all();

        return view('panel.departamento.registroDep', compact('users', 'states'));
    }
    public function store(Request $request)
    {
        // Define las reglas de validación
        $rules = [
            'departament_name' => 'required',
            'state_fke' => 'required',
            'user_id' => 'required',
        ];

        // Define los mensajes de error personalizados si lo deseas
        $messages = [
            'departament_name.required' => 'El campo Nombre del Departamento es requerido.',
            'state_fke.required' => 'El campo Estado es requerido.',
            'user_id.required' => 'El campo ID de Usuario es requerido.',
        ];

        // Valida las reglas
        $validatedData = $request->validate($rules, $messages);

        // Crea un nuevo departamento con los datos validados
        $departament = new Departaments();
        $departament->departament_name = $validatedData['departament_name'];
        $departament->state_fke = $validatedData['state_fke'];
        $departament->user_id = $validatedData['user_id'];
        $departament->save();

        return redirect()->route('departamento.lista');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Función para mostrar en el CRUD

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Define las reglas de validación
        $rules = [
            'departament_name' => 'required',
            'state_fke' => 'required',
            'user_id' => 'required',
        ];

        // Define los mensajes de error personalizados si lo deseas
        $messages = [
            'departament_name.required' => 'El campo Nombre del Departamento es requerido.',
            'state_fke.required' => 'El campo Estado es requerido.',
            'user_id.required' => 'El campo ID de Usuario es requerido.',
        ];

        // Valida las reglas
        $validatedData = $request->validate($rules, $messages);

        // Encuentra el departamento por ID
        $departament = Departaments::findOrFail($id);

        // Actualiza los campos con los datos validados
        $departament->departament_name = $validatedData['departament_name'];
        $departament->state_fke = $validatedData['state_fke'];
        $departament->user_id = $validatedData['user_id'];

        // Guarda los cambios
        $departament->save();

        return redirect()->route('departamento.lista');

    }

    public function edit($id)
    {
        $departament = Departaments::findOrFail($id);
        $departamentNames = Departaments::pluck('departament_name');
        $states = States::all();
        $users = User::all();
        return view('panel.departamento.edit', compact('departament', 'departamentNames', 'states', 'users'));
    }

    public function show($id)
    {
        $departament = Departaments::findOrFail($id);
        return view('panel.departamento.show', compact('departament'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departament = Departaments::findorFail($id);
        $departament->delete();
        return redirect()->route('departamento.lista')->with('eliminar', 'ok');
    }

}

