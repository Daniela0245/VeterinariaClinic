<?php

namespace App\Http\Controllers;

use App\Models\Dueno;
use Illuminate\Http\Request;

class DuenoController extends Controller
{
    // Mostrar lista de dueños con sus mascotas
    public function index()
    {
        $duenos = Dueno::with('mascotas')->get();
        return view('duenos.index', compact('duenos'));
    }

    // Mostrar formulario para crear un nuevo dueño
    public function create()
    {
        return view('duenos.create');
    }

    // Almacenar un nuevo dueño en la base de datos
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required',
        ]);

        // Crear un nuevo dueño
        Dueno::create($request->all());

        return redirect()->route('duenos.index')
                         ->with('success', 'Dueño creado exitosamente.');
    }

    // Mostrar los detalles de un dueño específico
    public function show($id)
    {
        $dueno = Dueno::with('mascotas')->find($id);
        return view('duenos.show', compact('dueno'));
    }

    // Mostrar formulario para editar un dueño específico
    public function edit($id)
    {
        $dueno = Dueno::find($id);
        return view('duenos.edit', compact('dueno'));
    }

    // Actualizar un dueño en la base de datos
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required',
        ]);

        // Actualizar el dueño
        Dueno::find($id)->update($request->all());

        return redirect()->route('duenos.index')
                         ->with('success', 'Dueño actualizado exitosamente.');
    }

    // Eliminar un dueño de la base de datos
    public function destroy($id)
    {
        // Eliminar el dueño
        Dueno::find($id)->delete();

        return redirect()->route('duenos.index')
                         ->with('success', 'Dueño eliminado exitosamente.');
    }
}
