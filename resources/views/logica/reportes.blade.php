@extends('layouts.app')

@section('title', 'Reportes')

@section('content')
 <div class="container my-5">
  <h1 class="fw-bold text-primary mb-4">Reportes</h1>
  <div class="d-flex flex-wrap gap-2">
      <a href="{{ route('reportes.pacientes.pdf') }}" class="btn btn-danger">
        <i class="bi bi-file-earmark-pdf"></i> Descargar Pacientes PDF
      </a>
      <a href="{{ route('reportes.pacientes.csv') }}" class="btn btn-success">
        <i class="bi bi-file-earmark-excel"></i> Descargar Pacientes Excel
      </a>
  </div>
 </div>
@endsection