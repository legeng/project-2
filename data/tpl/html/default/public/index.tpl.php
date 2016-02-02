<?php defined('IN_IA') or exit('Access Denied');?>﻿<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php  echo $_W['config']['siteinfo']['title'];?></title>
        <meta name="keywords" content="<?php  echo $_W['config']['siteinfo']['keywords'];?>" />
        <meta name="description" content="<?php  echo $_W['config']['siteinfo']['description'];?>" />
        <meta name="baidu_union_verify" content="c0c858c0137cab7fe81514d036c5d0fc">
        <link href="./resource/css/base.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" type="image/x-icon" href="./resource/images/favicon.ico" />
        <script src="./resource/js/lib/jquery-1.11.1.min.js"></script>
        <script src="./resource/js/focus.js"></script>
    </head>
    <body>
        <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
        <div class="isban-body">
            <div class="isban-box">
                <div class="adbantext">
                    <h1>已有<?php  echo $total;?>8个公众号入驻微信生意通</h1>
                    <p>
                        <?php  if(is_array($list0)) { foreach($list0 as $one) { ?>
                        <a href="<?php  echo url('public/category',array('id'=>$one['uniacid'],'key'=>$one['industry_parent']))?>" target="_blank" title="<?php  echo $one['name'];?>"><?php  echo $one['name'];?></a>
                        <?php  } } ?>
                    </p>
                </div>
                <form action="<?php  echo url('public/search');?>" method="post" name="searchform" target="_parent" id="searchform" onsubmit="if(document.getElementById('keyboard').value == '' || document.getElementById('keyboard').value == '请输入关键字查询'){;document.getElementById('keyboard').value='';document.getElementById('keyboard').focus();return false;};">
                    <div class="sbox">
                        <div class="sleft"><input name="key" type="text" class="inc" id="keyboard" title="请输入关键字" onblur="if(this.value == '')this.value='请输入关键字查询';" onclick="if(this.value == '请输入关键字查询')this.value='';" value="请输入关键字查询" placeholder="请输入关键字查询"/></div>
                        <div class="sright"><input name="submit" type="submit" id="keyboard" class="butp_a" value="搜索"/></div>
                    </div>
                </form>
                <div class="chell"><a href="<?php  echo url('public/hot');?>" title="浏览热门微信">浏览热门微信</a><a href="<?php  echo url('public/list');?>" title="浏览最新微信">浏览最新微信</a></div>
            </div>
        </div>
        <div class="iitui-body">
            <div class="iitui-box">
                <div class="itit-box">
                    <div class="ileft">
                        <div class="ihtit">精品微信公众号(一)</div>
                        <div class="istit">精品微信公众号推荐 →</div>
                    </div>
                    <div class="iimdd">★★★★★ 请熟记本站域名 weixinsyt.com &nbsp;&nbsp;&nbsp;&nbsp;站长QQ：3111319984</div>
                    <div class="iright"><b class="button_bs"><a href="<?php  echo url('public/advert');?>" title="我也要上首页">我也要上首页</a></b></div>
                </div>
                <div class="iitui-class">
                    <ul>
                        <?php  if(is_array($list1)) { foreach($list1 as $one) { ?>
                        <li><a href="<?php  echo url('public/category',array('id'=>$one['uniacid'],'key'=>$one['industry_parent']))?>" target="_blank" title="<?php  echo $one['name'];?>"><img src="<?php  echo $_W['attachurl'];?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" title="<?php  echo $one['name'];?>" /><p><?php  echo $one['name'];?></p></a></li>
                        <?php  } } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="iitui-body bgf">
            <div class="iitui-box">
                <div class="itit-box" style="margin-bottom:20px;">
                    <div class="ileft">
                        <div class="ihtit">精品微信公众号(二)</div>
                        <div class="istit">微信微信公众号推荐 →</div>
                    </div>
                    <div class="iimdd">★★★★★ 请熟记本站域名 weixinsyt.com &nbsp;&nbsp;&nbsp;&nbsp;站长QQ：3111319984</div>
                    <div class="iright"><b class="button_bs"><a href="<?php  echo url('public/submit');?>" title="微信免费提交">微信免费提交</a></b></div>
                </div>
                <?php  if(is_array($list2)) { foreach($list2 as $key => $one) { ?>
                <div class="zii-body">
                    <div class="ziitit"><a href="<?php  echo url('public/category',array('key'=>$keyword[$key]));?>" target="_blank" title="<?php  echo $keyword[$key];?>"><?php  echo $keyword[$key];?></a></div>
                    <div class="ziiclass">
                        <ul>
                            <?php  if(is_array($one)) { foreach($one as $two) { ?>
                            <li><a href="<?php  echo url('public/category',array('id'=>$two['uniacid'],'key'=>$two['industry_parent']));?>" target="_blank" title="<?php  echo $two['name'];?>"><?php  echo cutstr($two['name'],6,'utf-8');?></a></li>
                            <?php  } } ?>
                        </ul>
                    </div>
                    <div class="ziimore"><a href="<?php  echo url('public/category',array('key'=>$keyword[$key]));?>" target="_blank" title="<?php  echo $keyword[$key];?>">更多</a></div>
                </div>
                <?php  } } ?>
        </div>
        <div class="iitui-body">
            <div class="iitui-box" style="height:auto;">
                <div class="itit-box">
                    <div class="ileftzd">
                        <div class="ihtit">精品微信公众号(三)</div>
                        <div class="istit">精品微信公众号推荐 ↓OR →</div>
                        <div class="ileftad">
                            <div class="global_focusBox"> 
                                <div class="focusBox">
                                    <ul class="pic"> 
                                        <?php  if(is_array($l_list3)) { foreach($l_list3 as $one) { ?>
                                        <li><a href="<?php  echo url('public/category',array('id'=>$one['uniacid'],'key'=>$one['industry_parent']))?>" title="" target="_blank"><img src="<?php  echo $_W['attachurl'];?><?php  echo $one['uniacid'];?>/qrcode_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" title="<?php  echo $one['name'];?>" /></a></li>
                                        <?php  } } ?>
                                    </ul>
                                    <div class="txt-bg"></div>
                                    <div class="txt">
                                        <ul> 
                                            <?php  if(is_array($l_list3)) { foreach($l_list3 as $one) { ?>
                                            <li><a href="<?php  echo url('public/category',array('id'=>$one['uniacid'],'key'=>$one['industry_parent']))?>" title="<?php  echo $one['name'];?>" target="_blank"><?php  echo $one['name'];?></a></li>
                                            <?php  } } ?>
                                        </ul>
                                    </div>
                                    <ul class="num">
                                        <?php  if(is_array($l_list3)) { foreach($l_list3 as $key => $one) { ?>
                                        <li><a><?php  echo $key+1?></a><span></span></li>
                                        <?php  } } ?>
                                    </ul>
                                    <script type="text/javascript">jQuery(".focusBox").slide({titCell:".num li",mainCell:".pic",effect:"fold",autoPlay:true,trigger:"click",startFun:function(i){jQuery(".focusBox .txt li").eq(i).animate({"bottom":0}).siblings().animate({"bottom":-36});}});</script> 
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="irightzd">
                        <div class="izdtj-class">
                            <ul>
                                <?php  if(is_array($r_list3)) { foreach($r_list3 as $one) { ?>
                                <li><a href="<?php  echo url('public/category',array('id'=>$one['uniacid'],'key'=>$one['industry_parent']))?>" target="_blank" title="<?php  echo $one['name'];?>"><img src="<?php  echo $_W['attachurl'];?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" title="<?php  echo $one['name'];?>" /><p><?php  echo cutstr($one['name'],8)?></p></a></li>
                                <?php  } } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="iitui-body" style="background:none;">
            <div class="iitui-box" style="height:auto;">
                <div class="itit-box">
                    <div class="ileftzd">
                        <div class="ihtit">精品微信公众号(四)</div>
                        <div class="istit">精品微信公众号推荐 ↓OR →</div>
                        <div class="ileftad">
                            <div class="clun-class">
                                <ul>
                                    <?php  if(is_array($l_list4)) { foreach($l_list4 as $one) { ?>
                                    <li><a href="<?php  echo url('public/category',array('id'=>$one['uniacid'],'key'=>$one['industry_parent']));?>" target="_blank" title="<?php  echo $one['name'];?>"><?php  echo $one['name'];?></a></li>
                                    <?php  } } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="irightzd">
                        <div class="izdtj-class">
                            <ul>
                                <?php  if(is_array($r_list4)) { foreach($r_list4 as $one) { ?>
                                <li><a href="<?php  echo url('public/category',array('id'=>$one['uniacid'],'key'=>$one['industry_parent']))?>" target="_blank" title="<?php  echo $one['name'];?>"><img src="<?php  echo $_W['attachurl'];?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" title="<?php  echo $one['name'];?>" /><p><?php  echo $one['name'];?></p></a></li>
                                <?php  } } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="inew-body" id="wxnews">
            <div class="inew-box inew-mr">
                <div class="content">
                    <h3>微信公众号推广</h3>
                    <dl class="channel">
                        <dd><a href="<?php  echo url('public/article/more');?>" target="_blank" title="更多文章">更多</a></dd>
                    </dl>
                    <div class="inew-class">
                        <ul>
                            <?php  if(is_array($a_article)) { foreach($a_article as $one) { ?> 
                            <li><a href="<?php  echo url('public/article',array('id'=>$one['id']));?>" target="_blank" title="<?php  echo $one['title'];?>"><?php  echo $one['title'];?></a></li>
                            <?php  } } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="inew-box inew-mr">
                <div class="content">
                    <h3>微信公众号前景</h3>
                    <dl class="channel">
                        <dd><a href="<?php  echo url('public/article/more');?>" target="_blank" title="更多文章">更多</a></dd>
                    </dl>
                    <div class="inew-class">
                        <ul>
                            <?php  if(is_array($b_article)) { foreach($b_article as $one) { ?> 
                            <li><a href="<?php  echo url('public/article',array('id'=>$one['id']));?>" target="_blank" title="<?php  echo $one['title'];?>"><?php  echo $one['title'];?></a></li>
                            <?php  } } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="inew-box">
                <div class="content">
                    <h3>网络热文章分享</h3>
                    <dl class="channel">
                        <dd><a href="<?php  echo url('public/article/more');?>" target="_blank" title="更多文章">更多</a></dd>
                    </dl>
                    <div class="inew-class">
                        <ul>
                            <?php  if(is_array($c_article)) { foreach($c_article as $one) { ?> 
                            <li><a href="<?php  echo url('public/article',array('id'=>$one['id']));?>" target="_blank" title="<?php  echo $one['title'];?>"><?php  echo $one['title'];?></a></li>
                            <?php  } } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
