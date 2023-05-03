<?php

namespace App\Exceptions;

use Exception;

class CustomValidationErrorException extends Exception
{
    protected $errors = [];
    public function __construct($errors)
    {
        $this->errors = $errors;
    }

    public function render()
    {
        return back()->withErrors($this->errors)->withInput();
    }
}
