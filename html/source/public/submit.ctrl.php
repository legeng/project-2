<?php
    
defined('IN_IA') or exit('Access Denied');
load()->func('tpl');
load()->func('file');

//先验证微信公众账号是否存在
if('ajax' == trim($_GPC['do'])){
    $unidata = pdo_fetch('SELECT account FROM ' . tablename('account_wechats') . ' WHERE account = :account', array(':account' => trim($_GPC['account'])));
    if($unidata){
        echo '1';
    }else{
        echo '0';
    }
}


if(trim($_GPC['token']) == md5('lg'.$_W['token'].$_GPC['times'])){
        
    $unidata = pdo_fetch('SELECT * FROM ' . tablename('account_wechats') . ' WHERE account = :account', array(':account' => trim($_GPC['account'])));
    
    if($_GPC['account'] && $_GPC['name'] && !$unidata) {
        $name = trim($_GPC['name']);
        $description = trim($_GPC['description']);
        $province = $_GPC['dis']['province'];
        $city = $_GPC['dis']['city'];
        $district = $_GPC['dis']['district'];
        $industry_parent = $_GPC['industry']['parent'];
        $industry_child = $_GPC['industry']['child'];
        $wxrenzheng = trim($_GPC['wxrenzheng']);
        $data = array(
            'name' => $name,
            'description' => $description,
            'province' => $province,
            'city' => $city,
            'district' => $district,
            'industry_parent' => $industry_parent,
            'industry_child' => $industry_child,
            'wxrenzheng' => $wxrenzheng,
            //'is_check'=>1,
            //'position'=>1,
            'createtime' => TIMESTAMP,
            'groupid' => 0
        );
        $state = pdo_insert('uni_account', $data);
        $uniacid = pdo_insertid();
        $template = pdo_fetch('SELECT id,title FROM ' . tablename('site_templates') . " WHERE name = 'default'");
        $styles['uniacid'] = $uniacid;
        $styles['templateid'] = $template['id'];
        $styles['name'] = $template['title'] . '_' . random(4);
        pdo_insert('site_styles', $styles);
        $styleid = pdo_insertid();
        $multi['uniacid'] = $uniacid;
        $multi['title'] = $data['name'];
        $multi['quickmenu'] = iserializer(array('template' => 'default', 'enablemodule' => array()));
        $multi['styleid'] = $styleid;
        pdo_insert('site_multi', $multi);
        $multi_id = pdo_insertid();

        $unisettings['creditnames'] = array('credit1' => array('title' => '积分', 'enabled' => 1), 'credit2' => array('title' => '余额', 'enabled' => 1));
        $unisettings['creditnames'] = iserializer($unisettings['creditnames']);
        $unisettings['creditbehaviors'] = array('activity' => 'credit1', 'currency' => 'credit2');
        $unisettings['creditbehaviors'] = iserializer($unisettings['creditbehaviors']);
        $unisettings['uniacid'] = $uniacid;
        $unisettings['default_site'] = $multi_id; 			
        $unisettings['sync'] = iserializer(array('switch' => 0, 'acid' => ''));
        pdo_insert('uni_settings', $unisettings);

        pdo_insert('mc_groups', array('uniacid' => $uniacid, 'title' => '默认会员组', 'isdefault' => 1));
        $account_users = array('uniacid' => $uniacid, 'uid' => 1, 'role' => 'manager');
        pdo_insert('uni_account_users', $account_users);
        load()->model('module');
        module_build_privileges();

        $insert['account'] = trim($_GPC['account']);
        $insert['name'] = trim($_GPC['name']);
        $insert['level'] = 1;
        $insert['type'] = 1;
        if(empty($account)) {
            $acid = account_create($uniacid, $insert);

            if (!empty($_FILES['qrcode']['tmp_name'])) {
                $_W['uploadsetting'] = array();
                $_W['uploadsetting']['image']['folder'] = $acid;//file be save in attachment/$acid
                $_W['uploadsetting']['image']['extentions'] = array('jpg', 'jpeg', 'png');
                $_W['uploadsetting']['image']['limit'] = $_W['config']['upload']['image']['limit'];
                $upload = file_upload($_FILES['qrcode'], 'image', "qrcode_{$acid}");
            }
            if (!empty($_FILES['headimg']['tmp_name'])) {
                $_W['uploadsetting'] = array();
                $_W['uploadsetting']['image']['folder'] = $acid;//file be save in attachment/$acid
                $_W['uploadsetting']['image']['extentions'] = array('jpg', 'jpeg', 'png');
                $_W['uploadsetting']['image']['limit'] = $_W['config']['upload']['image']['limit'];
                $upload = file_upload($_FILES['headimg'], 'image', "headimg_{$acid}");
            }
        }

        if($state && $uniacid && $acid ){
            $result = '公众号<strong style="color:#8DDD1E">'.$_GPC['name'].'</strong>提交成功';
        }else{
            $result = '公众号<strong style="color:#8DDD1E">'.$_GPC['name'].'</strong>提交失败';
        }
    $script = <<<EOT
                        $('body').append('<div class="rs-overlay" />');
                        $("a[rel='rs-dialog']").each(function(){
                                var trigger 	= $(this);
                                var rs_dialog 	= $('#' + trigger.data('target'));
                                var rs_box 		= rs_dialog.find('.rs-dialog-box');
                                var rs_close 	= rs_dialog.find('.close');
                                var rs_overlay 	= $('.rs-overlay');
                                if( !rs_dialog.length ) return true;

                                trigger.click(function(){
                                    var w1 = $(window).width();
                                    $('html').addClass('dialog-open');
                                    var w2 = $(window).width();
                                    c = w2-w1 + parseFloat($('body').css('padding-right'));
                                    if( c > 0 ) $('body').css('padding-right', c + 'px' );

                                    rs_overlay.fadeIn('fast');
                                    rs_dialog.show( 'fast', function(){
                                        rs_dialog.addClass('in');
                                        });	
                                    setTimeout(function(){
                                        window.location.href='index.php';
                                    }, 10000); 
                                    return false;
                                    });

                                rs_close.click(function(e){			
                                        rs_dialog.removeClass('in').delay(150).queue(function(){
                                            rs_dialog.hide().dequeue();	
                                            rs_overlay.fadeOut('slow');
                                            $('html').removeClass('dialog-open');
                                            $('body').css('padding-right', '');		
                                            });
                                        //return false;
                                });

                                rs_dialog.click(function(e){
                                        rs_close.trigger('click');		
                                });
                                rs_box.click(function(e){
                                        e.stopPropagation();
                                });		
                                $(this).click();
                        });
EOT;

    }
}
template('public/submit');
