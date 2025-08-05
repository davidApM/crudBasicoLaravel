<!DOCTYPE html>
<html>
<head>
    <title>{{ $articulo->titulo }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">{{ $articulo->titulo }}</h1>
                <p class="card-text">{{ $articulo->contenido }}</p>
            </div>
        </div>
        
    <a href="{{ route('articulos.editar', $articulo->id) }}" class="btn btn-warning mt-3">Editar Artículo</a>
    <form method="POST" action="{{ route('articulos.borrar', $articulo->id) }}" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger mt-3" onclick="return confirm('¿Estás seguro de que quieres borrar este artículo?');">Borrar Artículo</button>
    </form>
    <a href="{{ route('inicio') }}" class="btn btn-secondary mt-3">Volver a la lista de artículos</a>

    </div>
</body>
</html>