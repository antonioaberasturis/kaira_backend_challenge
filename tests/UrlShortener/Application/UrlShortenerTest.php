<?php

declare(strict_types=1);

namespace Tests\UrlShortener\Application;

use Tests\UrlShortener\UrlShortenerModuleUnitTestCase;
use KairaDigital\UrlShortener\Application\UrlShortener;
use Tests\UrlShortener\Application\UrlShortenedDataFactory;

class UrlShortenerTest extends UrlShortenerModuleUnitTestCase
{
    private UrlShortener $shortener;

    public function setUp(): void
    {
        parent::setUp();
        $this->shortener = new UrlShortener($this->urlRepository());
    }

    public function testShouldShortenUrl(): void
    {
        $urlData = UrlDataFactory::make();
        $urlShortened = UrlShortenedDataFactory::make();

        $this->shouldShortenUrl($urlData->url(), $urlShortened->url());

        $response = $this->shortener->__invoke($urlData);

        $this->assertEquals($response, $urlShortened);
    }
}
