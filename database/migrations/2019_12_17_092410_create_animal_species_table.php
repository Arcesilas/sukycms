<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalSpeciesTable extends Migration
{
    public function up(): void
    {
        Schema::create('animal_species', static function (Blueprint $table) {
            $table->id();
            $table->string('species')->unique();
            $table->smallInteger('order');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('animal_species');
    }
}
