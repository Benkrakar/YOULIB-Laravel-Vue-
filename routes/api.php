<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\categories;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::put('produc', 'API\ProductController@updat');
Route::post('register', 'API\RegisterController@register');
Route::post('login', 'API\RegisterController@login');
Route::get('product/subcategorie/{id}', 'API\ProductController@subcategorie');
Route::post('qqproduct/{id}', 'API\ProductController@qttupdate');
Route::get('productpaginated', 'API\ProductController@paginateProduct');
Route::get('productpaginateds', 'API\ProductController@paginateProductDash');
Route::get('subcategoriespaginated', 'API\subCategoriesController@paginatesubcategories');
Route::get('commandepaginated', 'API\CommandesController@paginateCommandes');
Route::get('getcategories', 'API\categoriesController@index');
Route::get('getsubcategories', 'API\subCategoriesController@index');
Route::get('getcommande', 'API\CommandesController@index');
Route::post('postcommande', 'API\CommandesController@store');
Route::get('getcommandeproducts', 'API\Commande_productsController@index');
Route::get('getproduct', 'API\ProductController@index');
Route::resource('product', 'API\ProductController');
Route::resource('messages', 'API\MessagesController');
Route::get('categorie/products', function () {
    return categories::with('subcategories.product')->get();
});


Route::middleware('auth:api')->group(function () {
    Route::resource('commandeproducts', 'API\Commande_productsController');
    Route::resource('commande', 'API\CommandesController');
    Route::resource('subcategories', 'API\subCategoriesController');
    Route::resource('categories', 'API\categoriesController');
    Route::get('commandeproduct/commande/{id}', 'API\Commande_productsController@commande');
    Route::resource('users', 'API\UsersController');
    Route::post('lougout', 'API\RegisterController@logout');
});
