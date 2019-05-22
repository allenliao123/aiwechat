<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/19
 * Time: 7:50
 */

namespace Wechat\Menu;

use Wechat\Utils\Constants;

/******************************************
 * 类名： UrlMenu
 * @package Wechat\Menu
 * 文件描述：微信菜单URL
 * 创建者 PhpStorm.
 * 用户: 36168
 * 日期: 2019/5/19
 * 时间: 7:50
 */
class UrlMenu
{
    //微信设置菜单URL
    const MENU_VALUE_SET = "https://".Constants::HTTP_API."/cgi-bin/menu/create?access_token=%s";


    //微信自定义菜单获取
    const SELF_MENU_VALUE_GET = "https://".Constants::HTTP_API."/cgi-bin/menu/get?access_token=%s";

    //微信自定义菜单删除
    const SELF_MENU_VALUE_DELETE = "https://".Constants::HTTP_API."/cgi-bin/menu/delete?access_token=%s";

    /****************************
     * 个性化菜单
     */
    //个性化菜单设置
    const PERSONAL_MENU_VALUE_SET = "https://".Constants::HTTP_API."/cgi-bin/menu/addconditional?access_token=%s";

    //删除
    const PERSONAL_MENU_VALUE_DELETE = "https://".Constants::HTTP_API."/cgi-bin/menu/delconditional?access_token=%s";

    //获取
    const PERSONAL_MENU_VALUE_GET = "https://".Constants::HTTP_API."/cgi-bin/menu/delconditional?access_token=%s";

    //匹配
    const PERSONAL_MENU_VALUE_MATACH = "https://".Constants::HTTP_API."/cgi-bin/menu/trymatch?access_token=%s";

}