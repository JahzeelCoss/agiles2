<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRacesTable3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('races', function (Blueprint $table) {
            $table->integer('category_id')->unsigned()->nullable();           
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('type_id')->unsigned()->nullable();           
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('races',function (Blueprint $table){
            $ $table->dropForeign('category_id');
            $table->dropColumn('category_id');
            $table->dropForeign('type_id');
            $table->dropColumn('type_id');
        });         
    }
}
