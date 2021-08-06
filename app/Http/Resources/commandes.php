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
            'quentite_commande'=>$this->quentite_commande,
            'product_id'=>$this->product_id,
            'created_at'=> $this->created_at->format('d/m/Y'),
            'updated_at'=> $this->updated_at->format('d/m/Y'),
        ];
    }
}
