<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta charset="gbk">
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
        <meta content="2345小说大全" name="apple-mobile-web-app-title">
        <title>微信公众号-<?php  echo $account['name'];?>-活动详情-微信生意通手机版</title>
        <link rel="stylesheet" href="./resource/css/index.css">
    </head>

    <body id="xtopjsinfo">

        <!--wrapper begin-->
        <div class="wrapper">
            <!-- header begin -->
            <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('comm/header', TEMPLATE_INCLUDEPATH)) : (include template('comm/header', TEMPLATE_INCLUDEPATH));?>
            <div class="container page_rank">

                <section class="mod_tab">
                <div class="tabCon">
                    <div class="titpics">
                        <p class="titin"><?php  echo $account['title'];?></p>
                    </div>

                    <div class="zwword"><?php  echo $account['content'];?></div>

                </div>
                <?php  if($active) { ?>
                <div class="mod_book book_contents">
                    <div class="hd">
                        <h3 class="tit">最新活动阅读</h3>
                    </div>
                    <ul class="book_textListf">
                        <?php  if(is_array($active)) { foreach($active as $one) { ?>
                        <li> <a href="<?php  echo url('public/active' ,array('id'=>$one['uniacid']))?>" title="<?php  echo $one['title'];?>" target="_blank"><?php  echo $one['title'];?></a></li>
                        <?php  } } ?>
                    </ul>
                </div>
                <?php  } ?>
                <div class="guanzu">
                    <a class="fired" href="<?php  echo url('public/category' ,array('id'=>$account['uniacid']))?>" title="<?php  echo $account['name'];?>">
                        <img width="60" height="60" class="imgthumb" src="<?php  echo $_W['attachurl'];?><?php  echo $account['uniacid'];?>/headimg_<?php  echo $account['uniacid'];?>.jpg?acid=<?php  echo $account['uniacid'];?>" alt="<?php  echo $account['name'];?>">
                        <h3 class="ui-li-heading"><?php  echo $account['name'];?></h3>
                        <p class="ui-li-desc"><?php  echo $account['scan_count'];?>人关注</p>
                    </a>

                    <span><a target="_blank" href="<?php  echo url('public/category' ,array('id'=>$account['uniacid']))?>" title="<?php  echo $account['name'];?>">+&nbsp;关注</a></span>

                </div></section>



            </div>

            <div class="push"></div>
        </div>

        <div id="SOHUCS"></div>
        <script id="changyan_mobile_js" charset="utf-8" type="text/javascript" 
                src="http://changyan.sohu.com/upload/mobile/wap-js/changyan_mobile.js?client_id=cyrYE76zo&conf=prod_5226d00eacabaa296def1945d14ef09b">
        </script>
        <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('comm/footer', TEMPLATE_INCLUDEPATH)) : (include template('comm/footer', TEMPLATE_INCLUDEPATH));?>
    </body>
</html>
