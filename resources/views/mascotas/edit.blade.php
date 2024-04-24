@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Editar Mascota</h2>
                <form action="{{ route('mascotas.update', $mascota->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $mascota->nombre }}">
                    </div>
                    <div class="form-group">
                        <label for="especie">Especie:</label>
                        <input type="text" class="form-control" id="especie" name="especie" value="{{ $mascota->especie }}">
                    </div>
                    <div class="form-group">
                        <label for="raza">Raza:</label>
                        <input type="text" class="form-control" id="raza" name="raza" value="{{ $mascota->raza }}">
                    </div>
                    <div class="form-group">
                        <label for="edad">Edad:</label>
                        <input type="number" class="form-control" id="edad" name="edad" value="{{ $mascota->edad }}">
                    </div>
                    <div class="form-group">
                        <label for="dueno_id">Dueño:</label>
                        <select class="form-control" id="dueno_id" name="dueno_id">
                            @foreach($duenos as $dueno)
                                <option value="{{ $dueno->id }}" {{ $mascota->dueno_id == $dueno->id ? 'selected' : '' }}>{{ $dueno->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar Mascota</button>
                </form>
            </div>
        </div>
    </div>
@endsection
