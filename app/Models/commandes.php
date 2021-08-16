<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commandes extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'status_commande',
        'client_name',
        'client_email',
        'client_adresse',
        'totale',
        
    ];}
   