<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BackupController extends Controller
{
    public function index() {
        return view::make('panel.respaldos.respaldo');
    }

    public function crearRespaldo(Request $request)
    {
        // Ejecutar el comando para crear el respaldo
        Artisan::call('backup:run', ['--only-db' => true,
        '--disable-notifications' => true]);

        // Redirigir de vuelta con un mensaje de éxito
        return redirect()->route('respaldo.index')->with('creado', 'ok');
    }

    public function restaurarRespaldo(Request $request)
    {

        $backupFile = $request->file('backup');

        if($backupFile){
            // Mover el archivo a una ubicación temporal (storage/app/temp)
            $temporaryPath = $backupFile->storeAs
            ('temp', $backupFile->getClientOriginalName(), 'local');

            //Ejecutar comando artisan:restore con flags

            Artisan::call('backup:restore', [
                '--disk' => 'local',
                '--backup' => $temporaryPath,
                '--env' => true,
                '-n' => true

            ]);

            // Eliminar el archivo temporal creado

            Storage::disk('local')->delete($temporaryPath);

            //

            return redirect()->route('respaldo.index')->with('restaurado', 'ok');




        } else{

            return redirect()->route('respaldo.index')->with('creado', 'ok');
        }

    }
}
