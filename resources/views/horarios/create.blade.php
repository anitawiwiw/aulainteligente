@extends('layouts.app')

@section('content')
    <h1>Crear Horario</h1>

    <form action="{{ route('horarios.store') }}" method="POST">
        @csrf

        <label>Código:</label>
        <input type="text" name="codigo" value="{{ old('codigo') }}" required><br>

        <label>Día:</label>
        <input type="text" name="dia" value="{{ old('dia') }}" required><br>

        <label>Hora inicio:</label>
        <input type="time" name="hora_inicio" value="{{ old('hora_inicio') }}" required><br>

        <label>Hora fin:</label>
        <input type="time" name="hora_fin" value="{{ old('hora_fin') }}" required><br>

        <label>¿Requiere reserva?</label>
        <input type="checkbox" name="necesita_reserva" {{ old('necesita_reserva') ? 'checked' : '' }}><br>

        <button type="submit">Guardar</button>
    </form>

    <a href="{{ route('horarios.index') }}">Volver</a>
@endsection
