<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\Admin\categorieController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\Frontend\Cartcontroller;
use App\Http\Controllers\Frontend\CheckOutController;
use App\Http\Controllers\Frontend\RatingConroller;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\wishlistController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [FrontendController::class, 'index']);
Route::get('category', [FrontendController::class, 'category']);
Route::get('category/{slug}', [FrontendController::class, 'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}', [FrontendController::class, 'viewproduct']);
Auth::routes();
Route::post('add-to-cart', [Cartcontroller::class, 'addproduct']);
Route::post('delete-cart-item',  [Cartcontroller::class, 'deletproduct']);
Route::post('Updatecart', [Cartcontroller::class, 'updatecart']);
Route::post('add-to-wishlist', [wishlistController::class, 'addwishlist']);
Route::post('remove-wishlist-item', [wishlistController::class, 'deletitems']);
Route::post('cart-count-data', [Cartcontroller::class, 'cartcount']);
Route::post('wish-count-data', [wishlistController::class, 'wishcount']);

Route::middleware(['auth'])->group(function () {
    Route::get('Cart', [Cartcontroller::class, 'viewCart']);
    Route::get('checkout', [CheckOutController::class, 'index']);
    Route::post('place-order', [CheckOutController::class, 'placeorder']);
    Route::get('my-orders', [UserController::class, 'index']);
    Route::get('view-order/{id}', [UserController::class, 'vieworder']);
    Route::get('wishlist', [wishlistController::class, 'index']);
    Route::post('proced-to-pay', [CheckOutController::class, 'rayzorpaycheck']);
    Route::POSt('add-rating', [RatingConroller::class, 'add']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'isadmin'])->group(function () {
    Route::get('/dashboard', 'Admin\FrontendController@index');
    Route::get('Categories', 'Admin\categorieController@index');
    Route::get('add-Category', 'Admin\categorieController@add');
    Route::post('insert-catergory', 'Admin\categorieController@insert');
    Route::get('edit-prod/{id}', [categorieController::class, 'edit']);
    Route::put('update-catergory/{id}', [categorieController::class, 'update']);
    Route::get('delet-categories/{id}', [categorieController::class, 'destroy']);
    Route::get('Products', [ProductController::class, 'index']);
    Route::get('add-Products', [ProductController::class, 'add']);
    Route::post('insert-product', [ProductController::class, 'insert']);
    Route::get('edit-product/{id}', [ProductController::class, 'edit']);
    Route::put('update-product/{id}', [ProductController::class, 'update']);
    Route::get('delet-product/{id}', [ProductController::class, 'destroy']);
    Route::get('users', [FrontendController::class, 'users']);
    Route::get('orders', [OrderController::class, 'index']);
    Route::get('admin/view-order/{id}', [OrderController::class, 'view']);
    Route::put('update-order/{id}', [OrderController::class, 'updateorder']);
    Route::get('order-history', [OrderController::class, 'orderhistory']);
    Route::get('users', [DashboardController::class, 'users']);
    Route::get('view-user/{id}', [DashboardController::class, 'viewuser']);
});
