<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\View;

class BackupController extends Controller
{
    public function index() {
        return view::make('panel.respaldos.respaldo');
    }

    public function crearRespaldo(Request $request)
    {
        // Ejecutar el comando para crear el respaldo
        Artisan::call('backup:run', ['--only-db' => true, '--disable-notifications' => true]);

        // Redirigir de vuelta con un mensaje de éxito
        return redirect()->route('respaldo.index')->with('creado', 'ok');
    }
}
