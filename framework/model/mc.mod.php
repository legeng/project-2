<?php
/**
 * [WeEngine System] Copyright (c) 2014 WE7.CC
 * WeEngine is NOT a free software, it under the license terms, visited http://www.we7.cc/ for more details.
 */

function mc_check($data) {
	global $_W;
	if(!empty($data['email'])) {
		$email = trim($data['email']);
		if(!preg_match("/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/", $email)) {
			return error(-1, '邮箱格式不正确');
		}
		$isexist = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('mc_members') . ' WHERE uniacid = :uniacid AND email = :email AND uid != :uid', array(':uniacid' => $_W['uniacid'], ':email' => $email, ':uid' => $_W['member']['uid']));
		if($isexist >= 1) {
			return error(-1, '邮箱已被注册,请使用其他邮箱');
		}
	}
	if(!empty($data['mobile'])) {
		$mobile = trim($data['mobile']);
		if(!preg_match("/^\d{11}$/", $mobile)) {
			return error(-1, '手机号格式不正确');
		}
		$isexist = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('mc_members') . ' WHERE uniacid = :uniacid AND mobile = :mobile AND uid != :uid', array(':uniacid' => $_W['uniacid'], ':mobile' => $mobile, ':uid' => $_W['member']['uid']));
		if($isexist >= 1) {
			return error(-1, '手机号已被注册,请使用其他手机号');
		}
	}
	return true;
}


function mc_update($uid, $fields) {
	global $_W;
	if (empty($fields)) {
		return false;
	}
	
	$uid = mc_openid2uid($uid);
	
	$_W['weid'] && $fields['weid'] = $_W['weid'];
	$struct = array_keys(mc_fields());
	$struct[] = 'birthyear';
	$struct[] = 'birthmonth';
	$struct[] = 'birthday';
	$struct[] = 'resideprovince';
	$struct[] = 'residecity';
	$struct[] = 'residedist';
	$struct[] = 'groupid';
	
	if(isset($fields['birth'])) {
		$fields['birthyear'] = $fields['birth']['year'];
		$fields['birthmonth'] = $fields['birth']['month'];
		$fields['birthday'] = $fields['birth']['day'];
	}
	if(isset($fields['reside'])) {
		$fields['resideprovince'] = $fields['reside']['province'];
		$fields['residecity'] = $fields['reside']['city'];
		$fields['residedist'] = $fields['reside']['district'];
	}
	unset($fields['reside'], $fields['birth']);
	foreach ($fields as $field => $value) {
		if(!in_array($field, $struct)) {
			unset($fields[$field]);
		}
	}
	if(!empty($fields['avatar'])) {
		if(strexists($fields['avatar'], 'attachment/images/global/avatars/avatar_')) {
			$fields['avatar'] = str_replace($_W['attachurl'], '', $fields['avatar']);
		}
	}
	$isexists = pdo_fetchcolumn("SELECT uid FROM ".tablename('mc_members')." WHERE uid = :uid", array(':uid' => $uid));
	$condition = '';
	if(!empty($isexists)) {
		$condition = ' AND uid != ' . $uid;
	}
		if(!empty($fields['email'])) {
		$emailexists = pdo_fetchcolumn("SELECT email FROM ".tablename('mc_members')." WHERE uniacid = :uniacid AND email = :email " . $condition, array(':uniacid' => $_W['uniacid'], ':email' => trim($fields['email'])));
		if($emailexists) {
			unset($fields['email']);
		}
	} 
	if(!empty($fields['mobile'])) {
		$mobilexists = pdo_fetchcolumn("SELECT mobile FROM ".tablename('mc_members')." WHERE uniacid = :uniacid AND mobile = :mobile " . $condition, array(':uniacid' => $_W['uniacid'], ':mobile' => trim($fields['mobile'])));
		if($mobilexists) {
			unset($fields['mobile']);
		}
	}
	
	if (empty($isexists)) {
		$fields['uniacid'] = $_W['uniacid'];
		$fields['createtime'] = TIMESTAMP;
		pdo_insert('mc_members', $fields);
		return pdo_insertid();
	} else {
		$result = pdo_update('mc_members', $fields, array('uid' => $uid));
		return $result > 0;
	}
}


