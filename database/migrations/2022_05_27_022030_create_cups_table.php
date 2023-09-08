<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cups', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->string('lat')
                ->nullable();
            $table->string('lon')
                ->nullable();

            $table->text('opis')
                ->nullable();

            for ($i = 1; $i <= 10; $i++) {
                $table->string('img' . $i)->nullable();
            }


            // $table->enum('tema', ['learning', 'merop'])
            //     // ->default('text')
            //     ->nullable();
            // $table->enum('type', ['youtube', 'text'])
            //     ->default('text');

            // $table->string('link')
            //     ->nullable();
            // $table->date('date');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cups');
    }
}
