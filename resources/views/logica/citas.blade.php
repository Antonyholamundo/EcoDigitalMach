@extends('layouts.app')

@section('title', 'Agendar Cita')

@section('content')
  <!-- Contenido principal -->
  <div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="fw-bold text-primary">Agendar Cita</h1>
      <div>
          <a href="{{ route('citas.atendidos') }}" class="btn btn-outline-success me-2">
            <i class="bi bi-check-circle"></i> Ver Atendidos
          </a>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgendarCita">
            <i class="bi bi-person-plus"></i> Agregar Cita
          </button>
      </div>
    </div>

    <div class="table-responsive shadow-sm rounded">
      <table class="table table-bordered table-hover align-middle mb-0">
        <thead class="table-primary">
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
                          @if($cita->estado == 'atendido')
                              <span class="text-success fw-bold">Atendido</span>
                          @else
                              <span class="text-warning fw-bold">Pendiente</span>
                          @endif
                      </label>
                  </div>
              </form>
            </td>
            <td data-label="Acciones">
              <button
                class="btn btn-warning btn-sm text-white btn-editar me-1"
                data-id="{{ $cita->id }}"
                data-paciente="{{ $cita->paciente }}"
                data-fecha="{{ $cita->fecha }}"
                data-hora="{{ $cita->hora }}"
                data-tipo="{{ $cita->tipo }}"
                data-precio="{{ $cita->precio }}"
                data-estado="{{ $cita->estado }}"
                data-bs-toggle="modal"
                data-bs-target="#modalEditarCita"
              >
                <i class="bi bi-pencil-square"></i>
              </button>

              <form action="{{ route('citas.destroy', $cita->id) }}" method="POST" class="d-inline"
                onsubmit="return confirm('¿Seguro que quieres eliminar esta cita?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                  <i class="bi bi-trash"></i>
                </button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="7" class="text-center py-4 text-muted">No hay citas agendadas</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal Agendar Cita -->
  <div class="modal fade" id="modalAgendarCita" tabindex="-1" aria-labelledby="modalAgendarCitaLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header py-3">
          <h5 class="modal-title">Agendar Cita</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <form action="{{ route('citas.store') }}" method="POST">
          @csrf
          <div class="modal-body p-3">
            <div class="mb-2">
              <label for="nombre-paciente" class="form-label">Nombre del Paciente</label>
              <input id="nombre-paciente" name="paciente" type="text" class="form-control form-control-sm" required>
            </div>
            <div class="row">
              <div class="col-12 col-md-6 mb-2">
                <label class="form-label">Fecha</label>
                <input type="date" name="fecha" class="form-control form-control-sm" required>
              </div>
              <div class="col-12 col-md-6 mb-2">
                <label class="form-label">Hora</label>
                <input type="time" name="hora" class="form-control form-control-sm" required>
              </div>
            </div>
            <div class="mb-2">
              <label class="form-label">Tipo de Ecografía</label>
              <select name="tipo" class="form-select form-select-sm" required>
                <option value="">Seleccione</option>
                <option value="Abdominal">Abdominal</option>
                <option value="Obstétrica">Obstétrica</option>
                <option value="Mamaria">Mamaria</option>
                <option value="Tiroidea">Tiroidea</option>
              </select>
            </div>
            <div class="row">
              <div class="col-12 col-md-6 mb-2">
                <label class="form-label">Precio</label>
                <input type="number" name="precio" class="form-control form-control-sm" step="0.01" required>
              </div>
              <div class="col-12 col-md-6 mb-2">
                <label class="form-label">Estado</label>
                <select name="estado" class="form-select form-select-sm" required>
                  <option value="">Seleccione</option>
                  <option value="pendiente">Pendiente</option>
                  <option value="atendido">Atendido</option>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer py-2">
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Editar Cita -->
  <div class="modal fade" id="modalEditarCita" tabindex="-1" aria-labelledby="modalEditarCitaLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header py-3">
          <h5 class="modal-title">Editar Cita</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <form id="form-editar-cita" method="POST">
          @csrf
          @method('PUT')
          <div class="modal-body p-3">
            <div class="mb-2">
               <label class="form-label">Paciente</label>
               <input id="edit-nombre-paciente" name="paciente" type="text" class="form-control form-control-sm" required>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 mb-2">
                    <label class="form-label">Fecha</label>
                    <input id="edit-fecha-cita" name="fecha" type="date" class="form-control form-control-sm" required>
                </div>
                <div class="col-12 col-md-6 mb-2">
                    <label class="form-label">Hora</label>
                    <input id="edit-hora-cita" name="hora" type="time" class="form-control form-control-sm" required>
                </div>
            </div>
            <div class="mb-2">
                <label class="form-label">Tipo</label>
                <select id="edit-tipo-ecografia" name="tipo" class="form-select form-select-sm" required>
                  <option value="">Seleccione</option>
                  <option value="Abdominal">Abdominal</option>
                  <option value="Obstétrica">Obstétrica</option>
                  <option value="Mamaria">Mamaria</option>
                  <option value="Tiroidea">Tiroidea</option>
                </select>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 mb-2">
                    <label class="form-label">Precio</label>
                    <input id="edit-precio" name="precio" type="number" step="0.01" class="form-control form-control-sm" required>
                </div>
                <div class="col-12 col-md-6 mb-2">
                    <label class="form-label">Estado</label>
                    <select id="edit-estado-paciente" name="estado" class="form-select form-select-sm" required>
                      <option value="">Seleccione</option>
                      <option value="pendiente">Pendiente</option>
                      <option value="atendido">Atendido</option>
                    </select>
                </div>
            </div>
          </div>
          <div class="modal-footer py-2">
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-warning btn-sm text-white">Actualizar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const btnsEditar = document.querySelectorAll('.btn-editar');
      const formEditar = document.getElementById('form-editar-cita');

      btnsEditar.forEach(btn => {
        btn.addEventListener('click', function () {
          formEditar.action = `/citas/${this.dataset.id}`;
          document.getElementById('edit-nombre-paciente').value = this.dataset.paciente;
          document.getElementById('edit-fecha-cita').value = this.dataset.fecha;
          document.getElementById('edit-hora-cita').value = this.dataset.hora;
          document.getElementById('edit-tipo-ecografia').value = this.dataset.tipo;
          document.getElementById('edit-precio').value = this.dataset.precio;
          document.getElementById('edit-estado-paciente').value = this.dataset.estado;
        });
      });
    });
  </script>
@endpush
