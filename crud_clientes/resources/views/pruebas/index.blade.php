<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<div class="card">
  <div class="card-header">
    Diseño y programación web II - CLASE 2
  </div>
  <div class="card-body">
    <h5 class="card-title">Prueba</h5>
    <p class="card-text">Generos:</p>
    <span class="badge bg-primary">{{$masculino}}</span>
    <span class="badge bg-danger">{{$femenino}}</span>
    <span class="badge bg-success">{{$otros}}</span>
  </div>

  <div class="card-body">
    <h5 class="card-title">Prueba de condiciones</h5>
    <p class="card-text">Detalles:</p>
    @if($edad===17)
    <span class="badge bg-primary">Te falta poco!</span>
    @elseif($edad<=18)
    <span class="badge bg-warning">Eres menor</span>
    @elseif(empty($edad))
    <span class="badge bg-danger">Esta vacio</span>
    @else
    <span class="badge bg-success">Eres mayor</span>
    @endif
  </div>
</div>