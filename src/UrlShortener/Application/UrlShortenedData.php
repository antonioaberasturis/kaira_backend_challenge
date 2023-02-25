<?php

declare(strict_types=1);

namespace KairaDigital\UrlShortener\Application;

class UrlShortenedData
{
    public function __construct(
        private readonly string $url
    ) {
    }

    public function url(): string
    {
        return $this->url;
    }
}
