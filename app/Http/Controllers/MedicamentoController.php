<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicamentos = Medicamento::latest()->paginate(10);
        return view('Layouts.medicamentos.index', compact('medicamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Layouts.medicamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo'      => 'nullable|max:255',
            'nombre'      => 'nullable|max:255',
            'categoria'   => 'nullable',
            'precio'      => 'nullable|numeric|min:0',
            'costo'       => 'nullable|numeric|min:0',
            'stock'       => 'nullable|integer|min:0',
            'imagen'      => 'nullable',
            'laboratorio' => 'nullable|max:255',
            'vencimiento' => 'nullable|max:255',
            'registro'    => 'nullable|max:255',
            'lote'        => 'nullable|max:255',
        ]);

        Medicamento::create($request->all());

        return redirect()->route('medicamentos.index')
                         ->with('success', '¡Medicamento registrado exitosamente en el inventario!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicamento $medicamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicamento $medicamento)
    {
        return view('Layouts.medicamentos.edit', compact('medicamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medicamento $medicamento)
    {
        $request->validate([
            'codigo'      => 'nullable|max:255',
            'nombre'      => 'nullable|max:255',
            'categoria'   => 'nullable',
            'precio'      => 'nullable|numeric|min:0',
            'costo'       => 'nullable|numeric|min:0',
            'stock'       => 'nullable|integer|min:0',
            'imagen'      => 'nullable',
            'laboratorio' => 'nullable|max:255',
            'vencimiento' => 'nullable|max:255',
            'registro'    => 'nullable|max:255',
            'lote'        => 'nullable|max:255',
        ]);

        $medicamento->update($request->all());

        return redirect()->route('medicamentos.index')
                         ->with('success', '¡Medicamento actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicamento $medicamento)
    {
        $medicamento->delete();

        return redirect()->route('medicamentos.index')
                         ->with('success', '¡Medicamento eliminado del inventario!');
    }
}
