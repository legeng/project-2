<?php
/**
 * [WeEngine System] Copyright (c) 2014 WE7.CC
 * WeEngine is NOT a free software, it under the license terms, visited http://www.we7.cc/ for more details.
 */
defined('IN_IA') or exit('Access Denied');
load()->func('tpl');
$dos = array('basic', 'list', 'high');
$do = in_array($do, $dos) ? $do : 'basic';

$id = $uniacid = intval($_GPC['uniacid']);
if(!empty($id)) {
	$state = uni_permission($_W['uid'], $id);
	if($state != 'founder' && $state != 'manager') {
		message('没有该公众号操作权限！');
	}
} else {
	if(empty($_W['isfounder']) && is_error($permission = uni_create_permission($_W['uid'], 1))) {
		message($permission['message'], '' , 'error');
	}
}

if (empty($_W['isfounder'])) {
	$group = pdo_fetch("SELECT * FROM ".tablename('users_group')." WHERE id = '{$_W['user']['groupid']}'");
	$group['package'] = uni_groups((array)iunserializer($group['package']));
} else {
	$group['package'] = uni_groups();
}
$allow_group = array_keys($group['package']);
$allow_group[] = 0;
if(!empty($_W['isfounder'])) {
	$allow_group[] = -1;
}


if($do == 'basic') {
	$_W['page']['title'] = '公众号基本信息 - 编辑主公众号';
	if(empty($id)) {

	} elseif (checksubmit('submit')) {
		$groupid = intval($_GPC['groupid']);
		if(!in_array($groupid, $allow_group)) {
			message('您所在的用户组没有使用该服务套餐的权限');
		}
		load()->model('module');
		$uniaccount = array(
				'name' => $_GPC['name'],
				'groupid' => intval($_GPC['groupid']),
				'description' => trim($_GPC['description']),
				'province' => $_GPC['dis']['province'],
				'city' => $_GPC['dis']['city'],
				'district' => $_GPC['dis']['district'],
				'industry_parent' => $_GPC['industry']['parent'],
				'industry_child' => $_GPC['industry']['child'],
				'wxrenzheng' => trim($_GPC['wxrenzheng']),
				'scan_count' => intval($_GPC['scan_count']),
                                'position'=>trim($_GPC['position'],','),
                                'siteurl' => trim($_GPC['siteurl']),
                                'tweibo' => trim($_GPC['tweibo']),
                                'sweibo' => trim($_GPC['sweibo']),
                                'title' => trim($_GPC['title']),
                                'content' => htmlspecialchars_decode($_GPC['content'])
		);

		if (!empty($_GPC['thumb'])) {
			$uniaccount['thumb'] = $_GPC['thumb'];
		} elseif (!empty($_GPC['autolitpic'])) {
			$match = array();
			preg_match('/attachment\/(.*?)(\.gif|\.jpg|\.png|\.bmp)/', $_GPC['content'], $match);
			if (!empty($match[1])) {
				$uniaccount['thumb'] = $match[1].$match[2];
			}
		}

		if($_GPC['isexpire'] == '1') {
			strtotime($_GPC['endtime']) > TIMESTAMP ? '' : message('服务套餐过期时间必须大于当前时间', '', 'error');
			$updatedata['groupdata'] = iserializer(array('isexpire' => 1, 'oldgroupid' => intval($_GPC['groupidhide']), 'endtime' => strtotime($_GPC['endtime'])));
                        $uniaccount['endtime'] = strtotime($_GPC['endtime']);
		} else {
			$updatedata['groupdata'] = iserializer(array('isexpire' => 0, 'oldgroupid' => intval($_GPC['groupidhide']), 'endtime' => TIMESTAMP));
                        $uniaccount['endtime'] = 0;
		}

		if($_W['isfounder']) {
			$notify['sms']['balance'] = intval($_GPC['balance']);
			$notify['sms']['signature'] = trim($_GPC['signature']);
			$notify = iserializer($notify);
			$updatedata['notify'] = $notify;
		}
		pdo_update('uni_settings', $updatedata , array('uniacid' => $id));
		pdo_update('uni_account', $uniaccount, array('uniacid' => $id));
		module_build_privileges();
		message('更新公众号成功！', referer(), 'success');
	}

	$account = array();
	if (!empty($id)) {
		$account = pdo_fetch("SELECT * FROM ".tablename('uni_account')." WHERE uniacid = :id", array(':id' => $id));
		$settings = uni_setting($id, array('notify', 'groupdata'));
		$groupdata = $settings['groupdata'] ? $settings['groupdata'] : array('isexpire' => 0, 'oldgroupid' => '' ,'endtime' => TIMESTAMP);
		$notify = $settings['notify'] ? $settings['notify'] : array();
	} else {
		$groupdata = array('isexpire' => 0, 'oldgroupid' => '' ,'endtime' => TIMESTAMP);
	}
	$group = array();
	if (empty($_W['isfounder'])) {
		$group = pdo_fetch("SELECT * FROM ".tablename('users_group')." WHERE id = '{$_W['user']['groupid']}'");
		$group['package'] = uni_groups((array)iunserializer($group['package']));
	} else {
		$group['package'] = uni_groups();
	}
	template('account/post');
}

if ($do == 'list') {
	$_W['page']['title'] = '子公众号列表 - 编辑主公众号';
	$accounts = uni_accounts($uniacid);
	$types = account_types();
	template('account/list');
}
