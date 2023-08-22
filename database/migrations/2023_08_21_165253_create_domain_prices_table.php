<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('domain_prices', function (Blueprint $table) {
            $table->id();
            $table->integer('amount_rub')->comment('Сколько стоит рублей');
            $table->integer('amount_domain')->unsigned()->comment('сколько доменов');
            $table->boolean('default')->default(false)->comment('Это значение по умолчанию ?');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domain_prices');
    }
};
