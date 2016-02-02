<?php

/*******************以下是公众号显示*****************************/
defined('IN_IA') or exit('Access Denied');
$sql = "SELECT COUNT(*) FROM " . tablename('uni_account');
$total = pdo_fetchcolumn($sql);

//首页搜索栏
$sql = "SELECT uniacid,name,industry_parent FROM " . tablename('uni_account') . " WHERE position LIKE '%0%' AND is_check=1 LIMIT 8";
$list0 = pdo_fetchall($sql);

//位置一
$sql = "SELECT uniacid,name,industry_parent FROM " . tablename('uni_account') . " WHERE position LIKE '%1%' AND is_check=1 /*ORDER BY RAND()*/ LIMIT 20";
$list1 = pdo_fetchall($sql);

//位置二
$list2 = array();
$keyword = array('生活','美食','娱乐','购物','丽人','结婚','亲子','运动','酒店','汽车','工作','买房','教育','政务','新闻','财经','公司','医院');
foreach($keyword as $v){
    $sql = "SELECT * FROM " . tablename('uni_account') . " WHERE industry_parent = '".$v."' AND position LIKE '%2%' AND is_check=1 /*ORDER BY RAND()*/ LIMIT 9";
    $list2[] = pdo_fetchall($sql);
}

//位置三-left
$sql = "SELECT uniacid,name,industry_parent FROM " . tablename('uni_account') . " WHERE position <> '' AND is_check=1 /*ORDER BY RAND()*/  LIMIT 5";
$l_list3 = pdo_fetchall($sql);

//位置三-right
$sql = "SELECT uniacid,name,industry_parent FROM " . tablename('uni_account') . " WHERE position LIKE '%3%' AND is_check=1 /*ORDER BY RAND()*/ LIMIT 16";
$r_list3 = pdo_fetchall($sql);


//位置四-left
$sql = "SELECT uniacid,name,industry_parent FROM " . tablename('uni_account') . " WHERE position <> ''  AND is_check=1 /*ORDER BY RAND()*/ LIMIT 18";
$l_list4 = pdo_fetchall($sql);


//位置四-right
$sql = "SELECT uniacid,name,industry_parent FROM " . tablename('uni_account') . " WHERE position LIKE '%4%' AND is_check=1 /*ORDER BY RAND()*/ LIMIT 16";
$r_list4 = pdo_fetchall($sql);

/*******************以下是文章显示*****************************/
//公众号推广文章
$sql = "SELECT id,title,createtime FROM " . tablename('site_article') . " WHERE 1 = 1 AND pcate = 1 /*ORDER BY RAND()*/ LIMIT 9";
$a_article = pdo_fetchall($sql);

//公众号前景文章

$sql = "SELECT id,title,createtime FROM " . tablename('site_article') . " WHERE 1 = 1 AND pcate = 2 /*ORDER BY RAND()*/ LIMIT 9";
$b_article = pdo_fetchall($sql);

//网络文章分享
$sql = "SELECT id,title,createtime FROM " . tablename('site_article') . " WHERE 1 = 1 AND pcate <> 1 AND pcate <> 2 /*ORDER BY RAND()*/ LIMIT 9";
$c_article = pdo_fetchall($sql);

template('public/index');
