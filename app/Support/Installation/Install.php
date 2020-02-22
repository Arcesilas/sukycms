<?php

namespace App\Support\Installation;

use App\Support\Installation\Animals\Behaviors;
use App\Support\Installation\Animals\Location;
use App\Support\Installation\Animals\Sex;
use App\Support\Installation\Animals\Species;

class Install
{
    public static function install()
    {
        self::installAnimals();
    }

    public static function installAnimals()
    {
        Behaviors::install();
        Location::install();
        Sex::install();
        Species::install();
    }
}
