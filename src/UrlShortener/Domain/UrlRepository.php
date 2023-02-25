<?php

declare(strict_types=1);

namespace KairaDigital\UrlShortener\Domain;

interface UrlRepository
{
    public function shorten(string $url): string;
}
