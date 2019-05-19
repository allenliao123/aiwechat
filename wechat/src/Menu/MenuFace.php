<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/19
 * Time: 7:47
 */

namespace Wechat\Menu;

use Wechat\Common\Account;
use Wechat\Utils\HttpClient;

/******************************************
 * 类名： MenuFace
 * @package Wechat\Menu
 * 文件描述：菜单设置接口
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/19
 * 时间: 7:47
 */
class MenuFace
{

    /**************************************s
     * @param Account $account
     * @param $data
     * @return array
     * 描述: 设置微信公众号系统菜单
     * 日期：2019/5/19
     * 时间：7:49
     * 创建者：36168
     */
    public static function setMenu(Account $account,$data){

        //获取URL值
        $url = vsprintf(UrlMenu::MENU_VALUE_SET,[$account->getToken()]);
        $data = HttpClient::Post($url,$data);
        return $data;

    }

}