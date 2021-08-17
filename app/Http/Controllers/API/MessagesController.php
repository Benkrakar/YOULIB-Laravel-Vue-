<?php

namespace App\Http\Controllers\API;

use App\Models\messages ;
use Illuminate\Http\Request;
use App\Http\Resources\messages as messagesResource;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;

class MessagesController extends BaseController
{
  
    public function index()
    {
        $messages = messages::all();
        return $this->sendResponse(messagesResource::collection($messages),
        'All Commentair sent');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input , [
            'client_name'=> 'required',
            'client_phone'=> 'required',
            'contenu_message'=> 'required',
           ]  );
           if ($validator->fails()) {
            return $this->sendError('Please validate error' ,$validator->errors() );
              }
        $messages = messages::create($input);
        return $this->sendResponse(new messagesResource($messages) ,'Commentair created successfully' );
    
    }

    public function show($id)
    {
        $messages = messages::find($id);
        if ( is_null($messages) ) {
            return $this->sendError('Commentair not found'  );
              }
              return $this->sendResponse(new messagesResource($messages) ,'Commentair found successfully' );
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
          $messages = messages::find($id);
          $messages->name_user = $input['name_user'];
          $messages->contenu_commentaire = $input['contenu_commentaire'];
          $messages->save();
          return $this->sendResponse(new messagesResource($messages) ,'Commentair updated successfully' );
    }
    

   
    public function destroy($id)
    {
        $commentaire = messages::find($id);
        $commentaire->delete();

        return $this->sendResponse(new messagesResource($commentaire) ,'Commentair deleted successfully' );

    }
}
