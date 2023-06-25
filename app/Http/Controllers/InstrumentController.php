<?php

namespace App\Http\Controllers;
use App\Models\Instruments;
use Illuminate\Http\Request;

class InstrumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $instruments = Instruments::all();
        return $instruments;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $instrument->department_fke = $request->department_fke;
        $instrument->condition_fke = $request->condition_fke;
        $instrument->save();

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
        $instrument = Instruments::find($id);
        return $instrument;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $instrument->department_fke = $request->department_fke;
        $instrument->condition_fke = $request->condition_fke;
        $instrument->save();
        return $instrument;
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
        $instrument = Instruments::destroy($id);
        return $instrument;
    }
}
