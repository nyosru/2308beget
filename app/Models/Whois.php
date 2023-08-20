<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whois extends Model
{
    use HasFactory;

    protected $fillable = [
        "domain",
        "whoisServer",
        "nameServers0",
        "nameServers1",
        "nameServers2",
        "nameServers3",
        "nameServers4",
        "creationDate",
        "expirationDate",
        "updatedDate",
        "owner",
        "registrar"
    ];


    public function domain()
    {
        return $this->belongsTo(Domain::class, 'name' , 'domain');
    }

}
