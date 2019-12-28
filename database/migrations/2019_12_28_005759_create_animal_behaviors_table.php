<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalBehaviorsTable extends Migration
{
    public function up(): void
    {
        Schema::create('behaviors', static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('behavior')->unique();
            $table->smallInteger('order');
            $table->timestamps();
        });

        Schema::create('animal_behavior', static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('animal_id');
            $table->unsignedBigInteger('behavior_id');
            $table->timestamps();

            $table->foreign('animal_id')
                ->references('id')
                ->on('animals');

            $table->foreign('behavior_id')
                ->references('id')
                ->on('behaviors');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('animal_behavior');
        Schema::dropIfExists('behaviors');
    }
}
