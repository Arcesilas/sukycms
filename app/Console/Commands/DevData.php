<?php

namespace App\Console\Commands;

use App\Enum\Users\UserRole;
use App\Enum\Users\UserStatus;
use App\Models\Animal;
use App\Models\Behavior;
use App\Models\Option;
use App\Models\Page;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Status;
use App\Models\User;
use App\Support\Installation\Animals\Behaviors;
use App\Support\Installation\Animals\Location;
use App\Support\Installation\Animals\Sex;
use App\Support\Installation\Animals\Species;
use App\Support\Installation\Animals\Statuses;
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
        $this->addStatuses();

        $this->createPosts();
        $this->createPages();
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
        Statuses::install();
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

    private function addStatuses(): void
    {
        foreach (Animal::all() as $animal) {
            if (random_int(0, 1)) {
                continue;
            }

            $numStatuses = random_int(1, 6);
            $statuses = Status::inRandomOrder()->take($numStatuses)->get();

            $animal->statuses()->attach($statuses->pluck('id'));
        }
    }

    private function createPosts(): Collection
    {
        $categories = factory(PostCategory::class, 5)->create();

        $posts = collect([]);
        for ($i = 0; $i < 50; $i++) {
            $posts[] = factory(Post::class)->create([
                'user_id' => mt_rand(1, 50),
                'category_id' => $categories->random()->id,
            ]);
        }
        return $posts;
    }

    private function createPages(): Collection
    {
        $pages = collect([]);
        for ($i = 0; $i < 50; $i++) {
            $pages[] = factory(Page::class)->create([
                'user_id' => mt_rand(1, 50),
            ]);
        }
        return $pages;
    }
}
