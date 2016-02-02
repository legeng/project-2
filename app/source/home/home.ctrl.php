<?php
/**
 * [WeEngine System] Copyright (c) 2014 WE7.CC
 * WeEngine is NOT a free software, it under the license terms, visited http://www.we7.cc/ for more details.
 */
defined('IN_IA') or exit('Access Denied');
load()->model('app');
$multiid = intval($_GPC['t']);
$title = $_W['page']['title'] . '微站';
$navs = app_navs('home', $multiid);
$share_tmp = pdo_fetch('SELECT title,description,thumb FROM ' . tablename('cover_reply') . ' WHERE uniacid = :aid AND multiid = :id', array(':aid' => $_W['uniacid'], ':id' => $multiid));
$_share['imgUrl'] = tomedia($share_tmp['thumb']);
$_share['desc'] = $share_tmp['description'];
$_share['title'] = $share_tmp['title'];

template('home/home');