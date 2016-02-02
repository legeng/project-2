<?php

defined('IN_IA') or exit('Access Denied');

load()->html('account');

$list = array();

//查询本月热门微信号，按浏览量排名取出18条
$sql = "SELECT * FROM " . tablename('uni_account') . " WHERE FROM_UNIXTIME(createtime,'%Y%m')=DATE_FORMAT(CURDATE( ),'%Y%m') AND is_check = 1 ORDER BY scan_count DESC LIMIT 18";
$list[] = pdo_fetchall($sql);

//查询本季度热门微信号,按浏览量排名取出18条
$sql = "SELECT * FROM " . tablename('uni_account') . " WHERE QUARTER(FROM_UNIXTIME(createtime,'%Y-%m-%d'))=QUARTER(NOW()) AND is_check =1 ORDER BY scan_count DESC LIMIT 18";
//查询上一季度
//$sql = "SELECT * FROM " . tablename('uni_account') . " WHERE QUARTER(FROM_UNIXTIME(createtime,'%Y-%m-%d'))=QUARTER(DATE_SUB(now(),interval 1 QUARTER)) ORDER BY scan_count  DESC LIMIT  18";
$list[] = pdo_fetchall($sql);

//查询本年度热门微信号,按浏览量排名取出18条
$sql = "SELECT * FROM " . tablename('uni_account') . " WHERE YEAR(FROM_UNIXTIME(createtime,'%Y-%m-%d'))=YEAR(NOW()) AND is_check = 1 ORDER BY scan_count DESC LIMIT 24";
$list[] = pdo_fetchall($sql);

$attachurl = 'http://'.$_SERVER['HTTP_HOST'].'/attachment/';
template('public/hot');
