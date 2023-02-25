<?php

declare(strict_types=1);

namespace Tests\UrlShortener\Application;

use KairaDigital\UrlShortener\Application\UrlData;
use Tests\Shared\Infrastructure\Laravel\GeneratorFactory;

class UrlDataFactory
{
    public static function make(): UrlData
    {
        return new UrlData(GeneratorFactory::random()->url());
    }
}
