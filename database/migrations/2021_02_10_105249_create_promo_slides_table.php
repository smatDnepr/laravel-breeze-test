<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_slides', function (Blueprint $table) {
            $table->id();
			$table->integer('promo_slider_id')->unsigned();
			$table->string('img');
			$table->string('title')->default('Заголовок слайда');
			$table->string('text')->default('Текст текст текст текст слайда');
			$table->smallInteger('btn_functional')->unsigned()->default(0);
			$table->string('btn_link')->nullable();
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
        Schema::dropIfExists('promo_slides');
    }
}
