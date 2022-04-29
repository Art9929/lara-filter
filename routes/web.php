<?php

use App\Http\Controllers\Product\AddController;
use App\Http\Controllers\Product\CategoriesController;
use App\Http\Controllers\Product\DeleteProductController;
use App\Http\Controllers\Product\PageEditController;
use App\Http\Controllers\Product\EditProductController;
use App\Http\Controllers\Product\OneShowProductController;
use App\Http\Controllers\Product\RegProdController;
use App\Http\Controllers\Product\ShowController;
use App\Http\Controllers\Product\TagColorController;
use Illuminate\Support\Facades\Route;


// My project
use Illuminate\Support\Facades\Cache;
use App\Models\AdminPanel;
use App\Models\Category;
use App\Models\Tag;

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// My project

// Index
Route::get('/', function () {
    return view('index');
})->middleware('throttle:6,1')->name('home');


// Product
Route::group(['nemespace' => 'Product'], function() {
// Витрина
    Route::get('/show', [ShowController::class, '__invoke'])
        ->name('show');

// Создать товар
    Route::get('product',[AddController::class, '__invoke'])
        ->name('add');

    // Добавление товаров в БД
    Route::match(['get', 'post'], 'regprod', [RegProdController::class, '__invoke'])->name('regprod');

// Карточка товаров
    Route::get('/household/wall-mounted/{id}', [OneShowProductController::class, '__invoke'])
        ->name('one-show-product');

    // Страница редактирования карточки товара
    Route::get('/household/wall-mounted/{id}/edit', [PageEditController::class, '__invoke'])
        ->name('page-edit-product');

    // Отредактированная карточка товаров
    Route::put('/household/wall-mounted/{id}', [EditProductController::class, '__invoke'])
        ->name('edit-product');

    // Удаление товара
    Route::delete('/household/wall-mounted/{id}/delete', [DeleteProductController::class, '__invoke'])
        ->name('delete-product');

// Категории
    Route::get('/categories/{category_id}', [CategoriesController::class, '__invoke'])
        ->name('categories');

// Тэги
    Route::get('/tagcolor/{id}', [TagColorController::class, '__invoke'])
        ->name('tagcolor');

});



/*

Route::prefix('images') -> group( function () {
    Route::get('/teh', function () {
        return view('test');
    });
});
    Route::get('/test', function () {
        return [1, 2, 3];
    });
*/

/* Контроллер на разные ссылки

Route::controller(OrderController::class)->group(function () {
    Route::get('/orders/{id}', 'show');
    Route::post('/orders', 'store');
});


Route::fallback(function () {
    //
});


// Изображения
Route::resource('/images', function (){
    return view('404');
    });
*/
