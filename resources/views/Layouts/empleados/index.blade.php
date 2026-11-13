@extends('Layouts.admin')

@section('titulo', 'Lista de Empleados')

@section('contenido')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3"> Plantilla de Empleados</h1>
    <a href="{{ route('empleados.create') }}" class="btn btn-primary">
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
                        <th>Correo</th>
                        <th>Cargo</th>
                        <th>Salario (L.)</th>
                        <th>Estado</th>
                        <th>Ingreso</th>
                        <th class="text-center" style="width: 160px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->id }}</td>
                        <td>{{ $empleado->identidad }}</td>
                        <td class="fw-bold">{{ $empleado->nombre }}</td>
                        <td class="fw-bold">{{ $empleado->apellido}}</td>
                        <td class="fw-bold">{{ $empleado->correo}}</td>
                        <td class="fw-bold">{{ $empleado->cargo}}</td>
                        <td class="fw-bold">{{ $empleado->salario}}</td>
                        <td class="fw-bold">{{ $empleado->activo}}</td>
                        <td class="fw-bold">{{ $empleado->ingreso}}</td>
                        <td class="text-center">
                            <a href="{{ route('empleados.edit', $empleado) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('empleados.destroy', $empleado) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar a este empleado?')">
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
                        <td colspan="11" class="text-center text-muted py-4">No hay empleados cotratados aun.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $empleados->links() }}
    </div>
</div>
@endsection