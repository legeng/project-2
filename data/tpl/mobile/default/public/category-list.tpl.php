<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
        <meta content="微信生意通-微信公众导航" name="apple-mobile-web-app-title">
        <title>微信公众号搜索列表-微信生意通手机版</title>
        <link rel="stylesheet" href="./resource/css/index.css"></head>
    <body id="xtopjsinfo">

        <div class="wrapper">
            <!--nav end-->
            <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('comm/header', TEMPLATE_INCLUDEPATH)) : (include template('comm/header', TEMPLATE_INCLUDEPATH));?>
            <!--container begin-->
            <div class="container page_search">
                <!-- search_result -->
                <section class="search_result mod_tab">
                <div class="hd">找到<?php  echo $total;?>个包含<em class="spec">"<?php  echo $keyword;?>"</em>微信号</div>
                <div class="bd">
                    <div class="tabCon">
                        <ul class="imgTxt_list">
                            <?php  if(is_array($list)) { foreach($list as $one) { ?>
                            <li>
                            <a href="<?php  echo url('public/category' ,array('id'=>$one['uniacid']))?>" title="<?php  echo $one['name'];?>">
                                <div class="imgBox">
                                    <img src="<?php  echo $one['attachurl'];?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" ></div>
                                <div class="info">
                                    <h3><span class="space"><em class="red"><?php  echo $one['name'];?></em></span><i class="i_original">原创</i></h3>
                                    <p class="b-info"><span class="author">微信号：<?php  echo $one['details'][$one['uniacid']]['account'];?></span><span class="num">关注：<?php  echo $one['scan_count'];?></span></p>
                                    <p class="b-info"><span class="author">分&nbsp;&nbsp;&nbsp;&nbsp;类：<?php  echo $one['industry_parent'];?></span><span class="num"><?php  echo $one['province'];?>&nbsp;&nbsp;<?php  echo $one['city'];?>&nbsp;&nbsp;<?php  echo $one['district'];?></span></p>
                                </div>
                            </a>
                            </li>
                            <?php  } } ?>
                        </ul>

                    </div>
                    <div class="bdpage"><?php  echo $pager;?> </div>
                </div>

                </section>

            </div>
            <!--push place-->
            <div class="push"></div>

        </div>
        <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('comm/footer', TEMPLATE_INCLUDEPATH)) : (include template('comm/footer', TEMPLATE_INCLUDEPATH));?>


</body></html>
