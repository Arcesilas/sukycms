<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalHealthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_healths', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('animal_id')->index();
            $table->string('title');
            $table->dateTime('start_date');
            $table->dateTime('end_date')->nullable();
            $table->string('type');
            $table->boolean('hidden_in_calendar')->default(false);
            $table->string('medicine')->nullable();
            $table->text('text')->nullable();
            $table->text('result')->nullable();
            $table->integer('treatments_number')->nullable();
            $table->integer('treatments_each')->nullable();
            $table->string('treatments_time')->nullable();
            $table->boolean('treatments_life')->default(0);
            $table->timestamps();

            $table->foreign('animal_id')
                ->references('id')
                ->on('animals')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animal_healths');
    }
}
