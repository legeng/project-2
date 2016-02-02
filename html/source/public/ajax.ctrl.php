<?php
    
defined('IN_IA') or exit('Access Denied');

//先验证微信公众账号是否存在
if('ajax' == trim($_GPC['do']) && !empty($_GPC['account'])){
    $unidata = pdo_fetch('SELECT account FROM ' . tablename('account_wechats') . ' WHERE account = :account', array(':account' => trim($_GPC['account'])));
    if($unidata){
        exit('1');
    }else{
        exit('0');
    }
}


