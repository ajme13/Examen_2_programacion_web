@extends('Layouts.admin')

@section('titulo', 'Lista de Medicamentos')

@section('contenido')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3"> Inventario de Medicamentos</h1>
    <a href="{{ route('medicamentos.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Nuevo Medicamento
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
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Categoria</th>
                        <th>Precio (L.)</th>
                        <th>Costo (L.)</th>
                        <th>Stock</th>
                        <th>Imagen</th>
                        <th>Laboratorio</th>
                        <th>Vencimiento</th>
                        <th>Registro</th>
                        <th>Lote</th>
                        <th class="text-center" style="width: 160px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($medicamentos as $medicamento)
                    <tr>
                        <td>{{ $medicamento->id }}</td>
                        <td class="fw-bold">{{ $medicamento->codigo }}</td>
                        <td class="fw-bold">{{ $medicamento->nombre }}</td>
                        <td class="fw-bold">{{ $medicamento->categoria}}</td>
                        <td>L. {{ number_format($medicamento->precio, 2) }}</td>
                        <td>L. {{ number_format($medicamento->costo, 2) }}</td>
                        <td>
                            @if($medicamento->stock >= 20)
                                <span class="badge bg-success">{{ $medicamento->stock }} (Optimo)</span>
                            @elseif($medicamento->stock < 20 && $medicamento->stock >= 10)
                                <span class="badge bg-warning">{{ $medicamento->stock}} (Moderado)</span>
                            @else
                                <span class="badge bg-danger">{{ $medicamento->stock}} (Desabastecimiento!!)</span>
                            @endif
                        </td>
                        <td>
                            @if($medicamento->imagen)
                                <img src="{{ $medicamento->imagen }}" alt="{{ $medicamento->nombre }}" width="50" height="50" style="object-fit: cover;" class="rounded shadow-sm">
                            @else
                                <span class="text-muted small">Sin imagen</span>
                            @endif
                        </td>
                        <td class="fw-bold">{{ $medicamento->laboratorio}}</td>
                        <td class="fw-bold">{{ $medicamento->vencimiento}}</td>
                        <td class="fw-bold">{{ $medicamento->registro}}</td>
                        <td class="fw-bold">{{ $medicamento->lote}}</td>
                        <td class="text-center">
                            <a href="{{ route('medicamentos.edit', $medicamento) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('medicamentos.destroy', $medicamento) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar este medicamento?')">
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
                        <td colspan="13" class="text-center text-muted py-4">No hay medicamentos registrados aún.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $medicamentos->links() }}
    </div>
</div>
@endsection