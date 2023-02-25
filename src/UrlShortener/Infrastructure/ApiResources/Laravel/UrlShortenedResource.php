<?php

declare(strict_types=1);

namespace KairaDigital\UrlShortener\Infrastructure\ApiResources\Laravel;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UrlShortenedResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "url" => $this->url()
        ];
    }
}
