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
Auth::routes();

Route::get('logout', 'Auth\LoginController@logout');

Route::get('/','RedirecionadorRoleController@index')->middleware('auth.role');

Route::resource('redirecionador','RedirecionadorRoleController')->middleware('auth.role');


Route::resource('user_admin','UsuarioController')->middleware('auth.role.admin');

Route::resource('user_admin_home','UsuarioHomeController')->middleware('auth.role.admin');

Route::resource('user_admin_chamado','ChamadoAdmController')->middleware('auth.role.admin');

Route::resource('user_tech','ChamadoTechController')->middleware('auth.role.tech');

Route::get('chamados_finalizados','ChamadoTechController@listarFinalizados')->middleware('auth.role.tech')->name('finalizados');

Route::put('finalizar_chamado_tech','ChamadoTechController@finalizarChamado')->middleware('auth.role.tech')->name('finalizar');

Route::resource('user_user','ChamadoController')->middleware('auth.role.user');
