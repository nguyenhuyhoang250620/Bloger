<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyCRUDController;
use App\Http\Controllers\SearcheController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\URL;
use App\Models\Company;
use App\Models\User;


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
    return view('welcome');
});

Auth::routes();

Route::get('/taothanhvien', [HomeController::class, 'index'])->middleware('onlyadmin')->name('taothanhvien');



Route::resource('companies', CompanyCRUDController::class);

Route::resource('searched', SearcheController::class);


// Route::get('dadu',function(){
//     return view('companies');
// })->middleware('Check')->name('dadu');

Route::get('dadu', [CompanyCRUDController::class, 'test'])->middleware('Check')->name('dadu');


Route::get('/home', function () {
    $post = \App\Models\Company::all();
    $user = User::all();
    return view('hienthi', compact('post', 'user'));
})->name('trangchu');


Route::get('search', [HomeController::class, 'timkiem'])->name('timkiem');
Route::post('paging', [HomeController::class, 'paging']);
