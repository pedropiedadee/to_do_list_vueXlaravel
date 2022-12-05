<?php

namespace App\Exceptions;

use Exception;

class LoginInvalidException extends Exception
{

    protected $message = 'Email and password don\'t match.';

    public function render()
    {
        return response()->json([
            'errors'   => class_basename($this),
            'message' => $this->getMessage(),
        ], 401);
    }
}