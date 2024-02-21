<?php

namespace Cms\Base\validator;

use Illuminate\Http\Request;

interface IBaseValidator
{
    public static function rules(): array;
    public static function validate(Request $request): void;
}
