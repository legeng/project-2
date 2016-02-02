<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta charset="gbk">
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
        <meta content="微信公众号排行榜" name="apple-mobile-web-app-title">
        <title>微信公众号排行榜-微信生意通手机端</title>
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
                <section class="mod_tab tab3">
                <div class="tabNav">
                    <li class="cur">最新收录榜</li>
                    <li>关注排行榜</li>
                    <li>综合排行榜</li>
                </div>
                <div class="tabCon">
                    <div>
                        <ul class="book_textList rank_list">
                            <?php  if(is_array($account1)) { foreach($account1 as $one) { ?> 
                            <li> <a href="<?php  echo url('public/category' ,array('id'=>$one['uniacid']))?>" title="<?php  echo $one['name'];?>" class="fired">
                                <img src="<?php  echo $_W['attachurl'];?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" class="imgthumb" width="60" height="60"/>
                                <h3 class="ui-li-heading"><?php  echo $one['name'];?></h3>
                                <p class="ui-li-desc"><?php  echo $one['industry_parent'];?>&nbsp;&nbsp;<?php  echo $one['scan_count'];?>人关注</p>
                            </a>
                            <span><a href="<?php  echo url('public/category' ,array('id'=>$one['uniacid']))?>" target="_blank">+&nbsp;关注</a></span>
                            </li>
                            <?php  } } ?>
                        </ul>
                    </div>

                    <div class="hide">
                        <ul class="book_textList rank_list">
                            <?php  if(is_array($account2)) { foreach($account2 as $one) { ?> 
                            <li> <a href="<?php  echo url('public/category' ,array('id'=>$one['uniacid']))?>" title="<?php  echo $one['name'];?>" class="fired">
                                <img src="<?php  echo $_W['attachurl'];?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" class="imgthumb" width="60" height="60"/>
                                <h3 class="ui-li-heading"><?php  echo $one['name'];?></h3>
                                <p class="ui-li-desc"><?php  echo $one['industry_parent'];?>&nbsp;&nbsp;<?php  echo $one['scan_count'];?>人关注</p>
                            </a>
                            <span><a href="<?php  echo url('public/category' ,array('id'=>$one['uniacid']))?>" target="_blank">+&nbsp;关注</a></span>
                            </li>
                            <?php  } } ?>
                        </ul>
                    </div>

                    <div class="hide">
                        <ul class="book_textList rank_list">
                            <?php  if(is_array($account3)) { foreach($account3 as $one) { ?> 
                            <li> <a href="<?php  echo url('public/category' ,array('id'=>$one['uniacid']))?>" title="<?php  echo $one['name'];?>" class="fired">
                                <img src="<?php  echo $_W['attachurl'];?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" class="imgthumb" width="60" height="60"/>
                                <h3 class="ui-li-heading"><?php  echo $one['name'];?></h3>
                                <p class="ui-li-desc"><?php  echo $one['industry_parent'];?>&nbsp;&nbsp;<?php  echo $one['scan_count'];?>人关注</p>
                            </a>
                            <span><a href="<?php  echo url('public/category' ,array('id'=>$one['uniacid']))?>" target="_blank">+&nbsp;关注</a></span>
                            </li>
                            <?php  } } ?>
                        </ul>
                    </div>
                </div>
                </section>
            </div>
            <div class="push"></div>
        </div>

        <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('comm/footer', TEMPLATE_INCLUDEPATH)) : (include template('comm/footer', TEMPLATE_INCLUDEPATH));?>
        <script src="./resource/js/lib/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script src="./resource/js/jquery.tabs.js"></script>
        <script>
            $(function(){

            $('.tab3').Tabs({
                event:'click',
                switchBtn : true
            });


        });	
    </script>
</body>
            </html>
