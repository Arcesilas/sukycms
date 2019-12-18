<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalKindsTable extends Migration
{
    public function up(): void
    {
        Schema::create('animal_kinds', static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kind')->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('animal_kinds');
    }
}
