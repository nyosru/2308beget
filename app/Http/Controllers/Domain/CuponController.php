<?php

namespace App\Http\Controllers\Domain;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DomainLkController;
use App\Models\Bonus;
use App\Models\DomainPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CuponController extends Controller
{

    public function paySuccess(Request $r)
    {
        return response()->json([1 => 2, 'r' => $r]);
//        return parent::callAction($method, $parameters); // TODO: Change the autogenerated stub
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $in = [];

        if (Auth::check()) {
            $in['user'] = Auth::user();
            $in['user_info'] = DomainLkController::UserInfo($in['user']->id);
//            $in['bonuses'] = Bonus::whereUser_id($in['user']->id)->addSelect(db::raw('sum(Bonuses.kolvo) as kolvos'))->get()[0];
        }

        $in['all_cupon'] = 100;
        $in['prices'] = DomainPrice::orderBy('amount_rub')->get();
        return view('domain.lk.index', $in);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

}
