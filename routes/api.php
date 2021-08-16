<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\categories;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::put('produc', 'API\ProductController@updat');

Route::post('register', 'API\RegisterController@register');
Route::post('login', 'API\RegisterController@login');
Route::get('product/subcategorie/{id}', 'API\ProductController@subcategorie');
Route::get('productpaginated', 'API\ProductController@paginateProduct');
Route::resource('product', 'API\ProductController');
Route::post('product/{id}', 'API\ProductController@update');
Route::post('salah', 'API\ProductController@salah');
Route::resource('categories', 'API\categoriesController');
Route::resource('subcategories', 'API\subCategoriesController');
Route::resource('commande', 'API\CommandesController');
Route::resource('commandeproducts', 'API\Commande_productsController');
Route::get('commandeproduct/commande/{id}', 'API\Commande_productsController@commande');
Route::get('categorie/product/{id}', function ($id) {
    return categories::whereId($id)->with('subcategories.product')->get();
}); 

Route::get('categorie/products', function () {
    return categories::with('subcategories.product')->get();
    Route::post('users/{id}', 'API\UsersController@update');
}); 
Route::middleware('auth:api')->group( function (){
Route::resource('users', 'API\UsersController');
Route::resource('commentaires', 'API\CommentairesController');
Route::post('lougout', 'API\RegisterController@logout');
});