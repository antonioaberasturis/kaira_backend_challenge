<?php

declare(strict_types=1);

namespace KairaDigital\Shared\Infrastructure\Controllers\Laravel;

use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class ApiController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;
}