<div class="inew-body">
    <div class="inew-box inew-mr">
        <div class="contentimg">
            <div class="zaoub-l"><a href="https://wx.qq.com/" target="_blank"><img src="./resource/images/yuu-pi1.png" width="140" height="119" alt="微信网页版" title="微信网页版" /></a></div>
            <div class="zaoub-r">
                <p><b>微信网页版</b></p>
                <p><span>微信网页版与微信手机版同步发送和收取信息，扫一扫二维码，就能用浏览器上微信。微信，不只是一个聊天工具。</span></p>
            </div>
        </div>
    </div>
    <div class="inew-box inew-mr">
        <div class="contentimg">
            <div class="zaoub-l"><a href="http://weixin.qq.com" target="_blank" title="微信手机版"><img src="./resource/images/yuu-pi2.png" width="140" height="119" alt="微信手机版" title="微信手机版"/></a></div>
            <div class="zaoub-r">
                <p><b>微信手机版</b></p>
                <div class="iiwxdown">
                    <ul>
                        <li><a href="http://weixin.qq.com/" target="_blank" title="微信iPhone 6.2.4正式版发布">微信iPhone 6.2.4正式版发布</a></li>
                        <li><a href="http://weixin.qq.com/" target="_blank" title="微信6.2.4安卓正式版发布">微信6.2.4安卓正式版发布</a></li></ul>
                        <li><a href="http://weixin.qq.com/" target="_blank" title="微信更多下载">微信更多下载>></a></li></ul>
                </div>
            </div>
        </div>
    </div>
    <div class="inew-box">
        <div class="contentimg">
            <div class="zaoub-l"><a href="https://mp.weixin.qq.com/" target="_blank" title="微信公众平台"><img src="./resource/images/yuu-pi3.png" width="140" height="119" alt="微信公众平台" title="微信公众平台"/></a></div>
            <div class="zaoub-r">
                <p><b>公众平台登录</b></p>
                <p><span>再小的产品，也有自己的品牌！</span></p>
                <div class="iilink-class">
                    <ul>
                        <li><a href="https://mp.weixin.qq.com/cgi-bin/readtemplate?t=register/step1_tmpl&lang=zh_CN" target="_blank" title="微信公众平台注册">免费注册</a></li>
                        <li><a href="https://mp.weixin.qq.com/" target="_blank" title="微信公众平台登录">登录</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--baidu button begin-->
<script type="text/javascript" id="bdshare_js" data="type=slide&amp;img=1&amp;pos=right&amp;uid=742298" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
    document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000);
</script>
<!--baidu button end-->
<script src="./resource/js/scrolltopcontrol.js"></script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
</body>
</html>
