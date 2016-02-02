<?php
/**
 * [WeEngine System] Copyright (c) 2014 WE7.CC
 * WeEngine is NOT a free software, it under the license terms, visited http://www.we7.cc/ for more details.
 */
defined('IN_IA') or exit('Access Denied');
load()->func('communication');
$setting = uni_setting($_W['uniacid'], array('oauth', 'passport'));
$oauth = $setting['oauth'];
$scope = $_GPC['scope'];
if(!empty($oauth['account'])) {
	$account = account_fetch($oauth['account']);
	$code = $_GPC['code'];
	if(!empty($code)) {
		$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$account['key']}&secret={$account['secret']}&code={$code}&grant_type=authorization_code";
		$ret = ihttp_get($url);
		if(!is_error($ret)) {
			$auth = @json_decode($ret['content'], true);
			if(is_array($auth) && !empty($auth['openid'])) {
				$_SESSION['openid'] = $auth['openid'];
				$sql = 'SELECT `fanid`,`salt`,`uid` FROM ' . tablename('mc_mapping_fans') . ' WHERE `uniacid`=:uniacid AND `acid`=:acid AND `openid`=:openid';
				$pars = array();
				$pars[':uniacid'] = $_W['uniacid'];
				$pars[':acid'] = $_W['acid'] ? $_W['acid'] : $account['acid'];
				$pars[':openid'] = $auth['openid'];
				$fan = pdo_fetch($sql, $pars);
				if(empty($fan)) {
					$uid = 0;
					if (!isset($setting['passport']) || empty($setting['passport']['focusreg'])) {
						$default_groupid = pdo_fetchcolumn('SELECT groupid FROM ' .tablename('mc_groups') . ' WHERE uniacid = :uniacid AND isdefault = 1', array(':uniacid' => $_W['uniacid']));
						$data = array(
							'uniacid' => $_W['uniacid'],
							'email' => md5($auth['openid']).'@we7.cc',
							'salt' => random(8),
							'groupid' => $default_groupid,
							'createtime' => TIMESTAMP,
						);
						$data['password'] = md5($auth['openid'] . $data['salt'] . $_W['config']['setting']['authkey']);
						pdo_insert('mc_members', $data);
						$uid = pdo_insertid();
					}
					$fan = array();
					$fan['acid'] = $_W['acid'] ? $_W['acid'] : $account['acid'];
					$fan['uniacid'] = $_W['uniacid'];
					$fan['uid'] = $uid;
					$fan['openid'] = $auth['openid'];
					$fan['salt'] = random(8);
					$fan['follow'] = 0;
					$fan['followtime'] = 0;
					pdo_insert('mc_mapping_fans', $fan);
				}
				if ($scope == 'userinfo') {
					$url = "https://api.weixin.qq.com/sns/userinfo?access_token={$auth['access_token']}&openid={$auth['openid']}&lang=zh_CN";
					$response = ihttp_get($url);
					if (!is_error($response)) {
						$userinfo = json_decode($response['content'], true);
						$userinfo['nickname'] = stripcslashes($userinfo['nickname']);
						
						$record['updatetime'] = TIMESTAMP;
						$record['nickname'] = stripslashes($userinfo['nickname']);
						$record['tag'] = base64_encode(iserializer($userinfo));
						pdo_update('mc_mapping_fans', $record, array('openid' => $auth['openid']));
						
						if(!empty($fan['uid'])) {
							$user = mc_fetch($fan['uid'], array('nickname', 'gender', 'residecity', 'resideprovince', 'nationality', 'avatar'));
							$rec = array();
							if(empty($user['nickname']) && !empty($userinfo['nickname'])) {
								$rec['nickname'] = stripslashes($userinfo['nickname']);
							}
							if(empty($user['gender']) && !empty($userinfo['sex'])) {
								$rec['gender'] = $userinfo['sex'];
							}
							if(empty($user['residecity']) && !empty($userinfo['city'])) {
								$rec['residecity'] = $userinfo['city'] . '市';
							}
							if(empty($user['resideprovince']) && !empty($userinfo['province'])) {
								$rec['resideprovince'] = $userinfo['province'] . '省';
							}
							if(empty($user['nationality']) && !empty($userinfo['country'])) {
								$rec['nationality'] = $userinfo['country'];
							}
							if(empty($user['avatar']) && !empty($userinfo['headimgurl'])) {
								$rec['avatar'] = rtrim($userinfo['headimgurl'], '0') . 132;
							}
							if(!empty($rec)) {
								pdo_update('mc_members', $rec, array('uid' => $user['uid']));
							}
						}
					}
				}
				$forward = base64_decode($_SESSION['dest_url']);
				unset($_SESSION['dest_url']);
				header('Location: ' . $_W['siteroot'] . 'app/index.php?' . $forward . '&wxref=mp.weixin.qq.com#wechat_redirect');
				exit;
			}
		}
		message('微信授权失败错误信息为: ' . $ret['message']);
	}
}
exit('访问错误');
