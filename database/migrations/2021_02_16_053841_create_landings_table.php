<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landings', function (Blueprint $table) {
            $table->id();
			
            $table->unsignedSmallInteger('promo_slider_id')->default(1);
			
			$table->text('about_text');
			$table->string('about_img');
			
			$table->string('info_slider_header');
			$table->unsignedSmallInteger('info_slider_id')->default(1);
			
			$table->string('portfolio_header');
			$table->unsignedSmallInteger('portfolio_id')->default(1);
						
			$table->string('partners_header');
			
			$table->string('final_header');
			$table->text('final_text');
			
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
        Schema::dropIfExists('landings');
    }
}
