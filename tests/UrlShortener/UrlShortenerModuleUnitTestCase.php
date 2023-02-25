<?php

declare(strict_types=1);

namespace Tests\UrlShortener;

use KairaDigital\UrlShortener\Domain\UrlRepository;
use Mockery\MockInterface;
use Tests\TestCase;

abstract class UrlShortenerModuleUnitTestCase extends TestCase
{
    private ?UrlRepository $urlRepository = null;

    protected function urlRepository(): MockInterface|UrlRepository
    {
        return $this->urlRepository = $this->urlRepository ?? $this->mock(UrlRepository::class);
    }

    protected function shouldShortenUrl(string $url, string $return): void
    {
        $this->urlRepository()
            ->shouldReceive('shorten')
            ->with($url)
            ->once()
            ->andReturn($return);
    }

}
