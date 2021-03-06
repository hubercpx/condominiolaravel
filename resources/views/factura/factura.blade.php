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
        <a class="nav-link" href="/mes/mes">Meses</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/pago/pago">Pagos</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/factura/factura">Facturas <span class="sr-only">(current)</span></a>
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
  <button type="button" class="btn btn-info"><a href='{{url("factura/factura")}}' style="text-decoration:none">Listado</a></button>
  <button type="button" class="btn btn-outline-success">Crear Nuevo</button>


  <table class="table table-striped table-hover table-bordered">
    <thead class="thead-dark">
      <tr>
        <th>Residente</th>
        <th>Mes</th>
        <th>No. pago</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($var->all() as $fac)
      <tr>
        <td>{{$fac->resi}}</td>
        <td>{{$fac->nombre}}</td>
        <td>{{$fac->pagoid}}</td>


        <td>
          <button type="button" class="btn btn-info"><a href='{{ url("/factura/detalle/{$fac->id}")}}' style="text-decoration:none">Detalles</a></button>
          <button type="button" class="btn btn-warning"><a href='' style="text-decoration:none">Editar</a></button>
          <button type="button" class="btn btn-danger"><a href='{{ url("/factura/delete/{$fac->id}")}}' style="text-decoration:none">Eliminar</a></button>

        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
