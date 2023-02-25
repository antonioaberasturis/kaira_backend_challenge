<?php

declare(strict_types=1);

namespace KairaDigital\UrlShortener\Infrastructure\UrlRepositories;

use Illuminate\Support\Facades\Http;
use KairaDigital\UrlShortener\Domain\UrlRepository;

class TinyUrlRepository implements UrlRepository
{
    public function shorten(string $url): string
    {
        $response = Http::get("https://tinyurl.com/api-create.php?url={$url}");

        return $response->body();
    }
}
