<?php

namespace App\Traits;

use App\Exceptions\CustomValidationErrorException;
use Illuminate\Support\Facades\Validator;

trait ControllerTrait
{
    public function isValidRequest(array $data, array $rules): bool
    {
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            throw new CustomValidationErrorException($validator->errors());
        }

        return true;
    }
}
