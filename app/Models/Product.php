<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'image',
        'details',
        'price',
        'quantite',
        'id_subcategorie',
        
         
    ];
    public function subcategorie()
    {
        return $this->belongsTo('App\Models\subcategories' );
    }
    protected $casts = [
        'created_at' => 'datetime:d/m/Y',
        'updated_at' => 'datetime:d/m/Y',
    ];
}
