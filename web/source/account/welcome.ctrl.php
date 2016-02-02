<?php
/**
 * [WeEngine System] Copyright (c) 2013 WE7.CC
 * $sn: pro/web/source/account/welcome.ctrl.php : v f2069dc830e0 : 2014/09/23 07:26:50 : yanghf $
 */
defined('IN_IA') or exit('Access Denied');
if (!empty($_W['uid'])) {
	header('Location: '.url('account/display'));
	exit;
}
$copyright = array();
$copyright['person'] = '李先生';
$copyright['qq'] = '3111319984';
$copyright['phone'] = '182-8625-0927';
$copyright['company'] = '北京微信生意通网络科技公司';
$copyright['address'] = '北京市朝阳区丰联广场';
$copyright['baidumap']['lng'] = 116.444737;
$copyright['baidumap']['lat'] = 39.929575;

template('account/welcome');
