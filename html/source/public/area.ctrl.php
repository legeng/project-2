<?php
   /*
    *   根据地区查询数据库
    */ 
defined('IN_IA') or exit('Access Denied');

load()->html('account');

if('more' == trim($_GPC['do'])){
    template('public/area');
}

if(trim($_GPC['key'])){
    $pindex = max(1, intval($_GPC['page']));
    $psize = 15;
    $start = ($pindex - 1) * $psize;
    $condition = '';
    $pars = array();
    $keyword = trim($_GPC['key']);
    if(!empty($keyword)) {
        $condition =" AND CONCAT(province,city) LIKE :province_city";
        $condition .=" AND is_check = :is_check";
        $pars[':province_city'] = "%{$keyword}%";
        $pars[':is_check'] = "1";
    }

    $tsql = "SELECT COUNT(*) FROM " . tablename('uni_account') . " WHERE 1 = 1{$condition}";
    $total = pdo_fetchcolumn($tsql, $pars);
    $sql = "SELECT * FROM " . tablename('uni_account') . " WHERE 1 = 1{$condition} ORDER BY `uniacid` DESC LIMIT {$start}, {$psize}";
    $pager = pagination($total, $pindex, $psize);
    $list = pdo_fetchall($sql, $pars);

    if(!empty($list)) {
        foreach($list as &$account) {
            $account['details'] = uni_accounts($account['uniacid']);
            $account['attachurl'] = "http://".$_SERVER['HTTP_HOST']."/attachment/";
        }
        template('public/list-account');
    }else{
        template('public/not-exist');
    }
}
