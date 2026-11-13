<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedor::latest()->paginate(10);
        return view('Layouts.proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Layouts.proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'identidad'      => 'nullable|max:255',
            'rtn'            => 'nullable|max:255',
            'empresa'        => 'nullable',
            'contacto'       => 'nullable',
            'telefono'       => 'nullable',
            'categoria'      => 'nullable',
            'lim_credito'    => 'nullable|numeric|min:0',
            'dias_credito'   => 'nullable',
            'activo' => 'required|in:Activo,Inactivo',
            'registro'       => 'nullable',
        ]);

        Proveedor::create($request->all());

        return redirect()->route('proveedores.index')
                         ->with('success', '¡Proveedor registrado exitosamente en el sistema!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $proveedor)
    {
        return view('Layouts.proveedores.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        $request->validate([
            'identidad'      => 'nullable|max:255',
            'rtn'            => 'nullable|max:255',
            'empresa'        => 'nullable',
            'contacto'       => 'nullable',
            'telefono'       => 'nullable',
            'categoria'      => 'nullable',
            'lim_credito'    => 'nullable|numeric|min:0',
            'dias_credito'   => 'nullable',
            'activo' => 'required|in:Activo,Inactivo',
            'registro'       => 'nullable',
        ]);

        $proveedor->update($request->all());

        return redirect()->route('proveedores.index')
                         ->with('success', '¡Proveedor actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();

        return redirect()->route('proveedores.index')
                         ->with('success', '¡Proveedor eliminado del sistema!');
    }
}
