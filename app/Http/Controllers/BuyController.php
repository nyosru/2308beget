<?php

namespace App\Http\Controllers;

use App\DDD\Controller\DomainOrderController;
use App\Models\Buy;
use App\Models\DomainOrder;
use App\Models\Promocode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Exception;

class BuyController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function calculatePromocodeToUser(string $promocode, int|null $user_id = null)
    {

//        dd([$promocode, $user_id]);


        if( empty($user_id) ){
            if (Auth::check()) {
                $user_id = Auth::user()->id;
            }else{
                new Exception('no_user',600);
//                return false;
            }
        }

        $p = Promocode::whereCode($promocode)->firstOrFail();

        $user = User::find($user_id)->firstOrFail();

        $user->increment('bonus',$p->kolvo);
        $user->save();

//        try {
//        }catch (){
//            new Exception('no_user',600)
//        }

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

//        $e = OnPayController::createPayLink($request);

//        $user = Auth::user();

        if (Auth::check()) {

//            dd($request->promocode);

            if (!empty($request->promocode))
                self::calculatePromocodeToUser($request->promocode);

            $order = DomainOrderController::createOrder($request);

//            $link = new OnPayController();
//            echo $link->createPayLink($order);

            OnPayController::$merchant_login = 'domain_phpcat_com';
            $link = OnPayController::creatLink([
                    'pay_mode' => 'fix',
                    'price' => $order->amount,
//               'ticker' => 'RUR',
                    'pay_for' => $order->id,
//                    'url_success' => 'https://' . $_SERVER['HTTP_HOST'] . '',
                    'url_success' => route('onpay_url_success'),
                    'url_fail' => 'https://' . $_SERVER['HTTP_HOST'] . '/8787',
//                'user_email',
//                'user_phone',
                    //Вариант дизайна платежной формы
                    //7, 8, 9, 10, 11
                    'f' => 7,
//                '',
//                '',
//                ''.
//                '',
//                '',
//                'ru',
//                '',
//                '',
//                '',
//                '',
                ]
            );

//            dd($link);
            die('<a href="' . $link . '" target="_blank" >link</a>');

            return ('Заказ создан #' . $order->id . ' сумма' . $order->amount);
//            dd(__LINE__);
        }

        dd(__LINE__);

        if (1 == 2) {
//        dd($user);
//        dd($user->id);

            $order = DomainOrder::create([
                'user_id' => $user->id,
                'amount' => $request->amount,
//        $table->string('domain')->nullable();
//        $table->boolean('payed')->default(false);
//        $table->dateTime('payed_dt')->nullable();

            ]);

//        dd('$order',$order->id,$order);

            if (!empty($request->promocode)) {
//            dd($request->promocode);
                $promo = Promocode::whereCode($request->promocode)->first();
                dd('$promo', $promo);

                if (!empty($promo)) {
                    $added = DomainOrder::create(
                        [
                            'user_id' => $user->id,
                            'amount' => $promo->kolvo,
//                'domain'
//                'payed'
//                'payed_dt'
                        ]
                    );
//                Buy::create([
//                    ''
//                ])
                }
            }
            //dd($promo);
            dd([$added ?? '', $request->all()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Buy $buy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buy $buy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buy $buy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buy $buy)
    {
        //
    }
}