function mc_fetch($uid, $fields = array()) {
	global $_W;
	$uid = mc_openid2uid($uid);
	if (empty($uid)) {
		return array();
	}
	$struct = cache_load('usersfields');
	if (empty($fields)) {
		$select = '*';
	} else {
		foreach ($fields as $field) {
			if (!in_array($field, $struct)) {
				unset($fields[$field]);
			}
			if($field == 'birth') {
				$fields[] = 'birthyear';
				$fields[] = 'birthmonth';
				$fields[] = 'birthday';
			}
			if($field == 'reside') {
				$fields[] = 'resideprovince';
				$fields[] = 'residecity';
				$fields[] = 'residedist';
			}
		}
		unset($fields['birth'], $fields['reside']);
		$select = '`uid`, `'.implode('`,`', $fields).'`';
	}
	if (is_array($uid)) {
		$result = pdo_fetchall("SELECT $select FROM ".tablename('mc_members')." WHERE uid IN ('".implode("','", is_array($uid) ? $uid : array($uid))."')", array(), 'uid');
		foreach ($result as &$row) {
			if(isset($row['avatar']) && !empty($row['avatar'])){
				$row['avatar'] = tomedia($row['avatar']);
			}
		}
	} else {
		$result = pdo_fetch("SELECT $select FROM " . tablename('mc_members') . " WHERE `uid` = :uid", array(':uid' => $uid));
		if(isset($result['avatar']) && !empty($result['avatar'])){
			$result['avatar'] = tomedia($result['avatar']);
		}
	}
	return $result;
}


function mc_fansinfo($openid, $acid = 0){
	global $_W;
	
	if(empty($openid)){
		return array();
	}
	if(empty($acid) && !empty($_W['acid'])){
		$acid = $_W['acid'];
	}
	
	$sql = 'SELECT * FROM ' . tablename('mc_mapping_fans') . ' WHERE openid = :openid AND acid = :acid LIMIT 1';
	$params = array();
	$params[':openid'] = $openid;
	$params[':acid'] = $acid;
	$fan = pdo_fetch($sql, $params);
	if(!empty($fan)){
		if (!empty($fan['tag']) && is_string($fan['tag'])) {
			if (is_base64($fan['tag'])){
				$fan['tag'] = @base64_decode($fan['tag']);
			}
			if (is_serialized($fan['tag'])) {
				$fan['tag'] = @iunserializer($fan['tag']);
			}
			if(!empty($fan['tag']['headimgurl'])) {
				$fan['tag']['avatar'] = tomedia($fan['tag']['headimgurl']);
				unset($fan['tag']['headimgurl']);
			}
		}
		if(empty($fan['tag'])) {
			$fan['tag'] = array();
		}
	}
	
	return $fan;
}


