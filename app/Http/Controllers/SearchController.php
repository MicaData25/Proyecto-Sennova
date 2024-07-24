<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Proyectos;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        // Lógica de búsqueda, ejemplo:
        $results = Proyectos::where('nombre', 'LIKE', "%{$query}%")->get(); // Ajusta 'nombre' según el campo que deseas buscar

        return view('search_results', compact('results'));
    }
}
