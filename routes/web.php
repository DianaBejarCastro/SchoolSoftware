<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});


//auth
Auth::routes();




Route::get('/home', 'HomeController@index')->name('home');


//NOTAS
//Route::group(['middleware' => ['permission:editar_estudiantes']], function () {
Route::get('notas/{id}/eliminar', 'NotasController@destroy')->name('notas.destroy');

Route::get('notas', 'NotasController@index')->name('notas.index');
//});




Route::get('estudiante-registro', 'EstudianteController@index')->name('estudiante.index');
Route::get('lista-estudiante', 'EstudianteController@listbefore')->name('estudiante.listbefore');
Route::get('viewListas-estudiante', 'EstudianteController@viewDatos')->name('estudiante.viewDatos');
Route::get('busquedaDataTable-estudiante', 'EstudianteController@list')->name('estudiante.list');

Route::get('search-estudiante', 'EstudianteController@buscar')->name('estudiantes.buscar');
Route::post('registro-estudiante', 'EstudianteController@store')->name('estudiantes.store');

Route::get('editar-edtudiantes/{id}', 'EstudianteController@getDates')->name('estudiantes.getDates');
Route::post('editando-datos-estudiante', 'EstudianteController@edit')->name('estudiante.edit');
Route::get('destroyEstudiante/{id}', 'EstudianteController@destroy')->name('estudiante.destroy');

//ESTUDIANTE

//DOCENTE

Route::get('docente-registro', 'DocenteController@index')->name('docente.index');
Route::get('lista-docente', 'DocenteController@list')->name('docente.list');

Route::post('registro-docentes', 'DocenteController@store')->name('docentes.store');
Route::get('datos-docente/{id}', 'DocenteController@getDates')->name('docente.getDates');
Route::post('editando-docente', 'DocenteController@edit')->name('docente.edit');
Route::get('eliminandoDocente/{id}', 'DocenteController@destroy')->name('docente.destroy');




//MATERIA
Route::get('materia-registro', 'MateriaController@index')->name('materia.index');
Route::get('lista-materias', 'MateriaController@list')->name('materia.list');

Route::post('registro-materia', 'MateriaController@store')->name('materia.store');
Route::get('datosMateria/{id}', 'MateriaController@getDates')->name('materia.getDates');
Route::post('editando-materia', 'MateriaController@edit')->name('materia.edit');
Route::get('eliminandoMateria/{id}', 'MateriaController@destroy')->name('materia.destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//REGISTRO MATERIA DOCENTE
Route::get('docente-materia/{id}', 'EstudiantesMateriaController@indexDocente')->name('materia.indexDocente');
Route::get('guardar-materia-docente/{iddatos}/{iditemdata}', 'EstudiantesMateriaController@storeDocente')->name('materia.storeDocente');
Route::post('guardar-materia-docente', 'EstudiantesMateriaController@saveDocente')->name('materia.saveDocente');
Route::get('retirar-docente/{id}', 'EstudiantesMateriaController@retirarDocente')->name('materia.retirarDocente');
Route::get('destroy-docente/{id}', 'EstudiantesMateriaController@destroyDocente')->name('materia.destroyDocente');

Route::get('estudiante-materia/{id}', 'EstudiantesMateriaController@indexEstudiante')->name('materia.indexEstudiante');
Route::get('comprobante-estudiante/{iddatos}/{iditemdata}', 'EstudiantesMateriaController@storeEstudiante')->name('materia.storeEstudiante');
Route::post('guardar-materia-estudiante', 'EstudiantesMateriaController@saveEstudiante')->name('materia.saveEstudiante');
Route::get('retirar-materia-estudiante/{id}', 'EstudiantesMateriaController@retirarEstudiante')->name('materia.retirarEstudiante');
Route::get('destroy-materia-estudiante/{id}', 'EstudiantesMateriaController@destroyEstudiante')->name('materia.destroyEstudiante');
