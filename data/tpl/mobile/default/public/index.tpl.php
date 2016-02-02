<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
<meta content="微信生意通" name="apple-mobile-web-app-title">
<meta name="description" content="www.weixinsyt.com）是一个专注于分享品牌微信公众账号、微信群号、微信大全、微信营销方案、微信营销教程、微信营销技巧的导航网站，一直以来收集精彩有趣的微信账号，值得您关注。">
<meta name="keywords" content="微信,微信公众平台,微信推广,微信公众号,微信生意通,微信导航">
<title>微信生意通-微信公众导航-微信公众推广</title>
<link rel="stylesheet" href="./resource/css/index.css">
<script src="./resource/js/lib/jquery-1.11.1.min.js"></script>
</head>
<body id="xtopjsinfo">
<div class="wrapper">
<header class="header">
    <a href="http://www.weixinsyt.com/mobile" class="logo"></a>
</header>
<!--header end-->
<!--nav begin-->
<nav class="nav">
    <a href="<?php  echo url('',array('sid'=>-1))?>" <?php echo $_GPC['sid']==-1 ? 'class="cur"' : ''?>>首页</a>
    <a href="<?php  echo url('public/category',array('sid'=>1))?>" <?php echo $_GPC['sid']==1 ? 'class="cur"' : ''?>>分类</a>
    <a href="<?php  echo url('public/ranking',array('sid'=>2))?>" <?php echo $_GPC['sid']==2 ? 'class="cur"' : ''?>>排行</a>
    <a href="<?php  echo url('public/search',array('sid'=>3))?>" <?php echo $_GPC['sid']==3 ? 'class="cur"' : ''?>>搜索</a>
    <a href="<?php  echo url('public/article',array('sid'=>4))?>" <?php echo $_GPC['sid']==4 ? 'class="cur"' : ''?>>热文</a>
