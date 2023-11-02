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
            'Serial',
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
        $rules = [
            'instrument_name' => 'required',
            'instrument_size' => 'required',
            'instrument_serial_code' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9]{11,20}$/',
            'departament_fke' => 'required',
            'condition_fke' => 'required',
        ];

        // Definir mensajes de error personalizados
        $messages = [
            'instrument_name.required' => 'El nombre del instrumento es obligatorio.',
            'instrument_size.required' => 'El tamaño del instrumento es obligatorio.',
            'instrument_serial_code.required' => 'El código serial del instrumento es obligatorio.',
            'instrument_serial_code.regex' => 'El código serial debe contener solo letras y números y tener entre 11 y 20 caracteres.',
            'departament_fke.required' => 'El departamento es obligatorio.',
            'condition_fke.required' => 'La condición del instrumento es obligatoria.',
        ];

        // Validar los datos del formulario usando las reglas y mensajes personalizados
        $validatedData = $request->validate($rules, $messages);

        $instrument = new Instruments();
        $instrument->instrument_name = $validatedData['instrument_name'];
        $instrument->instrument_size = $validatedData['instrument_size'];
        $instrument->instrument_desc = $request->input('instrument_desc'); // Puede ser nulo
        $instrument->instrument_serial_code = $validatedData['instrument_serial_code'];
        $instrument->departament_fke = $validatedData['departament_fke'];
        $instrument->condition_fke = $validatedData['condition_fke'];
        $instrument->save();

        return redirect()->route('inventario.instrumentos.lista')->with('creacion', 'ok');

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
        $rules = [
            'instrument_name' => 'required',
            'instrument_size' => 'required',
            'instrument_serial_code' => 'required|regex:/^[A-Z0-9]{11,20}$/',
            'departament_fke' => 'required',
            'condition_fke' => 'required',
        ];

        // Definir mensajes de error personalizados
        $messages = [
            'instrument_name.required' => 'El nombre del instrumento es obligatorio.',
            'instrument_size.required' => 'El tamaño del instrumento es obligatorio.',
            'instrument_serial_code.required' => 'El código serial del instrumento es obligatorio.',
            'instrument_serial_code.regex' => 'El código serial debe contener solo letras y números y tener entre 11 y 20 caracteres.',
            'departament_fke.required' => 'El departamento es obligatorio.',
            'condition_fke.required' => 'La condición del instrumento es obligatoria.',
        ];

        // Validar los datos del formulario usando las reglas y mensajes personalizados
        $validatedData = $request->validate($rules, $messages);

        // En lugar de buscar el instrumento por $request->id, utiliza el ID proporcionado en la URL ($id)
        $instrument = Instruments::findOrFail($id);
        $instrument->instrument_name = $validatedData['instrument_name'];
        $instrument->instrument_size = $validatedData['instrument_size'];
        $instrument->instrument_desc = $request->input('instrument_desc'); // Puede ser nulo
        $instrument->instrument_serial_code = $validatedData['instrument_serial_code'];
        $instrument->departament_fke = $validatedData['departament_fke'];
        $instrument->condition_fke = $validatedData['condition_fke'];
        $instrument->save();

        return redirect()->route('inventario.instrumentos.lista')->with('edicion', 'ok');
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
        return redirect()->route('inventario.instrumentos.lista')->with('eliminar', 'ok');
    }
}
