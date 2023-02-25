<?php

declare(strict_types=1);

namespace Tests\Authentication\Domain;

use KairaDigital\Autentication\Application\TokenData;

class TokenDataFactory 
{
    private static $validTokens = [
        '',
        '{}',
        '{}[]()',
        '{([])}',
    ];

    private static $invalidTokens  = [
        '{)', 
        '[{]}', 
        '(((((((()',
    ];

    public static function makeValidBearer(): string
    {
        return "Bearer ". static::$validTokens[rand(0, 2)];
    }

    public static function makeInvalidBearer(): string
    {
        return "Bearer ". static::$invalidTokens[rand(0, 2)];
    }

    public static function makeNotBearer(): string
    {
        return static::$invalidTokens[rand(0, 2)];
    }

    public static function makeValidToken(): TokenData
    {
        return new TokenData(static::$validTokens[rand(0, 2)]);
    }

    public static function makeInvalidToken(): TokenData
    {
        return new TokenData(static::$invalidTokens[rand(0, 2)]);
    }

    public static function makeEmptyToken(): TokenData
    {
        return new TokenData('');
    }
}
