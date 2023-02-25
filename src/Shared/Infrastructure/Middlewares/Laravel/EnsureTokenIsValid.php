<?php

declare(strict_types=1);

namespace KairaDigital\Shared\Infrastructure\Middlewares\Laravel;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use KairaDigital\Autentication\Application\AuthorizationTokenValidator;
use KairaDigital\Autentication\Application\TokenData;

class EnsureTokenIsValid
{
    public function __construct(
        private AuthorizationTokenValidator $validator
    ) {
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();

        if(null === $token || $this->validator->__invoke(new TokenData($token)) === false){
            throw new AuthenticationException();
        }

        return $next($request);
    }
}
