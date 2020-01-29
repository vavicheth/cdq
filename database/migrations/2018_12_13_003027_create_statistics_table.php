<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('duty_id');
            $table->integer('department_id');
            $table->integer('beds');
            $table->integer('et_payant')->default(0);
            $table->integer('et_gratuit')->default(0);
            $table->integer('et_credit')->default(0);
            $table->integer('et_bss')->default(0);
            $table->integer('et_hef')->default(0);
            $table->integer('et_indigent')->default(0);
            $table->integer('sortant')->default(0);
            $table->integer('rt_payant')->default(0);
            $table->integer('rt_gratuit')->default(0);
            $table->integer('rt_credit')->default(0);
            $table->integer('rt_bss')->default(0);
            $table->integer('rt_hef')->default(0);
            $table->integer('rt_indigent')->default(0);
            $table->integer('dispo')->default(0);
            $table->integer('sida')->default(0);;
            $table->integer('hiv')->default(0);

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
        Schema::dropIfExists('statistics');
    }
}
