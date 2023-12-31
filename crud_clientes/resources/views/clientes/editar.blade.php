<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Edición de Cliente</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/estilos.css')}}">
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/popper.js')}}"></script>
    <script src="{{asset('js/jsdelivr.js')}}"></script>
{{--     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 --}}</head>

<header class="p-2 fixed-top bg-light">
    @include('clientes.menu')
    <h2 class="text-center mt-2">Formulario de Edición de Clientes</h2>
</header>

<body>
    <div class="container p-4" style="margin-top: 110px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center font-weight-bold">Edite los datos del cliente existente</div>

                    <div class="card-body">
                        <form method="post" action="{{route('actualizar',['id'=>$clientes->id])}}">
                            @csrf <!-- Campo CSRF -->

                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="{{$clientes->nombre}}" required>
                            </div>

                            <div class="form-group">
                                <label for="apellido">Apellido:</label>
                                <input type="text" name="apellido" id="apellido" class="form-control" value="{{$clientes->apellido}}" required>
                            </div>

                            <div class="form-group">
                                <label for="edad">Edad:</label>
                                <input type="number" name="edad" id="edad" class="form-control" value="{{$clientes->edad}}" required>
                            </div>

                            <div class="form-group">
                                <label for="ci">CI:</label>
                                <input type="text" name="ci" id="ci" class="form-control" value="{{$clientes->ci}}" required>
                            </div>

                            <div class="form-group">
                                <label for="correo">Correo Electrónico:</label>
                                <input type="email" name="correo" id="correo" class="form-control" value="{{$clientes->correo}}" required>
                            </div>

                            <div class="form-group">
                                <label for="fecha_nac">Fecha de Nacimiento:</label>
                                <input type="date" name="fecha_nac" id="fecha_nac" class="form-control" value="{{$clientes->fecha_nac}}" required>
                            </div>

                            <div class="form-group">
                                <label for="estado">Estado:</label>
                                <select name="estado" id="estado" class="form-control">
                                    <option value="Activo" {{ $clientes->estado === 'Activo' ? 'selected' : '' }}>Activo</option>
                                    <option value="Inactivo" {{ $clientes->estado === 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="id_cargo">Cargo:</label>
                                <select name="id_cargo" id="id_cargo" class="form-control">
                                    @foreach($cargos as $id => $nombre)
                                    <option value="{{$id}}" 
                                        @if($clientes->id_cargo == $id)
                                        selected
                                        @endif>{{$nombre}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group text-center pt-4">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{url('clientes/index') }}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>