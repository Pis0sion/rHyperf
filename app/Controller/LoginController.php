<?php
namespace App\Controller;

use Hyperf\HttpServer\Annotation\DeleteMapping;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\PostMapping;
use Hyperf\HttpServer\Annotation\PutMapping;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Phper666\JWTAuth\JWT;
use Hyperf\HttpServer\Annotation\Middleware;
use Phper666\JWTAuth\Middleware\JWTAuthMiddleware;
use Phper666\JWTAuth\Middleware\JWTAuthDefaultSceneMiddleware;
use Phper666\JWTAuth\Middleware\JWTAuthApplicationSceneMiddleware;
use Phper666\JWTAuth\Middleware\JWTAuthApplication1SceneMiddleware;
use Phper666\JWTAuth\Middleware\JWTAuthApplication2SceneMiddleware;
use Hyperf\Di\Annotation\Inject;
use Phper666\JWTAuth\Util\JWTUtil;
use Psr\Container\ContainerInterface;

class LoginController extends  AbstractController
{
    /**
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function login(ContainerInterface $container)
    {

        $username = $this->request->input('username');
        $password = $this->request->input('password');
        if ($username && $password) {
            //这里应为没有做auth的登录认证系统，为了展示随便写点数据
            $userData = [
                'uid' => 1,
                'username' => 'xx',
            ];
            /**
             * @var JWT $jwtFactory
             */
            $jwtFactory = $container->get("jwt") ;

            //获取Token
            $token = $jwtFactory->getToken("application",$userData);
            //返回响应的json数据
            $data = [
                'code' => 0,
                'msg'=>'success',
                'data'=>[
                    'token' =>$token->toString(),
                    //'exp'=>$jwtFactory->getTTL(),
                ],
            ];
            return $this->response->json($data);
        }

        return $this->response->json(['code' => 0, 'msg' => '登录失败', 'data' => []]);
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function refreshToken()
    {
        $token = $this->jwt->refreshToken();
        $data = [
            'code' => 0,
            'msg'  => 'success',
            'data' => [
                'token' => (string) $token,
                'exp' => $this->jwt->getTTL(),
            ]
        ];
        return $this->response->json($data);
    }
    # http头部必须携带token才能访问的路由

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function getData()
    {
        $data = [
            'code' => 0,
            'msg' => 'success',
            'data' => [
                'cache_time' => $this->jwt->getTokenDynamicCacheTime(), // 获取token的有效时间，动态的
            ],
        ];
        return $this->response->json($data);
    }

    /**
     * @return string
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function logout()
    {
        if ($this->jwt->logout()){
            return '退出登录';
        }
        return '退出失败';
    }
}

