<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $e)
    {
        if ($e->getCode() === 403) {
            return response()->view('errors.403', [], 403);
        }

        return parent::render($request, $e);
    }
}
