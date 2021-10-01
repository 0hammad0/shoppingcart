<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientCOntroller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ProductController;

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
// Categories Section Routes
Route::get ('/addcategory', [CategoryController::class, 'addcategory']);
Route::get ('/categories', [CategoryController::class, 'categories']);
// Add Slider Section Routes
Route::get ('/addslider', [SliderController::class, 'addslider']);
Route::get ('/sliders', [SliderController::class, 'sliders']);
// Add Product Section Routes
Route::get ('/addproduct', [ProductController::class, 'addproduct']);
Route::get ('/products', [ProductController::class, 'products']);
// Order Product Section Route
Route::get ('/orders', [ClientController::class, 'orders']);

/* *************************Admin Interface Routes End********************** */



/* *************************Category Function Routes Start********************** */

Route::post ('/savecategory', [CategoryController::class, 'savecategory']);
Route::get ('/editcategory/{id}', [CategoryController::class, 'editcategory']);
Route::post ('/updatecategory', [CategoryController::class, 'updatecategory']);
Route::get ('/deletecategory/{id}', [CategoryController::class, 'deletecategory']);

/* *************************Admin Function Routes End********************** */



/* *************************Product Function Routes Start********************** */

Route::post ('/saveporduct', [ProductController::class, 'saveporduct']);
Route::get ('/viewproduct', [ProductController::class, 'viewproduct']);
Route::get ('/editproduct/{id}', [ProductController::class, 'editproduct']);
Route::post ('/updateproduct', [ProductController::class, 'updateproduct']);
Route::get ('/deleteproduct/{id}', [ProductController::class, 'deleteproduct']);
Route::get ('/activationproduct/{id}', [ProductController::class, 'activate_deactivate_product']);

/* *************************Product Function Routes End********************** */



/* *************************Client Interface Routes Start********************** */

Route::get ('/', [ClientController::class, 'home']);

Route::get ('/shop', [ClientController::class, 'shop']);

Route::get ('/cart', [ClientController::class, 'cart']);

Route::get ('/checkout', [ClientController::class, 'checkout']);

Route::get ('/login', [ClientController::class, 'login']);

Route::get ('/signup', [ClientController::class, 'signup']);

/* *************************Client Interface Routes End********************** */




