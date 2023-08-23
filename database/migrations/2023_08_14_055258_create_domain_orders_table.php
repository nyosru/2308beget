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
        Schema::create('domain_orders', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id')->unsigned()->index();
            $table->integer('domain_price_id')->unsigned()->index();

            $table->string('domain')->nullable();
//            $table->integer('amount')->default(1);

            $table->integer('promocode_id')->unsigned()->nullable();
//            $table->integer('promocode_amount')->unsigned()->nullable();

//            $table->boolean('payed')->default(false);

            $table->dateTime('payed_dt')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domain_orders');
    }
};
