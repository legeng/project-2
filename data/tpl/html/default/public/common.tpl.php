<?php defined('IN_IA') or exit('Access Denied');?>﻿<div class="iasim">
    <div class="iirig">
        <h5>精品公众号推送</h5>
        <div class="content">
            <div class="iirig-class">
                <ul>
                    <?php  if(is_array(get_account(1))) { foreach(get_account(1) as $one) { ?>
                    <li><a href="<?php  echo url('public/category',array('id'=>$one['uniacid'],'key'=>$one['industry_parent']))?>" target="_blank" title="<?php  echo $one['name'];?>"><img src="<?php  echo $_W['attachurl'];?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" alt="<?php  echo $one['name'];?>" title="<?php  echo $one['name'];?>"/><p><?php  echo $one['name'];?></p></a></li>
                    <?php  } } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="iirig">
        <h5>公众号扫描排行</h5>
        <div class="content">
            <div class="iwohh-class">
                <ul>
                    <?php  if(is_array(get_account(2))) { foreach(get_account(2) as $one) { ?>
                    <li><span class="ol"><a href="<?php  echo url('public/category',array('id'=>$one['uniacid'],'key'=>$one['industry_parent']))?>" target="_blank" title="<?php  echo $one['name'];?>"><img src="<?php  echo $_W['attachurl'];?><?php  echo $one['uniacid'];?>/headimg_<?php  echo $one['uniacid'];?>.jpg?acid=<?php  echo $one['uniacid'];?>" width="90" height="90" alt="<?php  echo $one['name'];?>" title="<?php  echo $one['name'];?>" /></a></span><span class="or"><strong><a href=" <?php  echo url('public/category',array('id'=>$one['uniacid'],'key'=>$one['industry_parent']))?>" target="_blank" title="<?php  echo $one['name'];?>"><?php  echo $one['name'];?></a></strong><p class="uz1">微信号：<?php  echo $one['details'][$one['uniacid']]['account'];?></p></span></li>
                    <?php  } } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="iirig">
        <h5>网络热门文章</h5>
        <dl class="channel">
            <dd><a href="<?php  echo url('public/article/more')?>" target="_blank" title="更多文章">更多</a></dd>
        </dl>
        <div class="content">
            <div class="inew-class">
                <ul>
                <?php  if(is_array(get_article())) { foreach(get_article() as $one) { ?>
                <li><a href="<?php  echo url('public/article',array('id'=>$one['id']));?>" target="_blank" title="<?php  echo $one['title'];?>"><?php  echo $one['title'];?></a></li>
                <?php  } } ?>
                <li><a href="<?php  echo url('public/article/more')?>" target="_blank" title="更多精彩文章推荐">更多精彩文章推荐>></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
