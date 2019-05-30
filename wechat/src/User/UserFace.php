<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/26
 * Time: 18:27
 */

namespace Wechat\User;


use Wechat\Traits\Face;
use Wechat\User\Entity\User;
use Wechat\Utils\HttpClient;

class UserFace
{

    use  Face;

    /***********************************
     * @param User $user
     * @return mixed
     * 描述: 用户信息
     * 日期：2019/5/26
     * 时间：18:32
     * 创建者：36168
     */
    public function userInfo(User $user){

        $url = vsprintf(UrlUser::USER_INFO,[$this->account->getToken(),$user->getOpenid()]);
        $data = HttpClient::Get($url);
        return $data;

    }


    /***********************************
     * @param User|null $user
     * @return mixed
     * 描述: 用户列表
     * 日期：2019/5/26
     * 时间：18:33
     * 创建者：36168
     */
    public function userList(User $user_next = null){
        $url = vsprintf(UrlUser::USER_LIST,[$this->account->getToken()]);
        if(!empty($user)){
            $url = $url."&next_openid=" . $user_next->getOpenid();
        }
        $data = HttpClient::Get($url);
        return $data;

    }




}