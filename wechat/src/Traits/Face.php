<?php
/**
 * 文件描述：
 * Created by PhpStorm.
 * User: 36168
 * Date: 2019/5/22
 * Time: 21:12
 */

namespace Wechat\Traits;

use Wechat\Common\Account;

/**
 * Interface Face
 * @package Wechat\Interfaces
 * 门面Trait类
 */
trait Face
{

    private $account = null;

    public function __construct(Account $account)
    {
        $this->account = $account;

    }

}