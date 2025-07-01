@extends('layouts.app')

@section('content')
    <h1>Materias</h1>

    <a href="{{ route('materias.create') }}">Crear nueva materia</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Año</th>
                <th>Tipo de cursada</th>
                <th>Carrera</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($materias as $materia)
            <tr>
                <td>{{ $materia->nombre }}</td>
                <td>{{ $materia->año }}</td>
                <td>{{ ucfirst($materia->tipo_cursada) }}</td>
                <td>{{ $materia->carrera }}</td>
                <td>
                    <a href="{{ route('materias.edit', $materia) }}">Editar</a>
                    <form action="{{ route('materias.destroy', $materia) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Eliminar esta materia?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
