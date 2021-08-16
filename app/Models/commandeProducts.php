<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commandeProducts extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'product_name',
        'product_price',
        'quentitie',
        'id_commande',
    ];
    public function commande()
    {
        return $this->belongsTo('App\Models\commandes' );
    }
}
   