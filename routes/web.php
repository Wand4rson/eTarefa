<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TarefaController;
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

Route::get('/login',[LoginController::class, 'loginForm'])->name('login');
Route::post('/login',[LoginController::class, 'loginFormAction'])->name('login.action');
Route::get('/logout',[LoginController::class, 'logoutAction'])->name('login.logout');

Route::get('/login/register',[LoginController::class, 'loginRegisterForm'])->name('login.register');
Route::post('/login/register',[LoginController::class, 'loginRegisterFormAction'])->name('login.register.action');



Route::get('/',[TarefaController::class, 'index'])->name('dashboard');


Route::get('/tarefa', [TarefaController::class, 'tarefaForm'])->name('tarefa.add.form');
Route::post('/tarefa', [TarefaController::class, 'tarefaFormAction'])->name('tarefa.add.action');

Route::get('/tarefa/edit/{id}', [TarefaController::class, 'tarefaEditForm'])->name('tarefa.edit.form');
Route::post('/tarefa/edit/{id}', [TarefaController::class, 'tarefaEditFormAction'])->name('tarefa.edit.action');

Route::get('/tarefa/concluir/{id}', [TarefaController::class, 'tarefaEditConcluir'])->name('tarefa.edit.concluir');


Route::get('/tarefa/del/{id}', [TarefaController::class, 'tarefaDelete'])->name('tarefa.del');
Route::get('/login/edit', [TarefaController::class, 'userperfilFormEdit'])->name('userperfil.edit');
Route::post('/login/edit', [TarefaController::class, 'userperfilFormEditAction'])->name('userperfil.edit.action');



