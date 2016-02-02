<?php
   /*
    *   关键字搜索
    */ 
defined('IN_IA') or exit('Access Denied');

if(trim($_GPC['key'])){
    $pindex = max(1, intval($_GPC['page']));
    $psize = 15;
    $start = ($pindex - 1) * $psize;
    $condition = '';
    $pars = array();
    $keyword = trim($_GPC['key']);
    if(!empty($keyword)) {
        $condition =" AND CONCAT(name,description,province,city,district,industry_parent,industry_child,wxrenzheng) LIKE :keyword";
        $condition .=" AND is_check = :is_check";
        $pars[':keyword'] = "%{$keyword}%";
        $pars[':is_check'] = 1;
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
        template('public/search');
    }else{
        template('public/not-exist');
    }
}else{
    template('public/not-exist');
}
