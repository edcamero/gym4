<?php

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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//ruta para comprobar permisos desde vue.js
Route::get('/permission', 'PermissionController@check');

//Permisos y rutas definidos para Tipo-Cliente
Route::group(['middleware' => ['permission:listar-tipo-cliente']], function () {
    Route::get('TipoCliente', 'TipoClienteController@index')->name('listar-tipo-cliente');
});

Route::group(['middleware' => ['permission:guardar-tipo-cliente']], function () {
    Route::post('TipoCliente', 'TipoClienteController@store')->name('guardar-tipo-cliente');
});

Route::group(['middleware' => ['permission:eliminar-tipo-cliente']],function(){
    Route::delete('/TipoCliente/{id}', 'TipoClienteController@destroy')->name('eliminar-tipo-cliente');
});

Route::group(['middleware' => ['permission:editar-tipo-cliente']],function(){
    Route::put('/TipoCliente/{id}', 'TipoClienteController@update')->name('editar-tipo-cliente');
});

//Permisos y rutas definidos para Tipo-Empleado


Route::group(['middleware' => ['permission:listar-tipo-empleado']], function () {
    Route::get('TipoEmpleado', 'TipoEmpleadoController@index')->name('listar-tipo-empleado');
});
Route::group(['middleware' => ['permission:guardar-tipo-empleado']], function () {
    Route::post('TipoEmpleado', 'TipoEmpleadoController@store')->name('guardar-tipo-empleado');
});
Route::group(['middleware' => ['permission:editar-tipo-empleado']],function(){
    Route::put('/TipoEmpleado/{id}', 'TipoEmpleadoController@update')->name('editar-tipo-empleado');
});
Route::group(['middleware' => ['permission:eliminar-tipo-empleado']],function(){
    Route::delete('/TipoEmpleado/{id}', 'TipoEmpleadoController@destroy')->name('eliminar-tipo-empleado');
});

//Permisos y rutas definidos para horario

Route::group(['middleware' => ['permission:listar-horario']], function () {
    Route::get('Horario', 'HorarioController@index')->name('listar-horario');
});
Route::group(['middleware' => ['permission:guardar-horario']], function () {
    Route::post('Horario', 'HorarioController@store')->name('guardar-horario');
});
Route::group(['middleware' => ['permission:editar-horario']], function () {
    Route::put('/Horario/{id}', 'HorarioController@update')->name('editar-horario');
});
Route::group(['middleware' => ['permission:eliminar-horario']], function () {
    Route::delete('/Horario/{id}', 'HorarioController@destroy')->name('eliminar-horario');
});



//Permisos y rutas definidos para Empleado

Route::group(['middleware' => ['permission:listar-empleado']], function () {
    Route::get('Empleado', 'EmpleadoController@index')->name('listar-empleado');
});
Route::group(['middleware' => ['permission:listar-empleado']], function () {
    Route::get('/Persona/{id}', 'PersonaController@buscar');
});
//Route::post('TipoCliente', 'TipoClienteController@store')->middleware('permission:guardar-tipo-cliente');
    Route::group(['middleware' => ['role:admin']], function () {
    //Route::get('TipoCliente', 'TipoClienteController@index')->name('listar-tipo-cliente');
   // Route::post('TipoCliente', 'TipoClienteController@store')->name('guardar-tipo-cliente');
   // Route::delete('/TipoCliente/{id}', 'TipoClienteController@destroy')->name('eliminar-tipo-cliente');
   // Route::put('/TipoCliente/{id}', 'TipoClienteController@update')->name('editar-tipo-cliente');
});


//Permisos y rutas definidos para Tipo-Documento


Route::group(['middleware' => ['permission:listar-tipo-documento']], function () {
    Route::get('TipoDocumento', 'TipoDocumentoController@index')->name('listar-tipo-documento');
});
Route::group(['middleware' => ['permission:guardar-tipo-documento']], function () {
    Route::post('TipoDocumento', 'TipoDocumentoController@store')->name('guardar-tipo-documento');
});
Route::group(['middleware' => ['permission:editar-tipo-documento']],function(){
    Route::put('/TipoDocumento/{id}', 'TipoDocumentoController@update')->name('editar-tipo-documento');
});
Route::group(['middleware' => ['permission:eliminar-tipo-documento']],function(){
    Route::delete('/TipoDocumento/{id}', 'TipoDocumentoController@destroy')->name('eliminar-tipo-documento');
});







Route::middleware(['Auth'])->group(function(){

    	//Roles
	Route::post('roles/store', 'RoleController@store')->name('roles.store')
    ->middleware('permission:roles.create');
        Route::get('roles', 'RoleController@index')->name('roles.index')
            ->middleware('permission:roles.index');
        Route::get('roles/create', 'RoleController@create')->name('roles.create')
            ->middleware('permission:roles.create');
        Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
            ->middleware('permission:roles.edit');
        Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
            ->middleware('permission:roles.show');
        Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
            ->middleware('permission:roles.destroy');
        Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
            ->middleware('permission:roles.edit');
        //Users
        Route::get('users', 'UserController@index')->name('users.index')
            ->middleware('permission:users.index');
        Route::put('users/{user}', 'UserController@update')->name('users.update')
            ->middleware('permission:users.edit');
        Route::get('users/{user}', 'UserController@show')->name('users.show')
            ->middleware('permission:users.show');
        Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
            ->middleware('permission:users.destroy');
        Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
            ->middleware('permission:users.edit');

        //Tipo Cliente

       // Route::get('TipoCliente', 'TipoClienteController@index')->name('TipoCliente.index');
           // ->middleware('permission:TipoCliente.index');
        Route::put('tipo_cliente/{tipo_c}', 'TipoClienteController@update')->name('tipo_cliente.update')
            ->middleware('permission:tipo_cliente.edit');
        Route::get('tipo_cliente/{tipo_c}', 'TipoClienteController@show')->name('tipo_cliente.show')
            ->middleware('permission:tipo_cliente.show');
        //Route::delete('tipo_cliente/{tipo_c}', 'TipoClienteController@destroy')->name('tipo_cliente.destroy')
           // ->middleware('permission:tipo_cliente.destroy');
        Route::get('tipo_cliente/{tipo_c}/edit', 'TipoClienteController@edit')->name('tipo_cliente.edit')
            ->middleware('permission:tipo_cliente.edit');

        // horario

        


});
