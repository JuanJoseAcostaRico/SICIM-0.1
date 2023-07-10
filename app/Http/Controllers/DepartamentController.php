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
        $departament = new Departaments();
        $departament->departament_name = $request->departament_name;
        $departament->state_fke = $request->state_fke;
        $departament->user_id = $request->user_id;
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
        $departament = Departaments::findOrFail($request->id);
        $departament->departament_name = $request->departament_name;
        $departament->state_fke = $request->state_fke;
        $departament->user_id = $request->user_id;
        $departament->save();

        return redirect()->route('departamento.lista');

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
}

