<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programa;
use App\Models\Proyectos;

class ProgramaController extends Controller
{
    public function index()
    {
        $programas = Programa::all();
        return view('programas.index', compact('programas'));
    }

    public function create()
    {
        return view('programas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'año' => 'required|integer',
            'lider_instructor' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
            'duracion' => 'nullable|string|max:100',
            'otros_detalles' => 'nullable|string',
        ]);

        Programa::create($request->all());

        return redirect()->route('programas.index')
                         ->with('success', 'Programa de formación creado exitosamente.');
    }

    public function show($id)
    {
        $programa = Programa::findOrFail($id);
        return view('programas.show', compact('programa'));
    }

    public function edit($id)
    {
        $programa = Programa::findOrFail($id);
        return view('programas.edit', compact('programa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'año' => 'required|integer',
            'lider_instructor' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
            'duracion' => 'nullable|string|max:100',
            'otros_detalles' => 'nullable|string',
        ]);

        $programa = Programa::findOrFail($id);
        $programa->update($request->all());

        return redirect()->route('programas.index')
                         ->with('success', 'Programa de formación actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $programa = Programa::findOrFail($id);
        $programa->delete();

        return redirect()->route('programas.index')
                         ->with('success', 'Programa de formación eliminado exitosamente.');
    }

    public function proyectosAsociados($id)
    {
        $programa = Programa::findOrFail($id);
        $proyectos = Proyectos::where('programaFormacion', $programa->nombre)->paginate(10);
        return view('programas.proyectosAsociados', compact('proyectos', 'programa'));
    }
}
