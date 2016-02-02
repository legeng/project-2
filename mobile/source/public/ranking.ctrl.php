<?php

/*******************以下是公众号显示*****************************/
defined('IN_IA') or exit('Access Denied');

//获取最新收录20条
$sql = "SELECT * FROM " . tablename('uni_account') . " WHERE `uniacid` <> 1 ORDER BY `uniacid` DESC LIMIT 20";
$account1 = pdo_fetchall($sql);

//获取浏览量排行20条
$sql = "SELECT * FROM " . tablename('uni_account') . " WHERE `uniacid` <> 1 ORDER BY `scan_count` DESC LIMIT 20";
$account2 = pdo_fetchall($sql);
//获取综合排名20条
$sql = "SELECT * FROM " . tablename('uni_account') . " WHERE `uniacid` <> 1 ORDER BY `scan_count` DESC ,uniacid DESC LIMIT 20";
$account3 = pdo_fetchall($sql);

template('public/paihang');
