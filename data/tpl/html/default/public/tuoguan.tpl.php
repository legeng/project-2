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
                <div class="content">
                    <div class="newtit">
                        <h1>微信生意通·微信公众号托管</h1>
                        <div class="sim">★★★★★ weixinsyt.com ★★★★★ </div>
                        <div class="iimg"><img src="./resource/images/weixinyy.jpg" width="660" height="350" alt="微信公众号托管" title="微信公众号托管"/></div>
                    </div>
                    <div class="somim" >
                        <h4>微信公众号托管</h4>
                        <div class="content">
                            <div class="concom">
                                <p>微信生意通（www.weixinsyt.com）可以帮助您管理您的微信公众号，如果您的微信公众号入驻微信生意通的托管后，您可以使用如下功能：<br />
                                <div class="mp_kind_mod">
                                    <div class="mp_kind_mod_bd group">
                                        <dl class="mp_kind">
                                            <dt class="name"><span class="icon_mp_kind service"></span>基本套餐</dt>
                                            <dd>文字回复、图文回复、音乐回复、图片回复、语言回复、视频回复、自定义菜单、欢迎回复、常用服务(天气查询、黄历查询、快递查询等等)还有更多的微应用模块供你使用! 更多模块请点击>> <a href="<?php  echo url('develop/index')?>" title="微信生意通模块应用"><font color="#82B440">微信生意通·模块应用</font></a></dd>
                                        </dl>
                                        <dl class="mp_kind">
                                            <dt class="name"><span class="icon_mp_kind subscribe"></span>微信编辑器</dt>
                                            <dd>微信图文编辑助手，图片美化，动画制作，微信二维码制作，图文编辑不再难。编辑器更多详情请点击>> <a href="http://www.weixinsyt.com/editor/index.html" title="微信生意通编辑器"><font color="#82B440">微信生意通·微信编辑器</font></a></dd>
                                        </dl>
                                        <dl class="mp_kind">
                                            <dt class="name"><span class="icon_mp_kind enterprise"></span>微信小游戏</dt>
                                            <dd>微信小游戏可以帮助您营销您的公众号。增加粉丝之间的互动，微信生意通一直在收集粉丝们喜欢的经典小游戏免费供您的微信公众号使用。迄今为止已经有80+个之多，更多微信小游戏详情请点击>> <a href="http://www.weixinsyt.com/games/index.html" title="微信生意通小游戏"><font color="#82B440">微信生意通·微信小游戏</font></a></dd>
                                        </dl>
                                        <dl class="mp_kind">
                                            <dt class="name"><span class="icon_mp_kind enterprise"></span>发布促销活动</dt>
                                            <dd>微信生意通帮助您运营您的公众号，当您入驻微信生意通后，您可以发布相关的促销活动，还可以发布您店铺的网址、微博网址，这些信息将会显示在您公众号的主页上。增加曝光率，让您的营销更轻松。</dd>
                                        </dl>
                                    </div>
                                </div> </p>
                            </div>
                        </div>
                    </div>
                    <div class="duoshuo">
                        <!-- UY BEGIN -->
                        <div id="uyan_frame"></div>
                        <script type="text/javascript" src="http://v2.uyan.cc/code/uyan.js?uid=1808089"></script>
                        <!-- UY END -->
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
<script src="./resource/js/lib/jquery-1.11.1.min.js"></script>
<script src="./resource/js/scrolltopcontrol.js"></script>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
</body>
</html>
