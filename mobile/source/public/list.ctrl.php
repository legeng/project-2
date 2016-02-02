<?php
    
defined('IN_IA') or exit('Access Denied');

load()->html('account');

$list = array();
$keyword = array('生活','美食','娱乐','购物','丽人','结婚','亲子','运动','酒店','汽车','工作','房产','教育','政务','新闻','财经','公司','医院');
foreach($keyword as $v){
    $condition =" AND `industry_parent` = :industry_parent";
    $pars[':industry_parent'] = $v;
    $sql = "SELECT * FROM " . tablename('uni_account') . " WHERE 1 = 1{$condition} ORDER BY RAND() LIMIT 10";
    $list[] = pdo_fetchall($sql, $pars);
}
$attachurl = 'http://'.$_SERVER['HTTP_HOST'].'/attachment/';
template('public/list');
