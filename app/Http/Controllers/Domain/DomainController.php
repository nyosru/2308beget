<?php

namespace App\Http\Controllers\Domain;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function domain_add(Request $request)
    {

        Domain::create([
            'name' => $request->domain,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('domain_enter')
            ->with('domain_status', 'Домен добавлен');
    }

//    public function index()
//    {
//        $in = [
//            'BOT_USERNAME' => 'WaitingDomainBot',
//            'BOT_TOKEN' => env('bot_token'),
//            'REDIRECT_URI' => 'https://' . $_SERVER['HTTP_HOST'] . '/api/telega-auth/callback',
//            'HTTP_HOST' => $_SERVER['HTTP_HOST']
//        ];
//
//        if( Auth::check() ) {
//            $in['user'] = Auth::user();
////        $in['domains'] = Domain::all();
//            $in['domains'] = Domain::with('pays')->where('user_id', Auth::user()->id)
//                ->get();
//        }
//
//        return view('domain.index', $in);
//    }

    public function index()
    {

        $in = [
//            'BOT_USERNAME' => 'WaitingDomainBot',
            'BOT_USERNAME' => env('bot_token_name'),
            'BOT_TOKEN' => env('bot_token'),
            'REDIRECT_URI' => 'https://' . $_SERVER['HTTP_HOST'] . '/api/telega-auth/callback',
            'HTTP_HOST' => $_SERVER['HTTP_HOST']
        ];

        if (Auth::check()) {
            $in['user'] = Auth::user();
            $in['domains'] = Domain::with(['pays',
                'whois'
            ])->where('user_id', Auth::user()->id)
                ->select(['domains.*'])
                ->orderBy('domains.name')
                ->ExpiraDate()
                ->get();
        }

        return view('domain.index', $in);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
