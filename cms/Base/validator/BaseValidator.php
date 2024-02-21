<?php

namespace Cms\Base\validator;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

abstract class BaseValidator implements IBaseValidator
{
    abstract static function rules(): array;

    static function validate(Request $request): void
    {
        $validator = Validator::make($request->all(), static::rules());

        if ($validator->fails()) {
            throw new HttpResponseException(
                response()->json(['validations' => $validator->errors()->messages()],
                    Response::HTTP_UNPROCESSABLE_ENTITY)
            );
        }
    }
}
