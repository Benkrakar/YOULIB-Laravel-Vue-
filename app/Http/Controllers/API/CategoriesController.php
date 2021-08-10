<?php

namespace App\Http\Controllers\API;

use App\Models\Categories as categorie;
use Illuminate\Http\Request;
use Validator;
use App\Http\Resources\categories as categoriesResource;
use App\Http\Controllers\API\BaseController as BaseController;


class CategoriesController extends BaseController
{ 
   
    public function index()
    {
        $categories = categorie::orderBy('id','desc')->get();
        return $this->sendResponse(categoriesResource::collection($categories),
          'All categories sent');
    }
    

  
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input , [
         'name'=> 'required',
        
        ]  );
      
        if ($validator->fails()) {
         return $this->sendError('Please validate error' ,$validator->errors() );
           }
     $categories = categorie::create($input);
     return $this->sendResponse(new categoriesResource($categories) ,'categorie created successfully' );
 
    }

    public function show($id)
    {
        $categories = categorie::find($id);
        if ( is_null($categories) ) {
            return $this->sendError('categories not found'  );
              }
              return $this->sendResponse(new categoriesResource($categories) ,'categorie found successfully' );

    }

 
    public function update(Request $request,$id )
    {
        
        $input = $request->all();
        $validator = Validator::make($input , [
         'name'=> 'required',
        ]  );
      
      if ($validator->fails()) {
        return $this->sendError('Please validate error' ,$validator->errors() );
          }
          $categorie = categorie::find($id);
          // $categorie->name = $input['name'];
          // $categorie->save();
          $categorie->update([
            'name' => $input['name']
          ]);
          return $this->sendResponse(new categoriesResource($categorie) ,'categories updated successfully' );
    }

  
    public function destroy($id)
    {
        $categorie = categorie::find($id);
        $categorie->delete();

        return $this->sendResponse(new categoriesResource($categorie) ,'categorie deleted successfully' );

    }
}
