<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Pekan8', function () {
    return view('Pekan8');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/hello/{nama}/{alamat}', function ($nama,$alamat) {
    return "<H2> Hello $nama Dari $alamat</H2>";
});

Route::get('/produk/{id}', function ($id) {
    return view('produk/index',['id'=>$id]);
});

use  App\Http\Controllers\UserController;

route::get('/user',
    [UserController::class,'index']);

route::get('/user/daftar',
    [UserController::class,'daftar']);

route::post('/user/store',
    [UserController::class,'store']) ->name('user/store');

use App\Http\Controllers\TokoController;

route::prefix('toko')->group(function(){
    route::get('/',
    [TokoController::class,'index']);

    route::get('/detail',
    [TokoController::class,'detail']);

    route::get('/about',
    [TokoController::class,'index']);

    route::group(['middleware' => ['auth']], function(){

        route::get('/admin',
        [TokoController::class,'admin'])->name('produk.admin');

    route::get('/create',
    [TokoController::class,'create'])->name('produk.create');

    route::post('/ ',
        [TokoController::class,'store'])->name('produk.store');

    route::get('/pelanggan',
        [TokoController::class,'pelanggan'])->name('produk.pelanggan');

        route::get('/tambahPelanggan',
        [TokoController::class,'tambahPelanggan'])->name('produk.tambahPelanggan');

        route::post('/',
        [TokoController::class,'tb'])->name('produk.tb');

        route::get('/{product}/edit',
        [TokoController::class,'edit'])->name('produk.edit');

        route::put('/{product}',
        [TokoController::class,'update'])->name('produk.update');

        route::delete('/{product}',
        [TokoController::class,'destroy'])->name('produk.destroy');

    });

});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
