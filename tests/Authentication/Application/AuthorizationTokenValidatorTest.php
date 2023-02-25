<?php

declare(strict_types=1);

namespace Tests\Authentication\Application;

use Tests\Authentication\Domain\TokenDataFactory;
use KairaDigital\Autentication\Domain\TokenValidator;
use Tests\Authentication\AuthenticationModuleUnitTestCase;
use KairaDigital\Autentication\Application\AuthorizationTokenValidator;

class AuthorizationTokenValidatorTest extends AuthenticationModuleUnitTestCase
{
    private AuthorizationTokenValidator $validator;

    public function setUp(): void
    {
        parent::setUp();
        $this->validator = new AuthorizationTokenValidator(
            $this->app->make(TokenValidator::class)
        );
    }

    public function testShouldValidateTokenSuccessfully(): void
    {
        $token = TokenDataFactory::makeValidToken();

        $response = $this->validator->__invoke($token);

        $this->assertTrue($response);
    }

    public function testShouldValidateAEmptyTokenSuccessfully(): void
    {
        $token = TokenDataFactory::makeEmptyToken();

        $response = $this->validator->__invoke($token);

        $this->assertTrue($response);
    }

    public function testShouldNotValidateTokenSuccessfully(): void
    {
        $token = TokenDataFactory::makeInvalidToken();

        $response = $this->validator->__invoke($token);

        $this->assertFalse($response);
    }
}
