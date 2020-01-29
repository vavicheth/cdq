<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDutiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duties', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date')->unique();
            $table->text('date_kh');
            $table->integer('board_duty_id');
            $table->integer('chef_duty_id');
            $table->integer('chef_salle_id');
            $table->integer('beds')->nullable();
            $table->integer('restants')->nullable();
            $table->integer('dispo')->nullable();
            $table->integer('payants')->nullable();
            $table->text('examen1')->nullable();
            $table->text('examen2')->nullable();

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
        Schema::dropIfExists('duties');
    }
}
