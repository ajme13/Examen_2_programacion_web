@extends('Layouts.admin')

@section('titulo', 'Lista de Empleados')

@section('contenido')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3"> Plantilla de Empleados</h1>
    <a href="{{ route('medicamentos.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Añadir Empleado
    </a>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-header bg-white py-3">
        <h6 class="m-0 font-weight-bold text-primary">Listado General - Disfarma</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Identidad</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo (L.)</th>
                        <th>Cargo</th>
                        <th>Salario</th>
                        <th>Estado</th>
                        <th>Ingreso</th>
                        <th class="text-center" style="width: 160px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($empleados as $empleado)
                    <tr>
                        <td>{{ $medicamento->id }}</td>
                        <td>{{ $medicamento->identidad }}</td>
                        <td class="fw-bold">{{ $medicamento->nombre }}</td>
                        <td class="fw-bold">{{ $medicamento->apellido}}</td>
                        <td class="fw-bold">{{ $medicamento->correo}}</td>
                        <td class="fw-bold">{{ $medicamento->cargo}}</td>
                        <td class="fw-bold">{{ $medicamento->activo}}</td>
                        <td class="fw-bold">{{ $medicamento->ingreso}}</td>
                        <td class="text-center">
                            <a href="{{ route('empleados.edit', $empleado) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('empleados.destroy', $empleados) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar a este empleado?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center text-muted py-4">No hay empleados cotratados aun.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $empleados->links() }}
    </div>
</div>
@endsection