<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
Route::redirect('/', '/products');
Route::controller(ProductController::class)->group(function(){
    Route::get('/products', 'indexAction')->name("products");
    Route::get('/products/new', 'showCreateNewProductFormAction')->name("create_form");
    Route::post('/products', 'createProductAction')->name("products.create");
    Route::get('/products/update', 'showDeleteOrUpdateFormAction')->name("update_form");
    Route::post('/products/update', 'updateProductAction')->name("products.update");
    Route::post('/products/delete', 'deleteProductAction')->name("products.delete");
});
