<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1544071432StaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('staff')) {
            Schema::create('staff', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->string('name_kh')->nullable();
                $table->string('gender')->nullable();
                $table->date('dob')->nullable();
                $table->string('staff_code')->nullable();
                $table->string('phone')->nullable();
                $table->string('email')->nullable();
                $table->tinyInteger('active')->nullable()->default('1');
                
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
        Schema::dropIfExists('staff');
    }
}
