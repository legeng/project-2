<?php
/**
 * 这是获取一些账号，精品账号，扫描排行，热门文章
 */
defined('IN_IA') or exit('Access Denied');


//获取精品账号随机推送,扫描排行榜推送
function get_account($num){
    if(1 == $num){//精品账号
        $condition = ' AND uniacid <> :uniacid';
        $pars = array(':uniacid'=>1);
        $sql = "SELECT * FROM " . tablename('uni_account') . " WHERE 1 = 1{$condition} ORDER BY RAND() LIMIT 12";
        $list = pdo_fetchall($sql, $pars);
    }
    if(2 == $num){//扫描排行榜
        $condition = ' AND uniacid <> :uniacid';
        $pars = array(':uniacid'=>1);
        $sql = "SELECT * FROM " . tablename('uni_account') . " WHERE 1 = 1{$condition} ORDER BY scan_count LIMIT 9";
        $list = pdo_fetchall($sql, $pars);
    
    }

    return $list;
}

function get_article(){
    $condition = ' AND uniacid = :uniacid';
    $pars = array(':uniacid'=>1);
    $sql = "SELECT * FROM " . tablename('site_article') . " WHERE 1 = 1{$condition} ORDER BY scan_count LIMIT 9";
    $list = pdo_fetchall($sql, $pars);

    return $list;
}



