<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta charset="gbk">
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
        <meta content="2345小说大全" name="apple-mobile-web-app-title">
        <title>微信文章 - 最新微信公号文章-微信生意通手机版</title>
        <link rel="stylesheet" href="./resource/css/index.css">

    </head>

    <body id="xtopjsinfo">
        <!--wrapper begin-->
        <div class="wrapper">
            <!-- header begin -->
            <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('comm/header', TEMPLATE_INCLUDEPATH)) : (include template('comm/header', TEMPLATE_INCLUDEPATH));?>
            <!--nav end-->
            <!--container begin-->
            <div class="container page_rank">
                <!-- mod_cate -->
                <section class="mod_cate">
                <div class="bd">
                    <ul class="cate_listc cleafix">
                        <li><a href="<?php  echo url('public/active',array('key'=>'生活'))?>" title="生活">生活</a></li>
                        <li><a href="<?php  echo url('public/active',array('key'=>'美食'))?>" title="美食">美食</a></li>
                        <li><a href="<?php  echo url('public/active',array('key'=>'娱乐'))?>" title="娱乐">娱乐</a></li>
                        <li><a href="<?php  echo url('public/active',array('key'=>'购物'))?>" title="购物">购物</a></li>
                        <li><a href="<?php  echo url('public/active',array('key'=>'丽人'))?>" title="丽人">丽人</a></li>
                        <li><a href="<?php  echo url('public/active',array('key'=>'结婚'))?>" title="结婚">结婚</a></li>
                        <li><a href="<?php  echo url('public/active',array('key'=>'亲子'))?>" title="亲子">亲子</a></li>
                        <li><a href="<?php  echo url('public/active',array('key'=>'运动'))?>" title="运动">运动</a></li>
                        <li><a href="<?php  echo url('public/active',array('key'=>'酒店'))?>" title="酒店">酒店</a></li>
                        <li><a href="<?php  echo url('public/active',array('key'=>'汽车'))?>" title="汽车">汽车</a></li>
                        <li><a href="<?php  echo url('public/active',array('key'=>'工作'))?>" title="工作">工作</a></li>
                        <li><a href="<?php  echo url('public/active',array('key'=>'买房'))?>" title="买房">买房</a></li>
                        <li><a href="<?php  echo url('public/active',array('key'=>'教育'))?>" title="教育">教育</a></li>
                        <li><a href="<?php  echo url('public/active',array('key'=>'政务'))?>" title="政务">政务</a></li>
                        <li><a href="<?php  echo url('public/active',array('key'=>'新闻'))?>" title="新闻">新闻</a></li>
                        <li><a href="<?php  echo url('public/active',array('key'=>'财经'))?>" title="财经">财经</a></li>
                    </ul>
                </div>
                </section>
                <section class="mod_tab">
                <div class="tabCon">
                    <?php  if(is_array($active)) { foreach($active as $one) { ?>
                    <dl class="img_info" id="img_infoa">
                        <dt><a href="<?php  echo url('public/active',array('id'=>$one['uniacid']))?>" title="<?php  echo $one['title'];?>"><img alt="<?php  echo $one['title'];?>" src="<?php echo $one['thumb'] ? $_W['attachurl'].$one['thumb'] : './resource/images/active-default.jpg' ?>" alt="<?php  echo $one['title'];?>" title="<?php  echo $one['title'];?>"></a></dt><dd>
                        <h3><a href="<?php  echo url('public/active',array('id'=>$one['uniacid']))?>" title="<?php  echo $one['title'];?>"><?php  echo $one['title'];?></a></h3>
                        <span><?php  echo $one['name'];?></span><span class="yued"><?php  echo $one['scan_count'];?>人阅读</span>
                        </dd>
                    </dl> 
                    <?php  } } ?>
                    <?php  if(!$active) { ?>
                    <dl class="img_info" id="img_infoa">
                        <dt><a href="#">暂无活动</a></dt>
                    </dl> 
                    <?php  } ?>
                    <!--<div class="listMore">分页使用</div>-->
                </div>
                </section>
            </div>

            <div class="push"></div>
        </div>

        <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('comm/footer', TEMPLATE_INCLUDEPATH)) : (include template('comm/footer', TEMPLATE_INCLUDEPATH));?>
    </body>
</html>
