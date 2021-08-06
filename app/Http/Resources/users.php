<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class users extends JsonResource
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
            'name'=> $this->name,
            'image'=> $this->image,
            'phone'=> $this->phone,
            'email'=> $this->email,
            'role'=> $this->role,
            'ville'=> $this->ville,
            'quartier'=> $this->quartier,
            'code_postale'=> $this->code_postale,
            'created_at'=> $this->created_at->format('d/m/Y'),
            'updated_at'=> $this->updated_at->format('d/m/Y'),
        ];
    }
}
