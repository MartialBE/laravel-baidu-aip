<?php
namespace Martialbe\LaravelBaiduAip\SDK\lib;

class AipHttpUtil
{
    /**
     * 在uri编码中不能对'/'编码
     * @param  string $path
     * @return string
     */
    public static function urlEncodeExceptSlash($path)
    {
        return str_replace("%2F", "/", AipHttpUtil::urlEncode($path));
    }

    /**
     * 使用编码数组编码
     * @param  string $path
     * @return string
     */
    public static function urlEncode($value)
    {
        return rawurlencode($value);
    }

    /**
     * 生成标准化QueryString
     * @param  array $parameters
     * @return array
     */
    public static function getCanonicalQueryString(array $parameters)
    {
        //没有参数，直接返回空串
        if (count($parameters) == 0) {
            return '';
        }

        $parameterStrings = array();
        foreach ($parameters as $k => $v) {
            //跳过Authorization字段
            if (strcasecmp('Authorization', $k) == 0) {
                continue;
            }
            if (!isset($k)) {
                throw new \InvalidArgumentException(
                    "parameter key should not be null"
                );
            }
            if (isset($v)) {
                //对于有值的，编码后放在=号两边
                $parameterStrings[] = AipHttpUtil::urlEncode($k)
                    . '=' . AipHttpUtil::urlEncode((string) $v);
            } else {
                //对于没有值的，只将key编码后放在=号的左边，右边留空
                $parameterStrings[] = AipHttpUtil::urlEncode($k) . '=';
            }
        }
        //按照字典序排序
        sort($parameterStrings);

        //使用'&'符号连接它们
        return implode('&', $parameterStrings);
    }

    /**
     * 生成标准化uri
     * @param  string $path
     * @return string
     */
    public static function getCanonicalURIPath($path)
    {
        //空路径设置为'/'
        if (empty($path)) {
            return '/';
        } else {
            //所有的uri必须以'/'开头
            if ($path[0] == '/') {
                return AipHttpUtil::urlEncodeExceptSlash($path);
            } else {
                return '/' . AipHttpUtil::urlEncodeExceptSlash($path);
            }
        }
    }

    /**
     * 生成标准化http请求头串
     * @param  array $headers
     * @return array
     */
    public static function getCanonicalHeaders($headers)
    {
        //如果没有headers，则返回空串
        if (count($headers) == 0) {
            return '';
        }

        $headerStrings = array();
        foreach ($headers as $k => $v) {
            //跳过key为null的
            if ($k === null) {
                continue;
            }
            //如果value为null，则赋值为空串
            if ($v === null) {
                $v = '';
            }
            //trim后再encode，之后使用':'号连接起来
            $headerStrings[] = AipHttpUtil::urlEncode(strtolower(trim($k))) . ':' . AipHttpUtil::urlEncode(trim($v));
        }
        //字典序排序
        sort($headerStrings);

        //用'\n'把它们连接起来
        return implode("\n", $headerStrings);
    }
}