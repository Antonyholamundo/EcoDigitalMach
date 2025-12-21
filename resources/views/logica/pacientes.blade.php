@extends('layouts.app')

@section('title', 'Gestión de Pacientes')

@section('content')
  <div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-primary">Gestión de Pacientes</h1>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarPaciente">
        <i class="bi bi-person-plus"></i> Agregar Paciente
        </button>
    </div>

    <!-- Tabla -->
    <div class="table-responsive shadow-sm rounded">
      <table class="table table-hover table-bordered align-middle mb-0">
        <thead class="table-primary">
          <tr>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Cédula</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Sexo</th>
            <th>Fecha Nac.</th>
            <th>Tipo Eco.</th>
            <th>Precio</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody class="bg-white">
          @forelse ($pacientes as $paciente)
          <tr>
            <td>{{ $paciente->nombres }}</td>
            <td>{{ $paciente->apellidos }}</td>
            <td>{{ $paciente->cedula }}</td>
            <td>{{ $paciente->telefono }}</td>
            <td>{{ $paciente->email }}</td>
            <td>{{ ucfirst($paciente->sexo) }}</td>
            <td>{{ $paciente->fecha_nacimiento }}</td>
            <td>{{ $paciente->tipo_ecografia }}</td>
            <td>${{ number_format($paciente->precio, 2) }}</td>
            <td>
              <button
                class="btn btn-warning btn-sm me-1 text-white btn-editar"
                data-id="{{ $paciente->id }}"
                data-nombres="{{ $paciente->nombres }}"
                data-apellidos="{{ $paciente->apellidos }}"
                data-cedula="{{ $paciente->cedula }}"
                data-telefono="{{ $paciente->telefono }}"
                data-email="{{ $paciente->email }}"
                data-sexo="{{ $paciente->sexo }}"
                data-fecha_nacimiento="{{ $paciente->fecha_nacimiento }}"
                data-tipo_ecografia="{{ $paciente->tipo_ecografia }}"
                data-precio="{{ $paciente->precio }}"
                data-bs-toggle="modal"
                data-bs-target="#modalEditarPaciente"
              >
                <i class="bi bi-pencil-square"></i>
              </button>

              <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que quieres eliminar este paciente?');">
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
            <td colspan="10" class="text-center py-4 text-muted">No hay pacientes registrados</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal Agregar Paciente -->
  <div class="modal fade" id="modalAgregarPaciente" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <form action="{{ route('pacientes.store') }}" method="POST">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title">Agregar Paciente</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="row g-2">
              <div class="col-6">
                <label class="form-label">Nombres</label>
                <input type="text" class="form-control" name="nombres" required>
              </div>
              <div class="col-6">
                <label class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" required>
              </div>
              <div class="col-6">
                <label class="form-label">Cédula</label>
                <input type="text" class="form-control" name="cedula" required>
              </div>
              <div class="col-6">
                <label class="form-label">Teléfono</label>
                <input type="text" class="form-control" name="telefono" required>
              </div>
              <div class="col-6">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
              </div>
              <div class="col-6">
                <label class="form-label">Sexo</label>
                <select class="form-select" name="sexo" required>
                  <option value="">Seleccione</option>
                  <option value="masculino">Masculino</option>
                  <option value="femenino">Femenino</option>
                </select>
              </div>
              <div class="col-6">
                <label class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fecha_nacimiento" required>
              </div>
              <div class="col-6">
                <label class="form-label">Tipo de Ecografía</label>
                <select class="form-select" name="tipo_ecografia" required>
                  <option value="">Seleccione</option>
                  <option value="Abdominal">Abdominal</option>
                  <option value="Obstétrica">Obstétrica</option>
                  <option value="Mamaria">Mamaria</option>
                  <option value="Tiroidea">Tiroidea</option>
                </select>
              </div>
              <div class="col-6">
                <label class="form-label">Precio</label>
                <input type="number" step="0.01" class="form-control" name="precio" required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar Paciente</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Editar Paciente -->
  <div class="modal fade" id="modalEditarPaciente" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <form id="form-editar-paciente" method="POST">
          @csrf
          @method('PUT')
          <div class="modal-header">
            <h5 class="modal-title">Editar Paciente</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="row g-2">
              <div class="col-6">
                <label class="form-label">Nombres</label>
                <input type="text" id="edit-nombres" name="nombres" class="form-control" required>
              </div>
              <div class="col-6">
                <label class="form-label">Apellidos</label>
                <input type="text" id="edit-apellidos" name="apellidos" class="form-control" required>
              </div>
              <div class="col-6">
                <label class="form-label">Cédula</label>
                <input type="text" id="edit-cedula" name="cedula" class="form-control" required>
              </div>
              <div class="col-6">
                <label class="form-label">Teléfono</label>
                <input type="text" id="edit-telefono" name="telefono" class="form-control" required>
              </div>
              <div class="col-6">
                <label class="form-label">Email</label>
                <input type="email" id="edit-email" name="email" class="form-control">
              </div>
              <div class="col-6">
                <label class="form-label">Sexo</label>
                <select id="edit-sexo" name="sexo" class="form-select" required>
                  <option value="">Seleccione</option>
                  <option value="masculino">Masculino</option>
                  <option value="femenino">Femenino</option>
                </select>
              </div>
              <div class="col-6">
                <label class="form-label">Fecha de Nacimiento</label>
                <input type="date" id="edit-fecha_nacimiento" name="fecha_nacimiento" class="form-control" required>
              </div>
              <div class="col-6">
                <label class="form-label">Tipo de Ecografía</label>
                <select id="edit-tipo_ecografia" name="tipo_ecografia" class="form-select" required>
                  <option value="">Seleccione</option>
                  <option value="Abdominal">Abdominal</option>
                  <option value="Obstétrica">Obstétrica</option>
                  <option value="Mamaria">Mamaria</option>
                  <option value="Tiroidea">Tiroidea</option>
                </select>
              </div>
              <div class="col-6">
                <label class="form-label">Precio</label>
                <input type="number" step="0.01" id="edit-precio" name="precio" class="form-control" required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-warning text-white">Actualizar Paciente</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const botonesEditar = document.querySelectorAll('.btn-editar');
      const formEditar = document.getElementById('form-editar-paciente');

      botonesEditar.forEach(function (boton) {
        boton.addEventListener('click', function () {
          formEditar.action = `/pacientes/${this.dataset.id}`;
          document.getElementById('edit-nombres').value = this.dataset.nombres;
          document.getElementById('edit-apellidos').value = this.dataset.apellidos;
          document.getElementById('edit-cedula').value = this.dataset.cedula;
          document.getElementById('edit-telefono').value = this.dataset.telefono;
          document.getElementById('edit-email').value = this.dataset.email;
          document.getElementById('edit-sexo').value = this.dataset.sexo;
          document.getElementById('edit-fecha_nacimiento').value = this.dataset.fecha_nacimiento;
          document.getElementById('edit-tipo_ecografia').value = this.dataset.tipo_ecografia;
          document.getElementById('edit-precio').value = this.dataset.precio;
        });
      });
    });
  </script>
@endpush
