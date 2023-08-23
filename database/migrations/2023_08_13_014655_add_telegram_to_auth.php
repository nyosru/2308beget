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
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('telegram_id')->index('telegram_id')->nullable();
            $table->string('name_first', 200)->nullable();
            $table->string('name_last', 200)->nullable();
            $table->string('telegram_username', 100)->nullable();
            $table->string('telegram_photo', 200)->nullable();
            $table->integer('telegram_auth_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'telegram_id',
                'name_first',
                'name_last',
                'telegram_username',
                'telegram_photo',
                'telegram_auth_date'
            ]);
        });
    }
};
