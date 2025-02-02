<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dv_statistics', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id')->index('FK_UserID_Stats');
            $table->year('year');
            $table->integer('data');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dv_statistics');
    }
};
