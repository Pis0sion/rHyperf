<?php
namespace App\Controller;


use App\Service\UserServiceInterface;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\RequestInterface;

class UserController
{
    /**
     * @Inject
     * @var UserServiceInterface
     */
    private $userService;
    public  function index(RequestInterface $request,int $id)
    {
        //$id = $request->input('id');
        //直接使用
        return $this->userService->getInfoById($id);
    }
}