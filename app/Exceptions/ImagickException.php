<?php

namespace App\Exceptions;

use Exception;

//class ImagickException extends Exception
{
    public function render($request)
    {
        return response()->json(["error" => true, "message" => $this->getMessage()]);
    }
    public function report()
    {
        \Log::debug('User not found');
    }
}