</nav>
    <div id="banner" class="swipe" name="wxNav-communal-banner">
        <div class="swipe-wrap">
            <div><img src="./resource/images/banner-1.jpg"/></div>
            <div><img src="./resource/images/banner-2.jpg"/></div>
            <div><img src="./resource/images/banner-3.jpg"/></div>
        </div>
        <div id="bannerPager">
            <span></span>
            <p class="Clear"></p>
        </div>
    </div>
    <script type="text/javascript" src="./resource/js/swipe.js"></script>
    <script type="text/javascript" src="./resource/js/picAct.js"></script>
    <!--nav end-->
    <!--container begin-->
    <div class="container">
        <!--rec_book end-->
        <!--mod_tab begin-->
        <section class="mod_tab tab1">
            <div class="tabNav">
                <li class="cur">资讯·阅读</li>
                <li>名人·明星</li>
                <li>影音·娱乐</li>
            </div>
            <div class="tabCon">
                <div>
                    <ul class="book_textList">
                        <?php  if(is_array($list1)) { foreach($list1 as $one) { ?>
                        <li>
                        <a href="<?php  echo url('public/category' ,array('id'=>$one['uniacid']))?>" title="<?php  echo $one['name'];?>" class="fired">
                            <img src="<?php  echo $_W['attachurl'];?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" class="imgthumb" width="60" height="60"/>
                            <h3 class="ui-li-heading"><?php  echo $one['name'];?></h3>
                            <p class="ui-li-desc"><?php  echo $one['industry_parent'];?> &nbsp;<?php  echo $one['scan_count'];?>&nbsp;人关注</p>
                        </a>
                        <span><a href="<?php  echo url('public/category' ,array('id'=>$one['uniacid']))?>" title="<?php  echo $one['name'];?>" target="_blank">+&nbsp;关注</a></span>
                        </li>
                        <?php  } } ?>
                    </ul>


                    <div class="listMore"><a href="<?php  echo url('public/category',array('sid'=>1))?>">更多分类&gt;&gt;</a></div>
                </div>

                <div class="hide">

                    <ul class="book_textList">
                        <?php  if(is_array($list2)) { foreach($list2 as $one) { ?>
                        <li>
                        <a href="<?php  echo url('public/category' ,array('id'=>$one['uniacid']))?>" title="<?php  echo $one['name'];?>" class="fired">
                            <img src="<?php  echo $_W['attachurl'];?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" class="imgthumb" width="60" height="60"/>
                            <h3 class="ui-li-heading"><?php  echo $one['name'];?></h3>
                            <p class="ui-li-desc"><?php  echo $one['industry_child'];?> &nbsp;<?php  echo $one['scan_count'];?>&nbsp;人关注</p>
                        </a>
                        <span><a href="<?php  echo url('public/category' ,array('id'=>$one['uniacid']))?>" title="<?php  echo $one['name'];?>" target="_blank">+&nbsp;关注</a></span>
                        </li>
                        <?php  } } ?>
                    </ul>
                    <div class="listMore"><a href="<?php  echo url('public/category',array('sid'=>1))?>">更多分类&gt;&gt;</a></div>
                </div>

                <div class="hide">
                    <ul class="book_textList">
                        <?php  if(is_array($list3)) { foreach($list3 as $one) { ?>
                        <li>
                        <a href="<?php  echo url('public/category' ,array('id'=>$one['uniacid']))?>" title="<?php  echo $one['name'];?>" class="fired">
                            <img src="<?php  echo $_W['attachurl'];?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" class="imgthumb" width="60" height="60"/>
                            <h3 class="ui-li-heading"><?php  echo $one['name'];?></h3>
                            <p class="ui-li-desc"><?php  echo $one['industry_parent'];?> &nbsp;<?php  echo $one['scan_count'];?>&nbsp;人关注</p>
                        </a>
                        <span><a href="<?php  echo url('public/category' ,array('id'=>$one['uniacid']))?>" title="<?php  echo $one['name'];?>" target="_blank">+&nbsp;关注</a></span>
                        </li>
                        <?php  } } ?>
                    </ul>
                    <div class="listMore"><a href="<?php  echo url('public/category',array('sid'=>1))?>">更多分类&gt;&gt;</a></div>
                </div>

            </div>
        </section>
        <!--mod_tab end-->
        <!--mod_tab begin-->
        <section class="mod_tab tab2">
            <div class="tabNav">
                <li class="cur">生活·购物</li>
                <li>社区·交友</li>
                <li>体育·竞技</li>
            </div>
            <div class="tabCon">
                <div>

                    <ul class="book_textList">
                        <?php  if(is_array($list4)) { foreach($list4 as $one) { ?>
                        <li>
                        <a href="<?php  echo url('public/category' ,array('id'=>$one['uniacid']))?>" title="<?php  echo $one['name'];?>" class="fired">
                            <img src="<?php  echo $_W['attachurl'];?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" class="imgthumb" width="60" height="60"/>
                            <h3 class="ui-li-heading"><?php  echo $one['name'];?></h3>
                            <p class="ui-li-desc"><?php  echo $one['industry_parent'];?> &nbsp;<?php  echo $one['scan_count'];?>&nbsp;人关注</p>
                        </a>
                        <span><a href="<?php  echo url('public/category' ,array('id'=>$one['uniacid']))?>" title="<?php  echo $one['name'];?>" target="_blank">+&nbsp;关注</a></span>
                        </li>
                        <?php  } } ?>
                    </ul>
                    <div class="listMore"><a href="<?php  echo url('public/category',array('sid'=>1))?>">更多分类&gt;&gt;</a></div>
                </div>

                <div  class="hide">
                    <ul class="book_textList">
                        <?php  if(is_array($list5)) { foreach($list5 as $one) { ?>
                        <li>
                        <a href="<?php  echo url('public/category' ,array('id'=>$one['uniacid']))?>" title="<?php  echo $one['name'];?>" class="fired">
                            <img src="<?php  echo $_W['attachurl'];?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" class="imgthumb" width="60" height="60"/>
                            <h3 class="ui-li-heading"><?php  echo $one['name'];?></h3>
                            <p class="ui-li-desc"><?php  echo $one['industry_child'];?> &nbsp;<?php  echo $one['scan_count'];?>&nbsp;人关注</p>
                        </a>
                        <span><a href="<?php  echo url('public/category' ,array('id'=>$one['uniacid']))?>" title="<?php  echo $one['name'];?>" target="_blank">+&nbsp;关注</a></span>
                        </li>
                        <?php  } } ?>
                    </ul>
                    <div class="listMore"><a href="<?php  echo url('public/category',array('sid'=>1))?>">更多分类&gt;&gt;</a></div>
                </div>

                <div class="hide">
                    <ul class="book_textList">
                        <?php  if(is_array($list6)) { foreach($list6 as $one) { ?>
                        <li>
                        <a href="<?php  echo url('public/category' ,array('id'=>$one['uniacid']))?>" title="<?php  echo $one['name'];?>" class="fired">
                            <img src="<?php  echo $_W['attachurl'];?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" class="imgthumb" width="60" height="60"/>
                            <h3 class="ui-li-heading"><?php  echo $one['name'];?></h3>
                            <p class="ui-li-desc"><?php  echo $one['industry_parent'];?> &nbsp;<?php  echo $one['scan_count'];?>&nbsp;人关注</p>
                        </a>
                        <span><a href="<?php  echo url('public/category' ,array('id'=>$one['uniacid']))?>" title="<?php  echo $one['name'];?>" target="_blank">+&nbsp;关注</a></span>
                        </li>
                        <?php  } } ?>
                    </ul>
                    <div class="listMore"><a href="<?php  echo url('public/category',array('sid'=>1))?>">更多分类&gt;&gt;</a></div>
                </div>
            </div>
        </section>
        <!--mod_tab end-->
        <!--mod_tab begin-->
        <section class="mod_tab tab3">
            <div class="tabNav">
                <li class='cur'>结婚·亲子</li>
                <li>汽车·酒店</li>
                <li>教育·政务</li>
            </div>
            <div class="tabCon">
                <div>
                    <ul class="book_textList">
                        <?php  if(is_array($list7)) { foreach($list7 as $one) { ?>
                        <li>
                        <a href="<?php  echo url('public/category' ,array('id'=>$one['uniacid']))?>" title="<?php  echo $one['name'];?>" class="fired">
                            <img src="<?php  echo $_W['attachurl'];?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" class="imgthumb" width="60" height="60"/>
                            <h3 class="ui-li-heading"><?php  echo $one['name'];?></h3>
                            <p class="ui-li-desc"><?php  echo $one['industry_parent'];?> &nbsp;<?php  echo $one['scan_count'];?>&nbsp;人关注</p>
                        </a>
                        <span><a href="<?php  echo url('public/category' ,array('id'=>$one['uniacid']))?>" title="<?php  echo $one['name'];?>" target="_blank">+&nbsp;关注</a></span>
                        </li>
                        <?php  } } ?>
                    </ul>
                    <div class="listMore"><a href="<?php  echo url('public/category',array('sid'=>1))?>">更多分类&gt;&gt;</a></div>
                </div>


                <div class="hide">
                    <ul class="book_textList">
                        <?php  if(is_array($list8)) { foreach($list8 as $one) { ?>
                        <li>
                        <a href="<?php  echo url('public/category' ,array('id'=>$one['uniacid']))?>" title="<?php  echo $one['name'];?>" class="fired">
                            <img src="<?php  echo $_W['attachurl'];?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" class="imgthumb" width="60" height="60"/>
                            <h3 class="ui-li-heading"><?php  echo $one['name'];?></h3>
                            <p class="ui-li-desc"><?php  echo $one['industry_parent'];?> &nbsp;<?php  echo $one['scan_count'];?>&nbsp;人关注</p>
                        </a>
                        <span><a href="<?php  echo url('public/category' ,array('id'=>$one['uniacid']))?>" title="<?php  echo $one['name'];?>" target="_blank">+&nbsp;关注</a></span>
                        </li>
                        <?php  } } ?>
                    </ul>
                    <div class="listMore"><a href="<?php  echo url('public/category',array('sid'=>1))?>">更多分类&gt;&gt;</a></div>
                </div>

                <div class="hide">
                    <ul class="book_textList">
                        <?php  if(is_array($list9)) { foreach($list9 as $one) { ?>
                        <li>
                        <a href="<?php  echo url('public/category' ,array('id'=>$one['uniacid']))?>" title="<?php  echo $one['name'];?>" class="fired">
                            <img src="<?php  echo $_W['attachurl'];?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" class="imgthumb" width="60" height="60"/>
                            <h3 class="ui-li-heading"><?php  echo $one['name'];?></h3>
                            <p class="ui-li-desc"><?php  echo $one['industry_parent'];?> &nbsp;<?php  echo $one['scan_count'];?>&nbsp;人关注</p>
                        </a>
                        <span><a href="<?php  echo url('public/category' ,array('id'=>$one['uniacid']))?>" title="<?php  echo $one['name'];?>" target="_blank">+&nbsp;关注</a></span>
                        </li>
                        <?php  } } ?>
                    </ul>
                    <div class="listMore"><a href="<?php  echo url('public/category',array('sid'=>1))?>">更多分类&gt;&gt;</a></div>
                </div>


            </div>
        </section>
        <!--mod_tab end-->
        <!--mod_tab begin-->

        <section class="mod_book">
            <div class="hd"><h3>微信活动推荐</h3></div>
            <div class="bd">
                <div class="topic_img"><a href="" target="_blank"><img src="./resource/images/active.jpg" /></a></div>
                <ul class="book_textListf">
                    <?php  if(is_array($active)) { foreach($active as $key => $one) { ?>
                    <li><a href="<?php  echo url('public/active' ,array('id'=>$one['uniacid']))?>" title="<?php  echo $one['name'];?>{one['title']}"><?php  echo $one['title'];?></a></li>
                    <?php  } } ?>
                    <?php  if(!$active) { ?>
                    <li><a href="#" title="暂无活动推荐">暂无活动推荐</a></li>
                    <?php  } ?>
                </ul>
                <?php  if($active) { ?>
                <div class="listMore"><a href="<?php  echo url('public/active')?>" title="微信生意通更多活动" target="_blank">更多微信活动&gt;&gt;</a></div>
                <?php  } ?>
            </div>
        </section>
    </div>
    <div class="push"></div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('comm/footer', TEMPLATE_INCLUDEPATH)) : (include template('comm/footer', TEMPLATE_INCLUDEPATH));?>
<script src="./resource/js/jquery.tabs.js"></script>
<script>
    $(function(){

        $('.tab3').Tabs({
            event:'click',
            switchBtn : true
        });

        $('.tab2').Tabs({
            event:'click',
            switchBtn : true
        });

        $('.tab1').Tabs({
            event:'click',
            switchBtn : true
        });
        $('.tab0').Tabs({
            event:'click',
            switchBtn : true
        });

    });	
</script>
</body>
</html>
