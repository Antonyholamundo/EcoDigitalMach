@extends('layouts.app')

@section('title', 'Pacientes Atendidos')

@section('content')
  <div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="fw-bold text-success">Pacientes Atendidos</h1>
      <a href="{{ route('logica.citas') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Volver a Pendientes
      </a>
    </div>

    <div class="table-responsive shadow-sm rounded">
      <table class="table table-bordered table-hover align-middle mb-0">
        <thead class="table-success">
          <tr>
            <th>Nombre del Paciente</th>
            <th>Fecha</th>
            <th>Tipo de Ecografía</th>
            <th>Hora</th>
            <th>Precio</th>
            <th>Estado</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody class="bg-white">
          @forelse ($citas as $cita)
          <tr>
            <td data-label="Paciente">{{ $cita->paciente }}</td>
            <td data-label="Fecha">{{ $cita->fecha }}</td>
            <td data-label="Tipo">{{ $cita->tipo }}</td>
            <td data-label="Hora">{{ $cita->hora }}</td>
            <td data-label="Precio">${{ number_format($cita->precio, 2) }}</td>
            <td data-label="Estado">
              <form action="{{ route('citas.toggleStatus', $cita->id) }}" method="POST" id="form-status-{{ $cita->id }}">
                  @csrf
                  <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" role="switch"
                             onchange="document.getElementById('form-status-{{ $cita->id }}').submit()"
                             {{ $cita->estado == 'atendido' ? 'checked' : '' }}>
                      <label class="form-check-label">
                          <span class="text-success fw-bold">Atendido</span>
                      </label>
                  </div>
              </form>
            </td>
            <td data-label="Acciones">
               <form action="{{ route('citas.destroy', $cita->id) }}" method="POST" class="d-inline"
                onsubmit="return confirm('¿Seguro que quieres eliminar este historial?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                  <i class="bi bi-trash"></i> Eliminar
                </button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="7" class="text-center py-4 text-muted">No hay pacientes atendidos aún</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection
