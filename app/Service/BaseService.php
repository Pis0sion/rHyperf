<?php
namespace App\Service;

/**
 * 文件描述：service基类
 * @package App\Service
 */

class BaseService
{

    /**
     * 返回信息
     * @param $code
     * @param $msg
     * @param array $data
     * @return array
     */
    protected function response($data, $code, $msg)
    {
        $response = [
            'data' => $data,
            'code' => $code,
            'msg'  => $msg,
        ];
        return $response;
    }

    /**
     * 成功的返回
     * @param $data
     * @param $msg
     * @param int $code
     * @return array
     */
    public function success($data = '', $code = 200, $msg = '成功')
    {
        return self::response($data, $code, $msg);
    }

    /**
     * 错误的返回
     * @param $msg
     * @param int $code
     * @param null $data
     * @return array
     */
    public function error($data = '', $code = 600, $msg = '失败')
    {
        return self::response($data, $code, $msg);
    }

}
