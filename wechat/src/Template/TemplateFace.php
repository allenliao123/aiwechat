<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/30
 * Time: 9:53
 */

namespace Wechat\Template;


use Wechat\Template\Entity\Industry;
use Wechat\Traits\Face;
use Wechat\Utils\HttpClient;

class TemplateFace
{
    use Face;

    /********************************************
     * @param Industry $indus
     * @return array
     * 描述: 设置所属行业
     * 日期：2019/5/30
     * 时间：11:23
     * 创建者：36168
     */
    public function setIndustry(Industry $indus){

        $account = $this->account;
        //获取URL值
        $url = vsprintf(UrlTemplate::TEMPLATE_SET_INDUSTRY,[$account->getToken()]);
        $data = HttpClient::Post($url,$indus->getArrayOrJson(true));
        return $data;

    }



    /********************************************
     * @param Industry $indus
     * @return array
     * 描述: 设置所属行业
     * 日期：2019/5/30
     * 时间：11:23
     * 创建者：36168
     */
    public function getIndustry(Industry $indus){

        $account = $this->account;
        //获取URL值
        $url = vsprintf(UrlTemplate::TEMPLATE_GET_INDUSTRY,[$account->getToken()]);
        $data = HttpClient::Get($url);
        return $data;

    }


    /********************************************
     * @param Industry $indus
     * @return array
     * 描述: 获得模板ID
     * 日期：2019/5/30
     * 时间：11:23
     * 创建者：36168
     */
    public function getTemplateId($template_id_short){

        $account = $this->account;
        //获取URL值
        $url = vsprintf(UrlTemplate::TEMPLATE_GET_ID,[$account->getToken()]);
        $data = HttpClient::Post($url,json_encode(['template_id_short'=>$template_id_short]));
        return $data;

    }


    /********************************************
     * @param Industry $indus
     * @return array
     * 描述: 获取模板列表
     * 日期：2019/5/30
     * 时间：11:23
     * 创建者：36168
     */
    public function getTemplateAll(){

        $account = $this->account;
        //获取URL值
        $url = vsprintf(UrlTemplate::TEMPLATE_GET_ALL_PRIVATE,[$account->getToken()]);
        $data = HttpClient::Get($url);
        return $data;

    }


    /********************************************
     * @param Industry $indus
     * @return array
     * 描述: 删除模板
     * 日期：2019/5/30
     * 时间：11:23
     * 创建者：36168
     */
    public function delTemplate($template_id){

        $account = $this->account;
        //获取URL值
        $url = vsprintf(UrlTemplate::TEMPLATE_DEL,[$account->getToken()]);
        $data = HttpClient::Post($url,json_encode(['template_id'=>$template_id]));
        return $data;

    }




}