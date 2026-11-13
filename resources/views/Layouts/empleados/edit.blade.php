@extends('layouts.admin')

@section('titulo', 'Editar Expediente')

@section('contenido')
<div class="mb-3">
    <h1 class="h3 text-gray-800 mb-0">✏️ Editar Expediente del Empleado</h1>
    <small class="text-muted">Modificando registro de: <strong>{{ $empleado->nombre }}</strong> (DNI: {{ $empleado->identidad }})</small>
</div>

<div class="card shadow-sm border-0 col-lg-8">
    <div class="card-header bg-warning text-dark py-3">
        <h6 class="m-0 font-weight-bold"><i class="fas fa-user-edit me-2"></i>Actualizar Datos Contractuales</h6>
    </div>
    <div class="card-body p-4">
        <form action="{{ Route::has('empleados.update') ? route('empleados.update', $empleado) : url('/empleados/' . $empleado->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">No. Identidad / DNI (13 dígitos) <span class="text-danger">*</span></label>
                    <input type="text" maxlength="13" name="identidad" class="form-control @error('identidad') is-invalid @enderror" value="{{ old('identidad', $empleado->identidad) }}">
                    @error('identidad')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Nombre <span class="text-danger">*</span></label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $empleado->nombre) }}">
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Apellido <span class="text-danger">*</span></label>
                    <input type="text" name="apellido" class="form-control @error('apellido') is-invalid @enderror" value="{{ old('apellido', $empleado->apellido) }}">
                    @error('apellido')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Puesto / Cargo <span class="text-danger">*</span></label>
                    <select name="cargo" class="form-select @error('cargo') is-invalid @enderror">
                        <option value="Regente farmaceutico" {{ old('cargo', $empleado->cargo) == 'Regente farmaceutico' ? 'selected' : '' }}>Regente farmaceutico</option>
                        <option value="Asistente de farmacia" {{ old('cargo', $empleado->cargo) == 'Asistente de farmacia' ? 'selected' : '' }}>Asistente de farmacia</option>
                        <option value="Jefe de Bodega" {{ old('cargo', $empleado->cargo) == 'Jefe de Bodega' ? 'selected' : '' }}>Jefe de Bodega</option>
                        <option value="Despachador" {{ old('cargo', $empleado->cargo) == 'Despachador' ? 'selected' : '' }}>Despachador</option>
                        <option value="Cajero" {{ old('cargo', $empleado->cargo) == 'Cajero' ? 'selected' : '' }}>Cajero</option>
                    </select>
                    @error('cargo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Estado <span class="text-danger">*</span></label>
                    <select name="activo" class="form-select @error('activo') is-invalid @enderror">
                        <option value="Activo" {{ old('activo', $empleado->activo) == 'Activo' ? 'selected' : '' }}>Activo</option>
                        <option value="Inactivo" {{ old('activo', $empleado->activo) == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                    @error('activo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Salario Mensual (Lempiras) <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">L.</span>
                        <input type="number" step="0.01" name="salario" class="form-control @error('salario') is-invalid @enderror" value="{{ old('salario', $empleado->salario) }}">
                        @error('salario')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Fecha Oficial de Contratación <span class="text-danger">*</span></label>
                <input type="date" name="fecha_ingreso" class="form-control @error('fecha_ingreso') is-invalid @enderror" value="{{ old('fecha_ingreso', $empleado->fecha_ingreso) }}">
                @error('fecha_ingreso')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ Route::has('empleados.index') ? route('empleados.index') : url('/empleados') }}" class="btn btn-secondary">
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
