<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status')->unique();
            $table->smallInteger('order');
            $table->timestamps();
        });

        Schema::create('animal_status', static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('animal_id');
            $table->unsignedBigInteger('status_id');
            $table->timestamps();

            $table->foreign('animal_id')
                ->references('id')
                ->on('animals')
                ->onDelete('CASCADE');

            $table->foreign('status_id')
                ->references('id')
                ->on('statuses')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuses');
        Schema::dropIfExists('animal_status');
    }
}
