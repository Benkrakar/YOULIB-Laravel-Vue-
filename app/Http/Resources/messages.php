<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class messages extends JsonResource
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
            'client_name'=> $this->client_name,
            'client_email'=> $this->client_email,
            'client_phone'=> $this->client_phone,
            'contenu_message'=> $this->contenu_message,
            'created_at'=> $this->created_at->format('d/m/Y'),
            'updated_at'=> $this->updated_at->format('d/m/Y'),
        ];
    }
}
