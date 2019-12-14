<?php

namespace Tests;

use App\Console\Kernel;
use Laravel\Dusk\TestCase as BaseTestCase;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use App\Models\Option;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();

        $app = require __DIR__ . '/../bootstrap/app.php';

        /** @var Kernel $kernel */
        $kernel = $app->make(Kernel::class);

        $kernel->bootstrap();
        $kernel->call('migrate:fresh');
    }

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     * @return void
     */
    public static function prepare()
    {
        static::startChromeDriver();
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {
        $options = (new ChromeOptions)->addArguments([
            '--disable-gpu',
            '--headless',
            '--window-size=1920,1080',
        ]);

        return RemoteWebDriver::create(
            'http://localhost:9515', DesiredCapabilities::chrome()->setCapability(
                ChromeOptions::CAPABILITY, $options
            )
        );
    }

    private function prepareOptions(): void
    {
        collect(config('options'))->each(static function (array $value, string $key) {
            Option::forceCreate([
                'key' => $key,
                'value' => $value['default'] ?? null,
                'autoload' => $value['autoload'] ?? null,
            ]);
        });
    }
}
