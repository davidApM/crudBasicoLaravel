<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;

class PaginasController extends Controller
{
        /**
     * Muestra la página de inicio.
     */
    public function inicio()
    {
         $articulos = Articulo::all(); // <-- Obtenemos todos los artículos
        // Creamos una variable llamada $nombre
        $nombre = "David";

        // Pasamos la variable a la vista usando compact()
        return view('acerca-de', compact('articulos', 'nombre'));
        
    }

    /**
     * Muestra la página de saludo.
     */
    public function saludo()
    {
        return view('saludo');
    }

    //Muestra una vista 
    public function crear()
    {
        return view('articulos.crear');
    }

    
    public function guardar(Request $request)
    {
        // Añade esta línea para validar los datos
            $validatedData = $request->validate([
            'titulo' => 'required|max:255',
            'contenido' => 'required',
        ],[
        'titulo.required' => '¡No olvides agregar un título a tu artículo!',
        'contenido.required' => 'El contenido del artículo no puede estar vacío.',
        ]);
        
        // Crea un nuevo artículo en la base de datos
        // El array con los datos del formulario es lo que enviamos
        Articulo::create([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
        ]);

        // Redirige al usuario a la página principal después de guardar
        return redirect('/');
    }

    //Busca un articulo por medio del id
    public function mostrar($id)
    {
        $articulo = Articulo::find($id); // <-- Busca el artículo por su ID
        // Para verificar que funciona, mostraremos el resultado.
        //dd($articulo);
        //Este me devuelve una vista 
        return view('articulos.mostrar', compact('articulo'));
    }

    // Método para mostrar el formulario de edición
    public function editar($id)
    {
        $articulo = Articulo::findOrFail($id); // <-- Busca el artículo o falla si no existe
        return view('articulos.editar', compact('articulo'));
    }

// Método para procesar la actualización
    public function actualizar(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'contenido' => 'required',
        ]);

        $articulo = Articulo::findOrFail($id);
        $articulo->update($request->all());

        return redirect()->route('articulos.mostrar', $articulo->id);
    }

    public function borrar($id)
    {
        $articulo = Articulo::findOrFail($id);
        $articulo->delete(); // <-- Elimina el artículo de la base de datos

        return redirect('/');
    }


}
