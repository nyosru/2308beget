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
      return $this->hasMany(Whois::class, 'domain', 'name')->orderByDesc('expirationDate');
//      return $this->hasOne(Whois::class, 'domain', 'name')->orderByDesc('expirationDate');
    }

    public function whois2()
    {
      return $this->hasMany(Whois::class, 'domain', 'name_tech')->orderByDesc('expirationDate');
//      return $this->hasOne(Whois::class, 'domain', 'name_tech')->orderByDesc('expirationDate');
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
        return $query->where('payed_do', '>', date('Y-m-d'));
    }

    public function scopeExpiraDate($query)
    {
//        return $query->leftJoin( 'whois', 'whois.domain', '=', 'domains.name' )
//            ->addSelect('whois.expirationDate')            ;
        return $query->leftJoin( 'whois',
            function($join) {
                $join
                    ->on('whois.domain', '=', 'domains.name')
                    ->orOn('whois.domain', '=', 'domains.name_tech')
//                    ->on('whois.domain', '=', 'domains.name_tech')
                ;
            }
//            'whois.domain', '=', 'domains.name'
    )
            ->orderByDESC('whois.expirationDate')
//            ->groupBy('whois.domain')
            ->addSelect('whois.expirationDate')

            ;
    }

}
