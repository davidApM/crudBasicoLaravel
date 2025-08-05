<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginasController; 


// La ruta para la página principal (la URL raíz: /)
//Route::get('/', function () {
// return view('acerca-de'); // Ahora devuelve tu nueva vista
//});

//Rutas del navegador 
//Route::get('/saludo', function () {
  // return view('saludo');
//});


// La ruta principal ahora apunta al método "inicio" del controlador
Route::get('/', [PaginasController::class, 'inicio']);

// La ruta de saludo ahora apunta al método "saludo" del controlador
Route::get('/saludo', [PaginasController::class, 'saludo']);

//Esta ruta crea 
Route::get('/articulos/crear', [PaginasController::class, 'crear'])->name('articulos.crear');

//Otra ruta
// La ruta de procesamiento del formulario
Route::post('/articulos', [PaginasController::class, 'guardar'])->name('articulos.guardar');

//Para buscar aritulos por id
Route::get('/articulos/{id}', [PaginasController::class, 'mostrar'])->name('articulos.mostrar');

//Ruta al inicio, 
Route::get('/', [PaginasController::class, 'inicio'])->name('inicio');

// Ruta para mostrar el formulario de edición de un artículo
Route::get('/articulos/{id}/editar', [PaginasController::class, 'editar'])->name('articulos.editar');

// Ruta para procesar la actualización del artículo
Route::put('/articulos/{id}', [PaginasController::class, 'actualizar'])->name('articulos.actualizar');

// Ruta para procesar el borrado de un artículo
Route::delete('/articulos/{id}', [PaginasController::class, 'borrar'])->name('articulos.borrar');