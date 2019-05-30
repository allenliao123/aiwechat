<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/30
 * Time: 9:53
 */

namespace Wechat\Template;


class UrlTemplate
{
    //设置所属行业
    const TEMPLATE_SET_INDUSTRY = "https://".Constants::HTTP_API."/cgi-bin/template/api_set_industry?access_token=%s";

    //获取所属行业
    const TEMPLATE_GET_INDUSTRY = "https://".Constants::HTTP_API."/cgi-bin/template/get_industry?access_token=%s";

    //获得模板ID
    const TEMPLATE_GET_ID = "https://".Constants::HTTP_API."/cgi-bin/template/api_add_template?access_token=%s";

    //获取模板列表
    const TEMPLATE_GET_ALL_PRIVATE = "https://".Constants::HTTP_API."/cgi-bin/template/get_all_private_template?access_token=%s";

    //删除模板
    const TEMPLATE_DEL = "https://".Constants::HTTP_API."/cgi-bin/template/del_private_template?access_token=%s";
}