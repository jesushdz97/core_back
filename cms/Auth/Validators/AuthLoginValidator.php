<?php

namespace Cms\Auth\Validators;

use Cms\Base\validator\BaseValidator;

class AuthLoginValidator extends BaseValidator
{

    static function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required'
        ];
    }
}
