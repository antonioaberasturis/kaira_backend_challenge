<?php

declare(strict_types=1);

namespace KairaDigital\UrlShortener\Application;

use KairaDigital\UrlShortener\Domain\UrlRepository;

class UrlShortener
{
    public function __construct(
        private readonly UrlRepository $urlRepository,
    ) {
    }

    public function __invoke(UrlData $urlData): UrlShortenedData
    {
        $urlShortened = $this->urlRepository->shorten($urlData->url());

        return new UrlShortenedData($urlShortened);
    }
}
