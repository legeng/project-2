<?php
/**
 * [WeEngine System] Copyright (c) 2014 WE7.CC
 * WeEngine is NOT a free software, it under the license terms, visited http://www.we7.cc/ for more details.
 */
defined('IN_IA') or exit('Access Denied');
load()->model('mc');

if (!isset($_GPC['i'])) {
	header('location: ../html/index.php');
	exit;
}

$_W['uniacid'] = intval($_GPC['i']);
if(empty($_W['uniacid'])) {
	$_W['uniacid'] = intval($_GPC['weid']);
}
$_W['uniaccount'] = $_W['account'] = uni_fetch($_W['uniacid']);

if(empty($_W['uniaccount'])) {
	exit('error mobile site: uniaccount not exists');
}

if(empty($_W['acid'])){
	$_W['acid'] = intval($_GPC['j']);
}

$multiid = intval($_GPC['t']);
if(empty($multiid)) {
		$setting = uni_setting();
	$multiid = intval($setting['default_site']);
	unset($setting);
}

$multi = pdo_fetch("SELECT * FROM ".tablename('site_multi')." WHERE id=:id AND uniacid=:uniacid", array(':id' => $multiid, ':uniacid' => $_W['uniacid']));
if(empty($multi)) {
	exit('没有找到指定微站.');
}
$multi['site_info'] = @iunserializer($multi['site_info']);
$multi['quickmenu'] = @iunserializer($multi['quickmenu']);

$styleid = !empty($_GPC['s']) ? intval($_GPC['s']) : intval($multi['styleid']);
$style = pdo_fetch("SELECT * FROM ".tablename('site_styles')." WHERE id = :id AND uniacid=:uniacid", array(':id' => $styleid, ':uniacid' => $_W['uniacid']));
if (empty($style)) {
	exit('没有找到指定微站风格.');
}

$templates = uni_templates();
$templateid = intval($style['templateid']);
$template = $templates[$templateid];

$_W['template'] = !empty($template) ? $template['name'] : 'default';
$_W['styles'] = array();

if(!empty($template)) {
	$sql = "SELECT `variable`, `content` FROM " . tablename('site_styles_vars') . " WHERE `uniacid`=:uniacid AND `styleid`=:styleid";
	$pars = array();
	$pars[':uniacid'] = $_W['uniacid'];
	$pars[':styleid'] = $styleid;
	$stylevars = pdo_fetchall($sql, $pars);
	if(!empty($stylevars)) {
		foreach($stylevars as $row) {
			if (strexists($row['variable'], 'img')) {
				$row['content'] = tomedia($row['content']);
			}
			$_W['styles'][$row['variable']] = $row['content'];
		}
	}
	unset($stylevars, $row, $sql, $pars);
}

$_W['page'] = array();
$_W['page']['title'] = $multi['title'];
if(is_array($multi['site_info'])) {
	$_W['page'] = array_merge($_W['page'], $multi['site_info']);
}
unset($multi, $styleid, $style, $templateid, $template, $templates);

if (stripos($agent, 'iphone') !== false) {
	return self::BROWSER_TYPE_IPHONE;
}

$_W['os'] = 'browser';
if(strexists(strtolower($_SERVER['HTTP_USER_AGENT']), 'iphone')) {
	$_W['os'] = 'iphone';
} elseif(strexists(strtolower($_SERVER['HTTP_USER_AGENT']), 'android')) {
	$_W['os'] = 'android';
}

$_W['container'] = 'browser';
if(strexists(strtolower($_SERVER['HTTP_USER_AGENT']), 'micromessenger')) {
	$_W['container'] = 'wechat';
} elseif(strexists(strtolower($_SERVER['HTTP_USER_AGENT']), 'yixin')) {
	$_W['container'] = 'yixin';
} elseif(!strexists(strtolower($_SERVER['HTTP_USER_AGENT']), 'mobile')) {
	$_W['container'] = 'web';
}

$_W['session_id'] = '';
if (isset($_GPC['state']) && !empty($_GPC['state']) && strexists($_GPC['state'], 'we7sid-')) {
	$pieces = explode('-', $_GPC['state']);
	$_W['session_id'] = $pieces[1];
	unset($pieces);
}
if (empty($_W['session_id'])) {
	$_W['session_id'] = $_COOKIE[session_name()];
}
if (empty($_W['session_id'])) {
	$_W['session_id'] = "{$_W['uniacid']}-" . random(20) ;
	$_W['session_id'] = md5($_W['session_id']);
}
session_id($_W['session_id']);

load()->classs('wesession');
WeSession::start($_W['uniacid'], 'APP');

