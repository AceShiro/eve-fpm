<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ships', function (Blueprint $table) {
            
            $table->increments('id');

            $table->string('icon', 255);
            $table->string('name', 255);

            $table->enum('category', array('Frigate', 'Destroyer', 'Cruiser', 'Battlecruiser', 'Battleship', 'Industrial', 'Mining', 'Carrier', 'Fax', 'Super', 'Titan', 'Freighter'));
            $table->enum('faction', array('Amarr', 'Gallente', 'Caldari', 'Minmatar'));
            $table->float('price');

            $table->time('ptime');

            $table->enum('available', array('Yes', 'No'));

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
        Schema::drop('ships');
    }
}
