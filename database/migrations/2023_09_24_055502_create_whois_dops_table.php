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
        Schema::create('whois_dops', function (Blueprint $table) {
            $table->id();

            $table->string('host');
            $table->string('class')->nullable()->default(NULL);
            $table->string('type')->nullable()->default(NULL);
            $table->integer('ttl')->nullable()->unsigned()->default(NULL);
            $table->string('txt')->nullable()->default(NULL);
            $table->integer('pri')->nullable()->unsigned()->default(NULL);
            $table->string('target')->nullable()->default(NULL);
            $table->string('ip')->nullable()->default(NULL);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('whois_dops');
    }
};
