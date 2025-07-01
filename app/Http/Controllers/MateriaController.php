<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function index()
    {
        $materias = Materia::all();
        return view('materias.index', compact('materias'));
    }

    public function create()
    {
        return view('materias.create');
    }

    public function store(Request $request)
    
    {$request->validate([
    'nombre' => 'required|string|max:255',
    'año' => 'required|in:1ºA,1ºB,2ºA,2ºB,3ºA,3ºB,4ºA,4ºB,5ºA',
    'tipo_cursada' => 'required|in:mai,proyecto,eco',
    'carrera' => 'required|string|max:255',
]);



        Materia::create([
            'nombre' => $request->nombre,
            'año' => $request->año,
            'tipo_cursada' => $request->tipo_cursada,
            'carrera' => $request->carrera,
        ]);

        return redirect()->route('materias.index')->with('success', 'Materia creada correctamente.');
    }

    public function edit(Materia $materia)
    {
        return view('materias.edit', compact('materia'));
    }

    public function update(Request $request, Materia $materia)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:materias,nombre,' . $materia->id,
            'año' => 'required|integer|min:1|max:10',
            'tipo_cursada' => 'required|in:mai,proyecto,eco',
            'carrera' => 'required|string|max:255',
        ]);

        $materia->update([
            'nombre' => $request->nombre,
            'año' => $request->año,
            'tipo_cursada' => $request->tipo_cursada,
            'carrera' => $request->carrera,
        ]);

        return redirect()->route('materias.index')->with('success', 'Materia actualizada correctamente.');
    }

    public function destroy(Materia $materia)
    {
        $materia->delete();
        return redirect()->route('materias.index')->with('success', 'Materia eliminada correctamente.');
    }
}
