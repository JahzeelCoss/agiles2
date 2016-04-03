<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('races', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->text('description');
            $table->string('image');
            $table->boolean('active')->default(true);
            $table->text('contact_info');
            $table->boolean('inscriptions_closed')->default(false);
            $table->double('distance');
            $table->double('fee');
            $table->integer('current_inscriptions');
            $table->double('capacity');
            $table->text('start_place');
            $table->text('finish_place');
            $table->boolean('finished')->default(false);
            $table->integer('company_id')->unsigned()->nullable();           
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
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
        Schema::drop('races');
    }
}
