@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Lista de Dueños</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($duenos as $dueno)
                            <tr>
                                <td>{{ $dueno->nombre }}</td>
                                <td>{{ $dueno->apellido }}</td>
                                <td>{{ $dueno->direccion }}</td>
                                <td>{{ $dueno->telefono }}</td>
                                <td>{{ $dueno->email }}</td>
                                <td>
                                    <a href="{{ route('duenos.edit', $dueno->id) }}" class="btn btn-primary">Editar</a>
                                    <form action="{{ route('duenos.destroy', $dueno->id) }}" method="POST">
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
