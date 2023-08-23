<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'user_id',
        'domain_order_id',
        'kolvo',
        'type',
        'potracheno'

    ];
}
