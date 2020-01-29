<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1544070700TitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('titles')) {
            Schema::create('titles', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title')->nullable();
                $table->string('title_kh')->nullable();
                $table->string('abr')->nullable();
                $table->string('abr_kh')->nullable();
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
        Schema::dropIfExists('titles');
    }
}
