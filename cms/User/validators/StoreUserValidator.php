<?php

namespace Cms\User\validators;

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
