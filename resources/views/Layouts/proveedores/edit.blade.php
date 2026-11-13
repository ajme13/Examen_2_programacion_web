@extends('layouts.admin')

@section('titulo', 'Editar Expediente')

@section('contenido')
<div class="mb-3">
    <h1 class="h3 text-gray-800 mb-0">✏️ Editar Expediente del Proveedor</h1>
    <small class="text-muted">Modificando registro de: <strong>{{ $proveedor->nombre }}</strong></small>
</div>

<div class="card shadow-sm border-0 col-lg-8">
    <div class="card-header bg-warning text-dark py-3">
        <h6 class="m-0 font-weight-bold"><i class="fas fa-user-edit me-2"></i>Actualizar Datos Contractuales</h6>
    </div>
    <div class="card-body p-4">
        <form action="{{ Route::has('proveedores.update') ? route('proveedores.update', $proveedor) : url('/proveedores/' . $proveedor->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">RTN (14 dígitos) <span class="text-danger">*</span></label>
                    <input type="text" maxlength="14" name="rtn" class="form-control @error('rtn') is-invalid @enderror" value="{{ old('rtn', $proveedor->rtn) }}">
                    @error('rtn')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-8 mb-3">
                    <label class="form-label fw-bold">Nombre de la Empresa <span class="text-danger">*</span></label>
                    <input type="text" name="empresa" class="form-control @error('empresa') is-invalid @enderror" value="{{ old('empresa', $proveedor->empresa) }}">
                    @error('empresa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Persona de Contacto <span class="text-danger">*</span></label>
                    <input type="text" name="contacto" class="form-control @error('contacto') is-invalid @enderror" value="{{ old('contacto', $proveedor->contacto) }}">
                    @error('contacto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Teléfono (8 dígitos) <span class="text-danger">*</span></label>
                    <input type="text" maxlength="8" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono', $proveedor->telefono) }}">
                    @error('telefono')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Categoría <span class="text-danger">*</span></label>
                    <select name="categoria" class="form-select @error('categoria') is-invalid @enderror">
                        <option value="Antibióticos" {{ old('categoria', $proveedor->categoria) == 'Antibióticos' ? 'selected' : '' }}>Antibióticos</option>
                        <option value="Analgésicos" {{ old('categoria', $proveedor->categoria) == 'Analgésicos' ? 'selected' : '' }}>Analgésicos</option>
                        <option value="Sueros" {{ old('categoria', $proveedor->categoria) == 'Sueros' ? 'selected' : '' }}>Sueros</option>
                        <option value="Material Quirúrgico" {{ old('categoria', $proveedor->categoria) == 'Material Quirúrgico' ? 'selected' : '' }}>Material Quirúrgico</option>
                        <option value="Vitaminas" {{ old('categoria', $proveedor->categoria) == 'Vitaminas' ? 'selected' : '' }}>Vitaminas</option>
                        <option value="General / Varios" {{ old('categoria', $proveedor->categoria) == 'General / Varios' ? 'selected' : '' }}>General / Varios</option>
                    </select>
                    @error('categoria')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Estado <span class="text-danger">*</span></label>
                    <select name="activo" class="form-select @error('activo') is-invalid @enderror">
                        <option value="Activo" {{ old('activo', $proveedor->activo) == 'Activo' ? 'selected' : '' }}>Activo</option>
                        <option value="Inactivo" {{ old('activo', $proveedor->activo) == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                    @error('activo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Límite de Crédito (Lempiras) <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">L.</span>
                        <input type="number" step="0.01" name="lim_credito" class="form-control @error('lim_credito') is-invalid @enderror" value="{{ old('lim_credito', $proveedor->lim_credito) }}">
                        @error('lim_credito')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Días de Crédito <span class="text-danger">*</span></label>
                    <input type="number" name="dias_credito" class="form-control @error('dias_credito') is-invalid @enderror" value="{{ old('dias_credito', $proveedor->dias_credito) }}">
                    @error('dias_credito')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Fecha de Registro <span class="text-danger">*</span></label>
                    <input type="date" name="registro" class="form-control @error('registro') is-invalid @enderror" value="{{ old('registro', $proveedor->registro) }}">
                    @error('registro')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ Route::has('proveedores.index') ? route('proveedores.index') : url('/proveedores') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-1"></i> Cancelar
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-sync me-1"></i> Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
