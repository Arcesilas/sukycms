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
            $table->id();
            $table->string('identifier')->nullable();
            $table->string('name');
            $table->unsignedBigInteger('species_id');
            $table->unsignedBigInteger('sex_id');
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('status_id');
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

            $table->foreign('species_id')
                ->references('id')
                ->on('animal_species');

            $table->foreign('sex_id')
                ->references('id')
                ->on('animal_sexes');

            $table->foreign('location_id')
                ->references('id')
                ->on('animal_locations');

            $table->foreign('status_id')
                ->references('id')
                ->on('animal_statuses');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
}
