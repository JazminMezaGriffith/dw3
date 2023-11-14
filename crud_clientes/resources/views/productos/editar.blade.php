<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Edición de Producto</title>
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
    {{-- @include('productos.menu') --}}
    <h2 class="text-center mt-2">Formulario de Edición de Productos</h2>
</header>

<body>
    <div class="container p-4" style="margin-top: 110px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center font-weight-bold">Edite los datos del producto existente</div>

                    <div class="card-body">
                        <form method="post" action="{{route('actualizar',['id'=>$productos->id])}}">
                            @csrf <!-- Campo CSRF -->

                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="{{$productos->nombre}}" required>
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Descripcion:</label>
                                <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{$productos->descripcion}}" required>
                            </div>

                            <div class="form-group">
                                <label for="marca">Marca:</label>
                                <input type="text" name="marca" id="marca" class="form-control" value="{{$productos->marca}}" required>
                            </div>

                            <div class="form-group">
                                <label for="stock">Stock:</label>
                                <input type="number" name="stock" id="stock" class="form-control" value="{{$productos->stock}}" required>
                            </div>

                            <div class="form-group">
                                <label for="precio">Precio:</label>
                                <input type="number" name="precio" id="precio" class="form-control" value="{{$productos->precio}}" required>
                            </div>

                            <div class="form-group">
                                <label for="iva">IVA:</label>
                                <input type="text" name="iva" id="iva" class="form-control" value="{{$productos->iva}}" required>
                            </div>

                            <div class="form-group">
                                <label for="stock_min">Stock mínimo:</label>
                                <input type="number" name="stock_min" id="stock_min" class="form-control" value="{{$productos->stock_min}}" required>
                            </div>

                            <div class="form-group">
                                <label for="estado">Estado:</label>
                                <select name="estado" id="estado" class="form-control">
                                    <option value="Activo" {{ $productos->estado === 'Activo' ? 'selected' : '' }}>Activo</option>
                                    <option value="Inactivo" {{ $productos->estado === 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                                </select>
                            </div>

                            <div class="form-group text-center pt-4">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{url('productos/index') }}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>