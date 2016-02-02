<?php defined('IN_IA') or exit('Access Denied');?>﻿<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php  echo $account['name'];?>微信号,<?php  echo $account['name'];?>微信二维码,<?php  echo $account['name'];?>微信公众账号-扫码就上微信生意通</title>
<meta name="keywords" content="<?php  echo $account['name'];?>微信号,<?php  echo $account['name'];?>微信二维码,<?php  echo $account['name'];?>微信公众账号-扫<?php  echo $account['name'];?>码就上微信生意通" />
<meta name="description" content="<?php  echo $account['description'];?> <?php  echo $_W['config']['siteinfo']['description'];?> " />
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
                    <div class="iweilistc2">
                        <ul>
                            <li style="height:auto;">
                            <span class="lo"><img src="<?php  echo $account['attachurl'];?><?php  echo $account['uniacid'];?>/headimg_<?php  echo $account['uniacid'];?>.jpg?acid=<?php  echo $account['uniacid'];?>" width="90" height="90" alt="微信公众号：<?php  echo $account['name'];?>" title="微信公众号：<?php  echo $account['name'];?>"/></span>
                            <span class="te">
                                <strong>公众帐号：<?php  echo $account['name'];?></strong>
                                <p class="wxco">以下微信信息来自微信公众平台</p>
                                <p><b>微信号：</b><?php  echo $account['details'][$account['uniacid']]['account'];?></p>
                                <p><b>微信类别：</b><?php  echo $account['industry_parent'];?>&nbsp;  <?php  echo $account['industry_child'];?></p>
                                <?php  if($account['province']) { ?><p><b>所属地区：</b><?php  echo $account['province'];?> &nbsp; <?php  echo $account['city'];?> &nbsp; <?php  echo $account['district'];?></p><?php  } ?>
                                <?php  if($account['siteurl'] || $account['tweibo'] || $account['sweibo']) { ?><p><b>相关网址：</b><?php  if($account['siteurl']) { ?><a href="<?php  echo $account['siteurl'];?>" target="__blank" title="<?php  echo $account['name'];?>"><?php  echo $account['name'];?> &nbsp;&nbsp;</a><?php  } ?><?php  if($account['tweibo']) { ?><a href="<?php  echo $account['tweibo'];?>" target="__blank" title="<?php  echo $account['name'];?>"><?php  echo $account['name'];?>·腾讯微博&nbsp;&nbsp;</a> <?php  } ?><?php  if($account['sweibo']) { ?> <a href="<?php  echo $account['sweibo'];?>" target="__blank" title="<?php  echo $account['name'];?>"><?php  echo $account['name'];?>·新浪微博</a><?php  } ?></p><?php  } ?>
                                <p><b>功能介绍：</b><?php  echo $account['description'];?></p>
                                <?php  if($account['wxrenzheng']) { ?><p><b>腾讯或微信认证：</b><?php  echo $account['wxrenzheng'];?></p><?php  } ?>
                                <p><b>收录时间：</b><?php  echo date('Y-m-d',$account['createtime'])?></p>
                                <div class="bdsharebuttonbox"><a style="background:none;padding-left:0px;font-weight:bold;font-size: 14px;">我要分享：</a><a href="#" class="bds_more" data-cmd="more" title="分享更多"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
                            </span>
                            </li>
                        </ul> 
                    </div>
                    <div class="somim">
                        <h5>关注微信方法：</h5>
                        <div class="content">
                            <div class="sgo"><p class="sl">方法一</p><p class="sr">手机打开 > 微信|发现 > 扫一扫 > 扫描二维码即可添加关注！推荐此方法！</p></div>
                            <div class="shoh">
                                <div class="ewmm"><img src="<?php  echo $account['attachurl'];?><?php  echo $account['uniacid'];?>/qrcode_<?php  echo $account['uniacid'];?>.jpg?acid=<?php  echo $account['uniacid'];?>" width="140" height="140" alt="<?php  echo $account['name'];?>微信二维码" title="<?php  echo $account['name'];?>微信二维码"/><p>微信扫一扫关注</p></div>
                                <div class="etu"><img src="./resource/images/sjso.png" width="150" height="248" alt="关注方法一" title="关注方法一" /></div>
                            </div>
                            <div class="sgo"><p class="sl">方法二</p><p class="sr">手机打开,微信 > 通讯录 > 添加朋友 > 输入 <b><?php  echo $account['details'][$account['uniacid']]['account'];?></b> 搜索 > 添加成功！</p></div>
                            <div class="shoh" style="text-align:center;"><img src="./resource/images/sjso2.png" width="322" height="351" alt="关注方法二" title="关注方法二"/></div>
                        </div>
                    </div>
                    <?php  if($account['content']) { ?>
                    <div class="somim">
                        <h5><?php  echo $account['name'];?>·最新活动：</h5>
                        <div class="content">
                            <p><?php  echo $account['content'];?></p>
                        </div>
                    </div>
                    <?php  } ?>
                    <?php  if($article) { ?>
                    <div class="somim">
                        <h6><?php  echo $account['name'];?>·精选导读</h6>
                        <div class="content">
                            <div class="inewlist" style="width:auto;">
                                <ul>
                                    <?php  if(is_array($article)) { foreach($article as $one) { ?>
                                    <li><span class="lo"><a href="<?php  echo url('public/article',array('id'=>$one['id']));?>" target="_blank" title="<?php  echo $one['title'];?>"><img src="<?php  echo $_W['attachurl'];?><?php  echo $one['thumb'];?>" width="90" height="90" alt="<?php  echo $one['title'];?>" title="<?php  echo $one['title'];?>"/></a></span><span class="te"><strong><a href="<?php  echo url('public/article',array('id'=>$one['id']));?>" target="_blank" title="<?php  echo $one['title'];?>"><?php  echo $one['title'];?></a></strong><p class="wc1"><?php  echo $one['description'];?>...</p><p class="wc2"><?php  echo $account['name'];?>&nbsp;/&nbsp;<?php  echo date('Y-m-d',$one['createtime']);?></p></span></li>
                                    <?php  } } ?>
                                </ul> 
                            </div>
                        </div>
                        <div class="bdpage"><?php  echo $pager;?><?php echo $pager ? "<b>$total</b>" : ''?></div>
                    </div>
                    <?php  } ?>
                    <div class="duoshuo" style="border-top:none">
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
            <div class="iidads160"> </div>
            <div class="iidads160"> </div>
        </div>
    </div>
</div>
<script src="./resource/js/lib/jquery-1.11.1.min.js"></script><script src="./resource/js/scrolltopcontrol.js"></script>

    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
</body>
</html>
