<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    // ...existing code...

    public function render($request, Throwable $exception)
    {
        if ($request->wantsJson()) {
            return response()->json([
                'message' => $exception->getMessage(),
            ], 500);
        }

        return parent::render($request, $exception);
    }

    // ...existing code...
}
