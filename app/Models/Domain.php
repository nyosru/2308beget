<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
    ];

    public function pays()
    {
      return $this->hasMany(DomainPay::class);
    }

    public function whois()
    {
      return $this->hasMany(Whois::class, 'domain', 'name');
    }


    public function bonus()
    {
        return $this->belongsTo(Bonus::class);
    }
    /**
     * выборка доменов где последнее сканирование было вчера и позднее
     * @param $query
     * @return mixed
     */
    public function scopeLiveToScan($query)
    {
        return $query->where('last_scan', '<', date('Y-m-d'))->
        orWhereNull('last_scan');
    }

    public function scopePayed($query)
    {
        return $query->where('payed_to', '>', date('Y-m-d'));
    }

    public function scopeExpiraDate($query)
    {
        return $query->leftJoin( 'whois', 'domain', '=', 'domains.name' )
            ->addSelect('whois.expirationDate')
            ;
    }

}
