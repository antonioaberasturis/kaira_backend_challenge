<?php

declare(strict_types=1);

namespace Tests\App\Api\UrlShortener;

use Illuminate\Testing\Fluent\AssertableJson;
use Tests\Authentication\Domain\TokenDataFactory;
use Tests\App\Api\UrlShortener\UrlShortenerModuleAcceptanceTestCase;

class ShortUrlPostControllerTest extends UrlShortenerModuleAcceptanceTestCase
{
    public function testShouldGetShortenedUrl(): void
    {
        $token = TokenDataFactory::makeValidBearer();
        $url = 'http://example.com';

        $response = $this->post(
                                "api/v1/short-urls", 
                                ["url" => $url], 
                                [
                                    "Authorization" => $token,
                                    "Accept" => "application/json",
                                ]
                            );

        $response->assertOk()->assertJson(fn(AssertableJson $json) => 
                $json->where('url', fn($url) => str_contains($url, "https://tinyurl.com/"))
        );
    }

    public function testShouldGetValidationErrorWhenUrlIsRequired(): void
    {
        $token = TokenDataFactory::makeValidBearer();

        $response = $this->post(
                                "api/v1/short-urls", 
                                [],
                                [
                                    "Authorization" => $token,
                                    "Accept" => "application/json",
                                ]
                            );

        $response->assertUnprocessable()->assertExactJson([
            "errors" => [
                "url" => [
                    "the url is required"
                ],
            ],
            "message" => "the url is required", 
        ]);
    }

    public function testShouldGetValidationErrorWhenUrlIsNotValid(): void
    {
        $token = TokenDataFactory::makeValidBearer();
        $url = 'example.com';

        $response = $this->post(
                                "api/v1/short-urls", 
                                ["url" => $url],
                                [
                                    "Authorization" => $token,
                                    "Accept" => "application/json",
                                ]
                            );

        $response->assertUnprocessable()->assertExactJson([
            "errors" => [
                "url" => [
                    "the url is not valid"
                ],
            ],
            "message" => "the url is not valid", 
        ]);
    }

    public function testShouldGetValidationErrorWhenTokenIsNotValid(): void
    {
        $token = TokenDataFactory::makeInvalidBearer();
        $url = 'http://example.com';

        $response = $this->post(
                                "api/v1/short-urls", 
                                ["url" => $url], 
                                [
                                    "Authorization" => $token,
                                    "Accept" => "application/json",
                                ]
                            );

        $response->assertUnauthorized()->assertExactJson([
            "message" => "Unauthenticated.", 
        ]);
    }

    public function testShouldGetValidationErrorWhenTokenIsNotTypeBearer(): void
    {
        $token = TokenDataFactory::makeNotBearer();
        $url = 'http://example.com';

        $response = $this->post(
                                "api/v1/short-urls", 
                                ["url" => $url], 
                                [
                                    "Authorization" => $token,
                                    "Accept" => "application/json",
                                ]
                            );

        $response->assertUnauthorized()->assertExactJson([
            "message" => "Unauthenticated.", 
        ]);
    }
}
