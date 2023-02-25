<?php

declare(strict_types=1);

namespace KairaDigital\Autentication\Application;

class TokenData
{
    public function __construct(
        private readonly string $token
    ) {
    }

    public function value(): string
    {
        return $this->token;
    }
}
