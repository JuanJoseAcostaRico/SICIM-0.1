<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\InsumosExport;
use App\Exports\InsumosPorFechasExport;
use App\Exports\InstrumentosExport;
use App\Exports\InstrumentosPorFechasExport;
use App\Exports\InstrumentosPorDepartamentosExport;
use App\Exports\MovimientosExport;
use App\Exports\MovimientosPorFechasExport;
use Carbon\Carbon;
use App\Models\Instruments;
use App\Models\Conditions;
use App\Models\Movements;
use App\Models\Supplies;
use App\Models\Departaments;
use Illuminate\Support\Facades\View;

class ReportController extends Controller
{
    //Vista reportes instrumentos
    public function listaRepoInstrumentView()
    {
        $departaments = Departaments::all();

        return view::make('panel.reportes.listaRepoInstrument', compact('departaments'));
    }

    //Reporte general insumos
    public function insumos(Request $request)
    {
        $now = Carbon::now();

        $formattedDate = $now->format('Y-m-d_His');
        $fileName = 'insumos_lista_general_reporte_'.$formattedDate.'.xlsx';

        return Excel::download(new InsumosExport(), $fileName);
        // return redirect()->route('panel.reportes')->with('insumos_general', 'ok');
    }

    //Reporte por fechas insumos
    public function insumosporfechas(Request $request)
    {
        $now = Carbon::now();
        $formattedDate = $now->format('Y-m-d_His');
        $fileName = 'insumos_por_fecha_report'.$formattedDate.'.xlsx';

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        // Genera un reporte por rango de fechas

        $insumos=Supplies::whereBetween('created_at', [$start_date, $end_date])->get();

        return Excel::download(new InsumosPorFechasExport($start_date, $end_date), $fileName);
    }

    //Reporte general instrumentos
    public function instrumentos(Request $request)
    {
        // Genera un reporte general
        $now = Carbon::now();
        $formattedDate = $now->format('Y-m-d_His');
        $fileName = 'instrumentos_lista general_reporte_'.$formattedDate.'.xlsx';
        return Excel::download(new InstrumentosExport(), $fileName);
    }

    //Reporte por rango de fechas instrumentos
    public function instrumentosporfechas(Request $request)
    {
        $now = Carbon::now();
        $formattedDate = $now->format('Y-m-d_His');
        $fileName = 'instrumentos_por_fechas_reporte_'.$formattedDate.'.xlsx';
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        // Genera un reporte por rango de fechas

        $instrumentos = Instruments::whereBetween('created_at', [$start_date, $end_date])->get();

        return Excel::download(new InstrumentosPorFechasExport($start_date, $end_date), $fileName);
    }

    public function instrumentospordepartamento(Request $request)
    {
        $selected_department = $request->input('selected_department');

        // Obtén los instrumentos del departamento seleccionado
        $instrumentos = Instruments::where('departament_fke', $selected_department)->get();

        // Obtén el nombre del departamento seleccionado
        $departamento = Departaments::find($selected_department);

        // Genera el nombre del archivo
        $now = Carbon::now();
        $formattedDate = $now->format('Y-m-d_His');
        $fileName = 'instrumentos_por_departamento_' . $departamento->departament_name . '_' . $formattedDate . '.xlsx';

        // Descarga el archivo Excel
        return Excel::download(new InstrumentosPorDepartamentosExport($instrumentos, $departamento), $fileName);
    }



    //Reporte general movimientos
    public function movimientos(Request $request)
    {
        // Genera un reporte general
        $now = Carbon::now();
        $formattedDate = $now->format('Y-m-d_His');
        $fileName = 'movimientos_reporte_general_'.$formattedDate.'.xlsx';
        return Excel::download(new MovimientosExport(), $fileName);
    }

    //Reporte por rango de fechas movimientos
    public function movimientosporfechas(Request $request)
    {
        $now = Carbon::now();
        $formattedDate = $now->format('Y-m-d_His');
        $fileName = 'insumos_por_fecha_report' . $formattedDate . '.xlsx';
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        // Genera un reporte por rango de fechas

        $instruemntos = Movements::whereBetween('created_at', [$start_date, $end_date])->get();

        return Excel::download(new MovimientosPorFechasExport($start_date, $end_date), $fileName);
    }

}

