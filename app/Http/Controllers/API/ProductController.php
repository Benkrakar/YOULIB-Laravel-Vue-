<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Product;
use Validator;
use App\Http\Resources\Product as ProductResource;
use App\Http\Controllers\API\BaseController as BaseController;


class ProductController extends BaseController
{
    public function index()
    {
        $product = Product::all();
        return $this->sendResponse($product,
          'All products sent');
    }
    public function paginateProduct()
    {
        $product = Product::paginate(4);
        return $this->sendResponse($product,
          'All products sent');
    }
    public function paginateProductDash()
    {
        $product = Product::paginate(12);
        return $this->sendResponse($product,
          'All products sent');
    }
    public function subcategorie($id)
    {
    $product = Product::where('id_subcategorie' , $id)->get();
    return $this->sendResponse($product, 'Product retrieved Successfully!' );
    }
    public function store(Request $request)
    {
       $input = $request->all();
       $validator = Validator::make($input , [
        'name'=> 'required',
        'image'=> 'image|mimes:jpeg,png,jpg,gif,svg',
        'details'=> 'required',
        'price'=> 'required',
       ]  );
       if ($image = $request->file('image')) {

        $path = $request->file('image')->store('produits');
     }
       if ($validator->fails()) {
        return $this->sendError('Please validate error' ,$validator->errors() );
          }
          $input = $request->all();
          $input['image'] =$path;
          $product = Product::create($input);
    return $this->sendResponse(new ProductResource($product) ,'Product created successfully' );
    }
    public function show($id)
    {

        $product = Product::find($id);
        if ( is_null($product) ) {
            return $this->sendError('Product not found'  );
              }
              return $this->sendResponse($product ,'Product found successfully' );
    }
 
    public function update(Request $request,$id )
    {
      $input = $request->all();
      $validator = Validator::make($input , [
      
      ]  );
      if ($image = $request->file('image')) {

        $path = $request->file('image')->store('produits');
        $input['image'] =$path;
     }
    if ($validator->fails()) {
      return $this->sendError('Please validate error' ,$validator->errors() );
        }
      $product = Product::find($id);
      $product->update([
        'name' => $input['name'],
        'details' => $input['details'],
        'price' => $input['price'],
        'id_subcategorie' => $input['id_subcategorie'],
        'quantite' => $input['quantite'],
      ]);
      return $this->sendResponse(new ProductResource($product) ,'product updated successfully' );

    }
    public function qttupdate(Request $request,$id )
    {
      $input = $request->all();
      $validator = Validator::make($input , [
      
      ]);
      $product = Product::find($id);
      $product->update([
        'quantite' => $input['quantite'],
      ]);
      return $this->sendResponse(new ProductResource($product) ,'product updated successfully' );

    }

    public function destroy(Product $product)
    {
        $product->delete();
        return $this->sendResponse(new ProductResource($product) ,'Product deleted successfully' );

    }
}
