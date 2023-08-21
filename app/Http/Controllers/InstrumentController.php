<?php

namespace App\Http\Controllers;
use App\Models\Instruments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Conditions;
use App\Models\Departaments;

class InstrumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instruments = Instruments::with('conditions', 'departaments')->get();
        $heads = [
            'ID',
            'Nombre',
            'Descripción',
            'Tamaño',
            'Stock',
            'Departamento',
            'Condición',
            'Acciones',
        ];
        return view::make('panel.inventario.instrumentos.listaInstrumentos', compact('instruments', 'heads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    {
    //$instruments = Instruments::all();//
    $conditions = Conditions::all();
    $departaments = Departaments::all();

    return view('panel.inventario.instrumentos.registroInstrumentos', compact('conditions', 'departaments'));
    }
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
        //
        $instrument= new Instruments();
        $instrument->instrument_name = $request->instrument_name;
        $instrument->instrument_size = $request->instrument_size;
        $instrument->instrument_desc = $request->instrument_desc;
        $instrument->instrument_stock = $request->instrument_stock;
        $instrument->departament_fke = $request->departament_fke;
        $instrument->condition_fke = $request->condition_fke;
        $instrument->save();
        return redirect()->route('inventario.instrumentos.lista');

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
        //
        $instrument = Instruments::findorFail($id);
        return view ('panel.inventario.instrumentos.show', compact('instrument'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instrument = Instruments::findOrFail($id);
        $instrumentNames = Instruments::pluck('instrument_name');
        $conditions = Conditions::all();
        $departaments = Departaments::all();
        return view('panel.inventario.instrumentos.edit', compact('instrument', 'instrumentNames', 'departaments', 'conditions'));
        //
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
        //
        $instrument = Instruments::findOrFail($request->id);
        $instrument->instrument_name = $request->instrument_name;
        $instrument->instrument_size = $request->instrument_size;
        $instrument->instrument_desc = $request->instrument_desc;
        $instrument->instrument_stock = $request->instrument_stock;
        $instrument->departament_fke = $request->departament_fke;
        $instrument->condition_fke = $request->condition_fke;
        $instrument->save();
        return redirect()->route('inventario.instrumentos.lista');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $instrument = Instruments::findorFail($id);
        $instrument->delete();
        return redirect()->route('inventario.instrumentos.lista');
    }
}
