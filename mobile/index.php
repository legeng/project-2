<?php
/**
 * [WeEngine System] Copyright (c) 2014 WE7.CC
 * WeEngine is NOT a free software, it under the license terms, visited http://www.we7.cc/ for more details.
 */
//define('IN_MOBILE', true);
require '../framework/bootstrap.inc.php';
load()->mobile('common');
load()->mobile('template');
//load()->model('app');
//require IA_ROOT . '/html/common/bootstrap.app.inc.php';
//
//所有控制器的默认值
$acl = array(
	'public' => array(
		'default' => 'index',
	)
);

/*$settings = setting_load('copyright');
if ($settings['copyright']['status'] == 1) {
	$_W['siteclose'] = true;
	message('抱歉，站点已关闭，关闭原因：' . $settings['copyright']['reason']);
}*/

$controllers = array();
$handle = opendir(IA_ROOT . '/mobile/source/');
if(!empty($handle)) {
	while($dir = readdir($handle)) {
		if($dir != '.' && $dir != '..') {
			$controllers[] = $dir;
		}
	}
}
if(!in_array($controller, $controllers)) {
	$controller = 'public';
}
$init = IA_ROOT . "/mobile/source/{$controller}/__init.php";
if(is_file($init)) {
	require $init;;
}

$actions = array();
$handle = opendir(IA_ROOT . '/mobile/source/' . $controller);
if(!empty($handle)) {
	while($dir = readdir($handle)) {
		if($dir != '.' && $dir != '..' && strexists($dir, '.ctrl.php')) {
			$dir = str_replace('.ctrl.php', '', $dir);
			$actions[] = $dir;
		}
	}
}

if(empty($actions)) {
	header('location: index.php?c=public?refresh');
        exit;
}
if(!in_array($action, $actions)) {
	$action = $acl[$controller]['default'];
}
if(!in_array($action, $actions)) {
	$action = $actions[0];
}

//init_quickmenus($multiid);
$_W['attachurl'] = str_replace('mobile/','',$_W['attachurl']);
require _forward($controller, $action);

function _forward($c, $a) {
	$file = IA_ROOT . '/mobile/source/' . $c . '/' . $a . '.ctrl.php';
	return $file;
}
