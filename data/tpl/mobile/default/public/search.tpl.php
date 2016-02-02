<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
        <meta content="微信公众号搜索" name="apple-mobile-web-app-title">
        <title>微信公众号搜索-微信生意通手机版</title>
        <link rel="stylesheet" href="./resource/css/index.css">
    </head>
    <body id="xtopjsinfo">
        <!--wrapper begin-->
        <div class="wrapper">
            <!-- header begin -->
            <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('comm/header', TEMPLATE_INCLUDEPATH)) : (include template('comm/header', TEMPLATE_INCLUDEPATH));?>
            <!--nav end-->
            <!--container begin-->
            <div class="container page_search">
                <!--search_form begin -->
                <section class="search_form">
                <form action="" method="post" onsubmit="if(document.getElementById('keyword').value == '' || document.getElementById('keyword').value == '请输入关键字查询'){document.getElementById('keyword').value='';document.getElementById('keyword').focus();return false;};">
                    <input type="search" placeholder="请输入关键词查询" value="" autocomplete="off" autocorrect="off" maxlength="64" name="key" class="inp" id='keyword' onblur="if(this.value == '')this.value='请输入关键字查询';" onclick="if(this.value == '请输入关键字查询')this.value='';">
                    <input type="submit" class="btn" value="搜索">
                </form>
                </section>
                <!--search_form end-->
                <!-- search_meta begin -->
                <section class="search_meta">
                <div class="hd"><h3>热搜词：</h3></div>
                <div class="bd">
                    <ul class="meta_list">

                        <li><a href="<?php  echo url('public/search',array('key'=>'生活'))?>" >生活</a></li>
                        <li><a href="<?php  echo url('public/search',array('key'=>'美食'))?>" >美食</a></li>
                        <li><a href="<?php  echo url('public/search',array('key'=>'购物'))?>" >购物</a></li>
                        <li><a href="<?php  echo url('public/search',array('key'=>'丽人'))?>" >丽人</a></li>
                        <li><a href="<?php  echo url('public/search',array('key'=>'娱乐'))?>" >娱乐</a></li>
                        <li><a href="<?php  echo url('public/search',array('key'=>'结婚'))?>" >结婚</a></li>
                        <li><a href="<?php  echo url('public/search',array('key'=>'亲子'))?>" >亲子</a></li>
                        <li><a href="<?php  echo url('public/search',array('key'=>'运动'))?>" >运动</a></li>
                        <li><a href="<?php  echo url('public/search',array('key'=>'酒店'))?>" >酒店</a></li>
                        <li><a href="<?php  echo url('public/search',array('key'=>'汽车'))?>" >汽车</a></li>
                        <li><a href="<?php  echo url('public/search',array('key'=>'工作'))?>" >工作</a></li>
                        <li><a href="<?php  echo url('public/search',array('key'=>'买房'))?>" >买房</a></li>
                        <li><a href="<?php  echo url('public/search',array('key'=>'教育'))?>" >教育</a></li>
                        <li><a href="<?php  echo url('public/search',array('key'=>'政务'))?>" >政务</a></li>
                        <li><a href="<?php  echo url('public/search',array('key'=>'新闻'))?>" >新闻</a></li>
                        <li><a href="<?php  echo url('public/search',array('key'=>'财经'))?>" >财经</a></li>
                        <li><a href="<?php  echo url('public/search',array('key'=>'医院'))?>" >医院</a></li>
                        <li><a href="<?php  echo url('public/search',array('key'=>'公司'))?>" >公司</a></li>
                </div>
                </section>
                <!-- search_meta end -->
            </div>
            <!--push place-->
            <div class="push"></div>
            <!--wrapper end-->
            <!--footer begin-->
        </div>

        <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('comm/footer', TEMPLATE_INCLUDEPATH)) : (include template('comm/footer', TEMPLATE_INCLUDEPATH));?>

</body></html>
