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
use Hyperf\HttpServer\Router\Router;

Router::addRoute(['GET', 'POST', 'HEAD'], '/', 'App\Controller\IndexController@index');

Router::get('/favicon.ico', function () {
    return '';
});
Router::get('/get','App\Controller\IndexController@get');
Router::get('/user','App\Controller\IndexController@add');
//登录测试
Router::get('/login','App\Controller\AuthController@login');
//获取数据
Router::addGroup('/v1', function () {
    Router::get('/data', 'App\Controller\LoginController@getData');
}, ['middleware' => [Phper666\JwtAuth\Middleware\JwtAuthMiddleware::class]]);
Router::get('/User/{id}','App\Controller\UserController@index');
