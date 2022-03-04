<?php

namespace App\Validate;

/**
 * \App\Validate\IDValidate
 */
class IDValidate extends BaseValidate
{
    /**
     * @var array|string[]
     */
    protected array $rules = [
        "id" => "required",
    ];

    /**
     * @var array|string[]
     */
    protected array $messages = [
        "id.required" => "必传id"
    ] ;

}