@extends('layouts.admin')

@section('titulo', 'Contratar Empleado')

@section('contenido')
<div class="mb-3">
    <h1 class="h3 text-gray-800 mb-0">➕ Registro de Nuevo Empleado</h1>
    <small class="text-muted">Ferretería La Bendición - Alta en Planilla</small>
</div>

<div class="card shadow-sm border-0 col-lg-8">
    <div class="card-header bg-primary text-white py-3">
        <h6 class="m-0 font-weight-bold"><i class="fas fa-file-signature me-2"></i>Expediente Laboral</h6>
    </div>
    <div class="card-body p-4">
        <form action="{{ Route::has('empleados.store') ? route('empleados.store') : url('/empleados') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">No. Identidad / DNI (13 dígitos) <span class="text-danger">*</span></label>
                    <input type="text" maxlength="13" name="identidad" class="form-control @error('identidad') is-invalid @enderror" value="{{ old('identidad') }}" placeholder="Ej: 0801199512345">
                    @error('identidad')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Nombre Completo <span class="text-danger">*</span></label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" placeholder="Ej: Juan Carlos Pérez">
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Puesto / Cargo <span class="text-danger">*</span></label>
                    <select name="cargo" class="form-select @error('cargo') is-invalid @enderror">
                        <option value="">-- Seleccione un Puesto --</option>
                        <option value="Cajero(a)" {{ old('cargo') == 'Cajero(a)' ? 'selected' : '' }}>Cajero(a)</option>
                        <option value="Vendedor de Mostrador" {{ old('cargo') == 'Vendedor de Mostrador' ? 'selected' : '' }}>Vendedor de Mostrador</option>
                        <option value="Encargado de Bodega" {{ old('cargo') == 'Encargado de Bodega' ? 'selected' : '' }}>Encargado de Bodega</option>
                        <option value="Asesor Técnico en Construcción" {{ old('cargo') == 'Asesor Técnico en Construcción' ? 'selected' : '' }}>Asesor Técnico en Construcción</option>
                        <option value="Gerente de Sucursal" {{ old('cargo') == 'Gerente de Sucursal' ? 'selected' : '' }}>Gerente de Sucursal</option>
                    </select>
                    @error('cargo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Salario Mensual (Lempiras) <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">L.</span>
                        <input type="number" step="0.01" name="salario" class="form-control @error('salario') is-invalid @enderror" value="{{ old('salario') }}" placeholder="0.00">
                        @error('salario')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Fecha Oficial de Contratación <span class="text-danger">*</span></label>
                <input type="date" name="fecha_ingreso" class="form-control @error('fecha_ingreso') is-invalid @enderror" value="{{ old('fecha_ingreso', date('Y-m-d')) }}">
                @error('fecha_ingreso')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ Route::has('empleados.index') ? route('empleados.index') : url('/empleados') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-1"></i> Cancelar
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Guardar en Planilla
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
