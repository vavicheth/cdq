<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1544071040DepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('departments')) {
            Schema::create('departments', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->string('name_kh')->nullable();
                $table->string('abr')->nullable();
                $table->integer('beds')->nullable();
                $table->string('description')->nullable();
                $table->tinyInteger('active')->nullable()->default('0');
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
