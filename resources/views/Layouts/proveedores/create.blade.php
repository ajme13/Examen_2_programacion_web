@extends('layouts.admin')

@section('titulo', 'Contratar Empleado')

@section('contenido')
<div class="mb-3">
    <h1 class="h3 text-gray-800 mb-0">➕ Registro de Nuevo Proveedor</h1>
    <small class="text-muted">Disfarma - Alta en Planilla</small>
</div>

<div class="card shadow-sm border-0 col-lg-8">
    <div class="card-header bg-primary text-white py-3">
        <h6 class="m-0 font-weight-bold"><i class="fas fa-file-signature me-2"></i>Proveedores</h6>
    </div>
    <div class="card-body p-4">
        <form action="{{ Route::has('proveedores.store') ? route('proveedores.store') : url('/proveedores') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">RTN (14 dígitos) <span class="text-danger">*</span></label>
                    <input type="text" maxlength="14" name="rtn" class="form-control @error('rtn') is-invalid @enderror" value="{{ old('rtn') }}" placeholder="Ej: 08019000123456">
                    @error('rtn')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-8 mb-3">
                    <label class="form-label fw-bold">Nombre de la Empresa <span class="text-danger">*</span></label>
                    <input type="text" name="empresa" class="form-control @error('empresa') is-invalid @enderror" value="{{ old('empresa') }}" placeholder="Ej: Droguería Nacional S.A.">
                    @error('empresa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Persona de Contacto <span class="text-danger">*</span></label>
                    <input type="text" name="contacto" class="form-control @error('contacto') is-invalid @enderror" value="{{ old('contacto') }}" placeholder="Ej: Lic. María López">
                    @error('contacto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Teléfono (8 dígitos) <span class="text-danger">*</span></label>
                    <input type="text" maxlength="8" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono') }}" placeholder="Ej: 22345678">
                    @error('telefono')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Categoría <span class="text-danger">*</span></label>
                    <select name="categoria" class="form-select @error('categoria') is-invalid @enderror">
                        <option value="">-- Seleccione una Categoría --</option>
                        <option value="Material Quirúrgico" {{ old('categoria') == 'Material Quirúrgico' ? 'selected' : '' }}>Material Quirúrgico</option>
                        <option value="Farmacos" {{ old('categoria') == 'Farmacos' ? 'selected' : '' }}>Farmacos</option>
                        <option value="Equipos" {{ old('categoria') == 'Equipos' ? 'selected' : '' }}>Equipos</option>
                    </select>
                    @error('categoria')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Estado <span class="text-danger">*</span></label>
                    <select name="activo" class="form-select @error('activo') is-invalid @enderror">
                        <option value="Activo" {{ old('activo', 'Activo') == 'Activo' ? 'selected' : '' }}>Activo</option>
                        <option value="Inactivo" {{ old('activo') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
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
                        <input type="number" step="0.01" name="lim_credito" class="form-control @error('lim_credito') is-invalid @enderror" value="{{ old('lim_credito') }}" placeholder="0.00">
                        @error('lim_credito')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Dias de Credito <span class="text-danger">*</span></label>
                    <select name="dias_credito" class="form-select @error('dias_credito') is-invalid @enderror">
                        <option value="">-- Seleccione un dia --</option>
                        <option value="15" {{ old('dias_credito') == '15' ? 'selected' : '' }}>15</option>
                        <option value="30" {{ old('dias_credito') == '30' ? 'selected' : '' }}>30</option>
                        <option value="45" {{ old('dias_credito') == '45' ? 'selected' : '' }}>45</option>
                        <option value="60" {{ old('dias_credito') == '60' ? 'selected' : '' }}>60</option>
                    </select>
                    @error('dias_credito')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Fecha de Registro <span class="text-danger">*</span></label>
                    <input type="date" name="registro" class="form-control @error('registro') is-invalid @enderror" value="{{ old('registro', date('Y-m-d')) }}">
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
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Guardar Proveedor
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
