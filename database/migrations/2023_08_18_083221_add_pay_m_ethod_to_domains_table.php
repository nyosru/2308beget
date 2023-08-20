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
        Schema::table('domains', function (Blueprint $table) {

            $table->enum('payed', ['money', 'bonus'])->nullable()->default(null);
            $table->integer('domain_pay_id')->nullable()->default(null);
            $table->integer('bonus_id')->nullable()->default(null);

        });
    }

    public function down(): void
    {
        Schema::table('domains', function (Blueprint $table) {

            $table->dropColumn(['payed', 'domain_pay_id', 'bonus_id']);

        });
    }
};
