<?php

namespace App\Validate;

use App\Exception\ParametersException;
use Hyperf\Context\Context;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\Validation\Contract\ValidatorFactoryInterface;

/**
 * @property array $rules
 * @property array $messages
 */
class BaseValidate
{
    /**
     * @var array
     */
    protected array $rules = [];

    /**
     * @var array
     */
    protected array $messages = [];

    #[Inject]
    protected ValidatorFactoryInterface $validator;

    #[Inject]
    protected RequestInterface $request;

    /**
     *
     * @throws ParametersException
     */
    public function checkOrFails()
    {
        $validator = $this->validator->make($this->request->all(), $this->rules, $this->messages);

        if ($validator->fails()) {
            throw new ParametersException($validator->errors()->first());
        }
    }

}