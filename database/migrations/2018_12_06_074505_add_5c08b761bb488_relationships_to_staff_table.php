<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c08b761bb488RelationshipsToStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('staff', function(Blueprint $table) {
            if (!Schema::hasColumn('staff', 'title_id')) {
                $table->integer('title_id')->unsigned()->nullable();
                $table->foreign('title_id', '237202_5c08a90adb05d')->references('id')->on('titles')->onDelete('cascade');
                }
                if (!Schema::hasColumn('staff', 'department_code_id')) {
                $table->integer('department_code_id')->unsigned()->nullable();
                $table->foreign('department_code_id', '237202_5c08a90b05c61')->references('id')->on('departments')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('staff', function(Blueprint $table) {
            
        });
    }
}
