<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::prefix('/produtos')->group(function(){
    Route::get('/todos-os-produtos', [App\Http\Controllers\ProductController::class, 'ShowAllProductsInStock'])
        ->name('stock');
    Route::post('/todos-os-produtos', [App\Http\Controllers\ProductController::class, 'searchProductInStock'])
        ->name('searchProductInStock');
   
    Route::get('/adicionar-produto', function(){return view('products.addProduct');})
        ->name('addProductView');
    Route::post('/adicionar-produto', [App\Http\Controllers\ProductController::class, 'addProduct'])
        ->name('addProduct');

    Route::post('/adicionar-produto-atraves-do-excel', [App\Http\Controllers\ProductController::class, 'addProductByExcel'])
        ->name('addProductByExcel');

    Route::get('/editar-produto/{id}', [App\Http\Controllers\ProductController::class, 'editProductView'])
        ->name('editProductView');
    Route::post('/editar-produto/{id}', [App\Http\Controllers\ProductController::class, 'editProduct'])
        ->name('editProduct');

    Route::get('/apagar-produto/{id}', [App\Http\Controllers\ProductController::class, 'deleteProduct'])
        ->name('deleteProduct');

    Route::get('/carrinho', [App\Http\Controllers\ProductController::class, 'cart'])
        ->name('cart');

    Route::post('/carrinho', [App\Http\Controllers\ProductController::class, 'addProductCart'])
        ->name('addProductCart');

    Route::get('/retirar-produto/{id}', [App\Http\Controllers\ProductController::class, 'deleteProductCart'])
        ->name('deleteProductCart');

    Route::get('/comprovante', [App\Http\Controllers\ProductController::class, 'generateInvoice'])
        ->name('finishingSale');

    Route::get('/buscar-comprovante', function(){return view('products.searchInvoice');})->name('searchInvoiceView');
    Route::post('/buscar-comprovante', [App\Http\Controllers\ProductController::class, 'searchInvoice'])
        ->name('searchInvoice');
});

