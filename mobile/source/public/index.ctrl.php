<?php

/*******************以下是公众号显示*****************************/
defined('IN_IA') or exit('Access Denied');
$list2 = array();
$keyword = array('生活','美食','娱乐','购物','丽人','结婚','亲子','运动','酒店','汽车','工作','房产','教育','政务','新闻','财经','公司','医院');
foreach($keyword as $v){
    $sql = "SELECT * FROM " . tablename('uni_account') . " WHERE industry_parent = '".$v."' AND position LIKE '%2%' ORDER BY RAND() LIMIT 9";
    $list2[] = pdo_fetchall($sql);
}
//资讯阅读
$sql = "SELECT * FROM " . tablename('uni_account') . " WHERE industry_parent in ('新闻','财经') AND position <> ''  ORDER BY scan_count DESC LIMIT 4";
$list1 = pdo_fetchall($sql);
//名人明星
$sql = "SELECT * FROM " . tablename('uni_account') . " WHERE industry_child = '名人/明星' AND position <> ''  ORDER BY scan_count DESC LIMIT 4";
$list2 = pdo_fetchall($sql);

//影音娱乐
$sql = "SELECT * FROM " . tablename('uni_account') . " WHERE industry_parent = '娱乐' AND position <> ''  ORDER BY scan_count DESC LIMIT 4";
$list3 = pdo_fetchall($sql);
//生活购物
$sql = "SELECT * FROM " . tablename('uni_account') . " WHERE industry_parent in ('生活','购物') AND position <> ''  ORDER BY scan_count DESC LIMIT 4";
$list4 = pdo_fetchall($sql);
//社区交友
$sql = "SELECT * FROM " . tablename('uni_account') . " WHERE industry_child = '聊天/交友' AND position <> ''  ORDER BY scan_count DESC LIMIT 4";
$list5 = pdo_fetchall($sql);
//体育竞技
$sql = "SELECT * FROM " . tablename('uni_account') . " WHERE industry_parent = '运动' AND position <> ''  ORDER BY scan_count DESC LIMIT 4";
$list6 = pdo_fetchall($sql);
//结婚亲子
$sql = "SELECT * FROM " . tablename('uni_account') . " WHERE industry_parent in ('结婚','亲子') AND position <> ''  ORDER BY scan_count DESC LIMIT 4";
$list7 = pdo_fetchall($sql);
//汽车酒店
$sql = "SELECT * FROM " . tablename('uni_account') . " WHERE industry_parent in ('汽车','酒店') AND position <> ''  ORDER BY scan_count DESC LIMIT 4";
$list8 = pdo_fetchall($sql);
//教育政务
$sql = "SELECT * FROM " . tablename('uni_account') . " WHERE industry_parent in ('教育','政务') AND position <> ''  ORDER BY scan_count DESC LIMIT 4";
$list9 = pdo_fetchall($sql);
//活动
$sql = "SELECT uniacid,title,content  FROM " . tablename('uni_account') . " WHERE content <> ''  ORDER BY RAND()  LIMIT 4";
$active = pdo_fetchall($sql);

template('public/index');
