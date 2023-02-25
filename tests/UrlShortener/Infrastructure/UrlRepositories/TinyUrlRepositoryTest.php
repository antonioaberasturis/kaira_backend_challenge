<?php

declare(strict_types=1);

namespace Tests\UrlShortener\Infrastructure\UrlRepositories;

use KairaDigital\UrlShortener\Infrastructure\UrlRepositories\TinyUrlRepository;
use Tests\UrlShortener\Application\UrlDataFactory;
use Tests\UrlShortener\UrlShortenerModuleIntegrationTestCase;

class TinyUrlRepositoryTest extends UrlShortenerModuleIntegrationTestCase
{
    public function testShouldGetShortenedUrl(): void
    {
        $urlData = UrlDataFactory::make();

        $response = (new TinyUrlRepository)->shorten($urlData->url());

        $this->assertStringContainsString("https://tinyurl.com/", $response);
    }
}