if(empty($_W['acid']) && !empty($_SESSION['acid'])) {
	$sql = 'SELECT * FROM ' . tablename('account') . ' WHERE `uniacid`=:uniacid AND `acid`=:acid';
	$pars = array();
	$pars[':uniacid'] = $_W['uniacid'];
	$pars[':acid'] = $_SESSION['acid'];
	if(pdo_fetch($sql, $pars)) {
		$_W['acid'] = $_SESSION['acid'];
	}
}

if(!empty($_SESSION['openid'])) {
	$_W['openid'] = $_SESSION['openid'];
	
	$where = ' WHERE `uniacid`=:uniacid AND `openid`=:openid ';
	$pars = array();
	$pars[':uniacid'] = $_W['uniacid'];
	$pars[':openid'] = $_W['openid'];
	if(!empty($_W['acid'])){
		$where .= ' AND `acid`=:acid ';
		$pars[':acid'] = $_W['acid'];
	}
	$sql = 'SELECT * FROM ' . tablename('mc_mapping_fans') . " {$where} LIMIT 1";
	$mapping = pdo_fetch($sql, $pars);
	if(!empty($mapping)) {
		if(empty($_W['acid'])){
			$_W['acid'] = $mapping['acid'];
		}
		if (!empty($mapping['uid'])) {
			_mc_login(array('uid' => $mapping['uid']));
		} else {
			$_SESSION['uid'] = '0';
		}
	}
	unset($mapping, $where, $sql, $pars);
}
if(!empty($_SESSION['uid'])) {
	_mc_login(array('uid' => $_SESSION['uid']));
}

if(!$_GPC['logout'] && empty($_W['openid']) && ($controller != 'auth' || ($controller == 'auth' && !in_array($action, array('forward', 'oauth'))))) {
	$setting = uni_setting($_W['uniacid'], array('oauth'));
	$oauth = $setting['oauth'];
	if(!empty($oauth) && !empty($oauth['status']) && !empty($oauth['account'])) {
		$account = account_fetch($oauth['account']);
		if( intval($account['level']) == 4 && $_W['container'] == 'wechat') { 			
			$state = 'we7sid-'.$_W['session_id'];
			$_SESSION['dest_url'] = base64_encode($_SERVER['QUERY_STRING']);
			
			$url = $_W['siteroot'] . 'app/index.php?c=auth&a=oauth&scope=snsapi_base&i=' . $_W['uniacid'];
			if(!empty($_W['acid'])){
				$url .= "&j={$_W['acid']}";
			}
			$callback = urlencode($url);
			
			$forward = "https://open.weixin.qq.com/connect/oauth2/authorize?appid={$account['key']}&redirect_uri={$callback}&response_type=code&scope=snsapi_base&state={$state}#wechat_redirect";
			header('location: ' . $forward);
			exit();
		}
	}
}

if(!empty($_W['acid'])){
	$_W['gh'] = account_fetch($_W['acid']);
	
	$jsauth_acc = $_W['gh'];
	$jsauth_acid = $jsauth_acc['acid'];
	
	$_W['gh']['qrcode'] = "{$_W['attachurl']}qrcode_{$_W['acid']}.jpg?time={$_W['timestamp']}";
	$_W['gh']['avatar'] = "{$_W['attachurl']}headimg_{$_W['acid']}.jpg?time={$_W['timestamp']}";
	$_W['gh']['childname'] = $_W['gh']['name'];
	unset($_W['gh']['name']);
	$_W['account'] = array_merge($_W['account'], $_W['gh']);
	unset($_W['gh']);
} else {
	$sql = 'SELECT * FROM '.tablename('account_wechats'). ' WHERE uniacid=:uniacid ORDER BY `level` DESC LIMIT 1';
	$jsauth_acc = pdo_fetch($sql, array(':uniacid' => $_W['uniacid']));
	$jsauth_acid = $jsauth_acc['acid'];
}

if ($jsauth_acc['level'] < 3) {
	load()->model('account');
	$unisetting = uni_setting();
	$acid = intval($unisetting['jsauth_acid']);
	if(!empty($acid)){
		$account = account_fetch($jsauth_acid);
	}
	if(!empty($account)){
		$jsauth_acid = $acid;
		$jsauth_acc = $account;
	}
}

if(!empty($jsauth_acid)){
	load()->classs('weixin.account');
	$accObj = WeiXinAccount::create($jsauth_acid);
	$_W['account']['jssdkconfig'] = $accObj->getJssdkConfig();
	unset($accObj);
}

unset($jsauth_acid, $jsauth_acc, $acid, $unisetting, $account, $sql, $pars, $where);

load()->func('compat.biz');
