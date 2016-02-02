<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta charset="gbk">
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
        <meta content="2345小说大全" name="apple-mobile-web-app-title">
        <title>微信公众号文章资讯-微信生意通手机版</title>
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
                        <p class="titin"><?php  echo $article['title'];?></p>
                        <p class="titcc"> 
                        <span>类别：<?php  echo $article['p_cate']['name'];?></span>&nbsp;&nbsp;&nbsp;&nbsp;
                        <span>来源：<?php  echo $article['source'];?></span>&nbsp;&nbsp;&nbsp;&nbsp;
                        <span>时间：<?php  echo date('Y-m-d',$article['createtime'])?></span></p>
                    </div>

                    <div class="zwword"><?php  echo $article['content'];?>阅读数：<?php  echo $article['scan_count'];?></div>

                </div>

                </section>



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
