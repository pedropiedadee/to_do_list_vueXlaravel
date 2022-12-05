<?php

namespace App\Exceptions;

use Exception;

class VerifyEmailTokenInvalidException extends Exception
{
    protected $message = 'Token not valid';

    public function render()
    {
        return response()->json([
            'errors'   => class_basename($this),
            'message' => $this->getMessage(),
        ], 400);
    }
}
