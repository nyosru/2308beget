<?php

namespace App\Http\Controllers;

use App\Models\Bonus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DomainLkController extends Controller
{

    public static function UserInfo($user_id)
    {
        $in = [];
//        if (Auth::check()) {
//            $in['user'] = Auth::user();
        $in['bonuses'] = Bonus::whereUser_id($user_id)->addSelect(db::raw('sum(Bonuses.kolvo) as kolvos'))->get()[0];
//        }
        return $in;
    }

}
