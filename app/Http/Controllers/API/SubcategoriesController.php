<?php

namespace App\Http\Controllers\API;

use App\Models\subcategories;
use Illuminate\Http\Request;
use Validator;
use App\Http\Resources\subcategories as subcategoriesResource;
use App\Http\Controllers\API\BaseController as BaseController;

class SubcategoriesController extends BaseController
{
    public function index()
    {
        $subcategories = subcategories::orderBy('id','desc')->get();
        return $this->sendResponse(subcategoriesResource::collection($subcategories),
          'All subcategories sent');
    }
    public function paginatesubcategories()
    {
        $subcategories = subcategories::paginate(8);
        return $this->sendResponse(subcategoriesResource::collection($subcategories),
          'All subcategories sent');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input , [
         'name'=> 'required',
        ]);
        if ($validator->fails()) {
         return $this->sendError('Please validate error' ,$validator->errors() );
           }
     $subcategories = subcategories::create($input);
     return $this->sendResponse(new subcategoriesResource($subcategories) ,'subcategories created successfully' );
 
    }
    public function show($id)
    {
        $subcategories = subcategories::find($id);
        if ( is_null($subcategories) ) {
            return $this->sendError('subcategories not found'  );
              }
              return $this->sendResponse(new subcategoriesResource($subcategories) ,'subcategorie found successfully' );
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $validator = Validator::make($input , [
         'name'=> 'required',
        ]);
      if ($validator->fails()) {
        return $this->sendError('Please validate error' ,$validator->errors() );
          }
          $subcategories= subcategories::find($id);
          $subcategories->name = $input['name'];
          $subcategories->update([
            'name' => $input['name'],
            'id_categorie' => $input['id_categorie']
          ]);;
          return $this->sendResponse(new subcategoriesResource($subcategories) ,'subcategories updated successfully' );
    }
    public function destroy($id)
    {
        $subcategories= subcategories::find($id);
        $subcategories->delete();
        return $this->sendResponse(new subcategoriesResource($subcategories) ,'subcategories deleted successfully' );

    }
}
