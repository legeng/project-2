<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
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
                <div class="iasil" style="width:1020px;">
                    <div class="iucon">
                        <div class="content">
                            <div class="somim" style="width:97%">
                                <h4>系统搜索到约有<strong> <?php  echo $total;?> </strong>项符合<strong style="color:#82B440"> "<?php  echo $keyword;?>" </strong>的查询结果</h4>
                            </div>
                            <div class="iweilist" style="width:665px; float:left; margin-left:15px;">
                                <ul>
                                    <?php  if(is_array($list)) { foreach($list as $one) { ?>
                                    <li><span class="lo"><a href="<?php  echo url('public/category',array('id'=>$one['uniacid'],'key'=>$one['industry_parent']))?>" target="_blank"><img src="<?php  echo $one['attachurl'];?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" width="90" height="90" alt="微信公众号：<?php  echo $one['name'];?>"/></a></span><span class="te"><strong><a href="<?php  echo url('public/category',array('id'=>$one['uniacid'],'key'=>$one['industry_parent']))?>" target="_blank"><?php  echo $one['name'];?></a></strong><p class="ewm" style="width:0px; right:-10px;"><a href="<?php  echo url('public/category',array('id'=>$one['uniacid'],'key'=>$one['industry_parent']))?>" target="_blank"><img src="<?php  echo $one['attachurl'];?><?php  echo $one['uniacid'];?>/qrcode_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="查看二维码" width="120" height="120" style="border: 2px #E3E3E3 solid;" /></a></p><p class="wc1">微信号：<?php  echo $one['details'][$one['uniacid']]['account'];?></p><p><font class="wc2">功能介绍：</font><?php  echo $one['description'];?></p><p> <a href="<?php  echo url('public/category',array('id'=>$one['uniacid'],'key'=>$one['industry_parent']))?>" target="_blank"><img src="./resource/images/guanzhu.gif" /></a><div class="bdsharebuttonbox" style="margin-top:-40px;float:right;"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone"></a><a href="#" class="bds_tsina" data-cmd="tsina"></a><a href="#" class="bds_tqq" data-cmd="tqq"></a><a href="#" class="bds_renren" data-cmd="renren"></a><a href="#" class="bds_weixin" data-cmd="weixin"></a></div></p></span></li>
                                    <?php  } } ?>
                                </ul>
                            </div>
                            <div class="bdpage"><?php  echo $pager;?></div>
                        </div>
                    </div>
                </div>
                <div class="iasir">
                    <div class="iidads160">
                    </div>
                    <div class="iidads160">
                    </div>
                </div>
            </div>
        </div>
        <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
        <script src="./resource/js/lib/jquery-1.11.1.min.js"></script><script src="./resource/js/scrolltopcontrol.js"></script>
        <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>

    </body>
</html>
