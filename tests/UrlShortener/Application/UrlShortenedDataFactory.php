<?php

declare(strict_types=1);

namespace Tests\UrlShortener\Application;

use KairaDigital\UrlShortener\Application\UrlShortenedData;

class UrlShortenedDataFactory
{
    public static function make(): UrlShortenedData
    {
        return new UrlShortenedData("https://tinyurlcom/y2vayt2q");
    }
}
