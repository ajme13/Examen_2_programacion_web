@extends('Layouts.admin')

@section('titulo', 'Lista de Empleados')

@section('contenido')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3"> Plantilla de Proveedores</h1>
    <a href="{{ route('proveedores.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Añadir Proveedor
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
                        <th>RTN</th>
                        <th>Empresa</th>
                        <th>Contacto</th>
                        <th>Telefono (L.)</th>
                        <th>Categoria</th>
                        <th>Lim_credito</th>
                        <th>Dias_credito</th>
                        <th>Estado</th>
                        <th>Registro</th>
                        <th class="text-center" style="width: 160px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($proveedores as $proveedor)
                    <tr>
                        <td>{{ $proveedor->id }}</td>
                        <td>{{ $proveedor->rtn }}</td>
                        <td class="fw-bold">{{ $proveedor->empresa }}</td>
                        <td class="fw-bold">{{ $proveedor->contacto}}</td>
                        <td class="fw-bold">{{ $proveedor->telefono}}</td>
                        <td class="fw-bold">{{ $proveedor->categoria}}</td>
                        <td class="fw-bold">{{ $proveedor->lim_credito}}</td>
                        <td class="fw-bold">{{ $proveedor->dias_credito}}</td>
                        <td class="fw-bold">{{ $proveedor->estado}}</td>
                        <td class="fw-bold">{{ $proveedor->registro}}</td>
                        <td class="text-center">
                            <a href="{{ route('proveedores.edit', $proveedor) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('proveedores.destroy', $proveedores) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar a este proveedor?')">
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
        {{ $proveedores->links() }}
    </div>
</div>
@endsection