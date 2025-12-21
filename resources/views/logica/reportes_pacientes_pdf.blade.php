<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Listado de Pacientes</title>
  <style>
    body {
      font-family: sans-serif;
      font-size: 14px;
    }
    h2 {
      text-align: center;
      color: #333;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      border: 1px solid #000;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
    .footer {
      margin-top: 30px;
      text-align: center;
      font-size: 12px;
      color: #777;
    }
  </style>
</head>
<body>

  <h2>Listado de Pacientes</h2>

  <table>
    <thead>
      <tr>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Cédula</th>
        <th>Teléfono</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      @foreach($pacientes as $paciente)
        <tr>
          <td>{{ $paciente->nombres }}</td>
          <td>{{ $paciente->apellidos }}</td>
          <td>{{ $paciente->cedula }}</td>
          <td>{{ $paciente->telefono }}</td>
          <td>{{ $paciente->email }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <div class="footer">
    © 2025 Ecografía Digital Machala. Todos los derechos reservados.
  </div>

</body>
</html>