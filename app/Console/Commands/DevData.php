<?php

namespace App\Console\Commands;

use App\Enum\Users\UserRole;
use App\Enum\Users\UserStatus;
use App\Models\Animal;
use App\Models\Behavior;
use App\Models\Option;
use App\Models\User;
use App\Support\Installation\Animals\Behaviors;
use App\Support\Installation\Animals\Location;
use App\Support\Installation\Animals\Sex;
use App\Support\Installation\Animals\Species;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use RuntimeException;

class DevData extends Command
{
    protected $signature = 'sukycms:devdata';

    public function handle(): void
    {
        $this->canHandle();

        $this->callSilent('migrate:fresh');

        $this->createAdmin();
        $this->createOptions();

        $this->createUsers();

        $this->installAnimal();
        $this->createAnimals();
        $this->addBehaviors();
    }

    private function createAdmin(): User
    {
        $user = factory(User::class)->create([
            'name' => 'Admin',
            'email' => 'sukycms@gmail.com',
            'password' => 'secret',
            'role' => UserRole::ADMIN,
            'status' => UserStatus::ACTIVE,
            'avatar' => asset('images/jaimesares.jpg'),
        ]);

        $this->info('Admin user:');

        return $user;
    }

    private function canHandle(): void
    {
        if (app()->environment() === 'production') {
            throw new RuntimeException('DevData can not run on production environment');
        }
    }

    private function createOptions(): Collection
    {
        $options = collect(config('options'));

        $optionsInserted = collect([]);

        $options->each(static function (array $value, string $key) use ($optionsInserted) {
            $optionsInserted->push(Option::forceCreate([
                'key' => $key,
                'value' => $value['default'] ?? null,
                'autoload' => $value['autoload'] ?? null,
            ]));
        });

        return $optionsInserted;
    }

    private function createAnimals(int $number = 50, array $attributes = []): Collection
    {
        return factory(Animal::class, $number)->create($attributes);
    }

    private function installAnimal(): void
    {
        Sex::install();
        Location::install();
        Species::install();
        Behaviors::install();
    }

    private function createUsers(int $number = 50, array $attributes = []): Collection
    {
        return factory(User::class, $number)->create($attributes);
    }

    private function addBehaviors(): void
    {
        foreach (Animal::all() as $animal) {
            if (random_int(0, 1)) {
                continue;
            }

            $numBehaviors = random_int(1, 6);
            $behaviors = Behavior::inRandomOrder()->take($numBehaviors)->get();

            $animal->behaviors()->attach($behaviors->pluck('id'));
        }
    }
}
