@extends('layouts.app')

@section('content')
    <h1>Horarios</h1>

    <a href="{{ route('horarios.create') }}">Crear nuevo horario</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>Código</th>
                <th>Materia</th>
                <th>Día</th>
                <th>Turno</th>
                <th>Periodo</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
                <th>Reserva</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($horarios as $horario)
            <tr>
                <td>{{ $horario->codigo }}</td>
                <td>{{ $horario->materia->nombre ?? 'Sin materia' }}</td>
                <td>{{ $horario->dia }}</td>
                <td>{{ $horario->turno }}</td>
                <td>{{ $horario->periodo }}</td>
                <td>{{ $horario->hora_inicio }}</td>
                <td>{{ $horario->hora_fin }}</td>
                <td>{{ $horario->necesita_reserva ? 'Sí' : 'No' }}</td>
                <td>
                    <a href="{{ route('horarios.edit', $horario) }}">Editar</a>
                    <form action="{{ route('horarios.destroy', $horario) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Eliminar horario?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
