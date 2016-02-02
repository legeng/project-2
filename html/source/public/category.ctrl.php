<?php
   /*
    *   根据类别查询数据库
    */ 
defined('IN_IA') or exit('Access Denied');

load()->html('account');

$uniacid = intval($_GPC['id']);
if($uniacid){
    //查询数据库得到该公众号的信息
    $pars = array();
    $sql = "SELECT * FROM " . tablename('uni_account') . " WHERE uniacid = :uniacid";
    $pars = array(':uniacid'=>$uniacid);
    $account = pdo_fetch($sql, $pars);
    if(!empty($account)) {
            $account['details'] = uni_accounts($account['uniacid']);
            $account['attachurl'] = "http://".$_SERVER['HTTP_HOST']."/attachment/";
    }
    unset($pars);
    //更新浏览量,浏览一次加1
    pdo_update('uni_account',array('scan_count'=>$account['scan_count']+1),array('uniacid'=>$uniacid));

    //取出这个公众号的文章

    $sql = "SELECT * FROM " . tablename('site_article') . " WHERE 1 = 1 AND `uniacid` = {$uniacid} ORDER BY `id` DESC LIMIT 4";
    $article = pdo_fetchall($sql);
    if(!empty($article)) {
        foreach($article as &$one) {
            $one['p_cate'] = trim($_GPC['key']);
            $one['attachurl'] = "http://".$_SERVER['HTTP_HOST']."/attachment/";
        }
    }

    template('public/account-descript');
}else{
    $pindex = max(1, intval($_GPC['page']));
    $psize = 15;
    $start = ($pindex - 1) * $psize;
    $condition = '';
    $pars = array();
    $keyword = trim($_GPC['key']);
    if(!empty($keyword)) {
        $condition =" AND `industry_parent` = :industry_parent";
        $condition .=" AND `is_check` = :is_check";
        $pars[':industry_parent'] = $keyword;
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
        template('public/list-account');
    }else{
        template('public/not-exist');    
    }
}
