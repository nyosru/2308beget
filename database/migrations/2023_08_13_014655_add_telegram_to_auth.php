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
            $table->integer('telegram_id')->index('telegram_id');
            $table->string('name_first', 200);
            $table->string('name_last', 200);
            $table->string('telegram_username', 100);
            $table->string('telegram_photo', 200);
            $table->integer('telegram_auth_date');
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