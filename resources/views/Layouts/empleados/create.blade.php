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
                    <label class="form-label fw-bold">Nombre  <span class="text-danger">*</span></label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" placeholder="Ej: Juanz">
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Apellido <span class="text-danger">*</span></label>
                    <input type="text" name="apellido" class="form-control @error('apellido') is-invalid @enderror" value="{{ old('apellido') }}" placeholder="Ej: Pérez">
                    @error('apellido')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Correo <span class="text-danger">*</span></label>
                    <input type="text" name="correo" class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo') }}" placeholder="Ej: correo@gmail.com">
                    @error('correo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Puesto / Cargo <span class="text-danger">*</span></label>
                    <select name="cargo" class="form-select @error('cargo') is-invalid @enderror">
                        <option value="">-- Seleccione un Puesto --</option>
                        <option value="Regente farmaceutico" {{ old('cargo') == 'Regente farmaceutico' ? 'selected' : '' }}>Regente farmaceutico</option>
                        <option value="Asistente de farmacia" {{ old('cargo') == 'Asistente de farmacia' ? 'selected' : '' }}>Asistente de farmacia</option>
                        <option value="Jefe de Bodega" {{ old('cargo') == 'Jefe de Bodega' ? 'selected' : '' }}>Jefe de Bodega</option>
                        <option value="Despachador" {{ old('cargo') == 'Despachador' ? 'selected' : '' }}>Despachador</option>
                        <option value="Cajero" {{ old('cargo') == 'Cajero' ? 'selected' : '' }}>Cajero</option>
                    </select>
                    @error('cargo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Estado <span class="text-danger">*</span></label>
                    <select name="estado" class="form-select @error('estado') is-invalid @enderror">
                        <option value="">-- Seleccione un Estado --</option>
                        <option value="Activo" {{ old('estado') == 'Activo' ? 'selected' : '' }}>Activo</option>
                        <option value="Inactivo" {{ old('estado') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                    @error('estado')
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
                <input type="date" name="ingreso" class="form-control @error('ingreso') is-invalid @enderror" value="{{ old('ingreso', date('Y-m-d')) }}">
                @error('ingreso')
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
