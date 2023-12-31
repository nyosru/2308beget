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

        Schema::create('bonuses', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id');
            $table->integer('domain_order_id')->nullable();

            $table->integer('kolvo')->default(1)
                ->comment('сколько купонов');

            $table->enum('type', ['bonus', 'money'])->nullable()
                ->comment('тип бонуса, за деньги или подарок');

            $table->integer('potracheno')
                ->default(0)
                ->comment('сколько уже потрачено');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bonuses');
    }
};
