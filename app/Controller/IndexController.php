<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Controller;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Annotation\AutoController;
use App\Service\UserService;
use Hyperf\Di\Annotation\Inject;
use App\Request\FooRequest;

class IndexController extends AbstractController
{
    /**
     * @Inject()
     * @var UserService
     * @return array
     */
    private $userService;
    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

//        return [
//            'method' => $method,
//            'message' => "Hello {$user}.",
//        ];
        return [
            'user_name'=>'lijinjuan',
            'age'=>18,
        ];
    }
    public function get()
    {
        return 'hello world';
    }
    public function add()
    {
        $data = ['username'=>'lijinjuan','age'=>18,'sex'=>'girl'];
        return $this->userService->addCustomer($data);
    }
    public function form(FooRequest $request)
    {
        $this->request->input('user','password');
        $validated = $request->validated();
        return $validated;
    }
}
