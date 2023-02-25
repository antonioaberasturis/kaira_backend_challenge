<?php

declare(strict_types=1);

namespace App\Http\Controllers\UrlShortener;

use Illuminate\Http\JsonResponse;
use KairaDigital\UrlShortener\Application\UrlData;
use KairaDigital\UrlShortener\Application\UrlShortener;
use KairaDigital\Shared\Infrastructure\Controllers\Laravel\ApiController;
use KairaDigital\UrlShortener\Infrastructure\Requests\Laravel\UrlPostRequest;
use KairaDigital\UrlShortener\Infrastructure\ApiResources\Laravel\UrlShortenedResource;

class ShortUrlPostController extends ApiController
{
    public function __construct(
        private readonly UrlShortener $shortener
    ) {
    }

    public function __invoke(UrlPostRequest $request): JsonResponse
    {
        $urlData = new UrlData($request->input('url'));

        $urlShortened = $this->shortener->__invoke($urlData);
        
        return response()->json(new UrlShortenedResource($urlShortened));
    }
}
