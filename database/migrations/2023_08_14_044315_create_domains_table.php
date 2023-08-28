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
        Schema::create('domains', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name')
                ->comment('название домена');
            $table->string('name_tech')->nullable()
                ->comment('тех название если домен рф');

            $table->date('payed_do')->nullable()
                ->comment('');
            $table->date('last_scan')->nullable()
                ->comment('');

            $table->boolean('available')
                ->nullable()->default(null)
                ->comment('');

            $table->boolean('show')->default(true)
                ->comment('показываем в активном списке или нет');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domains');
    }
};