function mc_require($uid, $fields, $pre = '') {
	global $_W, $_GPC;
	if(empty($fields) || !is_array($fields)) {
		return false;
	}
	$flipfields = array_flip($fields);
		if(in_array('birth', $fields) || in_array('birthyear', $fields) || in_array('birthmonth', $fields) || in_array('birthday', $fields)) {
		unset($flipfields['birthyear'], $flipfields['birthmonth'], $flipfields['birthday'], $flipfields['birth']);
		$flipfields['birthyear'] = 'birthyear';
		$flipfields['birthmonth'] = 'birthmonth';
		$flipfields['birthday'] = 'birthday';
	}
	if(in_array('reside', $fields) || in_array('resideprovince', $fields) || in_array('residecity', $fields) || in_array('residedist', $fields)) {
		unset($flipfields['residedist'], $flipfields['resideprovince'], $flipfields['residecity'], $flipfields['reside']);
		$flipfields['resideprovince'] = 'resideprovince';
		$flipfields['residecity'] = 'residecity';
		$flipfields['residedist'] = 'residedist';
	}
	$fields = array_keys($flipfields);
	if(!in_array('uniacid', $fields)) {
		$fields[] = 'uniacid';
	}
	if(!empty($pre)) {
		$pre .= '<br/>';
	}
	$profile = mc_fetch($uid, $fields);
	$uniacid = $profile['uniacid'];
	$titles = mc_fields();
	$message = '';
	$ks = array();
	foreach($profile as $k => $v) {
		if(empty($v)) {
			$ks[] = $k;
			$message .= $titles[$k] . ', ';
		}
	}
	if(!empty($message)) {
		$title = '完善资料';
		if (checksubmit('submit')) {
			if(in_array('resideprovince', $fields)) {
				$_GPC['resideprovince'] = $_GPC['reside']['province'];
				$_GPC['residecity'] = $_GPC['reside']['city'];
				$_GPC['residedist'] = $_GPC['reside']['district'];
			}
			if(in_array('birthyear', $fields)) {
				$_GPC['birthyear'] = $_GPC['birth']['year'];
				$_GPC['birthmonth'] = $_GPC['birth']['month'];
				$_GPC['birthday'] = $_GPC['birth']['day'];
			}
			$record = array_elements($fields, $_GPC);
			if(isset($record['uniacid'])){
				unset($record['uniacid']);
			}
			
			foreach ($record as $field => $value) {
				if($field == 'gender'){
					continue;
				}
				if(empty($value)) {
					message('请填写完整所有资料.', referer(), 'error');
				}
			}
			$condition = " AND uid != {$uid} ";
			if(in_array('email', $fields)) {
				$emailexists = pdo_fetchcolumn("SELECT email FROM ".tablename('mc_members')." WHERE uniacid = :uniacid AND email = :email " . $condition, array(':uniacid' => $_W['uniacid'], ':email' => trim($record['email'])));
				if(!empty($emailexists)) {
					message('抱歉，您填写的手机号已经被使用，请更新。', 'refresh', 'error');
				}
			}
			if(in_array('mobile', $fields)) {
				$mobilexists = pdo_fetchcolumn("SELECT mobile FROM ".tablename('mc_members')." WHERE uniacid = :uniacid AND mobile = :mobile " . $condition, array(':uniacid' => $_W['uniacid'], ':mobile' => trim($record['mobile'])));
				if(!empty($mobilexists)) {
					message('抱歉，您填写的手机号已经被使用，请更新。', 'refresh', 'error');
				}
			}
			mc_update($uid, $record);
			message('资料完善成功.', 'refresh');
		}
		load()->func('tpl');
		load()->model('activity');
		$filter = array();
		$filter['status'] = 1;
		$coupons = activity_coupon_owned($_W['member']['uid'], $filter);
		$tokens = activity_token_owned($_W['member']['uid'], $filter);
		
		$setting = uni_setting($_W['uniacid'], array('creditnames', 'creditbehaviors', 'uc'));
		$behavior = $setting['creditbehaviors'];
		$creditnames = $setting['creditnames'];
		$credits = mc_credit_fetch($_W['member']['uid'], '*');
		include template('mc/require', TEMPLATE_INCLUDEPATH);
		exit;
	}
	return $profile;
}


