<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientCOntroller;
use App\Http\Controllers\AdminController;

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
/* *************************Admin Interface Routes End********************** */

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';

Route::get ('/admin', [AdminController::class, 'admin']);

/* *************************Admin Interface Routes End********************** */



/* *************************Client Interface Routes Start********************** */

Route::get ('/', [ClientController::class, 'home']);

Route::get ('/shop', [ClientController::class, 'shop']);

Route::get ('/cart', [ClientController::class, 'cart']);

Route::get ('/checkout', [ClientController::class, 'checkout']);

Route::get ('/login', [ClientController::class, 'login']);

Route::get ('/signup', [ClientController::class, 'signup']);

/* *************************Client Interface Routes End********************** */




