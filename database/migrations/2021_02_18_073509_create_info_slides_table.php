<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_slides', function (Blueprint $table) {
            $table->id();
			$table->integer('order')->unsigned()->default(0);
			$table->integer('info_slider_id')->unsigned();
            $table->string('ico')->nullable();
            $table->string('title')->nullable()->default('Заголовок');
            $table->string('text')->nullable()->default('Текст текст текст');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_slides');
    }
}
