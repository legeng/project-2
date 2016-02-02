<?php defined('IN_IA') or exit('Access Denied');?><header class="header">
    <?php  if($_GPC['sid']==-1) { ?>
    <a href="http://www.weixinsyt.com/mobile" class="logo"></a>
    <?php  } else { ?>
    <a class="back" id="go-back-button" href="javascript:history.go(-1)">返回</a>
    <a href="index.html" class="logo"></a>
    <a  class="home" href="http://www.weixinsyt.com/mobile">首页</a>
    <?php  } ?>
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

