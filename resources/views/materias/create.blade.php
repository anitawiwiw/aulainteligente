@extends('layouts.app')

@section('content')
    <h1>Crear Materia</h1>

    <form action="{{ route('materias.store') }}" method="POST">
        @csrf

        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}" required><br>
        <label>Año:</label>
        <select name="año" required>
          @foreach(['1ºA','1ºB','2ºA','2ºB','3ºA','3ºB','4ºA','4ºB','5ºA'] as $opcion)
            <option value="{{ $opcion }}" {{ old('año') == $opcion ? 'selected' : '' }}>{{ $opcion }}</option>
          @endforeach
        </select><br>
        <label>Tipo de Cursada:</label>
        <select name="tipo_cursada" required>
            <option value="">Seleccione...</option>
            <option value="mai" {{ old('tipo_cursada') == 'mai' ? 'selected' : '' }}>MAI</option>
            <option value="proyecto" {{ old('tipo_cursada') == 'proyecto' ? 'selected' : '' }}>Proyecto</option>
            <option value="eco" {{ old('tipo_cursada') == 'eco' ? 'selected' : '' }}>ECO</option>
        </select><br>

        <label>Carrera:</label>
        <input type="text" name="carrera" value="{{ old('carrera') }}" required><br>

        <button type="submit">Guardar</button>
    </form>

    <a href="{{ route('materias.index') }}">Volver</a>
@endsection
