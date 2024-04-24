@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Agregar Mascota</h2>
                <form action="{{ route('mascotas.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="form-group">
                        <label for="especie">Especie:</label>
                        <input type="text" class="form-control" id="especie" name="especie">
                    </div>
                    <div class="form-group">
                        <label for="raza">Raza:</label>
                        <input type="text" class="form-control" id="raza" name="raza">
                    </div>
                    <div class="form-group">
                        <label for="edad">Edad:</label>
                        <input type="number" class="form-control" id="edad" name="edad">
                    </div>
                    <div class="form-group">
                        <label for="dueno_id">Dueño:</label>
                        <select class="form-control" id="dueno_id" name="dueno_id">
                            @foreach($duenos as $dueno)
                                <option value="{{ $dueno->id }}">{{ $dueno->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar Mascota</button>
                </form>
            </div>
        </div>
    </div>
@endsection
