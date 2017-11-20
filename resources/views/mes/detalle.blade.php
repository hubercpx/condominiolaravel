<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://bootswatch.com/4/superhero/bootstrap.min.css">
  <link rel="stylesheet" href="https://bootswatch.com/4/superhero/bootstrap.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Pagos Condominio</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/empleado/empleado">Empleados</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/residente/residente">Residentes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="/mes/mes <span class="sr-only">(current)</span>">Meses</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/pago/pago">Pagos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/factura/factura">Facturas</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
    <button type="button" class="btn btn-warning">
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </button>
  </div>
</nav>
  <button type="button" class="btn btn-outline-info"><a href='{{url("mes/mes")}}' style="text-decoration:none">Listado</a></button>
  <button type="button" class="btn btn-outline-success"><a href='{{url("mes/create")}}' style="text-decoration:none">Crear Nuevo</a></button>



    <table class="table table-striped table-hover table-bordered">
      <thead class="thead-dark">
        <tr>
          <th>id</th>
          <th>Mes</th>


        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{$mes->id}}</td>
          <td>{{$mes->nombre}}</td>


        </tr>
      </tbody>
    </table>

  </body>
  </html>
