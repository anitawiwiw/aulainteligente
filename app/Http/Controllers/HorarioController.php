<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Materia;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
public function index()
    {
        $horarios = Horario::with('materia')->get();
        return view('horarios.index', compact('horarios'));
    }

public function create()
    {
         $materias = Materia::all();
    return view('horarios.create', compact('materias'));
    }

 public function store(Request $request)
{
    $request->validate([
    'codigo' => 'required|string|max:255',
    'dia' => 'required|string',
    'hora_inicio' => 'required',
    'hora_fin' => 'required',
    'turno' => 'required|string',
    'periodo' => 'required|string',
    'necesita_reserva' => 'nullable|boolean',
    'materia_id' => 'required|exists:materias,id',
]);

$data = $request->all();
$data['necesita_reserva'] = $request->has('necesita_reserva');

Horario::create($data);


    return redirect()->route('horarios.index')->with('success', 'Horario creado correctamente.');
}


    public function edit(Horario $horario)
    {
        $materias = Materia::all();
        return view('horarios.edit', compact('horario', 'materias'));
    }

    public function update(Request $request, Horario $horario)
    {
   $request->validate([
    'codigo' => 'required|string|max:255',
    'dia' => 'required|in:lunes,martes,miércoles,jueves,viernes',
    'hora_inicio' => 'required|date_format:H:i',
    'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
    'necesita_reserva' => 'sometimes|boolean',
    'turno' => 'required|in:mañana,tarde',
]);


        $horario->update([
            'dia' => $request->dia,
            'hora_inicio' => $request->hora_inicio,
            'hora_fin' => $request->hora_fin,
            'turno' => $request->turno,
            'necesita_reserva' => $request->has('necesita_reserva'),
            'periodo' => $request->periodo,
            'materia_id' => $request->materia_id,
        ]);

        return redirect()->route('horarios.index')->with('success', 'Horario actualizado correctamente.');
    }

    public function destroy(Horario $horario)
    {
        $horario->delete();
        return redirect()->route('horarios.index')->with('success', 'Horario eliminado correctamente.');
    }
}

