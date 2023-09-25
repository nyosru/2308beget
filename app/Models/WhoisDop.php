<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhoisDop extends Model
{
    use HasFactory;

    protected $fillable = [
        'class',
        'host',
        'type',
        'ttl',
        'txt',
        'pri',
        'target',

    ];
}
