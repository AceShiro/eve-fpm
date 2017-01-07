<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id');

            $table->string('character_name', 255);
            $table->string('avatar', 255);
            $table->string('item', 255);

            $table->integer('quantity');
            $table->float('price');

            $table->enum('status', array('Waiting', 'On Going', 'Ready', 'Delivered'));

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
        Schema::dropIfExists('contracts');
    }
}
