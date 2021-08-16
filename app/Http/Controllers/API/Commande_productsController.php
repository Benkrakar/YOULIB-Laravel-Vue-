<?php

namespace App\Http\Controllers\API;

use App\Models\commandeProducts;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;

class commande_productsController extends BaseController
{
   
    public function index()
    {
        $commande_products = commandeProducts::all();
        return $this->sendResponse( $commande_products,'All command products sent');
    }
    public function commande($id)
    {
    $commande_products  = commandeProducts::where('id_commande' , $id)->get();
    return $this->sendResponse( $commande_products,'All command products sent');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $commande_products = commandeProducts::create($input);
        return $this->sendResponse(($commande_products) ,'Commande products created successfully' );
    
    }
    public function show($id)
    {
        $commande_products = commandeProducts::find($id);
        if ( is_null($commande_products) ) {
            return $this->sendError('Commande products not found'  );
              }
              return $this->sendResponse(($commande_products) ,'Commande products found successfully' );

    }

    public function update(Request $request, commandeProducts  $commande_products)
    {
        $input = $request->all();
        $commande_products = commandeProducts::find($id);
        $commande_products->update([
        'id_product' => $input['id_product'],
        'quentitie' => $input['quentitie'],
        'id_commande' => $input['id_commande'],
        ]);
        return $this->sendResponse($commande_products ,'commandes products updated successfully' );
                }

    public function destroy(commandeProducts $commande_products)
    {
        $commande_products->delete();
        return $this->sendResponse(($commande_products) ,'commande products deleted successfully' );

    }
}
