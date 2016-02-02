<?php
/**
 * [WeEngine System] Copyright (c) 2014 WE7.CC
 * WeEngine is NOT a free software, it under the license terms, visited http://www.we7.cc/ for more details.
 */
error_reporting(0);
define('IN_MOBILE', true);
require '../../framework/bootstrap.inc.php';
$_W['uniacid'] = $_POST['reqReserved'];

$setting = uni_setting($_W['uniacid'], array('payment'));
if(!is_array($setting['payment'])) {
	exit('没有设定支付参数.');
}
$payment = $setting['payment']['unionpay'];
require '__init.php';

if (!empty($_POST) && verify($_POST) && $_POST['respMsg'] == 'success') {
	$plid = substr($_POST['orderId'], 8);
	$sql = 'SELECT * FROM ' . tablename('core_paylog') . ' WHERE `plid`=:plid';
	$params = array();
	$params[':plid'] = $plid;
	$log = pdo_fetch($sql, $params);
	if(!empty($log) && $log['status'] == '0') {
		$log['tag'] = iunserializer($log['tag']);
		$log['tag']['queryId'] = $_POST['queryId'];

		$record = array();
		$record['status'] = '0';
		$record['tag'] = iserializer($log['tag']);
		pdo_update('core_paylog', $record, array('plid' => $log['plid']));

		$site = WeUtility::createModuleSite($log['module']);
		if(!is_error($site)) {
			$method = 'payResult';
			if (method_exists($site, $method)) {
				$ret = array();
				$ret['weid'] = $log['uniacid'];
				$ret['uniacid'] = $log['uniacid'];
				$ret['result'] = 'success';
				$ret['type'] = $log['type'];
				$ret['from'] = 'nofity';
				$ret['tid'] = $log['tid'];
				$ret['user'] = $log['openid'];
				$ret['fee'] = $log['fee'];
				$ret['tag'] = $log['tag'];
				$site->$method($ret);
				exit('success');
			}
		}
	}
}
exit('fail');
