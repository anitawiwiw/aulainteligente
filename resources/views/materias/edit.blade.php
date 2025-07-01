@extends('layouts.app')

@section('content')
    <h1>Editar Materia</h1>

    <form action="{{ route('materias.update', $materia) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre', $materia->nombre) }}" required><br>

        <label>Año:</label>
        <input type="number" name="año" value="{{ old('año', $materia->año) }}" required><br>

        <label>Tipo de Cursada:</label>
        <select name="tipo_cursada" required>
            <option value="">Seleccione...</option>
            <option value="mai" {{ old('tipo_cursada', $materia->tipo_cursada) == 'mai' ? 'selected' : '' }}>MAI</option>
            <option value="proyecto" {{ old('tipo_cursada', $materia->tipo_cursada) == 'proyecto' ? 'selected' : '' }}>Proyecto</option>
            <option value="eco" {{ old('tipo_cursada', $materia->tipo_cursada) == 'eco' ? 'selected' : '' }}>ECO</option>
        </select><br>

        <label>Carrera:</label>
        <input type="text" name="carrera" value="{{ old('carrera', $materia->carrera) }}" required><br>

        <button type="submit">Actualizar</button>
    </form>

    <a href="{{ route('materias.index') }}">Volver</a>
@endsection
