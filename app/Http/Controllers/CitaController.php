<?php

namespace App\Http\Controllers;
use App\Models\Cita;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    

    public function index()
    {
        // Mostrar solo pendientes (o no atendidos) en la vista principal
        $citas = Cita::where('estado', '!=', 'atendido')->get();
        return view('logica.citas', compact('citas'));
    }

    public function atendidos()
    {
        // Mostrar solo atendidos
        $citas = Cita::where('estado', 'atendido')->get();
        return view('logica.atendidos', compact('citas')); // Nueva vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          return view('logica.citas');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
        'paciente' => 'required|string|max:255',
        'tipo'     => 'required|string',
        'fecha'    => 'required|date',
        'hora'     => 'required',
        'precio'   => 'required|numeric',
        'estado'   => 'required|string'
    ]);

    // Guardar la cita
    Cita::create($validated);

    // Redirigir o retornar respuesta
    return redirect()->route('logica.citas')->with('success', 'Cita registrada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    { $cita = Cita::findOrFail($id);
    $citas = Cita::paginate(10); // Obtener todas las citas
    return view('logica.citas', compact('cita', 'citas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $cita = Cita::findOrFail($id);
    $cita->update($request->only(['paciente', 'tipo', 'fecha', 'hora', 'precio', 'estado']));

    return redirect()->route('logica.citas')->with('success', 'Cita actualizada correctamente.');
    }


    public function destroy(string $id)
    {
       $cita = Cita::findOrFail($id);
        $cita->delete();

        return redirect()->route('logica.citas')->with('success', 'Cita eliminada correctamente.');
    }

    public function toggleStatus($id)
    {
        $cita = Cita::findOrFail($id);
        $cita->estado = $cita->estado === 'atendido' ? 'pendiente' : 'atendido';
        $cita->save();

        return redirect()->back()->with('success', 'Estado de la cita actualizado correctamente.');
    }
}
