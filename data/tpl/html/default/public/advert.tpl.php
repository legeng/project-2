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
                        <h1>微信公众号推广 & 站内投放广告</h1>
                        <div class="sim">★★★★★ weixinsyt.com ★★★★★ </div>
                        <div class="iimg"><img src="./resource/images/weixin-tg.jpg" width="500" height="150" /></div>
                    </div>
                    <div class="somim">
                        <h4>微信生意通介绍</h4>
                        <div class="content">
                            <div class="concom">每个企业都有自己的光荣时刻，每个产品也有自己的辉煌瞬间，但是所有的成就都将属于过去 在互联网这个不断创新的世界，微信生意通愿和您一起，生生不息。在小的产品，也有自己的品牌。微信生意通一直努力给客户更多的展示机会，带来更多粉丝，更多的流量。帮客户创造更大的价值！微信，不只是一个聊天工具。微信，让世界看到了你。微信生意通，旨在帮助你的生意畅通无阻。微信生意通感谢您们的信任与支持！</div>
                        </div>
                    </div>
                    <div class="somim">
                        <h4>微信公众号推广位置说明</h4>
                        <div class="content">
                            <div class="concom">
                                <p>1. 首页醒目banner微信公众号文字类，最佳展示位 目前免费，位置有限，请预订。如下图品牌公众号位置：</p>
                                <p><img src="./resource/images/adsp1.jpg" width="660" height="172" /></p>
                                <p>2. 首页第一屏顶部&ldquo;精品微信公众号(一)&rdquo;，位置好效果好，目前免费，长期推广可合作！如下图。</p>
                                <p><img src="./resource/images/adsp2.jpg" width="660" height="263" /></p>
                                <p>3. 首页第二屏顶部&ldquo;精品微信公众号(二)&rdquo;，位置好效果好，目前免费，长期推广可合作！如下图。</p>
                                <p><img src="./resource/images/adsp3.jpg" width="660" height="209" /></p>
                                <p>4. 首页第三屏顶部&ldquo;精品微信公众号(三)&rdquo;，位置好效果好，目前免费，长期推广可合作！如下图。</p>
                                <p><img src="./resource/images/adsp4.jpg" width="660" height="300" /></p>
                                <p>5. 首页第四屏顶部&ldquo;精品微信公众号(四)&rdquo;，位置好效果好，目前免费，长期推广可合作！如下图。</p>
                                <p><img src="./resource/images/adsp6.jpg" width="660" height="250" /></p>
                                <p>6. 详情页右栏&ldquo;精品公众号推送，公众号扫描排行&rdquo;，位置好效果好，目前免费，长期推广可合作！如下图。</p>
                                <p><img src="./resource/images/adsp5.jpg" width="660" height="320" /></p>
                            </div>
                        </div>
                    </div>
                    <div class="duoshuo">联系QQ&nbsp;3111319984 确认投放位置后即刻安排投放，位置有限，请不要错过最佳展示位。</div>
                </div>
            </div>
        </div>
         <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('public/common', TEMPLATE_INCLUDEPATH)) : (include template('public/common', TEMPLATE_INCLUDEPATH));?>
        <div class="iasir">
            <div class="iidads160"> </div>
            <div class="iidads160"> </div>
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
