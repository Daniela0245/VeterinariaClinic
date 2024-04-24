<?php
namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    // Mostrar lista de mascotas con sus dueños
    public function index()
    {
        $mascotas = Mascota::with('dueno')->get();
        return view('mascotas.index', compact('mascotas'));
    }

    // Mostrar formulario para crear una nueva mascota
    public function create()
    {
        return view('mascotas.create');
    }

    // Almacenar una nueva mascota en la base de datos
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'especie' => 'required',
            'raza' => 'required',
            'edad' => 'required',
            'dueno_id' => 'required',
        ]);

        // Crear una nueva mascota
        Mascota::create($request->all());

        return redirect()->route('mascotas.index')
                         ->with('success', 'Mascota creada exitosamente.');
    }

    // Mostrar los detalles de una mascota específica
    public function show($id)
    {
        $mascota = Mascota::with('dueno')->find($id);
        return view('mascotas.show', compact('mascota'));
    }

    // Mostrar formulario para editar una mascota específica
    public function edit($id)
    {
        $mascota = Mascota::find($id);
        return view('mascotas.edit', compact('mascota'));
    }

    // Actualizar una mascota en la base de datos
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'especie' => 'required',
            'raza' => 'required',
            'edad' => 'required',
            'dueno_id' => 'required',
        ]);

        // Actualizar la mascota
        Mascota::find($id)->update($request->all());

        return redirect()->route('mascotas.index')
                         ->with('success', 'Mascota actualizada exitosamente.');
    }

    // Eliminar una mascota de la base de datos
    public function destroy($id)
    {
        // Eliminar la mascota
        Mascota::find($id)->delete();

        return redirect()->route('mascotas.index')
                         ->with('success', 'Mascota eliminada exitosamente.');
    }
}
