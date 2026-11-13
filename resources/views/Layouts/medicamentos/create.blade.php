@extends('layouts.admin')

@section('titulo', 'Registrar Medicamento')

@section('contenido')
<h1 class="h3 mb-3"> Registrar Nuevo Medicamento</h1>

<div class="card shadow-sm col-lg-8">
    <div class="card-body">
        <form action="{{ route('medicamentos.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-bold">Codigo del Medicamento</label>
                <input type="text" name="codigo" class="form-control @error('codigo') is-invalid @enderror" value="{{ old('codigo') }}" placeholder="med-1234">
                @error('codigo') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Nombre</label>
                <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" placeholder="Nombre del medicamento">
                @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría</label>
                <select name="categoria" id="categoria" class="form-control @error('categoria') is-invalid @enderror" required>
                    <option value="" selected disabled>-- Seleccione una categoría --</option>
                    <option value="Antibióticos" {{ old('categoria') == 'Antibióticos' ? 'selected' : '' }}>Antibióticos</option>
                    <option value="Analgésicos" {{ old('categoria') == 'Analgésicos' ? 'selected' : '' }}>Analgésicos</option>
                    <option value="Sueros" {{ old('categoria') == 'Sueros' ? 'selected' : '' }}>Sueros</option>
                    <option value="Material Quirúrgico" {{ old('categoria') == 'Material Quirúrgico' ? 'selected' : '' }}>Material Quirúrgico</option>
                    <option value="Vitaminas" {{ old('categoria') == 'Vitaminas' ? 'selected' : '' }}>Vitaminas</option>
                </select>
    @error('categoria')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Precio Unitario (Lempiras)</label>
                    <input type="number" step="0.01" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio') }}" placeholder="0.00">
                    @error('precio') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Coste Unitario (Lempiras)</label>
                    <input type="number" step="0.01" name="costo" class="form-control @error('costo') is-invalid @enderror" value="{{ old('costo') }}" placeholder="0.00">
                    @error('costo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Stock Inicial</label>
                    <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock') }}" placeholder="0">
                    @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen del Producto (Opcional)</label>
                <input type="url" id="imagen" name="imagen" class="form-control @error('imagen') is-invalid @enderror" value="{{ old('imagen') }}" placeholder="https://ejemplo.com/imagen-producto.jpg">               
                @error('imagen')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="laboratorio" class="form-label">Laboratorio</label>
                <input type="text" name="laboratorio" id="laboratorio" value="{{ old('laboratorio') }}" class="form-control @error('laboratorio') is-invalid @enderror" placeholder="Ej. Laboratorios Finlay" required>
                @error('laboratorio')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="vencimiento" class="form-label">Fecha de Vencimiento</label>
                <input type="date" name="vencimiento" id="vencimiento" value="{{ old('vencimiento') }}" class="form-control @error('vencimiento') is-invalid @enderror" required>
                @error('vencimiento')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="registro" class="form-label">Fecha de Registro</label>
                <input type="date" name="registro" id="registro" value="{{ old('registro', date('Y-m-d')) }}" class="form-control @error('registro') is-invalid @enderror" required>
                @error('registro')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="lote" class="form-label">Número de Lote</label>
                <input type="text" name="lote" id="lote" value="{{ old('lote') }}" class="form-control @error('lote') is-invalid @enderror" placeholder="Ej. LOTE-2026-001" required>
                @error('lote')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('medicamentos.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar Producto</button>
            </div>
        </form>
    </div>
</div>
@endsection