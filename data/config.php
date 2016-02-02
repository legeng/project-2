<?php
defined('IN_IA') or exit('Access Denied');

$config = array();

$config['db']['host'] = '127.0.0.1';
$config['db']['username'] = 'root';
$config['db']['password'] = 'lg2015';
$config['db']['port'] = '3306';
$config['db']['database'] = 'weixinsyt';
$config['db']['charset'] = 'utf8';
$config['db']['pconnect'] = 0;
$config['db']['tablepre'] = 'ims_';

// --------------------------  CONFIG COOKIE  --------------------------- //
$config['cookie']['pre'] = '02cd_';
$config['cookie']['domain'] = '';
$config['cookie']['path'] = '/';

// --------------------------  CONFIG SETTING  --------------------------- //
$config['setting']['charset'] = 'utf-8';
$config['setting']['cache'] = 'mysql';
$config['setting']['timezone'] = 'Asia/Shanghai';
$config['setting']['memory_limit'] = '256M';
$config['setting']['filemode'] = 0644;
$config['setting']['authkey'] = 'ee71f9c4';
$config['setting']['founder'] = '1';
$config['setting']['development'] = 0;
$config['setting']['referrer'] = 0;

// --------------------------  CONFIG UPLOAD  --------------------------- //
$config['upload']['image']['extentions'] = array('gif', 'jpg', 'jpeg', 'png');
$config['upload']['image']['limit'] = 5000;
$config['upload']['attachdir'] = 'attachment';
$config['upload']['audio']['extentions'] = array('mp3');
$config['upload']['audio']['limit'] = 5000;

//----------------------------CONFIG SITE---------------------------------//
$config['siteinfo']['title'] = '微信公众号导航平台-好微信号上微信生意通';
$config['siteinfo']['keywords'] = '微信,微信号,微信群,微信公众账号,微信公众平台,微信平台推广,微信网页版,微信电脑版,微信开发,微信小游戏,微信编辑器';
$config['siteinfo']['description'] = '微信生意通（www.weixinsyt.com）是一个专注于分享品牌微信公众账号、微信群号、微信大全、微信营销方案、微信营销教程、微信营销技巧的导航网站，一直以来收集精彩有趣的微信账号，值得您关注。';
