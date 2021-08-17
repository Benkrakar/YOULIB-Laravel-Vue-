<?php

namespace App\Http\Resources;
use App\Http\Resources\ProductResource;

use Illuminate\Http\Resources\Json\JsonResource;

class commandes extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array    
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id'=> $this->id,
            'status_commande'=>$this->status_commande,
            'quentite'=>$this->quentite,
            'products'=>$this->products,
            'client_name'=>$this->client_name,
            'client_email'=>$this->client_email,
            'client_adresse'=>$this->client_adresse,
            'client_phone'=>$this->client_phone,
            'created_at'=> $this->created_at->format('d/m/Y'),
            'updated_at'=> $this->updated_at->format('d/m/Y'),
        ];
    }
}
