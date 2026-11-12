@extends('layouts.admin')

@section('titulo', 'Planilla de Empleados')

@section('contenido')
<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h1 class="h3 text-gray-800 mb-0">👥 Recursos Humanos - Planilla Oficial</h1>
        <small class="text-muted">Ferretería La Bendición - Control de Personal</small>
    </div>
    <a href="{{ Route::has('empleados.create') ? route('empleados.create') : url('/empleados/create') }}" class="btn btn-primary shadow-sm">
        <i class="fas fa-user-plus me-1"></i> Contratar Empleado
    </a>
</div>

<div class="card shadow-sm mb-4 border-0">
    <div class="card-header bg-dark text-white py-3">
        <h6 class="m-0 font-weight-bold"><i class="fas fa-id-card me-2"></i>Personal Activo en Sucursal</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="text-center" style="width: 50px;">ID</th>
                        <th>No. Identidad / DNI</th>
                        <th>Nombre Completo</th>
                        <th>Puesto / Cargo</th>
                        <th class="text-end">Salario Mensual</th>
                        <th class="text-center">Fecha Ingreso</th>
                        <th class="text-center" style="width: 150px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($empleados as $empleado)
                    <tr>
                        <td class="text-center text-muted fw-bold">{{ $empleado->id }}</td>
                        <td><code>{{ $empleado->identidad }}</code></td>
                        <td class="fw-bold text-dark">{{ $empleado->nombre }}</td>
                        <td><span class="badge bg-info text-dark">{{ $empleado->cargo }}</span></td>
                        <td class="text-end fw-bold text-success">L. {{ number_format($empleado->salario, 2) }}</td>
                        <td class="text-center">{{ date('d/m/Y', strtotime($empleado->fecha_ingreso)) }}</td>
                        <td class="text-center">
                            <a href="{{ Route::has('empleados.edit') ? route('empleados.edit', $empleado) : url('/empleados/' . $empleado->id . '/edit') }}" class="btn btn-warning btn-sm me-1" title="Editar Expediente">
                                <i class="fas fa-pen"></i>
                            </a>
                            <form action="{{ Route::has('empleados.destroy') ? route('empleados.destroy', $empleado) : url('/empleados/' . $empleado->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Confirma que desea retirar a este empleado de la nómina oficial?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Dar de Baja">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-5">
                            <i class="fas fa-users-slash fa-3x mb-3 text-secondary d-block"></i>
                            No hay empleados registrados en la planilla. Haz clic en <strong>Contratar Empleado</strong> para registrar personal.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end mt-3">
            {{ $empleados->links() }}
        </div>
    </div>
</div>
@endsection