function mc_credit_update($uid, $credittype, $creditval = 0, $log = array()) {
	global $_W;
	$credittype = trim($credittype);
	$credittypes = mc_credit_types();
	if(!in_array($credittype, $credittypes)){
		return error('-1',"指定的用户积分类型 “{$credittype}”不存在.");
	}
	
	$creditval = floatval($creditval);
	if(empty($creditval)) {
		return true;
	}
	$value = pdo_fetchcolumn("SELECT $credittype FROM ".tablename('mc_members')." WHERE `uid` = :uid", array(':uid' => $uid));
	if($creditval > 0 || ($value + $creditval >= 0)) {
		pdo_update('mc_members',array($credittype => $value + $creditval), array('uid' => $uid));
	} else {
		return error('-1',"积分类型为“{$credittype}”的积分不够，无法操作。");
	}
		if(empty($log) || !is_array($log)) {
		$log = array($uid, '未记录');
	}
	$data = array(
		'uid' => $uid, 
		'credittype' => $credittype, 
		'uniacid' => $_W['uniacid'],
		'num' => $creditval,
		'createtime' => TIMESTAMP,
		'operator' => intval($log[0]),
		'remark' => $log[1],
	);
	pdo_insert('mc_credits_record', $data);

	return true;
}


function mc_credit_fetch($uid, $types = array()) {
	if(empty($types) || $types == '*') {
		$select = 'credit1,credit2,credit3,credit4,credit5';
	} else {
		$struct = mc_credit_types();
		foreach ($types as $key => $type) {
			if (!in_array($type, $struct)) {
				unset($types[$key]);
			}
		}
		$select = '`'.implode('`,`', $types).'`';
	}
	return pdo_fetch("SELECT {$select} FROM ".tablename('mc_members').' WHERE uid = :uid LIMIT 1',array(':uid' => $uid));
}


function mc_credit_types(){
	static $struct = array('credit1','credit2','credit3','credit4','credit5');
	return $struct;
}


function mc_groups($uniacid = 0) {
	global $_W;
	$uniacid = intval($uniacid);
	if(empty($uniacid)) {
		$uniacid = $_W['uniacid'];
	}
	$sql = "SELECT * FROM " . tablename('mc_groups') . ' WHERE `uniacid`=:uniacid ORDER BY `orderlist`';
	$groups = pdo_fetchall($sql, array(':uniacid' => $uniacid), 'groupid');
	return $groups;
}


function _mc_login($user) {
	global $_W;
	if(!empty($user) && !empty($user['uid'])) {
		$sql = 'SELECT `uid`,`mobile`,`email` FROM ' . tablename('mc_members') . ' WHERE `uid`=:uid AND `uniacid`=:uniacid';
		$user = pdo_fetch($sql, array(':uid' => $user['uid'], ':uniacid' => $_W['uniacid']));
		if(!empty($user) && (!empty($user['mobile']) || !empty($user['email']))) {
			$_SESSION['uid'] = $user['uid'];
			$_W['member'] = $user;
			if(empty($_W['openid'])) {
				$where = ' WHERE `uid`=:uid AND `uniacid`=:uniacid';
				$params = array(':uid' => $user['uid'], ':uniacid'=>$_W['uniacid']);
				if(!empty($_W['acid'])){
					$where .= ' AND acid=:acid';
					$params[':acid'] = $_W['acid'];
				}
				$sql = 'SELECT * FROM ' . tablename('mc_mapping_fans') . $where;
				$fan = pdo_fetch($sql, $params);
				if(!empty($fan)) {
					$_W['openid'] = $_SESSION['openid'] = $fan['openid'];
					if(empty($_W['acid'])){
						$_W['acid'] = $_SESSION['acid'] = $fan['acid'];
					}
				}
			} else {
				$where = ' WHERE `openid`=:openid AND uniacid=:uniacid';
				$params = array(':openid' => $_W['openid'], ':uniacid'=>$_W['uniacid']);
				if(!empty($_W['acid'])){
					$where .= ' AND acid=:acid';
					$params[':acid'] = $_W['acid'];
				}
				$sql = 'SELECT * FROM ' . tablename('mc_mapping_fans') . $where;
				$fan = pdo_fetch($sql, $params);
				if(empty($fan['uid']) && !empty($fan['acid'])) {
					$rec = array();
					$rec['uid'] = $user['uid'];
					$filter = array();
					$filter['uniacid'] = $fan['uniacid'];
					$filter['acid'] = $fan['acid'];
					$filter['openid'] = $fan['openid'];
					pdo_update('mc_mapping_fans', $rec, $filter);
					$fan['uid'] = $user['uid'];
					if(empty($_W['acid'])){
						$_W['acid'] = $_SESSION['acid'] = $fan['acid'];
					}
				}
			}
						$_W['fans']['from_user'] = $_W['openid'];
			isetcookie('logout', '', -60000);
			return true;
		}
	}
	return false;
}


