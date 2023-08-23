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
            $table->string('name');

            $table->date('payed_do')->nullable();
            $table->date('last_scan')->nullable();

            $table->boolean('available')->nullable()->default(null);

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
