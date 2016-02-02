<?php

defined('IN_IA') or exit('Access Denied');

load()->html('account');

if('tuoguan' == trim($_GPC['do'])){
    template('public/tuoguan');
}elseif('zhuce' == trim($_GPC['do'])){
    template('public/zhuce');
}else{
    template('public/about');
}
