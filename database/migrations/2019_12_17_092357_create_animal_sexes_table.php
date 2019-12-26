<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalSexesTable extends Migration
{
    public function up(): void
    {
        Schema::create('animal_sexes', static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sex')->unique();
            $table->smallInteger('order');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('animal_sexes');
    }
}
