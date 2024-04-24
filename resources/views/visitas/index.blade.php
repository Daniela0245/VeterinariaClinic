@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Visitas de Mascotas</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Mascota</th>
                            <th>Dueño</th>
                            <th>Fecha de Visita</th>
                            <th>Motivo</th>
                            <th>Tratamiento</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($visitas as $visita)
                            <tr>
                                <td>{{ $visita->id }}</td>
                                <td>{{ $visita->mascota_nombre }}</td>
                                <td>{{ $visita->dueno_nombre }}</td>
                                <td>{{ $visita->fecha_visita }}</td>
                                <td>{{ $visita->motivo }}</td>
                                <td>{{ $visita->tratamiento }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
