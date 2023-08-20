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
        Schema::create('bonus', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('kolvo')->default(1)
                ->comment('сколько купонов');
            $table->enum('type', ['bonus', 'money'])->nullable()
                ->comment('тип бонуса, за деньги или подарок');
            $table->boolean('potracheno')->default(false)
                ->comment('всё потрачено - тру');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bonus');
    }
};
