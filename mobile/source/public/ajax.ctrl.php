<?php
    
defined('IN_IA') or exit('Access Denied');

//点赞
if('guanzhu' == trim($_GPC['do']) ){
    $sql = "SELECT * FROM " . tablename('uni_account') . " WHERE uniacid = {$_GPC['id']}";
    $account = pdo_fetch($sql, $pars);
    pdo_update('uni_account',array('zan'=>$account['zan']+1),array('uniacid'=>$_GPC['id']));
    exit('1');
}

//先验证微信公众账号是否存在
if('ajax' == trim($_GPC['do']) && !empty($_GPC['account'])){
    $unidata = pdo_fetch('SELECT account FROM ' . tablename('account_wechats') . ' WHERE account = :account', array(':account' => trim($_GPC['account'])));
    if($unidata){
        exit('1');
    }else{
        exit('0');
    }
}

