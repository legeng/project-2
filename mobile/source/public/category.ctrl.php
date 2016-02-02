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
    if(!empty($account)) {
            $account['details'] = uni_accounts($account['uniacid']);
            $account['attachurl'] = "http://".$_SERVER['HTTP_HOST']."/attachment/";
    }
    unset($pars);
    //更新浏览量,浏览一次加1
    pdo_update('uni_account',array('scan_count'=>$account['scan_count']+1),array('uniacid'=>$uniacid));

    //取出这个公众号的文章
    $sql = "SELECT * FROM " . tablename('site_article') . " WHERE 1 = 1 AND `uniacid` = {$uniacid} ORDER BY `id` DESC LIMIT 4";
    $article = pdo_fetchall($sql, $pars);

    //猜你喜欢随机取出3条
    $sql = "SELECT * FROM " . tablename('uni_account') . " ORDER BY RAND() LIMIT 3";
    $like = pdo_fetchall($sql);
    if(!empty($like)) {
        foreach($like as &$one) {
            $one['details'] = uni_accounts($one['uniacid']);
            $one['attachurl'] = "http://".$_SERVER['HTTP_HOST']."/attachment/";
        }
    }

    template('public/account-descript');
}else{
    if(!empty($_GPC['key'])){
        $pindex = max(1, intval($_GPC['page']));
        $psize = 15;
        $start = ($pindex - 1) * $psize;
        $condition = '';
        $pars = array();
        $keyword = trim($_GPC['key']);
        if(!empty($keyword)) {
            $condition =" AND CONCAT(name,description,industry_parent,industry_child,wxrenzheng) LIKE :keyword";
            $condition .=" AND `is_check` = :is_check";
            $pars[':keyword'] = "%$keyword%";
            $pars[':is_check'] = 1;
        }

        $tsql = "SELECT COUNT(*) FROM " . tablename('uni_account') . " WHERE 1 = 1{$condition}";
        $total = pdo_fetchcolumn($tsql, $pars);
        $sql = "SELECT * FROM " . tablename('uni_account') . " WHERE 1 = 1{$condition} ORDER BY `uniacid` DESC LIMIT {$start}, {$psize}";
        $pager = pagination($total, $pindex, $psize, $url = '', array('before' => 0, 'after' => 0, 'ajaxcallback' => ''));
        $list = pdo_fetchall($sql, $pars);

        if(!empty($list)) {
            foreach($list as &$account) {
                $account['details'] = uni_accounts($account['uniacid']);
                $account['attachurl'] = "http://".$_SERVER['HTTP_HOST']."/attachment/";
            }
            template('public/category-list');
        }else{
            template('public/category-list');
        }
    }else{
        template('public/category');
    }
}
