<?php

declare(strict_types=1);

namespace KairaDigital\Autentication\Domain;

interface TokenValidator
{
    public function validate(string $token): bool;
}