function mc_fields() {
	return array(
		'mobile' => '手机号码',
		'email' => '电子邮箱',
		'realname' => '真实姓名',
		'nickname' => '昵称',
		'avatar' => '头像',
		'qq' => 'QQ号',
		'gender' => '性别',
		'birth' => '生日',
		'constellation' => '星座',
		'zodiac' => '生肖',
		'telephone' => '固定电话',
		'idcard' => '证件号码',
		'studentid' => '学号',
		'grade' => '班级',
		'address' => '地址',
		'zipcode' => '邮编',
		'nationality' => '国籍',
		'reside' => '居住地',
		'graduateschool' => '毕业学校',
		'company' => '公司',
		'education' => '学历',
		'occupation' => '职业',
		'position' => '职位',
		'revenue' => '年收入',
		'affectivestatus' => '情感状态',
		'lookingfor' => ' 交友目的',
		'bloodtype' => '血型',
		'height' => '身高',
		'weight' => '体重',
		'alipay' => '支付宝帐号',
		'msn' => 'MSN',
		'taobao' => '阿里旺旺',
		'site' => '主页',
		'bio' => '自我介绍',
		'interest' => '兴趣爱好'
	);
}

function mc_init_uc() {
	global $_W;
	$setting = uni_setting($_W['uniacid'], array('uc'));
	if(is_array($setting['uc']) && $setting['uc']['status'] == '1') {
		$uc = $setting['uc'];
		define('UC_CONNECT', $uc['connect'] == 'mysql' ? 'mysql' : '');

		define('UC_DBHOST', $uc['dbhost']);
		define('UC_DBUSER', $uc['dbuser']);
		define('UC_DBPW', $uc['dbpw']);
		define('UC_DBNAME', $uc['dbname']);
		define('UC_DBCHARSET', $uc['dbcharset']);
		define('UC_DBTABLEPRE', $uc['dbtablepre']);
		define('UC_DBCONNECT', $uc['dbconnect']);

		define('UC_CHARSET', $uc['charset']);
		define('UC_KEY', $uc['key']);
		define('UC_API', $uc['api']);
		define('UC_APPID', $uc['appid']);
		define('UC_IP', $uc['ip']);

		require IA_ROOT . '/framework/library/uc/client.php';
		return true;
	}
	return false;
}


