<?php defined('IN_IA') or exit('Access Denied');?>﻿<!DOCTYPE html>
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
        <div class="wxpoe wr">
            <h3>生活微信公众账号</h3>
            <dl class="channel">
                <dd><a href="<?php  echo url('public/category',array('key'=>'生活'));?>" target="_blank">更多</a></dd>
            </dl>
            <div class="content">
                <div class="wxpoe-class">
                    <ul>
                        <?php  if(is_array($list['0'])) { foreach($list['0'] as $one) { ?>
                        <li><a href="<?php  echo url('public/category',array('id'=>$one['uniacid'],'key'=>$one['industry_parent']))?>" target="_blank" title="<?php  echo $name;?>"><img src="<?php  echo $attachurl;?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" title="<?php  echo $one['name'];?>"/><p><?php  echo $one['name'];?></p></a></li>
                        <?php  } } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="wxpoe">
            <h3>美食微信公众账号</h3>
            <dl class="channel">
                <dd><a href="<?php  echo url('public/category',array('key'=>'美食'));?>" target="_blank">更多</a></dd>
            </dl>
            <div class="content">
                <div class="wxpoe-class">
                    <ul>
                        <?php  if(is_array($list['1'])) { foreach($list['1'] as $one) { ?>
                        <li><a href="<?php  echo url('public/category',array('id'=>$one['uniacid'],'key'=>$one['industry_parent']))?>" target="_blank" title="<?php  echo $name;?>"><img src="<?php  echo $attachurl;?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" title="<?php  echo $one['name'];?>"/><p><?php  echo $one['name'];?></p></a></li>
                        <?php  } } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="wxpoe wr">
            <h3>娱乐微信公众账号</h3>
            <dl class="channel">
                <dd><a href="<?php  echo url('public/category',array('key'=>'娱乐'));?>" target="_blank">更多</a></dd>
            </dl>
            <div class="content">
                <div class="wxpoe-class">
                    <ul>
                        <?php  if(is_array($list['2'])) { foreach($list['2'] as $one) { ?>
                        <li><a href="<?php  echo url('public/category',array('id'=>$one['uniacid'],'key'=>$one['industry_parent']))?>" target="_blank" title="<?php  echo $name;?>"><img src="<?php  echo $attachurl;?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" title="<?php  echo $one['name'];?>"/><p><?php  echo $one['name'];?></p></a></li>
                        <?php  } } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="wxpoe">
            <h3>购物微信公众账号</h3>
            <dl class="channel">
                <dd><a href="<?php  echo url('public/category',array('key'=>'购物'));?>" target="_blank">更多</a></dd>
            </dl>
            <div class="content">
                <div class="wxpoe-class">
                    <ul>
                        <?php  if(is_array($list['3'])) { foreach($list['3'] as $one) { ?>
                        <li><a href="<?php  echo url('public/category',array('id'=>$one['uniacid'],'key'=>$one['industry_parent']))?>" target="_blank" title="<?php  echo $name;?>"><img src="<?php  echo $attachurl;?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" title="<?php  echo $one['name'];?>"/><p><?php  echo $one['name'];?></p></a></li>
                        <?php  } } ?>
                    </ul>
                </div>
            </div>
        </div>
        <!--<div class="idaloo">
            <div class="idal"> </div>
            <div class="idar"></div>
        </div>-->
        <div class="wxpoe wr">
            <h3>丽人微信公众账号</h3>
            <dl class="channel">
                <dd><a href="<?php  echo url('public/category',array('key'=>'丽人'));?>" target="_blank">更多</a></dd>
            </dl>
            <div class="content">
                <div class="wxpoe-class">
                    <ul>
                        <?php  if(is_array($list['4'])) { foreach($list['4'] as $one) { ?>
                        <li><a href="<?php  echo url('public/category',array('id'=>$one['uniacid'],'key'=>$one['industry_parent']))?>" target="_blank" title="<?php  echo $name;?>"><img src="<?php  echo $attachurl;?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" title="<?php  echo $one['name'];?>"/><p><?php  echo $one['name'];?></p></a></li>
                        <?php  } } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="wxpoe">
            <h3>结婚微信公众账号</h3>
            <dl class="channel">
                <dd><a href="<?php  echo url('public/category',array('key'=>'结婚'));?>" target="_blank">更多</a></dd>
            </dl>
            <div class="content">
                <div class="wxpoe-class">
                    <ul>
                        <?php  if(is_array($list['5'])) { foreach($list['5'] as $one) { ?>
                        <li><a href="<?php  echo url('public/category',array('id'=>$one['uniacid'],'key'=>$one['industry_parent']))?>" target="_blank" title="<?php  echo $name;?>"><img src="<?php  echo $attachurl;?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" title="<?php  echo $one['name'];?>"/><p><?php  echo $one['name'];?></p></a></li>
                        <?php  } } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="wxpoe wr">
            <h3>亲子微信公众账号</h3>
            <dl class="channel">
                <dd><a href="<?php  echo url('public/category',array('key'=>'亲子'));?>" target="_blank">更多</a></dd>
            </dl>
            <div class="content">
                <div class="wxpoe-class">
                    <ul>
                        <?php  if(is_array($list['6'])) { foreach($list['6'] as $one) { ?>
                        <li><a href="<?php  echo url('public/category',array('id'=>$one['uniacid'],'key'=>$one['industry_parent']))?>" target="_blank" title="<?php  echo $name;?>"><img src="<?php  echo $attachurl;?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" title="<?php  echo $one['name'];?>"/><p><?php  echo $one['name'];?></p></a></li>
                        <?php  } } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="wxpoe">
            <h3>运动微信公众账号</h3>
            <dl class="channel">
                <dd><a href="<?php  echo url('public/category',array('key'=>'运动'));?>" target="_blank">更多</a></dd>
            </dl>
            <div class="content">
                <div class="wxpoe-class">
                    <ul>
                        <?php  if(is_array($list['7'])) { foreach($list['7'] as $one) { ?>
                        <li><a href="<?php  echo url('public/category',array('id'=>$one['uniacid'],'key'=>$one['industry_parent']))?>" target="_blank" title="<?php  echo $name;?>"><img src="<?php  echo $attachurl;?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" title="<?php  echo $one['name'];?>"/><p><?php  echo $one['name'];?></p></a></li>
                        <?php  } } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="wxpoe wr">
            <h3>酒店微信公众账号</h3>
            <dl class="channel">
                <dd><a href="<?php  echo url('public/category',array('key'=>'酒店'));?>" target="_blank">更多</a></dd>
            </dl>
            <div class="content">
                <div class="wxpoe-class">
                    <ul>
                        <?php  if(is_array($list['8'])) { foreach($list['8'] as $one) { ?>
                        <li><a href="<?php  echo url('public/category',array('id'=>$one['uniacid'],'key'=>$one['industry_parent']))?>" target="_blank" title="<?php  echo $name;?>"><img src="<?php  echo $attachurl;?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" title="<?php  echo $one['name'];?>"/><p><?php  echo $one['name'];?></p></a></li>
                        <?php  } } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="wxpoe">
            <h3>汽车微信公众账号</h3>
            <dl class="channel">
                <dd><a href="<?php  echo url('public/category',array('key'=>'汽车'));?>" target="_blank">更多</a></dd>
            </dl>
            <div class="content">
                <div class="wxpoe-class">
                    <ul>
                        <?php  if(is_array($list['9'])) { foreach($list['9'] as $one) { ?>
                        <li><a href="<?php  echo url('public/category',array('id'=>$one['uniacid'],'key'=>$one['industry_parent']))?>" target="_blank" title="<?php  echo $name;?>"><img src="<?php  echo $attachurl;?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" title="<?php  echo $one['name'];?>"/><p><?php  echo $one['name'];?></p></a></li>
                        <?php  } } ?>
                    </ul>
                </div>
            </div>
        </div>
        <!--<div class="idaloo">
            <div class="idal"> </div>
            <div class="idar"></div>
        </div>-->
        <div class="wxpoe wr">
            <h3>工作微信公众账号</h3>
            <dl class="channel">
                <dd><a href="<?php  echo url('public/category',array('key'=>'工作'));?>" target="_blank">更多</a></dd>
            </dl>
            <div class="content">
                <div class="wxpoe-class">
                    <ul>
                        <?php  if(is_array($list['10'])) { foreach($list['10'] as $one) { ?>
                        <li><a href="<?php  echo url('public/category',array('id'=>$one['uniacid'],'key'=>$one['industry_parent']))?>" target="_blank" title="<?php  echo $name;?>"><img src="<?php  echo $attachurl;?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" title="<?php  echo $one['name'];?>"/><p><?php  echo $one['name'];?></p></a></li>
                        <?php  } } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="wxpoe">
            <h3>房产微信公众账号</h3>
            <dl class="channel">
                <dd><a href="<?php  echo url('public/category',array('key'=>'房产'));?>" target="_blank">更多</a></dd>
            </dl>
            <div class="content">
                <div class="wxpoe-class">
                    <ul>
                        <?php  if(is_array($list['11'])) { foreach($list['11'] as $one) { ?>
                        <li><a href="<?php  echo url('public/category',array('id'=>$one['uniacid'],'key'=>$one['industry_parent']))?>" target="_blank" title="<?php  echo $name;?>"><img src="<?php  echo $attachurl;?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" title="<?php  echo $one['name'];?>"/><p><?php  echo $one['name'];?></p></a></li>
                        <?php  } } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="wxpoe wr">
            <h3>教育微信公众账号</h3>
            <dl class="channel">
                <dd><a href="<?php  echo url('public/category',array('key'=>'教育'));?>" target="_blank">更多</a></dd>
            </dl>
            <div class="content">
                <div class="wxpoe-class">
                    <ul>
                        <?php  if(is_array($list['12'])) { foreach($list['12'] as $one) { ?>
                        <li><a href="<?php  echo url('public/category',array('id'=>$one['uniacid'],'key'=>$one['industry_parent']))?>" target="_blank" title="<?php  echo $name;?>"><img src="<?php  echo $attachurl;?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" title="<?php  echo $one['name'];?>"/><p><?php  echo $one['name'];?></p></a></li>
                        <?php  } } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="wxpoe">
            <h3>政务微信公众账号</h3>
            <dl class="channel">
                <dd><a href="<?php  echo url('public/category',array('key'=>'政务'));?>" target="_blank">更多</a></dd>
            </dl>
            <div class="content">
                <div class="wxpoe-class">
                    <ul>
                        <?php  if(is_array($list['13'])) { foreach($list['13'] as $one) { ?>
                        <li><a href="<?php  echo url('public/category',array('id'=>$one['uniacid'],'key'=>$one['industry_parent']))?>" target="_blank" title="<?php  echo $name;?>"><img src="<?php  echo $attachurl;?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" title="<?php  echo $one['name'];?>"/><p><?php  echo $one['name'];?></p></a></li>
                        <?php  } } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="wxpoe wr">
            <h3>新闻微信公众账号</h3>
            <dl class="channel">
                <dd><a href="<?php  echo url('public/category',array('key'=>'新闻'));?>" target="_blank">更多</a></dd>
            </dl>
            <div class="content">
                <div class="wxpoe-class">
                    <ul>
                        <?php  if(is_array($list['14'])) { foreach($list['14'] as $one) { ?>
                        <li><a href="<?php  echo url('public/category',array('id'=>$one['uniacid'],'key'=>$one['industry_parent']))?>" target="_blank" title="<?php  echo $name;?>"><img src="<?php  echo $attachurl;?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" title="<?php  echo $one['name'];?>"/><p><?php  echo $one['name'];?></p></a></li>
                        <?php  } } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="wxpoe">
            <h3>财经微信公众账号</h3>
            <dl class="channel">
                <dd><a href="<?php  echo url('public/category',array('key'=>'财经'));?>" target="_blank">更多</a></dd>
            </dl>
            <div class="content">
                <div class="wxpoe-class">
                    <ul>
                        <?php  if(is_array($list['15'])) { foreach($list['15'] as $one) { ?>
                        <li><a href="<?php  echo url('public/category',array('id'=>$one['uniacid'],'key'=>$one['industry_parent']))?>" target="_blank" title="<?php  echo $name;?>"><img src="<?php  echo $attachurl;?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" title="<?php  echo $one['name'];?>"/><p><?php  echo $one['name'];?></p></a></li>
                        <?php  } } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="wxpoe wr">
            <h3>公司微信公众账号</h3>
            <dl class="channel">
                <dd><a href="<?php  echo url('public/category',array('key'=>'公司'));?>" target="_blank">更多</a></dd>
            </dl>
            <div class="content">
                <div class="wxpoe-class">
                    <ul>
                        <?php  if(is_array($list['16'])) { foreach($list['16'] as $one) { ?>
                        <li><a href="<?php  echo url('public/category',array('id'=>$one['uniacid'],'key'=>$one['industry_parent']))?>" target="_blank" title="<?php  echo $name;?>"><img src="<?php  echo $attachurl;?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" title="<?php  echo $one['name'];?>"/><p><?php  echo $one['name'];?></p></a></li>
                        <?php  } } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="wxpoe">
            <h3>医院微信公众账号</h3>
            <dl class="channel">
                <dd><a href="<?php  echo url('public/category',array('key'=>'医院'));?>" target="_blank">更多</a></dd>
            </dl>
            <div class="content">
                <div class="wxpoe-class">
                    <ul>
                        <?php  if(is_array($list['17'])) { foreach($list['17'] as $one) { ?>
                        <li><a href="<?php  echo url('public/category',array('id'=>$one['uniacid'],'key'=>$one['industry_parent']))?>" target="_blank" title="<?php  echo $name;?>"><img src="<?php  echo $attachurl;?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" title="<?php  echo $one['name'];?>"/><p><?php  echo $one['name'];?></p></a></li>
                        <?php  } } ?>
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
<script src="./resource/js/lib/jquery-1.11.1.min.js"></script><script src="./resource/js/scrolltopcontrol.js"></script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
</body>
</html>
