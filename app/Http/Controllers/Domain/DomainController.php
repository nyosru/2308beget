<?php

namespace App\Http\Controllers\Domain;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $in = [
            'BOT_USERNAME' => 'WaitingDomainBot',
            'BOT_TOKEN' => '6290040530:AAFKIl0csADmwkXYUCSqEWXwlbFOItlv9Hg',
            'REDIRECT_URI' => 'https://domain.php-cat.com/api/telega-auth/callback',
            'HTTP_HOST' => $_SERVER['HTTP_HOST']
        ];

        return view('domain.index', $in );
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