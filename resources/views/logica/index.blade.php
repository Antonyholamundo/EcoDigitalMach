@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
  <!-- Hero Section -->
  <main class="container my-5">
    <div class="row align-items-center">
      <div class="col-lg-7 mb-4 mb-lg-0">
        <h1 class="display-5 fw-bold text-primary mb-3">Bienvenido a Ecografía Digital Machala</h1>
        <p class="lead text-muted">Especialistas en ecografías y diagnóstico por imagen con tecnología de vanguardia y atención personalizada.</p>
      </div>
      <div class="col-lg-5 text-center">
        <!-- Asegúrate de que la ruta de la imagen sea correcta -->
        <img src="{{ asset('img/about.jpg') }}" alt="Equipo Ecografía Digital Machala" class="img-fluid rounded shadow" loading="lazy" />
      </div>
    </div>
  </main>
@endsection
