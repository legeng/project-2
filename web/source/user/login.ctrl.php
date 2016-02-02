<?php
/**
 * [WeEngine System] Copyright (c) 2014 WE7.CC
 * WeEngine is NOT a free software, it under the license terms, visited http://www.we7.cc/ for more details.
 */
defined('IN_IA') or exit('Access Denied');
define('IN_GW', true);
if(checksubmit()) {
        $code = intval(trim($_GPC['code']));
        $hash = md5($code.$_W['config']['setting']['authkey']);        
	if(empty($code)) {
		message('请输入验证码','../../web/'.url('user/login'));
	}
      
	if(!empty($code) && $hash != $_GPC['__code']) {
            message('你输入的验证码不正确','../../web/'.url('user/login'));
        }

	_login($_GPC['referer']);
}
cache_load('setting');
template('user/login');

function _login($forward = '') {
	global $_GPC, $_W;
	load()->model('user');
	$member = array();
	$username = trim($_GPC['username']);
	if(empty($username)) {
		message('请输入要登录的用户名');
	}
	$member['username'] = $username;
	$member['password'] = $_GPC['password'];
	if(empty($member['password'])) {
		message('请输入密码');
	}

	$record = user_single($member);
	if(!empty($record)) {
		if($record['status'] == 1) {
			message('您的账号正在审核或是已经被系统禁止，请联系网站管理员解决！');
		}
		$founders = explode(',', $_W['config']['setting']['founder']);
		$_W['isfounder'] = in_array($record['uid'], $founders);
		if ($_W['siteclose'] && !$_W['isfounder']) {
			$settings = setting_load('copyright');
			message('站点已关闭，关闭原因：' . $settings['copyright']['reason']);
		}
		$cookie = array();
		$cookie['uid'] = $record['uid'];
		$cookie['lastvisit'] = $record['lastvisit'];
		$cookie['lastip'] = $record['lastip'];
		$cookie['hash'] = md5($record['password'] . $record['salt']);
		$session = base64_encode(json_encode($cookie));
		isetcookie('__session', $session, !empty($_GPC['rember']) ? 7 * 86400 : 0);
		$status = array();
		$status['uid'] = $record['uid'];
		$status['lastvisit'] = TIMESTAMP;
		$status['lastip'] = CLIENT_IP;
		user_update($status);
		if(empty($forward)) {
			$forward = $_GPC['forward'];
		}
		if(empty($forward)) {
			$forward = './index.php?c=account&a=display';
		}
		message("欢迎回来，{$record['username']}。", $forward);
	} else {
		message('登录失败，请检查您输入的用户名和密码！');
	}
}
