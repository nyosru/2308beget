<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WhoisAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
//            "parserType" => "common",
//            "domainName" => "krostu.com",
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
        ];
    }
}