function mc_handsel($touid, $fromuid, $handsel, $uniacid = '') {
	global $_W;
	$touid = intval($touid);
	$fromuid = intval($fromuid);
	if(empty($uniacid)) {
		$uniacid = $_W['uniacid'];
	}
	$touid_exist = mc_fetch($touid, array('uniacid'));
	if(empty($touid_exist)) {
		return error(-1, '赠送积分用户不存在');
	}

	if(empty($handsel['module'])) {
		return error(-1, '没有填写模块名称');
	}
	if(empty($handsel['sign'])) {
		return error(-1, '没有填写赠送积分对象信息');
	}
	if(empty($handsel['action'])) {
		return error(-1, '没有填写赠送积分动作');
	}
	$credit_value = intval($handsel['credit_value']);

	$sql = 'SELECT id FROM ' . tablename('mc_handsel') . ' WHERE uniacid = :uniacid AND touid = :touid AND fromuid = :fromuid AND module = :module AND sign = :sign AND action = :action';
	$parm = array(':uniacid' => $uniacid, ':touid' => $touid, ':fromuid' => $fromuid, ':module' => $handsel['module'], ':sign' => $handsel['sign'], ':action' => $handsel['action']);
	$handsel_exists = pdo_fetch($sql, $parm);
	if(!empty($handsel_exists)) {
		return error(-1, '已经赠送过积分,每个用户只能赠送一次');
	}
	
	$creditbehaviors = pdo_fetchcolumn('SELECT creditbehaviors FROM ' . tablename('uni_settings') . ' WHERE uniacid = :uniacid', array(':uniacid' => $uniacid));
	$creditbehaviors = iunserializer($creditbehaviors) ? iunserializer($creditbehaviors) : array();
	if(empty($creditbehaviors['activity'])) {
		return error(-1, '公众号没有配置积分行为参数');
	} else {
		$credittype = $creditbehaviors['activity'];
	}
	
	$data = array(
		'uniacid' => $uniacid,
		'touid' => $touid,
		'fromuid' => $fromuid,
		'module' => $handsel['module'],
		'sign' => $handsel['sign'],
		'action' => $handsel['action'],
		'credit_value' => $credit_value,
		'createtime' => TIMESTAMP
	);
	pdo_insert('mc_handsel', $data);
	$log = array($fromuid, $handsel['credit_log']);
	mc_credit_update($touid, $credittype, $credit_value, $log);
	return true;
}

function mc_openid2uid($openid) {
	global $_W;
	if (is_numeric($openid)) {
		return $openid;
	}
	if (is_string($openid)) {
		$sql = 'SELECT uid FROM ' . tablename('mc_mapping_fans') . ' WHERE `uniacid`=:uniacid AND `openid`=:openid';
		$pars = array();
		$pars[':uniacid'] = $_W['uniacid'];
		$pars[':openid'] = $openid;
		$uid = pdo_fetchcolumn($sql, $pars);
		return $uid;
	}
	if(is_array($openid)) {
		$uids = array();
		foreach ($openid as $k => $v) {
			if (is_numeric($v)) {
				$uids[] = $v;
			} elseif (is_string($v)) {
				$fans[] = $v;
			}
		}
		if (!empty($fans)) {
			$sql = 'SELECT uid, openid FROM ' . tablename('mc_mapping_fans') . " WHERE `uniacid`=:uniacid AND `openid` IN ('".implode("','", $fans)."')";
			$pars = array(':uniacid' => $_W['uniacid']);
			$fans = pdo_fetchall($sql, $pars, 'uid');
			$fans = array_keys($fans);
			$uids = array_merge((array)$uids, $fans);
		}
		return $uids;
	}
	return false;
}

function mc_oauth_userinfo($acid = 0) {
	global $_W;
	
	if(empty($_W['openid'])){
		return error(-1, '未指定 openid, 无法获取用户信息.');
	}
	
	if(intval($_W['account']['level']) < 4){
		$setting = uni_setting($_W['uniacid']);
		$oauth = $setting['oauth'];
		if (!empty($oauth) && !empty($oauth['account'])) {
			$account = account_fetch($oauth['account']);
		}
	} else {
		$account = $_W['account'];
	}
	
	if(empty($account)){
		return error(-2, '未指定网页授权公众号, 无法获取用户信息.');
	}
	if(empty($account['key']) || empty($account['secret'])){
		return error(-3, '公众号未设置 appId 或 secret.');
	}
	if(intval($account['level']) < 4){
		return error(-4, '公众号非认证服务号, 无法获取用户信息.');
	}
	
	$state = 'we7sid-'.$_W['session_id'];
	$_SESSION['dest_url'] = base64_encode($_SERVER['QUERY_STRING']);
	
	$url = $_W['siteroot'] . "app/index.php?c=auth&a=oauth&scope=userinfo&i={$_W['uniacid']}&j={$_W['acid']}";
	$callback = urlencode($url);
	
	$forward = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$account['key'].'&redirect_uri='.$callback.'&response_type=code&scope=snsapi_userinfo&state='.$state.'#wechat_redirect';
	header('Location: '.$forward);
	exit;
}
