<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class messages extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_name',
        'client_email',
        'client_phone',
        'contenu_message',
  
    ];}