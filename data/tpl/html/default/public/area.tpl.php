<?php defined('IN_IA') or exit('Access Denied');?>﻿<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php  echo $_W['config']['siteinfo']['title'];?></title>
        <meta name="keywords" content="<?php  echo $_W['config']['siteinfo']['keywords'];?>" />
        <meta name="description" content="<?php  echo $_W['config']['siteinfo']['description'];?>" />
        <link href="./resource/css/base.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" type="image/x-icon" href="./resource/./resource/images/favicon.ico" />
    </head>
<body>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header-gw', TEMPLATE_INCLUDEPATH)) : (include template('common/header-gw', TEMPLATE_INCLUDEPATH));?>
<div class="iiin-body">
    <div class="iiin-box">
        <div class="iasil">
            <div class="iucon">
                <div class="content" style="margin-bottom:20px;">
                    <div class="wxclass">
                        <h2>按类型</h2>
                        <div class="clx">
                            <ul>
                                <li><a href="<?php  echo url('public/category',array('keywords'=>'生活'));?>" title="生活">生活</a></li>
                                <li><a href="<?php  echo url('public/category',array('keyboard'=>'美食'));?>" title="美食">美食</a></li>
                                <li><a href="<?php  echo url('public/category',array('keyboard'=>'娱乐'));?>" title="娱乐">娱乐</a></li>
                                <li><a href="<?php  echo url('public/category',array('keyboard'=>'购物'));?>" title="购物">购物</a></li>
                                <li><a href="<?php  echo url('public/category',array('keyboard'=>'丽人'));?>" title="丽人">丽人</a></li>
                                <li><a href="<?php  echo url('public/category',array('keyboard'=>'结婚'));?>" title="结婚">结婚</a></li>
                                <li><a href="<?php  echo url('public/category',array('keyboard'=>'亲子'));?>" title="亲子">亲子</a></li>
                                <li><a href="<?php  echo url('public/category',array('keyboard'=>'运动'));?>" title="运动">运动</a></li>
                                <li><a href="<?php  echo url('public/category',array('keyboard'=>'酒店'));?>" title="酒店">酒店</a></li>
                                <li><a href="<?php  echo url('public/category',array('keyboard'=>'汽车'));?>" title="汽车">汽车</a></li>
                                <li><a href="<?php  echo url('public/category',array('keyboard'=>'工作'));?>" title="工作">工作</a></li>
                                <li><a href="<?php  echo url('public/category',array('keyboard'=>'房产'));?>" title="房产">房产</a></li>
                                <li><a href="<?php  echo url('public/category',array('keyboard'=>'教育'));?>" title="教育">教育</a></li>
                                <li><a href="<?php  echo url('public/category',array('keyboard'=>'政务'));?>" title="政务">政务</a></li>
                                <li><a href="<?php  echo url('public/category',array('keyboard'=>'新闻'));?>" title="新闻">新闻</a></li>
                                <li><a href="<?php  echo url('public/category',array('keyboard'=>'财经'));?>" title="财经">财经</a></li>
                                <li><a href="<?php  echo url('public/category',array('keyboard'=>'公司'));?>" title="公司">公司</a></li>
                                <li><a href="<?php  echo url('public/category',array('keyboard'=>'医院'));?>" title="医院">医院</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="wxclass">
                        <h2>按地区</h2>
                        <div class="dxclq">
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'北京市'));?>" target="_blank" ><img src="./resource/images/iw/Area-beijing.png" width="45" height="45" /></a> </p><p class="delimiter"></p>
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'天津市'));?>" target="_blank" ><img src="./resource/images/iw/Area-tianjin.png" width="45" height="45" /></a></p><p class="delimiter"></p>
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'上海市'));?>" target="_blank" ><img src="./resource/images/iw/Area-shanghai.png" width="45" height="45" /></a></p><p class="delimiter"></p>
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'重庆市'));?>" target="_blank" ><img src="./resource/images/iw/Area-cox.png" width="45" height="45" /></a></p><p class="delimiter"></p>
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'台湾'));?>" target="_blank" ><img src="./resource/images/iw/Area-taiwan.png" width="45" height="45" /></a></p><p class="delimiter"></p>
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'香港'));?>" target="_blank" ><img src="./resource/images/iw/Area-hongkong.png" width="45" height="45" /></a></p><p class="delimiter"></p>
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'澳门'));?>" target="_blank" ><img src="./resource/images/iw/Area-mac.png" width="45" height="45" /></a></p>
                        </div>
                        <div class="dxclq">
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'安徽省'));?>" target="_blank"><img src="./resource/images/iw/Area-anhui.png" width="45" height="45" /></a></p>
                            <div class="shengs">
                                <div class="clb">
                                    <ul>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'安庆市'));?>" target="_blank">安庆市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'蚌埠市'));?>" target="_blank">蚌埠市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'巢湖市'));?>" target="_blank">巢湖市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'池州市'));?>" target="_blank">池州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'滁州市'));?>" target="_blank">滁州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'阜阳市'));?>" target="_blank">阜阳市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'淮北市'));?>" target="_blank">淮北市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'淮南市'));?>" target="_blank">淮南市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'黄山市'));?>" target="_blank">黄山市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'六安市'));?>" target="_blank">六安市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'马鞍山市'));?>" target="_blank">马鞍山市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'宿州市'));?>" target="_blank">宿州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'铜陵市'));?>" target="_blank">铜陵市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'芜湖市'));?>" target="_blank">芜湖市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'宣城市'));?>" target="_blank">宣城市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'亳州市'));?>" target="_blank">亳州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'合肥市'));?>" target="_blank">合肥市</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="dxclq">
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'福建省'));?>" target="_blank"><img src="./resource/images/iw/Area-fujian.png" width="45" height="45" /></a></p>
                            <div class="shengs">
                                <div class="clb">
                                    <ul>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'福州市'));?>" target="_blank">福州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'龙岩市'));?>" target="_blank">龙岩市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'南平市'));?>" target="_blank">南平市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'宁德市'));?>" target="_blank">宁德市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'莆田市'));?>" target="_blank">莆田市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'泉州市'));?>" target="_blank">泉州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'三明市'));?>" target="_blank">三明市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'厦门市'));?>" target="_blank">厦门市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'漳州市'));?>" target="_blank">漳州市</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="dxclq">
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'甘肃省'));?>" target="_blank"><img src="./resource/images/iw/Area-gans.png" width="45" height="45" /></a></p>
                            <div class="shengs">
                                <div class="clb">
                                    <ul>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'兰州市'));?>" target="_blank">兰州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'定西市'));?>" target="_blank">定西市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'甘南'));?>" target="_blank">甘南</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'嘉峪关市'));?>" target="_blank">嘉峪关市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'金昌市'));?>" target="_blank">金昌市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'酒泉市'));?>" target="_blank">酒泉市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'临夏'));?>" target="_blank">临夏</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'陇南市'));?>" target="_blank">陇南市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'平凉市'));?>" target="_blank">平凉市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'庆阳市'));?>" target="_blank">庆阳市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'天水市'));?>" target="_blank">天水市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'武威市'));?>" target="_blank">武威市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'张掖市'));?>" target="_blank">张掖市</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="dxclq">
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'广东省'));?>" target="_blank"><img src="./resource/images/iw/Area-guangdong.png" width="45" height="45" /></a></p>
                            <div class="shengs">
                                <div class="clb">
                                    <ul>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'广州市'));?>" target="_blank">广州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'深圳市'));?>" target="_blank">深圳市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'潮州市'));?>" target="_blank">潮州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'东莞市'));?>" target="_blank">东莞市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'佛山市'));?>" target="_blank">佛山市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'河源市'));?>" target="_blank">河源市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'惠州市'));?>" target="_blank">惠州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'江门市'));?>" target="_blank">江门市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'揭阳市'));?>" target="_blank">揭阳市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'茂名市'));?>" target="_blank">茂名市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'梅州市'));?>" target="_blank">梅州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'清远市'));?>" target="_blank">清远市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'汕头市'));?>" target="_blank">汕头市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'汕尾市'));?>" target="_blank">汕尾市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'韶关市'));?>" target="_blank">韶关市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'阳江市'));?>" target="_blank">阳江市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'云浮市'));?>" target="_blank">云浮市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'湛江市'));?>" target="_blank">湛江市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'肇庆市'));?>" target="_blank">肇庆市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'中山市'));?>" target="_blank">中山市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'珠海市'));?>" target="_blank">珠海市</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="dxclq">
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'广西'));?>" target="_blank"><img src="./resource/images/iw/Area-guangxi.png" width="45" height="45" /></a></p>
                            <div class="shengs">
                                <div class="clb">
                                    <ul>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'南宁市'));?>" target="_blank">南宁市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'桂林市'));?>" target="_blank">桂林市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'百色市'));?>" target="_blank">百色市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'北海市'));?>" target="_blank">北海市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'崇左市'));?>" target="_blank">崇左市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'防城港市'));?>" target="_blank">防城港市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'贵港市'));?>" target="_blank">贵港市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'河池市'));?>" target="_blank">河池市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'贺州市'));?>" target="_blank">贺州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'来宾市'));?>" target="_blank">来宾市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'柳州市'));?>" target="_blank">柳州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'钦州市'));?>" target="_blank">钦州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'梧州市'));?>" target="_blank">梧州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'玉林市'));?>" target="_blank">玉林市</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="dxclq">
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'贵州省'));?>" target="_blank"><img src="./resource/images/iw/Area-guiz.png" width="45" height="45" /></a></p>
                            <div class="shengs">
                                <div class="clb">
                                    <ul>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'贵阳市'));?>" target="_blank">贵阳市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'安顺市'));?>" target="_blank">安顺市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'毕节'));?>" target="_blank">毕节</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'六盘水市'));?>" target="_blank">六盘水市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'黔东南'));?>" target="_blank">黔东南</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'黔南'));?>" target="_blank">黔南</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'黔西南'));?>" target="_blank">黔西南</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'铜仁'));?>" target="_blank">铜仁</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'遵义市'));?>" target="_blank">遵义市</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="dxclq">
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'海南省'));?>" target="_blank"><img src="./resource/images/iw/Area-hain.png" width="45" height="45" /></a></p>
                            <div class="shengs">
                                <div class="clb">
                                    <ul>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'海口市'));?>" target="_blank">海口市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'三亚市'));?>" target="_blank">三亚市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'五指山市'));?>" target="_blank">五指山市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'琼海市'));?>" target="_blank">琼海市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'儋州市'));?>" target="_blank">儋州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'文昌市'));?>" target="_blank">文昌市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'万宁市'));?>" target="_blank">万宁市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'东方市'));?>" target="_blank">东方市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'白沙'));?>" target="_blank">白沙</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'保亭'));?>" target="_blank">保亭</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'昌江'));?>" target="_blank">昌江</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'澄迈'));?>" target="_blank">澄迈</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'定安'));?>" target="_blank">定安</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'乐东'));?>" target="_blank">乐东</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'临高'));?>" target="_blank">临高</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'陵水'));?>" target="_blank">陵水</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'琼中'));?>" target="_blank">琼中</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'屯昌'));?>" target="_blank">屯昌</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="dxclq">
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'河北省'));?>" target="_blank"><img src="./resource/images/iw/Area-hebei.png" width="45" height="45" /></a></p>
                            <div class="shengs">
                                <div class="clb">
                                    <ul>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'石家庄市'));?>" target="_blank">石家庄市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'保定市'));?>" target="_blank">保定市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'沧州市'));?>" target="_blank">沧州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'承德市'));?>" target="_blank">承德市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'邯郸市'));?>" target="_blank">邯郸市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'衡水市'));?>" target="_blank">衡水市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'廊坊市'));?>" target="_blank">廊坊市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'秦皇岛市'));?>" target="_blank">秦皇岛市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'唐山市'));?>" target="_blank">唐山市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'邢台市'));?>" target="_blank">邢台市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'张家口市'));?>" target="_blank">张家口市</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="dxclq">
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'河南省'));?>" target="_blank"><img src="./resource/images/iw/Area-henan.png" width="45" height="45" /></a></p>
                            <div class="shengs">
                                <div class="clb">
                                    <ul>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'郑州市'));?>" target="_blank">郑州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'洛阳市'));?>" target="_blank">洛阳市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'开封市'));?>" target="_blank">开封市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'安阳市'));?>" target="_blank">安阳市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'鹤壁市'));?>" target="_blank">鹤壁市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'济源市'));?>" target="_blank">济源市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'焦作市'));?>" target="_blank">焦作市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'南阳市'));?>" target="_blank">南阳市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'平顶山市'));?>" target="_blank">平顶山市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'三门峡市'));?>" target="_blank">三门峡市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'商丘市'));?>" target="_blank">商丘市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'新乡市'));?>" target="_blank">新乡市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'信阳市'));?>" target="_blank">信阳市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'许昌市'));?>" target="_blank">许昌市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'周口市'));?>" target="_blank">周口市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'驻马店市'));?>" target="_blank">驻马店市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'漯河市'));?>" target="_blank">漯河市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'濮阳市'));?>" target="_blank">濮阳市</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="dxclq">
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'黑龙江省'));?>" target="_blank"><img src="./resource/images/iw/Area-heilj.png" width="45" height="45" /></a></p>
                            <div class="shengs">
                                <div class="clb">
                                    <ul>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'哈尔滨市'));?>" target="_blank">哈尔滨市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'大庆市'));?>" target="_blank">大庆市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'大兴安岭'));?>" target="_blank">大兴安岭</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'鹤岗市'));?>" target="_blank">鹤岗市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'黑河市'));?>" target="_blank">黑河市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'鸡西市'));?>" target="_blank">鸡西市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'佳木斯市'));?>" target="_blank">佳木斯市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'牡丹江市'));?>" target="_blank">牡丹江市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'七台河市'));?>" target="_blank">七台河市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'齐齐哈尔市'));?>" target="_blank">齐齐哈尔市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'双鸭山市'));?>" target="_blank">双鸭山市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'绥化市'));?>" target="_blank">绥化市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'伊春市'));?>" target="_blank">伊春市</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="dxclq">
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'湖北省'));?>" target="_blank"><img src="./resource/images/iw/Area-hubei.png" width="45" height="45" /></a></p>
                            <div class="shengs">
                                <div class="clb">
                                    <ul>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'武汉市'));?>" target="_blank">武汉市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'鄂州市'));?>" target="_blank">鄂州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'黄冈市'));?>" target="_blank">黄冈市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'黄石市'));?>" target="_blank">黄石市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'荆门市'));?>" target="_blank">荆门市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'荆州市'));?>" target="_blank">荆州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'十堰市'));?>" target="_blank">十堰市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'随州市'));?>" target="_blank">随州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'咸宁市'));?>" target="_blank">咸宁市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'襄樊市'));?>" target="_blank">襄樊市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'孝感市'));?>" target="_blank">孝感市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'宜昌市'));?>" target="_blank">宜昌市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'梧州市'));?>" target="_blank">梧州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'恩施市'));?>" target="_blank">恩施市</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="dxclq">
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'湖南省'));?>" target="_blank"><img src="./resource/images/iw/Area-hunan.png" width="45" height="45" /></a></p>
                            <div class="shengs">
                                <div class="clb">
                                    <ul>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'长沙市'));?>" target="_blank">长沙市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'张家界市'));?>" target="_blank">张家界市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'常德市'));?>" target="_blank">常德市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'郴州市'));?>" target="_blank">郴州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'衡阳市'));?>" target="_blank">衡阳市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'怀化市'));?>" target="_blank">怀化市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'娄底市'));?>" target="_blank">娄底市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'邵阳市'));?>" target="_blank">邵阳市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'湘潭市'));?>" target="_blank">湘潭市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'益阳市'));?>" target="_blank">益阳市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'永州市'));?>" target="_blank">永州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'岳阳市'));?>" target="_blank">岳阳市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'株洲市'));?>" target="_blank">株洲市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'湘西'));?>" target="_blank">湘西</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="dxclq">
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'吉林省'));?>" target="_blank"><img src="./resource/images/iw/Area-jilin.png" width="45" height="45" /></a></p>
                            <div class="shengs">
                                <div class="clb">
                                    <ul>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'长春市'));?>" target="_blank">长春市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'吉林市'));?>" target="_blank">吉林市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'白城市'));?>" target="_blank">白城市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'白山市'));?>" target="_blank">白山市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'辽源市'));?>" target="_blank">辽源市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'四平市'));?>" target="_blank">四平市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'松原市'));?>" target="_blank">松原市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'通化市'));?>" target="_blank">通化市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'延边'));?>" target="_blank">延边</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="dxclq">
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'江苏省'));?>" target="_blank"><img src="./resource/images/iw/Area-jiangs.png" width="45" height="45" /></a></p>
                            <div class="shengs">
                                <div class="clb">
                                    <ul>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'南京市'));?>" target="_blank">南京市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'苏州市'));?>" target="_blank">苏州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'无锡市'));?>" target="_blank">无锡市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'常州市'));?>" target="_blank">常州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'淮安市'));?>" target="_blank">淮安市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'连云港市'));?>" target="_blank">连云港市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'南通市'));?>" target="_blank">南通市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'宿迁市'));?>" target="_blank">宿迁市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'泰州市'));?>" target="_blank">泰州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'徐州市'));?>" target="_blank">徐州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'盐城市'));?>" target="_blank">盐城市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'扬州市'));?>" target="_blank">扬州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'镇江市'));?>" target="_blank">镇江市</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="dxclq">
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'江西省'));?>" target="_blank"><img src="./resource/images/iw/Area-jiangxi.png" width="45" height="45" /></a></p>
                            <div class="shengs">
                                <div class="clb">
                                    <ul>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'南昌市'));?>" target="_blank">南昌市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'抚州市'));?>" target="_blank">抚州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'赣州市'));?>" target="_blank">赣州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'吉安市'));?>" target="_blank">吉安市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'景德镇市'));?>" target="_blank">景德镇市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'九江市'));?>" target="_blank">九江市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'萍乡市'));?>" target="_blank">萍乡市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'上饶市'));?>" target="_blank">上饶市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'新余市'));?>" target="_blank">新余市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'宜春市'));?>" target="_blank">宜春市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'鹰潭市'));?>" target="_blank">鹰潭市</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="dxclq">
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'辽宁省'));?>" target="_blank"><img src="./resource/images/iw/Area-liaoning.png" width="45" height="45" /></a></p>
                            <div class="shengs">
                                <div class="clb">
                                    <ul>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'沈阳市'));?>" target="_blank">沈阳市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'大连市'));?>" target="_blank">大连市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'鞍山市'));?>" target="_blank">鞍山市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'本溪市'));?>" target="_blank">本溪市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'朝阳市'));?>" target="_blank">朝阳市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'丹东市'));?>" target="_blank">丹东市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'抚顺市'));?>" target="_blank">抚顺市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'阜新市'));?>" target="_blank">阜新市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'葫芦岛市'));?>" target="_blank">葫芦岛市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'锦州市'));?>" target="_blank">锦州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'辽阳市'));?>" target="_blank">辽阳市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'盘锦市'));?>" target="_blank">盘锦市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'铁岭市'));?>" target="_blank">铁岭市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'营口市'));?>" target="_blank">营口市</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="dxclq">
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'内蒙古'));?>" target="_blank"><img src="./resource/images/iw/Area-neimenggu.png" width="45" height="45" /></a></p>
                            <div class="shengs">
                                <div class="clb">
                                    <ul>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'呼和浩特市'));?>" target="_blank">呼和浩特市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'巴彦淖尔市'));?>" target="_blank">巴彦淖尔市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'包头市'));?>" target="_blank">包头市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'赤峰市'));?>" target="_blank">赤峰市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'鄂尔多斯市'));?>" target="_blank">鄂尔多斯市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'呼伦贝尔市'));?>" target="_blank">呼伦贝尔市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'通辽市'));?>" target="_blank">通辽市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'乌海市'));?>" target="_blank">乌海市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'乌兰察布市'));?>" target="_blank">乌兰察布市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'锡林郭勒盟'));?>" target="_blank">锡林郭勒盟</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'兴安盟'));?>" target="_blank">兴安盟</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'阿拉善盟'));?>" target="_blank">阿拉善盟</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="dxclq">
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'宁夏'));?>" target="_blank"><img src="./resource/images/iw/Area-ningxia.png" width="45" height="45" /></a></p>
                            <div class="shengs">
                                <div class="clb">
                                    <ul>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'银川市'));?>" target="_blank">银川市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'固原市'));?>" target="_blank">固原市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'石嘴山市'));?>" target="_blank">石嘴山市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'吴忠市'));?>" target="_blank">吴忠市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'中卫市'));?>" target="_blank">中卫市</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="dxclq">
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'青海省'));?>" target="_blank"><img src="./resource/images/iw/Area-xinghai.png" width="45" height="45" /></a></p>
                            <div class="shengs">
                                <div class="clb">
                                    <ul>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'西宁市'));?>" target="_blank">西宁市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'果洛'));?>" target="_blank">果洛</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'海北'));?>" target="_blank">海北</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'海东'));?>" target="_blank">海东</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'海南'));?>" target="_blank">海南</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'海西'));?>" target="_blank">海西</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'黄南'));?>" target="_blank">黄南</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'玉树'));?>" target="_blank">玉树</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="dxclq">
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'山东省'));?>" target="_blank"><img src="./resource/images/iw/Area-shuangdong.png" width="45" height="45" /></a></p>
                            <div class="shengs">
                                <div class="clb">
                                    <ul>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'济南市'));?>" target="_blank">济南市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'青岛市'));?>" target="_blank">青岛市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'滨州市'));?>" target="_blank">滨州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'德州市'));?>" target="_blank">德州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'东营市'));?>" target="_blank">东营市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'菏泽市'));?>" target="_blank">菏泽市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'济宁市'));?>" target="_blank">济宁市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'莱芜市'));?>" target="_blank">莱芜市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'聊城市'));?>" target="_blank">聊城市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'临沂市'));?>" target="_blank">临沂市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'日照市'));?>" target="_blank">日照市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'泰安市'));?>" target="_blank">泰安市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'威海市'));?>" target="_blank">威海市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'潍坊市'));?>" target="_blank">潍坊市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'烟台市'));?>" target="_blank">烟台市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'枣庄市'));?>" target="_blank">枣庄市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'淄博市'));?>" target="_blank">淄博市</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="dxclq">
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'山西省'));?>" target="_blank"><img src="./resource/images/iw/Area-shuangxi.png" width="45" height="45" /></a></p>
                            <div class="shengs">
                                <div class="clb">
                                    <ul>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'太原市'));?>" target="_blank">太原市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'长治市'));?>" target="_blank">长治市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'大同市'));?>" target="_blank">大同市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'晋城市'));?>" target="_blank">晋城市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'晋中市'));?>" target="_blank">晋中市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'临汾市'));?>" target="_blank">临汾市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'吕梁市'));?>" target="_blank">吕梁市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'朔州市'));?>" target="_blank">朔州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'忻州市'));?>" target="_blank">忻州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'阳泉市'));?>" target="_blank">阳泉市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'运城市'));?>" target="_blank">运城市</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="dxclq">
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'陕西省'));?>" target="_blank"><img src="./resource/images/iw/Area-sxi.png" width="45" height="45" /></a></p>
                            <div class="shengs">
                                <div class="clb">
                                    <ul>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'西安市'));?>" target="_blank">西安市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'安康市'));?>" target="_blank">安康市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'宝鸡市'));?>" target="_blank">宝鸡市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'汉中市'));?>" target="_blank">汉中市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'商洛市'));?>" target="_blank">商洛市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'铜川市'));?>" target="_blank">铜川市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'渭南市'));?>" target="_blank">渭南市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'咸阳市'));?>" target="_blank">咸阳市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'延安市'));?>" target="_blank">延安市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'榆林市'));?>" target="_blank">榆林市</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="dxclq">
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'四川省'));?>" target="_blank"><img src="./resource/images/iw/Area-ses.png" width="45" height="45" /></a></p>
                            <div class="shengs">
                                <div class="clb">
                                    <ul>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'成都市'));?>" target="_blank">成都市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'绵阳市'));?>" target="_blank">绵阳市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'巴中市'));?>" target="_blank">巴中市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'达州市'));?>" target="_blank">达州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'德阳市'));?>" target="_blank">德阳市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'广安市'));?>" target="_blank">广安市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'广元市'));?>" target="_blank">广元市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'乐山市'));?>" target="_blank">乐山市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'凉山市'));?>" target="_blank">凉山市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'眉山市'));?>" target="_blank">眉山市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'南充市'));?>" target="_blank">南充市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'内江市'));?>" target="_blank">内江市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'攀枝花市'));?>" target="_blank">攀枝花市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'遂宁市'));?>" target="_blank">遂宁市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'雅安市'));?>" target="_blank">雅安市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'宜宾市'));?>" target="_blank">宜宾市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'资阳市'));?>" target="_blank">资阳市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'自贡市'));?>" target="_blank">自贡市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'泸州市'));?>" target="_blank">泸州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'甘孜'));?>" target="_blank">甘孜</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'阿坝'));?>" target="_blank">阿坝</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="dxclq">
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'西藏'));?>" target="_blank"><img src="./resource/images/iw/Area-xiz.png" width="45" height="45" /></a></p>
                            <div class="shengs">
                                <div class="clb">
                                    <ul>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'拉萨市'));?>" target="_blank">拉萨市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'阿里'));?>" target="_blank">阿里</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'昌都'));?>" target="_blank">昌都</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'林芝'));?>" target="_blank">林芝</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'那曲'));?>" target="_blank">那曲</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'日喀则'));?>" target="_blank">日喀则</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'山南'));?>" target="_blank">山南</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="dxclq">
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'新疆'));?>" target="_blank"><img src="./resource/images/iw/Area-xinjiang.png" width="45" height="45" /></a></p>
                            <div class="shengs">
                                <div class="clb">
                                    <ul>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'乌鲁木齐市'));?>" target="_blank">乌鲁木齐市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'克拉玛依市'));?>" target="_blank">克拉玛依市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'阿克苏'));?>" target="_blank">阿克苏</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'巴音郭楞'));?>" target="_blank">巴音郭楞</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'博尔塔拉'));?>" target="_blank">博尔塔拉</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'昌吉'));?>" target="_blank">昌吉</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'哈密'));?>" target="_blank">哈密</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'和田'));?>" target="_blank">和田</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'喀什'));?>" target="_blank">喀什</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'克孜勒苏'));?>" target="_blank">克孜勒苏</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'吐鲁番'));?>" target="_blank">吐鲁番</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'伊犁'));?>" target="_blank">伊犁</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'石河子'));?>" target="_blank">石河子</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'阿拉尔'));?>" target="_blank">阿拉尔</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'图木舒克'));?>" target="_blank">图木舒克</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'五家渠'));?>" target="_blank">五家渠</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="dxclq">
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'云南省'));?>" target="_blank"><img src="./resource/images/iw/Area-yunnan.png" width="45" height="45" /></a></p>
                            <div class="shengs">
                                <div class="clb">
                                    <ul>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'昆明市'));?>" target="_blank">昆明市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'曲靖市'));?>" target="_blank">曲靖市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'玉溪市'));?>" target="_blank">玉溪市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'保山市'));?>" target="_blank">保山市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'昭通市'));?>" target="_blank">昭通市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'丽江市'));?>" target="_blank">丽江市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'临沧市'));?>" target="_blank">临沧市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'楚雄'));?>" target="_blank">楚雄</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'红河'));?>" target="_blank">红河</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'文山'));?>" target="_blank">文山</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'西双版纳'));?>" target="_blank">西双版纳</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'大理'));?>" target="_blank">大理</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'德宏'));?>" target="_blank">德宏</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'怒江'));?>" target="_blank">怒江</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'迪庆'));?>" target="_blank">迪庆</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="dxclq">
                            <p class="iimg"><a href="<?php  echo url('public/area',array('key'=>'浙江省'));?>" target="_blank"><img src="./resource/images/iw/Area-zjiang.png" width="45" height="45" /></a></p>
                            <div class="shengs">
                                <div class="clb">
                                    <ul>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'杭州市'));?>" target="_blank">杭州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'湖州市'));?>" target="_blank">湖州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'嘉兴市'));?>" target="_blank">嘉兴市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'金华市'));?>" target="_blank">金华市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'丽水市'));?>" target="_blank">丽水市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'宁波市'));?>" target="_blank">宁波市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'绍兴市'));?>" target="_blank">绍兴市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'台州市'));?>" target="_blank">台州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'温州市'));?>" target="_blank">温州市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'舟山市'));?>" target="_blank">舟山市</a></li>
                                        <li><a href="<?php  echo url('public/area',array('key'=>'衢州市'));?>" target="_blank">衢州市</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('public/common', TEMPLATE_INCLUDEPATH)) : (include template('public/common', TEMPLATE_INCLUDEPATH));?>
        <div class="iasir">
            <div class="iidads160">
            </div>
            <div class="iidads160">
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
