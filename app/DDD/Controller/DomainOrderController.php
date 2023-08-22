<?php

namespace App\DDD\Controller;

use App\Models\DomainOrder;
use App\Models\DomainPrice;
use App\Models\Promocode;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DomainOrderController
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function createOrder(Request $request)
    {

        $user = Auth::user();

        $price = DomainPrice::whereId($request->price)->firstOrFail();
//        dd($request->price,$price);
        $add = [
            'user_id' => $user->id,
            'price_id' => $price->id,
        ];

        $promo = Promocode::whereCode($request->promocode)->first();
        if (!empty($promo)) {
            $add['promocode_id'] = $promo->id;
        }

        $order = DomainOrder::create($add);

        $order['amount'] = $price->amount_rub;

        // dd($request->all(), $order, $promo, $add);
        return $order;

    }
}
