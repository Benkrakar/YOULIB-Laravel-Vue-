<?php

namespace App\Http\Controllers\API;

use App\Models\commandes;
use Illuminate\Http\Request;
use App\Http\Resources\commandes as CommandesResource;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;

class CommandesController extends BaseController
{
   
    public function index()
    {
        $commandes = commandes::all();
        return $this->sendResponse(($commandes),
        'All commands sent');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input , [
            'client_adresse'=> 'required|string',
            'client_email'=> 'required|string',
            'client_name'=> 'required|string',
           ]  );
           if ($validator->fails()) {
            return $this->sendError('Please validate error' ,$validator->errors() );
              }
        $commandes = commandes::create($input);
        return $this->sendResponse(($commandes) ,'Commande created successfully' );
    
    }

  
    public function show($id)
    {
        $commandes = commandes::find($id);
        if ( is_null($commandes) ) {
            return $this->sendError('Commande not found'  );
              }
              return $this->sendResponse(new commandesResource($commandes) ,'Commande found successfully' );

    }

    public function update(Request $request, commandes $commande)
    {
        $input = $request->all();
        $validator = Validator::make($input , [
            'quentite_commande'=> 'required|integer',
            'product_id'=> 'required|integer',
           ]  );
           if ($validator->fails()) {
            return $this->sendError('Please validate error' ,$validator->errors() );
              }
              $commande = commande::find($id);
              $commande->update([
                'client_name' => $input['client_name'],
                'client_email' => $input['client_email'],
                'client_adresse' => $input['client_adresse'],
              
                ]);
          
              return $this->sendResponse($commande ,'commandes products updated successfully' );

                }

    public function destroy(commandes $commande)
    {
        $commande->delete();
        return $this->sendResponse(new commandesResource($commande) ,'commande deleted successfully' );

    }
}
