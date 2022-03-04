<?php
namespace App\Controller;

use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\Validation\Contract\ValidatorFactoryInterface;
use App\Request\DebugRequest;
use App\Request\SceneRequest;
use Psr\Http\Message\ResponseInterface;
use Hyperf\HttpServer\Annotation\AutoController;
use App\Request\FooRequest;
use App\Exception\FooException;

#[AutoController(prefix: 'foo')]
class FormController extends AbstractController
{
    /**
     * @Inject()
     * @var ValidatorFactoryInterface
     */
    protected $validationFactory;

    public function foo(RequestInterface $request)
    {
        $validator = $this->validationFactory->make(
            $request->all(),
            //rule
            [
                'foo' => 'required',
                'bar' => 'required',
            ],
            //message
            [
                'foo.required' => 'foo is required',
                'bar.required' => 'bar is required',
            ]
        );
        if ($validator->failed()){
            $errorMessage = $validator->errors()->first();
        }
    }

    /**
     * @return false|string
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     * 自定义场景测试
     */
    public function scene()
    {
        $request = $this->container->get(SceneRequest::class);
        $request->scene('bar')->validateResolved();
        //return $this->response->success($request->all());
       return json_encode($request->all());
    }

    public function test(FooRequest $request)
    {
        $this->request->input('username','password');
        $validated = $request->validated();
        //throw new FooException($validated,800);
        return $validated;

    }
}