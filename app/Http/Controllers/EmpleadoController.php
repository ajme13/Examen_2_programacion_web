<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::latest()->paginate(10);
        return view('Layouts.empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Layouts.empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'identidad'      => 'nullable|max:255',
            'nombre'         => 'nullable|max:255',
            'apellido'       => 'nullable',
            'correo'         => 'nullable',
            'cargo'          => 'nullable',
            'salario'        => 'nullable|numeric|min:0',
            'estado'         => 'nullable',
            'ingreso'        => 'nullable',
        ]);

        Empleado::create($request->all());

        return redirect()->route('empleados.index')
                         ->with('success', '¡Empleado registrado exitosamente en el sistema!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        return view('Layouts.empleados.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        $request->validate([
            'identidad'      => 'nullable|max:255',
            'nombre'         => 'nullable|max:255',
            'apellido'       => 'nullable',
            'correo'         => 'nullable',
            'cargo'          => 'nullable',
            'salario'        => 'nullable|numeric|min:0',
            'activo'         => 'nullable|max:255',
            'ingreso'        => 'nullable|max:255',
        ]);

        $empleado->update($request->all());

        return redirect()->route('empleados.index')
                         ->with('success', '¡Empleado actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();

        return redirect()->route('empleados.index')
                         ->with('success', '¡Empleado eliminado del sistema!');
    }
}
