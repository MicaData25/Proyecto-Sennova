<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto; // Corregir la referencia del modelo
use App\Models\Programa;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProyectoExport;
use Throwable;

class ProyectoController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-proyecto|crear-proyecto|editar-proyecto|borrar-proyecto')->only('index');
         $this->middleware('permission:crear-proyecto', ['only' => ['create','store']]);
         $this->middleware('permission:editar-proyecto', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-proyecto', ['only' => ['destroy']]);
    }

    public function index()
    {
        $proyectos = Proyecto::paginate(10);
        return view('proyectos.index', compact('proyectos'));
    }

    public function create()
    {
        $programas = Programa::all();
        return view('proyectos.crear', compact('programas'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required',
                'ano' => 'required',
                'lider' => 'required',
                'programaFormacion' => 'required',
                'valorFinanciero' => 'required|numeric',
                'productos' => 'required',
                'ponencias' => 'required',
                'edt' => 'required',
                'libro' => 'required',
                'articulo' => 'required',
                'tipo' => 'required',
            ]);

            Proyecto::create($request->all());

            Alert::success('¡Felicitaciones!', '¡Proyecto guardado con éxito!');
            return redirect()->route('proyectos.index');

        } catch (Throwable $e) {
            Alert::error('¡Error Crear Proyecto!', '¡Error Al Crear Proyecto!');
            return redirect()->route('proyectos.index');
        }
    }

    public function show($id)
    {
        $proyecto = Proyecto::find($id);
        return view('proyectos.detalles', compact('proyecto'));
    }

    public function edit($id)
    {
        $proyecto = Proyecto::find($id);
        $programas = Programa::all();
        return view('proyectos.editar', compact('proyecto', 'programas'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nombre' => 'required',
                'ano' => 'required',
                'lider' => 'required',
                'programaFormacion' => 'required',
                'valorFinanciero' => 'required|numeric',
                'productos' => 'required',
                'ponencias' => 'required',
                'edt' => 'required',
                'libro' => 'required',
                'articulo' => 'required',
                'tipo' => 'required',
            ]);

            $proyecto = Proyecto::find($id);
            $proyecto->update($request->all());

            Alert::success('¡Felicitaciones!', '¡Proyectos Editado con éxito!');
            return redirect()->route('proyectos.index');

        } catch (Throwable $e) {
            Alert::error('¡Error Editado Proyecto!', '¡Error Al Editado Proyecto!');
            return redirect()->route('proyectos.index');
        }
    }

    public function destroy($id)
    {
        Proyecto::find($id)->delete();
        return redirect()->route('proyectos.index');
    }

    public function export()
    {
        return Excel::download(new ProyectoExport, 'proyectos.xlsx');
    }

    public function financiados()
    {
        $proyectos = Proyecto::where('tipo', 'financiado')->paginate(10);
        return view('proyectos.financiados', compact('proyectos'));
    }

    public function semilleros()
    {
        $proyectos = Proyecto::where('tipo', 'semillero')->paginate(10);
        return view('proyectos.semilleros', compact('proyectos'));
    }

    public function searchFinanciados(Request $request)
    {
        $projectName = $request->get('projectName');
        $proyectos = Proyecto::where('nombre', 'like', '%' . $projectName . '%')->where('tipo', 'financiado')->get();
        return view('proyectos.partials.financiados_results', compact('proyectos'));
    }
}
