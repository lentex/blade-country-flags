<?php

declare(strict_types=1);

namespace Lentex\BladeCountryFlags\Tests;

use BladeUI\Icons\BladeIconsServiceProvider;
use Illuminate\Foundation\Application;
use Lentex\BladeCountryFlags\BladeCountryFlagsServiceProvider;
use Orchestra\Testbench;

class TestCase extends Testbench\TestCase
{
    /**
     * @param Application $app
     * @return array<int, class-string>
     */
    protected function getPackageProviders($app): array // @pest-ignore-type
    {
        return [
            BladeIconsServiceProvider::class,
            BladeCountryFlagsServiceProvider::class,
        ];
    }
}
