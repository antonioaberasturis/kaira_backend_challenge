<?php

declare(strict_types=1);

namespace KairaDigital\Autentication\Infrastructure\TokenValidators;

use KairaDigital\Autentication\Domain\TokenValidator;

class TokenBearerValidator implements TokenValidator
{
    public function validate(string $token): bool
    {
        $tokenChars = str_split($token);
        $stack = [];
        $hash = [
                ")" => "(",
                "}" => "{",
                "]" => "[",
        ];
        $isOpenedItem = fn(string $item) => in_array($item, array_values($hash), true);
        $getOpenedFor = fn(string $item) => $hash[$item];

        foreach($tokenChars as $item){
            if($isOpenedItem($item)){
                $stack[] = $item;
            } else {
                $openedItem = array_pop($stack);
                if ($getOpenedFor($item) !== $openedItem) {
                    return false;
                }
            }
        }
        
        if(empty($stack)) 
            return true;

        return false;
    }
}
