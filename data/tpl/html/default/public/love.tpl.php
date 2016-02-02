<?php defined('IN_IA') or exit('Access Denied');?>﻿<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php  echo $_W['config']['siteinfo']['title'];?></title>
        <meta name="keywords" content="<?php  echo $_W['config']['siteinfo']['keywords'];?>" />
        <meta name="description" content="<?php  echo $_W['config']['siteinfo']['description'];?>" />
        <link href="./resource/css/base.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" type="image/x-icon" href="./resource/images/favicon.ico" />
    </head>
<body>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header-gw', TEMPLATE_INCLUDEPATH)) : (include template('common/header-gw', TEMPLATE_INCLUDEPATH));?>
<div class="iiin-body">
    <div class="iiin-box">
        <div class="iasil">
            <div class="iucon">
                <div class="content" style="margin-bottom:20px;">
                    <div class="wxclass">
                        <?php  if(is_array($p_list)) { foreach($p_list as $one) { ?>
                        <h2><a href="<?php  echo url('public/article',array('parentid'=>$one['id'],'key'=>$one['name']));?>" title="<?php  echo $one['name'];?>"><?php  echo $one['name'];?></a></h2>
                        <div class="dxclq">
                            <div class="shengs">
                                <div class="clb">
                                    <ul>
                                        <?php  if(is_array($c_list)) { foreach($c_list as $two) { ?>
                                            <?php  if($two['parentid'] == $one['id']) { ?>
                                            <li><a href="<?php  echo url('public/article',array('parentid'=>$one['id'],'childid'=>$two['id'],'key'=>$one['name']."-".$two['name']));?>" target="_blank"><?php  echo $two['name'];?></a></li>
                                            <?php  } ?>
                                        <?php  } } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php  } } ?>
                    </div>
                </div>
            </div>
        </div>
         <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('public/common', TEMPLATE_INCLUDEPATH)) : (include template('public/common', TEMPLATE_INCLUDEPATH));?>
        <div class="iasir">
            <div class="iidads160">
            </div>
            <div class="iidads160">
            </div>
        </div>
    </div>
</div>
<!--baidu button begin-->
<script type="text/javascript" id="bdshare_js" data="type=slide&amp;img=1&amp;pos=right&amp;uid=742298" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
    document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000);
</script>
<!--baidu button end-->
<script src="./resource/js/lib/jquery-1.11.1.min.js"></script><script src="./resource/js/scrolltopcontrol.js"></script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
</body>
</html>
