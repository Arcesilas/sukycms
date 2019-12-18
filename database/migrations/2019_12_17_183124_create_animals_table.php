<?php

use App\Enum\Animals\AnimalBirthDateApproximate;
use App\Enum\Animals\AnimalSize;
use App\Enum\Animals\AnimalSpecial;
use App\Enum\Animals\AnimalUrgent;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    public function up(): void
    {
        Schema::create('animals', static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('identifier')->nullable();
            $table->string('name');
            $table->unsignedBigInteger('kind_id');
            $table->unsignedBigInteger('gender_id');
            $table->unsignedBigInteger('location_id');
//            $table->string('status');
            $table->date('birth_date');
//            $table->boolean('birth_date_approximate')->default(AnimalBirthDateApproximate::NO);
            $table->date('entry_date')->nullable();
//            $table->boolean('urgent')->default(AnimalUrgent::NO);
//            $table->boolean('special')->default(AnimalSpecial::NO);
//            $table->string('size')->default(AnimalSize::UNKNOWN);
            $table->double('weight')->nullable();
            $table->smallInteger('height')->nullable();
            $table->smallInteger('length')->nullable();
            $table->string('litter')->nullable();
            $table->string('breed')->nullable();
            $table->string('microchip')->nullable();
            $table->text('description');
            $table->text('private_description')->nullable();
            $table->integer('visits_list')->default(0);
            $table->integer('visits')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('kind_id')
                ->references('id')
                ->on('animal_kinds');

            $table->foreign('gender_id')
                ->references('id')
                ->on('animal_genders');

            $table->foreign('location_id')
                ->references('id')
                ->on('animal_locations');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
}
