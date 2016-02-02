<?php
   /*
    *   根据类别查询数据库
    */ 
defined('IN_IA') or exit('Access Denied');
$uniacid = intval($_GPC['id']);
if($uniacid){
    $pars = array();
    $sql = "SELECT * FROM " . tablename('uni_account') . " WHERE uniacid = :uniacid";
    $pars = array(':uniacid'=>$uniacid);
    $account = pdo_fetch($sql, $pars);
    //更新浏览量,浏览一次加1
    pdo_update('uni_account',array('scan_count'=>$account['scan_count']+1),array('uniacid'=>$uniacid));

    //随机活动取出5条
    $sql = "SELECT uniacid,title FROM " . tablename('uni_account') . " WHERE content <> '' AND uniacid <> {$uniacid} ORDER BY RAND() LIMIT 5";
    $active = pdo_fetchall($sql);

    template('public/active-descript');
}else{
    $pindex = max(1, intval($_GPC['page']));
    $psize = 15;
    $start = ($pindex - 1) * $psize;
    $condition = '';
    $pars = array();
    $keyword = trim($_GPC['key']);
    if(!empty($keyword)) {
        $condition =" AND industry_parent = :keyword";
        $condition .=" AND `is_check` = :is_check";
        $condition .=" AND `content` <> ''";
        $pars[':keyword'] = $keyword;
        $pars[':is_check'] = 1;
    }else{
        $condition .=" AND `is_check` = :is_check";
        $condition .=" AND `content` <> ''";
        $pars[':is_check'] = 1;
    }
    $tsql = "SELECT COUNT(*) FROM " . tablename('uni_account') . " WHERE 1 = 1{$condition}";
    $total = pdo_fetchcolumn($tsql, $pars);
    $sql = "SELECT * FROM " . tablename('uni_account') . " WHERE 1 = 1{$condition} ORDER BY `uniacid` DESC LIMIT {$start}, {$psize}";
    $pager = pagination($total, $pindex, $psize, $url = '', array('before' => 0, 'after' => 0, 'ajaxcallback' => ''));
    $active = pdo_fetchall($sql, $pars);

    if(!empty($list)) {
        foreach($list as &$account) {
            $account['details'] = uni_accounts($account['uniacid']);
            $account['attachurl'] = "http://".$_SERVER['HTTP_HOST']."/attachment/";
        }
        template('public/active');
    }else{
        template('public/active');
    }
}
