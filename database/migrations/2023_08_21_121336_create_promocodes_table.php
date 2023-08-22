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
        Schema::create('promocodes', function (Blueprint $table) {
            $table->id();

            $table->string('code')
                ->comment('что за промокод');
            $table->integer('kolvo')
                ->comment('Количество купонов что добавиться при использовании');
            $table->string('date_start')
                ->comment('дата старта');
            $table->string('date_end')
                ->comment('дата последнего дня работы кода');

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promocodes');
    }
};
