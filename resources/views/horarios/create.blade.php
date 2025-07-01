@extends('layouts.app')

@section('content')
    <h1>Crear Horario</h1>

    <form action="{{ route('horarios.store') }}" method="POST">
        @csrf

        <label>Código:</label>
        <input type="text" name="codigo" value="{{ old('codigo') }}" required><br>
<label>Día:</label>
<select name="dia" required>
    @foreach(['lunes','martes','miércoles','jueves','viernes'] as $dia)
        <option value="{{ $dia }}" {{ old('dia', $horario->dia ?? '') == $dia ? 'selected' : '' }}>{{ ucfirst($dia) }}</option>
    @endforeach
</select><br>
        <label>Hora inicio:</label>
        <input type="time" name="hora_inicio" value="{{ old('hora_inicio') }}" required><br>

        <label>Hora fin:</label>
        <input type="time" name="hora_fin" value="{{ old('hora_fin') }}" required><br>

    <label>Turno:</label>
<select name="turno" required>
    @foreach(['mañana','tarde'] as $turno)
        <option value="{{ $turno }}" {{ old('turno', $horario->turno ?? '') == $turno ? 'selected' : '' }}>{{ ucfirst($turno) }}</option>
    @endforeach
</select><br>
        <label>¿Requiere reserva?</label>
        <input type="checkbox" name="necesita_reserva" {{ old('necesita_reserva') ? 'checked' : '' }}><br>

       <label>Periodo:</label>
<input type="text" name="periodo" value="{{ old('periodo') }}" required><br>

       <label>Materia:</label>
<select name="materia_id" required>
    @foreach($materias as $materia)
        <option value="{{ $materia->id }}">{{ $materia->nombre }} ({{ $materia->año }})</option>
    @endforeach
</select><br>

        <button type="submit">Guardar</button>
    </form>

    <a href="{{ route('horarios.index') }}">Volver</a>
@endsection
