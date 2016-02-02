<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-base', TEMPLATE_INCLUDEPATH)) : (include template('common/header-base', TEMPLATE_INCLUDEPATH));?>
<style>
	@media screen and (max-width:767px){.login .panel.panel-default{width:90%; min-width:300px;}}
	@media screen and (min-width:768px){.login .panel.panel-default{width:70%;}}
	@media screen and (min-width:1200px){.login .panel.panel-default{width:50%;}}
</style>
<div class="login">
	<div class="logo">
		<a href="http://www.weixinsyt.com" <?php  if(!empty($_W['setting']['copyright']['flogo'])) { ?>style="background:url('<?php  echo tomedia($_W['setting']['copyright']['flogo']);?>') no-repeat;"<?php  } ?>></a>
	</div>
	<div class="clearfix" style="margin-bottom:5em;">
		<div class="panel panel-default container">
			<div class="panel-body">
				<form action="" method="post" role="form" onsubmit="return formcheck();">
					<div class="form-group input-group">
						<div class="input-group-addon"><i class="fa fa-user"></i></div>
						<input name="username" type="text" class="form-control input-lg" placeholder="请输入用户名登录">
					</div>
					<div class="form-group input-group">
						<div class="input-group-addon"><i class="fa fa-unlock-alt"></i></div>
						<input name="password" type="password" class="form-control input-lg" placeholder="请输入登录密码">
					</div>
                                        <div class="form-group input-group">
						<div class="input-group-addon"><i class="fa fa-unlock-alt"></i></div>
                                                <input name="code" type="text" class="form-control" id="captcha-text" placeholder="请输入验证码" style="width:25%;display:inline;margin-right:17px">
                                                <img src="./index.php?c=utility&a=code&" id="captcha-code" class="img-rounded" style="cursor:pointer;" onclick="this.src='./index.php?c=utility&a=code&' + Math.random();" /> <a href="javascript:;" onclick="$(this).prev().trigger('click')">看不清?</a>
                                        </div>

					<div class="form-group">
						<label class="checkbox-inline input-lg">
							<input type="checkbox" value="true" name="rember" checked> 记住用户名
						</label>
						<div class="pull-right">
							<?php  if(!$_W['siteclose']) { ?><a href="<?php  echo url('user/register');?>" class="btn btn-link btn-lg">注册</a><?php  } ?>
							<input type="submit" name="submit" value="登录" class="btn btn-primary btn-lg" />
							<input name="token" value="<?php  echo $_W['token'];?>" type="hidden" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="center-block footer" role="footer">
		<div class="text-center">
			<?php  if(empty($_W['setting']['copyright']['footerright'])) { ?><a href="http://www.weixinsyt.com">关于微信生意通</a>&nbsp;&nbsp;<a href="http://www.weixinsyt.com">微信生意通帮助</a><?php  } else { ?><?php  echo $_W['setting']['copyright']['footerright'];?><?php  } ?> &nbsp; &nbsp; <?php  if(!empty($_W['setting']['copyright']['statcode'])) { ?><?php  echo $_W['setting']['copyright']['statcode'];?><?php  } ?>
		</div>
		<div class="text-center">
			<?php  if(empty($_W['setting']['copyright']['footerleft'])) { ?>Powered by <a href="http://www.weixinsyt.com"><b>微信生意通</b></a> v<?php echo IMS_VERSION;?> &copy; 2014 <a href="http://www.weixinsyt.com">www.weixinsyt.com</a><?php  } else { ?><?php  echo $_W['setting']['copyright']['footerleft'];?><?php  } ?>
		</div>
	</div>
</div>
<script>
function formcheck() {
	if($('#remember:checked').length == 1) {
		cookie.set('remember-username', $(':text[name="username"]').val());
	} else {
		cookie.del('remember-username');
	}
	return true;
}
require(['jquery'],function($){
	var h = document.documentElement.clientHeight;
	$(".login").css('min-height',h);
});
</script>
</body>
</html>
