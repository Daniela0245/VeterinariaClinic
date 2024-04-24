<?php

namespace App\Http\Controllers;

use App\Models\Visita;
use Illuminate\Http\Request;

class VisitaController extends Controller
{
    // Mostrar lista de visitas con sus mascotas
    public function index()
    {
        $visitas = Visita::with('mascota')->get();
        return view('visitas.index', compact('visitas'));
    }

    // Mostrar formulario para crear una nueva visita
    public function create()
    {
        return view('visitas.create');
    }

    // Almacenar una nueva visita en la base de datos
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'mascota_id' => 'required',
            'fecha_visita' => 'required',
            'motivo' => 'required',
            'tratamiento' => 'required',
        ]);

        // Crear una nueva visita
        Visita::create($request->all());

        return redirect()->route('visitas.index')
                         ->with('success', 'Visita creada exitosamente.');
    }

    // Mostrar los detalles de una visita específica
    public function show($id)
    {
        $visita = Visita::with('mascota')->find($id);
        return view('visitas.show', compact('visita'));
    }

    // Mostrar formulario para editar una visita específica
    public function edit($id)
    {
        $visita = Visita::find($id);
        return view('visitas.edit', compact('visita'));
    }

    // Actualizar una visita en la base de datos
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'mascota_id' => 'required',
            'fecha_visita' => 'required',
            'motivo' => 'required',
            'tratamiento' => 'required',
        ]);

        // Actualizar la visita
        Visita::find($id)->update($request->all());

        return redirect()->route('visitas.index')
                         ->with('success', 'Visita actualizada exitosamente.');
    }

    // Eliminar una visita de la base de datos
    public function destroy($id)
    {
        // Eliminar la visita
        Visita::find($id)->delete();

        return redirect()->route('visitas.index')
                         ->with('success', 'Visita eliminada exitosamente.');
    }
}
