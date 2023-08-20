<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('whois', function (Blueprint $table) {
            $table->id();
            $table->string('domain')->index();

//            $table->string("domainName" => "string|required",

            $table->string("whoisServer" )->nullable();

            $table->string("nameServers0" )->nullable();
            $table->string("nameServers1" )->nullable();
            $table->string("nameServers2" )->nullable();
            $table->string("nameServers3" )->nullable();
            $table->string("nameServers4" )->nullable();

            $table->date("creationDate" )->nullable();
            $table->date("expirationDate" )->nullable();
            $table->date("updatedDate" )->nullable();
//            "owner" => "PERFECT PRIVACY, LLC",
            $table->string("owner" )->nullable();
//            "registrar" => "Heavydomains.net LLC",
            $table->string("registrar" )->nullable();
//            "states0" => "ok"
//            $table->json ('data');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('whois');
    }
};
