<?php

namespace App\Http\Controllers\API;

use App\Models\commentaires ;
use Illuminate\Http\Request;
use App\Http\Resources\commentaires as commentairesResource;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;

class CommentairesController extends BaseController
{
  
    public function index()
    {
        $commentaires = commentaires::all();
        return $this->sendResponse(commentairesResource::collection($commentaires),
        'All Commentair sent');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input , [
            'name_user'=> 'required',
            'contenu_commentaire'=> 'required',
           ]  );
           if ($validator->fails()) {
            return $this->sendError('Please validate error' ,$validator->errors() );
              }
        $commentaires = commentaires::create($input);
        return $this->sendResponse(new commentairesResource($commentaires) ,'Commentair created successfully' );
    
    }

    public function show($id)
    {
        $commentaires = commentaires::find($id);
        if ( is_null($commentaires) ) {
            return $this->sendError('Commentair not found'  );
              }
              return $this->sendResponse(new commentairesResource($commentaires) ,'Commentair found successfully' );
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $validator = Validator::make($input , [
            'name_user'=> 'required',
            'contenu_commentaire'=> 'required',
        ]  );
      
      if ($validator->fails()) {
        return $this->sendError('Please validate error' ,$validator->errors() );
          }
          $commentaires = commentaires::find($id);
          $commentaires->name_user = $input['name_user'];
          $commentaires->contenu_commentaire = $input['contenu_commentaire'];
          $commentaires->save();
          return $this->sendResponse(new commentairesResource($commentaires) ,'Commentair updated successfully' );
    }
    

   
    public function destroy($id)
    {
        $commentaire = commentaires::find($id);
        $commentaire->delete();

        return $this->sendResponse(new commentairesResource($commentaire) ,'Commentair deleted successfully' );

    }
}
