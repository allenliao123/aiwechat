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
use Wechat\Menu\Entity\ButtonPersonalized;
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
class ButtonFace
{

    /**************************************
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


    /**************************************
     * @param Account $account
     * @return array
     * 描述: 获取菜单自定义
     * 日期：2019/5/20
     * 时间：9:21
     * 创建者：36168
     */
    public static function getMenu(Account $account){

        //获取URL值
        $url = vsprintf(UrlMenu::SELF_MENU_VALUE_GET,[$account->getToken()]);
        $data = HttpClient::Get($url);
        return $data;

    }


    /**************************************
     * @param Account $account
     * 描述: 删除自定菜单
     * 日期：2019/5/20
     * 时间：9:27
     * 创建者：36168
     */
    public static function delMenu(Account $account){

        //获取URL值
        $url = vsprintf(UrlMenu::SELF_MENU_VALUE_DELETE,[$account->getToken()]);
        $data = HttpClient::Get($url);
        return $data;

    }


    /**************************************
     * @param Account $account
     * @param $data
     * @return array
     * 描述: 设置个性化菜单
     * 日期：2019/5/20
     * 时间：10:56
     * 创建者：36168
     */
    public static function setPersonalMenu(Account $account,$data){
        //获取URL值
        $url = vsprintf(UrlMenu::PERSONAL_MENU_VALUE_SET,[$account->getToken()]);
        $data = HttpClient::Post($url,$data);
        return $data;
    }


    /**************************************
     * @param Account $account
     * @param $data
     * @return array
     * 描述: 删除个性化菜单
     * 日期：2019/5/20
     * 时间：10:56
     * 创建者：36168
     */
    public static function deletePersonalMenu(Account $account,ButtonPersonalized $button){
        //获取URL值
        $params = ['menuid'=>$button->getMenuid()];
        $url = vsprintf(UrlMenu::PERSONAL_MENU_VALUE_SET,[$account->getToken()]);
        $data = HttpClient::Post($url,json_encode($params));
        return $data;
    }



}