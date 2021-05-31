<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/', function () {
    $brands = DB::table('brands')->get();
    $abouts = DB::table('home_abouts')->first();
    $images = DB::table('multipics')->get();
    return view('home', compact ('brands','abouts','images'));
});

Route::get('/about', function () {
    return view('about');
})->middleware('age');

Route::get('/services', function () {
    return view('services');
});

Route::get('/contact', [ContactController::class, 'index']);


Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');

Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('store.category');

Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);

Route::post('/category/update/{id}', [CategoryController::class, 'Update']);

Route::get('/category/softdelete/{id}', [CategoryController::class, 'SoftDelete']);

Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);

Route::get('/category/pdelete/{id}', [CategoryController::class, 'Pdelete']);


//For Brand

Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');

Route::post('/brand/add', [BrandController::class, 'AddBrand'])->name('store.brand');

Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);

Route::post('/brand/update/{id}', [BrandController::class, 'Update']);

Route::get('/brand/delete/{id}', [BrandController::class, 'Delete']);

Route::get('/user/logout', [BrandController::class, 'Logout'])->name('user.logout');

//multiimage
Route::get('/multi/image', [BrandController::class, 'Multpic'])->name('multi.image');

Route::post('/multi/add', [BrandController::class, 'StoreImg'])->name('store.image');


//admin all route
Route::get('/home/slider', [HomeController::class, 'HomeSlider'])->name('home.slider');

Route::get('/add/slider', [HomeController::class, 'AddSlider'])->name('add.slider');

Route::post('/store/slider', [HomeController::class, 'StoreSlider'])->name('store.slider');

Route::get('/slider/edit/{id}', [HomeController::class, 'Edit']);

Route::post('/slider/update/{id}', [HomeController::class, 'Update']);

Route::get('/slider/delete/{id}', [HomeController::class, 'Delete']);


//Home About All route
Route::get('/home/about', [AboutController::class, 'HomeAbout'])->name('home.about');

Route::get('/add/about', [AboutController::class, 'AddAbout'])->name('add.about');

Route::post('/store/about', [AboutController::class, 'StoreAbout'])->name('store.about');

Route::get('/about/edit/{id}', [AboutController::class, 'EditAbout']);

Route::post('/update/homeabout/{id}', [AboutController::class, 'UpdateAbout']);

Route::get('about/delete/{id}', [AboutController::class, 'DeleteAbout']);

//port
Route::get('/portfolio', [AboutController::class, 'Portfolio'])->name('portfolio');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    //$users = User::all();
    // $users = DB::table('users')->get();
    return view('admin.index');
})->name('dashboard');


