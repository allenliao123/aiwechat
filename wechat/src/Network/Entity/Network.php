<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/21
 * Time: 15:26
 */

namespace Wechat\Network\Entity;


class Network
{
    const ACTION_DNS = 'dns';//做域名解析
    const ACTION_PIND = 'ping';//做ping检测
    const ACTION_ALL = 'all';//dns和ping都做

    const OPERATOR_CHINANET = 'CHINANET';//电信出口
    const OPERATOR_UNICOM = 'UNICOM';//联通出口
    const OPERATOR_CAP = 'CAP';//腾讯自建出口
    const OPERATOR_DEFAULT = 'DEFAULT';//根据ip来选择运营商

    private $action = null;
    private $check_operator = null;

    /**
     * @return null
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param null $action
     */
    public function setAction($action): void
    {
        $this->action = $action;
    }

    /**
     * @return null
     */
    public function getCheckOperator()
    {
        return $this->check_operator;
    }

    /**
     * @param null $check_operator
     */
    public function setCheckOperator($check_operator): void
    {
        $this->check_operator = $check_operator;
    }


    /************************************
     * @return false|string
     * 描述: 获取json数据
     * 日期：2019/5/21
     * 时间：15:33
     * 创建者：36168
     */
    public function getJsonOfValues(){

        $res['action'] = $this->getAction();
        $res['check_operator'] = $this->getCheckOperator();
        return json_encode($res,JSON_UNESCAPED_UNICODE);

    }



}