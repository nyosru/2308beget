<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditLinkstInPhpcatTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phpcat_tests', function (Blueprint $table) {
            $table->string('link1', 250)->nullable()->change();
            $table->string('link2', 250)->nullable()->change();
            $table->string('link3', 250)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phpcat_tests', function (Blueprint $table) {
            $table->string('link1', 250)->change();
            $table->string('link2', 250)->change();
            $table->string('link3', 250)->change();
            // $table->integer('votes')->unsigned()->default(1)->comment('my comment')->change();
        });
    }
}
