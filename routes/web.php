<?php

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RisquesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::redirect('/', 'login');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('user/profile', [UserController::class, 'showProfile'])->name('user.profile');
    Route::post('user/updateInfos', [UserController::class, 'updateInfos'])->name('user.edit.infos');
    Route::post('user/updatepassword', [UserController::class, 'updatePassword'])->name('user.edit.password');
    Route::post('user/profile/image', [UserController::class, 'UpdateImage'])->name('user.profil.image');


    Route::get('/client', [ClientsController::class, 'index'])->name('client');
    Route::get('/client/ajouter', [ClientsController::class, 'create'])->name('client.ajouter');
    Route::post('/client/store', [ClientsController::class, 'store'])->name('client.store');
    Route::get('/client/editer/{id}', [ClientsController::class, 'edit'])->name('client.editer');
    Route::post('/client/update', [ClientsController::class, 'update'])->name('client.update');
    Route::post('/client/delete', [ClientsController::class, 'delete'])->name('client.delete');

    Route::get('/risque', [RisquesController::class, 'index'])->name('risque');
    Route::get('/risque/ajouter', [RisquesController::class, 'create'])->name('risque.ajouter');
    Route::post('/risque/store', [RisquesController::class, 'store'])->name('risque.store');
    Route::get('/risque/editer/{id}', [RisquesController::class, 'edit'])->name('risque.editer');
    Route::post('/risque/update', [RisquesController::class, 'update'])->name('risque.update');
    Route::post('/risque/delete', [RisquesController::class, 'delete'])->name('risque.delete');
    Route::get('/risque/bloquer/{id}', [RisquesController::class, 'bloquer'])->name('risque.bloquer');
    Route::get('/risque/valider/{id}', [RisquesController::class, 'valider'])->name('risque.valider');
    Route::get('/risque/detail/{id}', [RisquesController::class, 'show'])->name('risque.show');

    Route::get('/recherche', [HomeController::class, 'rechercher'])->name('rechercher');

    Route::get('user/all', [UserController::class, 'index'])->name('user.all');
    Route::view('user/new', 'user.add')->name('user.add');
    Route::post('user/new/store', [UserController::class, 'storeUser'])->name('user.add.store');
    Route::get('user/edit/{id}', [UserController::class, 'editUser'])->name('user.edit');
    Route::post('user/edit/store', [UserController::class, 'updateUser'])->name('user.edit.store');
    Route::post('user/delete', [UserController::class, 'deleteUser'])->name('user.delete');
    Route::get('user/activate/{id}', [UserController::class, 'activate'])->name('activate_compte');
    Route::get('user/block/{id}', [UserController::class, 'block'])->name('block_compte');
});
