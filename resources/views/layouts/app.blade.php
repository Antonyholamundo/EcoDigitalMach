<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Gestión de Pacientes') - Ecografía Digital Machala</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
  @stack('styles')
</head>

<body class="d-flex flex-column min-vh-100">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
        <img src="{{ asset('img/logo.png') }}" alt="Logo Ecografía Digital Machala" class="me-2 logo-brand" />
        <span class="fw-semibold text-primary">Ecografía Digital</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item"><a class="nav-link text-dark" href="{{ url('/') }}">Inicio</a></li>
          @auth
              <li class="nav-item"><a class="nav-link text-dark" href="{{ route('logica.citas') }}">Agendar Cita</a></li>
              <li class="nav-item"><a class="nav-link text-dark" href="{{ route('logica.pacientes') }}">Pacientes</a></li>
              <li class="nav-item"><a class="nav-link text-dark" href="{{ route('reportes.index') }}">Reportes</a></li>
          @endauth
        </ul>
        <ul class="navbar-nav ms-auto">
          @guest
              <li class="nav-item">
                  <a class="nav-link btn btn-primary text-white px-3 ms-2" href="{{ route('login') }}">Iniciar Sesión</a>
              </li>
          @endguest
          @auth
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name ?? 'Administrador' }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#"><i class="bi bi-cog me-2"></i>Configuración</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="bi bi-box-arrow-right me-2"></i>Cerrar Sesión
                        </button>
                    </form>
                  </li>
                </ul>
              </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  @yield('content')

  <!-- Footer -->
  <footer class="bg-primary text-white mt-auto">
    <div class="container py-4">
      <div class="row">
        <div class="col-md-6 mb-3 mb-md-0">
          <h5 class="fw-bold">Contacto</h5>
          <p class="mb-1"><i class="bi bi-geo-alt-fill me-2"></i>Buenavista y Boyacá</p>
          <p class="mb-1"><i class="bi bi-telephone-fill me-2"></i>0963947466</p>
          <p class="mb-0"><i class="bi bi-envelope-fill me-2"></i>ecografiadigitalmachala@gmail.com</p>
        </div>
        <div class="col-md-6">
          <h5 class="fw-bold">Horario de Atención</h5>
          <p class="mb-1">Lunes a Viernes: 8:00 AM - 6:00 PM</p>
          <p class="mb-0">Sábado: 9:00 AM - 1:00 PM</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Global Toasts -->
  <div class="toast-container position-fixed bottom-0 end-0 p-3">
    @if(session('success'))
      <div class="toast align-items-center text-bg-success border-0 show" role="alert">
        <div class="d-flex">
          <div class="toast-body">
            {{ session('success') }}
          </div>
          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
      </div>
    @endif

    @if($errors->any())
      <div class="toast align-items-center text-bg-danger border-0 show" role="alert">
        <div class="d-flex">
          <div class="toast-body">
            <strong>Ups, hubo algunos errores:</strong>
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
      </div>
    @endif
  </div>

  <!-- Bootstrap Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- Stack for extra scripts -->
  @stack('scripts')
</body>
</html>
