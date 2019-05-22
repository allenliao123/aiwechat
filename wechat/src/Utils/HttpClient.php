<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/18
 * Time: 17:39
 */

namespace Wechat\Utils;

use GuzzleHttp\Client;

/******************************************
 * 类名： HttpClient
 * @package Wechat\Utils
 * 文件描述：封装发送请求
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/18
 * 时间: 17:39
 */
class HttpClient
{

    /**************************************
     * @param $url
     * @return array
     * 描述: get请求
     * 日期：2019/5/18
     * 时间：17:40
     * 创建者：36168
     */
    public static function Get($url){

        try{
            $client = new Client();
            $response = $client->request('GET',$url,['verify' => false]);
            $code = $response->getStatusCode(); // 200
            $body = $response->getBody()->getContents();
            $body = json_decode($body,true);
            return compact('code','body');
        }catch (\Exception $exception){

            $code = -1; // 200
            $body = $exception->getMessage();
            return compact('code','body');

        }
    }

    /**************************************
     * @param $url
     * @param $data
     * 描述: Post 请求方式
     * 日期：2019/5/19
     * 时间：7:53
     * 创建者：36168
     */
    public static function Post($url,$data){

        try{
            $client = new Client();
            $response = $client->request('POST',$url,['verify' => false,'body'=>$data]);
            $code = $response->getStatusCode(); // 200
            $body = $response->getBody()->getContents();
            $body = json_decode($body,true);
            return compact('code','body');
        }catch (\Exception $exception){

            $code = -1; // 200
            $body = $exception->getMessage();
            return compact('code','body');

        }

    }

}