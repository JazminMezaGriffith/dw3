<!DOCTYPE html>
<html lang="es">

<header class="p-3 fixed-top bg-light">
    <div class="container">
        <h1 class="text-center mt-2">Listado de Clientes</h1>
    </div>
</header>

<body>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                    <th>CI</th>
                    <th>Correo</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Estado</th>
                    <th>Cargo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id ?? 'NN'}}</td>
                    <td>{{ $cliente->nombre ?? 'NN' }}</td>
                    <td>{{ $cliente->apellido ?? 'NN' }}</td>
                    <td>{{ $cliente->edad ?? 'NN'}}</td>
                    <td>{{ $cliente->ci ?? 'NN'}}</td>
                    <td>{{ $cliente->correo ?? 'NN' }}</td>
                    <td>{{ $cliente->fecha_nac ?? 'NN'}}</td>
                    <td>
                        @if ($cliente->estado == 'Activo')
                        <span class="badge badge-primary">{{$cliente->estado}}</span>
                        @elseif ($cliente->estado == 'activo')
                        <span class="badge badge-primary">{{$cliente->estado}}</span>
                        @else
                        <span class="badge badge-warning">{{$cliente->estado}}</span>
                        @endif
                    </td>
                    <td><strong>Nombre: </strong>{{ $cliente->cargo->nombre}} <br>
                        <strong>Sector: </strong>{{ $cliente->cargo->sector}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>