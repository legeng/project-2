<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
        <meta content="微信公众号大全" name="apple-mobile-web-app-title">
        <title>微信公众号栏目导航-微信生意通手机端</title>
        <link rel="stylesheet" href="./resource/css/index.css">
    </head>
    <body id="xtopjsinfo">
        <!--wrapper begin-->
        <div class="wrapper">
            <!-- header begin -->
            <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('comm/header', TEMPLATE_INCLUDEPATH)) : (include template('comm/header', TEMPLATE_INCLUDEPATH));?>
            <!--nav end-->
            <!--container begin-->
            <div class="container">
                <!-- mod_cate -->
                <section class="mod_cate">
                <div class="hd"><h3 class="tit color0">资讯阅读</h3></div>
                <div class="bd">
                    <ul class="cate_list clearfix">
                        <li><a href="<?php  echo url('public/category',array('key'=>'新闻'))?>">新闻</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'科技'))?>">科技</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'汽车'))?>">汽车</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'丽人'))?>">丽人</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'亲子'))?>">亲子</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'综合'))?>">综合</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'小说'))?>">小说</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'买房'))?>">房产</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'财经'))?>">财经</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'体育'))?>">体育</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'公益'))?>">公益</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'彩票'))?>">彩票</a></li>
                    </ul>
                </div>
                </section><!-- mod_cate -->
                <section class="mod_cate">
                <div class="hd"><h3 class="tit color1">名人明星</h3></div>
                <div class="bd">
                    <ul class="cate_list clearfix">
                        <li><a href="<?php  echo url('public/category',array('key'=>'演员'))?>">演员</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'歌手'))?>">歌手</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'模特'))?>">模特</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'科技'))?>">科技</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'财经'))?>">财经</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'文化'))?>">文化</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'时尚'))?>">时尚</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'买房'))?>">买房</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'教育'))?>">教育</a></li>
                    </ul>
                </div>
                </section><!-- mod_cate -->
                <section class="mod_cate">
                <div class="hd"><h3 class="tit color2">影音娱乐</h3></div>
                <div class="bd">
                    <ul class="cate_list clearfix">
                        <li><a href="<?php  echo url('public/category',array('key'=>'美图'))?>">美图</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'影视'))?>">影视</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'音乐'))?>">音乐</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'搞笑'))?>">搞笑</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'美女'))?>">美女</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'动漫'))?>">动漫</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'星座'))?>">星座</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'语录'))?>">语录</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'游戏'))?>">游戏</a></li>
                    </ul>
                </div>
                </section><!-- mod_cate -->
                <section class="mod_cate">
                <div class="hd"><h3 class="tit color3">生活购物</h3></div>
                <div class="bd">
                    <ul class="cate_list clearfix">
                        <li><a href="<?php  echo url('public/category',array('key'=>'购物'))?>">购物</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'酒店'))?>">酒店</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'时尚'))?>">时尚</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'出行'))?>">出行</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'美食'))?>">美食</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'旅游'))?>">旅游</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'宠物'))?>">宠物</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'休闲'))?>">休闲</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'生活'))?>">生活</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'健康'))?>">健康</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'创意'))?>">创意</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'天气'))?>">天气</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'通讯'))?>">通讯</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'理财'))?>">理财</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'工作'))?>">工作</a></li>
                    </ul>
                </div>
                </section><!-- mod_cate -->
                <section class="mod_cate">
                <div class="hd"><h3 class="tit color4">社区交友</h3></div>
                <div class="bd">
                    <ul class="cate_list clearfix">
                        <li><a href="<?php  echo url('public/category',array('key'=>'社区'))?>">社区</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'交友'))?>">交友</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'职场'))?>">职场</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'婚恋'))?>">婚恋</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'招聘'))?>">招聘</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'家政'))?>">家政</a></li>
                    </ul>
                </div>
                </section><!-- mod_cate -->
                <section class="mod_cate">
                <div class="hd"><h3 class="tit color5">体育竞赛</h3></div>
                <div class="bd">
                    <ul class="cate_list clearfix">
                        <li><a href="<?php  echo url('public/category',array('key'=>'足球'))?>">足球</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'篮球'))?>">篮球</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'网球'))?>">网球</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'赛车'))?>">赛车</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'高尔夫'))?>">高尔夫</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'游泳'))?>">游泳</a></li>
                    </ul>
                </div>
                </section><!-- mod_cate -->
                <section class="mod_cate">
                <div class="hd"><h3 class="tit color6">文化教育</h3></div>
                <div class="bd">
                    <ul class="cate_list clearfix">
                        <li><a href="<?php  echo url('public/category',array('key'=>'读书'))?>">读书</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'外语'))?>">外语</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'教育'))?>">教育</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'历史'))?>">历史</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'亲子'))?>">亲子</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'医疗'))?>">医疗</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'机构'))?>">机构</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'品牌'))?>">品牌</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'基金'))?>">基金</a></li>
                    </ul>
                </div>
                </section><!-- mod_cate -->
                <section class="mod_cate">
                <div class="hd"><h3 class="tit color7">其它类别</h3></div>
                <div class="bd">
                    <ul class="cate_list clearfix">
                        <li><a href="<?php  echo url('public/category',array('key'=>'政务'))?>">政务</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'公司'))?>">公司</a></li>
                        <li><a href="<?php  echo url('public/category',array('key'=>'医院'))?>">医院</a></li>
                    </ul>
                </div>
                </section>	


            </div>
            <!--push place-->
            <div class="push"></div>
            <!--footer begin-->
        </div>

        <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('comm/footer', TEMPLATE_INCLUDEPATH)) : (include template('comm/footer', TEMPLATE_INCLUDEPATH));?>

    </body>
</html>
