<?php

namespace App\Http\Resources;
use App\Http\Resources\ProductResource;

use Illuminate\Http\Resources\Json\JsonResource;

class subcategories extends JsonResource
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
            'name'=>$this->name,
            'id_categorie'=>$this->id_categorie,
            'created_at'=> $this->created_at->format('d/m/Y'),
            'updated_at'=> $this->updated_at->format('d/m/Y'),
        ];
    }
}




