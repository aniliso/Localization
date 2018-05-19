<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalizationDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localization__districts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your fields

            $table->string('county');
            $table->string('district');
            $table->string('neighborhood');
            $table->string('postcode', 7);

            $table->unique(['city_id', 'county', 'district', 'neighborhood', 'postcode'], 'localization__districts_key');

            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('localization__cities')->onDelete('cascade');

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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('localization__districts');
        Schema::enableForeignKeyConstraints();
    }
}
