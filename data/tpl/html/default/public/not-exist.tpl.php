<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php  echo $_W['config']['siteinfo']['title'];?></title>
        <meta name="keywords" content="<?php  echo $_W['config']['siteinfo']['keywords'];?>" />
        <meta name="description" content="<?php  echo $_W['config']['siteinfo']['description'];?>" />
        <link href="./resource/css/base.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" type="image/x-icon" href="./resource/images/favicon.ico" />
        <script src="./resource/js/lib/jquery-1.11.1.min.js"></script>

    </head>
<body>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header-gw', TEMPLATE_INCLUDEPATH)) : (include template('common/header-gw', TEMPLATE_INCLUDEPATH));?>
<div class="iiin-body" style="background:#f7f7f7;">
    <div class="iiin-box">
        <div class="iasil" style="width:100%;height:390px;">
            <div class="iucon">
                <div class="content">
                    <div class="somim" style="width:97%;text-align:center;">
                        <h4 style="border:none;font-size:30px;font-weight:normal;line-height:60px;"></h4>
                    </div>
                    <div class="iweilist" style="width:665px;height:292px; float:left; margin-left:15px;text-align:center;">
                        <div class="search_footer not_found">
                            <div class="sug">
                                <h2 class='hs'> 抱歉，没有找到与“<label style="color:#82B440; font-size:18px;"><?php  echo $keyword;?></label>”相关的公众号信息！</h2>
                                <h2> 要不去“<label><a href="index.php" style="color:#82B440; font-size:18px;">微信生意通首页</a></label>”看看！</h2>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
</body>
</html>
