<!DOCTYPE html>
<html>
<head>
    <title>Acerca de Nosotros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Artículos</h1>

        <a href="{{ route('articulos.crear') }}" class="btn btn-success mb-3">Crear Artículo</a>

        @foreach($articulos as $articulo)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $articulo->titulo }}</h5>
                    <p class="card-text">{{ $articulo->contenido }}</p>
                    <a href="{{ route('articulos.mostrar', ['id' => $articulo->id]) }}" class="btn btn-primary">Ver más</a>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>