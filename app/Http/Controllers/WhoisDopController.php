<?php

namespace App\Http\Controllers;

use App\Models\Whois;
use App\Models\WhoisDop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Dns\Dns;

class WhoisDopController extends Controller
{
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(WhoisDop $whoisDop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WhoisDop $whoisDop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WhoisDop $whoisDop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WhoisDop $whoisDop)
    {
        //
    }


    public static function saveDopWhoisOneDomain(array $data): bool
    {
//        dd($data);
        $e = [];
        $item3 = [];
        foreach ($data as $d) {
            foreach ($d as $item) {

//                echo '1<pre>' . print_r($item, true) . '</pre>';
//                echo '2<pre>' . print_r((array)$item, true) . '</pre>';
                $i2 = (array)$item;
                $item2 = [
                    'class' ,
                    'host' ,
                    'type' ,
                    'ttl' ,
                    'txt' ,
                    'pri' ,
                    'target' ,
                ];
//                $item3 = [];
                foreach ($i2 as $k => $v) {
                    $item2[trim(substr($k, 2))] = $v;
                }
                WhoisDop::create( $item2);
//                $e[] = $item;
                $item3[] = $item2;
            }
        }

//        echo '7<pre>' . print_r((array)$item3, true) . '</pre>';
//        WhoisDop::insert($item3);

//        dd($e);

        return true;
    }

    public static function getDopWhoisOneDomain(string $domain): array
    {
        $res2 = [];

//        $domain = 'example.com';

// Создаем экземпляр Dns
        $dns = new Dns();

        $res2['a'] = (array)$dns->getRecords($domain, 'A');

// Получаем TXT записи для домена
        $res2['txtRecords'] = (array)$dns->getRecords($domain, 'TXT');

// Получаем MX записи для домена
        $res2['mxRecords'] = (array)$dns->getRecords($domain, 'MX');

        // Рекурсивно получаем все поддомены
//        $res2['subdomains'] = getAllSubdomains($domain);

//// Выводим результаты
//        echo "TXT Records for $domain:\n";
//        foreach ($res2['txtRecords'] as $record) {
//            echo $record . "\n";
//        }
//
//        echo "\nMX Records for $domain:\n";
//        foreach ($res2['mxRecords'] as $record) {
//            echo $record->exchange . " (Priority: " . $record->priority . ")\n";
//        }

        return $res2;
    }

}
