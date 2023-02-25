<?php

declare(strict_types=1);

namespace KairaDigital\Autentication\Application;

use KairaDigital\Autentication\Domain\TokenValidator;

class AuthorizationTokenValidator
{
    public function __construct(
        private TokenValidator $validator
    ) {
    }

    public function __invoke(TokenData $token): bool
    {
        return $this->validator->validate($token->value());
    }
}
