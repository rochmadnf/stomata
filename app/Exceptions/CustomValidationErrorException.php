<?php

namespace App\Exceptions;

use Exception;

class CustomValidationErrorException extends Exception
{
    protected $errors = [];
    protected $mode = '';

    public function __construct($errors, $mode)
    {
        $this->errors = $errors;
        $this->mode = $mode;
    }

    public function render()
    {
        if ($this->mode === 'api') {
            return response()->json([
                "message" => "failed",
                "field" => $this->errors
            ], 422);
        }
        return back()->withErrors($this->errors)->withInput();
    }
}
