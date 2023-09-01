<?php

namespace App\Http\Controllers\Domain;

use App\Http\Controllers\Controller;
use App\Http\Requests\WhoisAddRequest;
use App\Models\Domain;
use App\Models\Whois;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WhoisController extends Controller
{
    /**
     * @param int $limit
     * @param string $type json|array
     * @return \Illuminate\Http\JsonResponse
     */
    public function whoisUpdate(int $limit = 1, string $type = 'json'): string|array
    {

        $e = Domain::LiveToScan()
            ->Payed()
            ->select(['id', 'name', 'last_scan'])
            ->distinct('name')
            ->orderBy('last_scan', 'ASC')
            ->limit($limit)
            ->get();

        if (sizeof($e) == 0)
            throw new Exception('нет доменов для скана');


        $domainList = [];

        foreach ($e as $domain) {

            $domainList[] = $domain->name;
            $res = $this->whoisGet($domain->name);
            $this->domainSetStatus($res['domain'], $res['available']);

        }

        if ($type == 'array') {

            return (array)$domainList;

        } else {

            return response()->json([
                'status' => 'Просканировано доменов',
                'domains' => $domainList,
                'count' => count($e)
            ]);
        }


    }

    /**
     * получаем инфу о домене, можно или нет регить
     * @param string $domain
     * @return mixed
     */
    public function whoisGet(string $domain): array|null
    {

        try {
            $res = file_get_contents('http://api.php-cat.com/whois.php?domain=' . addslashes($domain) . '&return=json');
//            $res = file_get_contents('/whois.php?domain=' . addslashes($domain) . '&return=json');
        } catch (Exception $e) {
            dd($e);
        }

//        var_dump($res);

        $res2 = json_decode($res, true);
//        dd($res2['info']);
//        dd($res);
//        dd($res2);


        if (!empty($res2['info']))
            $this->whoisSaveData($res2['info']);

        return $res2;

    }

//    public function whoisSaveData(WhoisAddRequest $data)
    public function whoisSaveData(array $data)
    {

        $validator = Validator::make($data, [
//            'email' => 'required|email',
//            'games' => 'required|numeric',
            "domainName" => "string|required",
//            "whoisServer" => "whois.web.com",
            "whoisServer" => "string|required",
//            "nameServers0" => "ns15.abovedomains.com",
            "nameServers0" => "string",
//            "nameServers1" => "ns16.abovedomains.com",
            "nameServers1" => "string",
            "nameServers2" => "string",
            "nameServers3" => "string",
            "nameServers4" => "string",
//            "dnssec" => "Unsigned",

            "creationDate" => 'date',
            "expirationDate" => "date",
            "updatedDate" => "date",

//            "owner" => "PERFECT PRIVACY, LLC",
            "owner" => "string",
//            "registrar" => "Heavydomains.net LLC",
            "registrar" => "string",
//            "states0" => "ok"
        ]);

        return Whois::create($data);
//        dd($data);
//        return Domain::create($data);
    }

    public function domainSetStatus(string $domain, bool $available = false)
    {

        Domain::where('name', $domain)
            ->update([
                'last_scan' => date('Y-m-d'),
                'available' => $available
            ]);

    }

}
