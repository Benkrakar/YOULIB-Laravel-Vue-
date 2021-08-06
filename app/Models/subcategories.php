<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subcategories extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'id_categorie',
    ];
    
    public function product()
    {
        return $this->hasMany(Product::class,'id_subcategorie');
    }
}
