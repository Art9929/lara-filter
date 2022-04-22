<?php

use App\Http\Controllers\AdminPanelController;
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

// Main
Route::get('/', function () {
    return view('main');
})->middleware('throttle:6,1')->name('home');

// Витрина
Route::get('/show', [AdminPanelController::class, 'show'])
    ->name('show');

// Создать товар
Route::get('product',[AdminPanelController::class, 'add'])
    ->name('add');

        // Добавление товаров в БД
        Route::match(['get', 'post'], 'regprod', [AdminPanelController::class, 'regprod'])->name('regprod');

// Карточка товаров
Route::get('/household/wall-mounted/{id}', [AdminPanelController::class, 'OneShowProduct'])
    ->name('one-show-product');

        // Страница редактирования карточки товара
        Route::get('/household/wall-mounted/{id}/edit', [AdminPanelController::class, 'edit'])
            ->name('page-edit-product');

        // Отредактированная карточка товаров
        Route::put('/household/wall-mounted/{id}', [AdminPanelController::class, 'EditProduct'])
            ->name('edit-product');

        // Удаление товара
        Route::delete('/household/wall-mounted/{id}/delete', [AdminPanelController::class, 'DeleteProduct'])
            ->name('delete-product');

// Категории
Route::get('/categories/{category_id}', [AdminPanelController::class, 'categories'])
    ->name('categories');

// Тэги
Route::get('/tagcolor/{id}', [AdminPanelController::class, 'TagColor'])
    ->name('tagcolor');

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
