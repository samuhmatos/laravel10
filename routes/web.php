<?php

use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('usuarios')->name('user.')
    ->controller(UsersController::class)
    ->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/create','store')->name('store');
    //Route::get('/{user:email}','show')->name('show');
    Route::get('/{user}','show')->name('show')
        ->missing(function(Request $request){
            return redirect()->route('user.index');
        });
    Route::get('/edit/{user}','edit')->name('edit');
    Route::put('/update/{id}','update')->name('update');
    Route::delete('/delete/{user}','destroy')->name('destroy');
});

Route::fallback(function(){
   dd("Essa rota não existe");
});

//Route::resource("/usuarios", UsersController::class);