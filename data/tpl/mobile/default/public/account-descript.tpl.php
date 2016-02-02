<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta charset="gbk">
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
        <meta content="2345小说大全" name="apple-mobile-web-app-title">
        <meta name="description" content="微信号">
        <meta name="keywords" content="">
        <title><?php  echo $account['name'];?>(<?php  echo $account['details'][$account['uniacid']]['account'];?>)微信号-<?php  echo $account['name'];?>微信二维码-微信生意通手机端</title>
        <link rel="stylesheet" href="./resource/css/index.css">
        <script src="./resource/js/lib/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/jquery.zclip.js"></script>
    </head>
    <body id="xtopjsinfo">
        <div class="wrapper">
            <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('comm/header', TEMPLATE_INCLUDEPATH)) : (include template('comm/header', TEMPLATE_INCLUDEPATH));?>
            <div class="container">
                <section class="mod_detail">
                <div class="book_cover">
                    <div class="img"><img src="<?php  echo $account['attachurl'];?><?php  echo $account['uniacid'];?>/headimg_<?php  echo $account['uniacid'];?>.jpg?acid=<?php  echo $account['uniacid'];?>"  width="120" height="160" alt="<?php  echo $account['name'];?>"></div>
                    <dl class="info">
                        <dt><span class="space"><?php  echo $account['name'];?></span><i class="i_original">推广</i></dt>
                        <dd>
                        <p>微信号：<?php  echo $account['details'][$account['uniacid']]['account'];?></p>
                        <p>微信分类：<?php  echo $account['industry_parent'];?>&nbsp;  <?php  echo $account['industry_child'];?></p>
                        <?php  if($account['province']) { ?><p>所属地区：<?php  echo $account['province'];?> &nbsp; <?php  echo $account['city'];?> &nbsp; <?php  echo $account['district'];?></p><?php  } ?>
                        <?php  if($account['siteurl'] || $account['tweibo'] || $account['sweibo']) { ?><p><b>相关网址：</b><?php  if($account['siteurl']) { ?><a href="<?php  echo $account['siteurl'];?>" target="__blank" title="<?php  echo $account['name'];?>"><?php  echo $account['name'];?> &nbsp;&nbsp;</a><?php  } ?><?php  if($account['tweibo']) { ?><a href="<?php  echo $account['tweibo'];?>" target="__blank" title="<?php  echo $account['name'];?>"><?php  echo $account['name'];?>·腾讯微博&nbsp;&nbsp;</a> <?php  } ?><?php  if($account['sweibo']) { ?> <a href="<?php  echo $account['sweibo'];?>" target="__blank" title="<?php  echo $account['name'];?>"><?php  echo $account['name'];?>·新浪微博</a><?php  } ?></p><?php  } ?>
                        <p>收录时间：<?php  echo date('Y-m-d',$account['createtime'])?></p>
                        <div class="bdsharebuttonbox">
                            <a style="background:none;padding-left:0px;font-size:13px;color:#84868c"><p>我要分享：</p></a>
                            <a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone"></a><a href="#" class="bds_tsina" data-cmd="tsina"></a><a href="#" class="bds_tqq" data-cmd="tqq"></a><a href="#" class="bds_renren" data-cmd="renren"></a><a href="#" class="bds_sqq" data-cmd="sqq"></a></div>
                            <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
                        </dd>
                    </dl>
                </div>
                <div class="book_intro">
                    <p class="summary" id="comment_shot">功能介绍：<?php  echo $account['description'];?></p>
                    <div class="btn_op">
                    <a class="btn_b" href="javascript:void(0);" onClick="gz()">立即关注</a><a class="btn_c" id="add_store" href="javascript:void(0);" onClick="xh(this,<?php  echo $account['uniacid'];?>,<?php  echo $account['zan'];?>)">赞一个<strong><?php  echo $account['zan'];?></strong></a>
                    </div>
                </div>
                <?php  if($account['content']) { ?>
                <div class="mod_book book_contents">
                    <div class="hd">
                        <h3 class="tit">微信公众号活动</h3>
                    </div>
                    <div class="zwword"> <?php  echo $account['content'];?> </div>
                    <div class="ft"></div>
                </div>
                <?php  } ?>
                <?php  if($article) { ?>
                <div class="mod_book book_contents">
                    <div class="hd">
                        <h3 class="tit">微信公众号文章</h3>
                    </div>
                    <ul class="book_textListf">
                        <?php  if(is_array($article)) { foreach($article as $key => $one) { ?>
                        <li><a href="<?php  echo url('public/article',array('id'=>$one['id']))?>" ><span><?php  echo $key+1?></span><?php  echo $one['title'];?></a></li>
                        <?php  } } ?>
                    </ul>
                    <div class="ft"></div>
                </div>
                <?php  } ?>
                <div class="mod_book seen_book">
                    <div class="hd">
                        <h3 class="tit">猜你喜欢公众号</h3>
                    </div>
                    <div class="bd">
                        <ul class="imgTxt_list">
                            <?php  if(is_array($like)) { foreach($like as $one) { ?>
                            <li>
                            <a href="<?php  echo url('public/category' ,array('id'=>$one['uniacid']))?>" title="<?php  echo $one['name'];?>" target="_blank">
                                <div class="imgBox"><img src="<?php  echo $one['attachurl'];?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" ></div>
                                <div class="info">
                                    <h3><span ><?php  echo $one['name'];?></span></h3>
                                    <p><span>微信号：</span><?php  echo $one['details'][$one['uniacid']]['account'];?></p>
                                    <p><span>关注度：</span><?php  echo $one['scan_count'];?></p>
                                    <p><span>收录时间：</span><?php  echo date('Y-m-d',$one['createtime'])?></p>
                                </div>
                            </a>
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
        <script type="text/javascript">
            function xh(cur,id,zan){
                $.get("<?php  echo url('public/ajax/guanzhu')?>",{id:id,zan:zan},function(data){				
                        $(cur).children('strong').html(zan+1);
                });
            }

        </script>
        <div class="copy-tips">
            <div class="findback_close" onClick="CloseDiv()">X</div>
            <div class='copy-tips-wrap'>
                <div>微信公众号：<?php  echo $account['details'][$account['uniacid']]['account'];?></div>
                <div class="gzff">
                    <img src="<?php  echo $account['attachurl'];?><?php  echo $account['uniacid'];?>/qrcode_<?php  echo $account['uniacid'];?>.jpg?acid=<?php  echo $account['uniacid'];?>" alt="<?php  echo $account['name'];?>" width="150px"  height="150px">
                </div>
                <div class="gzf">            
                    <div>如何关注：</div>
                    <div>1、长按复制以上微信号查找关注</div>
                    <div>2、长按识别以上二维码进行关注</div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function gz(){
                $(".copy-tips").show();
            }
            function CloseDiv(){
                $(".copy-tips").hide();
            }
        </script>

</body></html>
