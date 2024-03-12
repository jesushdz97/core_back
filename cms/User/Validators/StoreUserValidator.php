<?php

namespace Cms\User\Validators;

use Cms\Base\validator\BaseValidator;

class StoreUserValidator extends BaseValidator
{
    public static function rules(): array
    {
        return [
            'email' => 'email'
        ];
    }
}
