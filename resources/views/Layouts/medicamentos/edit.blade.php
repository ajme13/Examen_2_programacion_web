@extends('layouts.admin')

@section('titulo', 'Editar Medicamento')

@section('contenido')
<h1 class="h3 mb-3">✏️ Editar Medicamento: {{ $medicamento->nombre }}</h1>

<div class="card shadow-sm col-lg-8">
    <div class="card-body">
        <form action="{{ route('medicamentos.update', $medicamento) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card shadow-sm mb-4">
    <div class="card-header bg-white py-3">
        <h6 class="m-0 font-weight-bold text-primary">Actualizar Información del Producto</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('medicamentos.update', $medicamento) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Código (SKU)</label>
                    <input type="text" name="codigo" class="form-control @error('codigo') is-invalid @enderror" value="{{ old('codigo', $medicamento->codigo) }}">
                    @error('codigo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-8 mb-3">
                    <label class="form-label fw-bold">Nombre del Medicamento</label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $medicamento->nombre) }}">
                    @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Categoría</label>
                    <select name="categoria" class="form-control @error('categoria') is-invalid @enderror">
                        <option value="Antibióticos" {{ old('categoria', $medicamento->categoria) == 'Antibióticos' ? 'selected' : '' }}>Antibióticos</option>
                        <option value="Analgésicos" {{ old('categoria', $medicamento->categoria) == 'Analgésicos' ? 'selected' : '' }}>Analgésicos</option>
                        <option value="Sueros" {{ old('categoria', $medicamento->categoria) == 'Sueros' ? 'selected' : '' }}>Sueros</option>
                        <option value="Material Quirúrgico" {{ old('categoria', $medicamento->categoria) == 'Material Quirúrgico' ? 'selected' : '' }}>Material Quirúrgico</option>
                        <option value="Vitaminas" {{ old('categoria', $medicamento->categoria) == 'Vitaminas' ? 'selected' : '' }}>Vitaminas</option>
                    </select>
                    @error('categoria') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Laboratorio</label>
                    <input type="text" name="laboratorio" class="form-control @error('laboratorio') is-invalid @enderror" value="{{ old('laboratorio', $medicamento->laboratorio) }}">
                    @error('laboratorio') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Precio (Lempiras)</label>
                    <input type="number" step="0.01" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio', $medicamento->precio) }}">
                    @error('precio') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Costo (Lempiras)</label>
                    <input type="number" step="0.01" name="costo" class="form-control @error('costo') is-invalid @enderror" value="{{ old('costo', $medicamento->costo) }}">
                    @error('costo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Stock (Inventario)</label>
                    <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', $medicamento->stock) }}">
                    @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Fecha de Vencimiento</label>
                    <input type="date" name="vencimiento" class="form-control @error('vencimiento') is-invalid @enderror" value="{{ old('vencimiento', $medicamento->vencimiento) }}">
                    @error('vencimiento') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Fecha de Registro</label>
                    <input type="date" name="registro" class="form-control @error('registro') is-invalid @enderror" value="{{ old('registro', $medicamento->registro) }}">
                    @error('registro') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Número de Lote</label>
                    <input type="text" name="lote" class="form-control @error('lote') is-invalid @enderror" value="{{ old('lote', $medicamento->lote) }}">
                    @error('lote') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Imagen (Opcional)</label>
                @if($medicamento->imagen)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $medicamento->imagen) }}" alt="Imagen actual" class="img-thumbnail" style="max-height: 100px;">
                    </div>
                @endif
                <input type="img" name="imagen" accept="image/*" class="form-control @error('imagen') is-invalid @enderror">
                @error('imagen') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('medicamentos.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i> Actualizar Cambios</button>
            </div>
        </form>
    </div>
</div>
@endsection