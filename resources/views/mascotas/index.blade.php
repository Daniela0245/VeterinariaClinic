@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Lista de Mascotas</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Especie</th>
                            <th>Raza</th>
                            <th>Edad</th>
                            <th>Dueno</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mascotas as $mascota)
                            <tr>
                                <td>{{ $mascota->nombre }}</td>
                                <td>{{ $mascota->especie }}</td>
                                <td>{{ $mascota->raza }}</td>
                                <td>{{ $mascota->edad }}</td>
                                <td>{{ $mascota->dueno->nombre }}</td>
                                <td>
                                    <a href="{{ route('mascotas.edit', $mascota->id) }}" class="btn btn-primary">Editar</a>
                                    <form action="{{ route('mascotas.destroy', $mascota->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
