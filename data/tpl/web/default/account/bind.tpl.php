<?php defined('IN_IA') or exit('Access Denied');?><?php  if($action == 'bind') { ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-gw', TEMPLATE_INCLUDEPATH)) : (include template('common/header-gw', TEMPLATE_INCLUDEPATH));?>
<ol class="breadcrumb">
	<li><a href="./?refresh"><i class="fa fa-home"></i></a></li>
	<li><a href="<?php  echo url('system/welcome');?>">系统</a></li>
	<li><a href="<?php  echo url('account/display');?>">公众号列表</a></li>
	<li><a href="<?php  echo url('account/post/list', array('uniacid' => $uniacid));?>">编辑主公众号</a></li>
	<?php  if(empty($account)) { ?><li class="active">添加子公众号</li><?php  } ?>
	<?php  if(!empty($account)) { ?><li class="active">编辑子公众号</li><?php  } ?>
</ol>
<ul class="nav nav-tabs">
	<li<?php  if($do == 'basic') { ?> class="active"<?php  } ?>><a href="<?php  echo url('account/post/basic', array('uniacid' => $uniacid));?>">账号基本信息</a></li>
	<?php  if($_W['isfounder']) { ?><li><a href="<?php  echo url('account/permission', array('uniacid' => $uniacid));?>">账号操作员列表</a></li><?php  } ?>
	<li<?php  if($do == 'details') { ?> class="active"<?php  } ?>><a href="<?php  echo url('account/post/list', array('uniacid' => $uniacid));?>">子公众号列表</a></li>
	<?php  if(empty($account)) { ?><li class="active"><a href="<?php  echo url('account/bind/post', array('uniacid' => $uniacid))?>"><i class="icon-plus"></i> 添加子公众号</a></li><?php  } ?>
	<?php  if(!empty($account)) { ?><li class="active"><a href="<?php  echo url('account/bind/post', array('acid' => $account['acid'], 'uniacid' => $uniacid))?>"><i class="icon-plus"></i> 编辑子公众号</a></li><?php  } ?>
	<li><a href="<?php  echo url('account/switch', array('uniacid' => $uniacid));?>" style="color:#d9534f;"><i class="fa fa-cog fa-spin fa-fw"></i> 管理此公众号功能</a></li>
</ul>
<div class="clearfix">
	<h5 class="page-header">主公众号信息</h5>
	<input type="hidden" name="weid" value="<?php  echo $id;?>" />
	<form action="" method="post"  class="form-horizontal" role="form" enctype="multipart/form-data" onsubmit="return formcheck(this)">
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">名称</label>
			<div class="col-sm-9 col-xs-12">
				<p class="form-control-static"><?php  echo $uniaccount['name'];?></p>
				<span class="help-block">名称为了方便标识此公众号的作用及身份。可以为商户、组织或是公司的名称。</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">地区</label>
			<div class="col-sm-9 col-xs-12">
                            <p class="form-control-static"><?php  echo $uniaccount['province'];?>-<?php  echo $uniaccount['city'];?>-<?php  echo $uniaccount['district'];?></p>
				<span class="help-block">地区用于公众号所在的省市。</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">行业</label>
			<div class="col-sm-9 col-xs-12">
                            <p class="form-control-static"><?php  echo $uniaccount['industry_parent'];?>-<?php  echo $uniaccount['industry_child'];?></p>
				<span class="help-block">用于说明此公众号的类别,对用户精准营销。</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">描述</label>
			<div class="col-sm-9 col-xs-12">
                            <p class="form-control-static"><?php  echo $uniaccount['description'];?></p>
				<span class="help-block">用于说明此公众号的功能及用途,越详细越能打动用户。</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">当前用户浏览量</label>
			<div class="col-sm-9 col-xs-12">
                            <p class="form-control-static"><?php  echo $uniaccount['scan_count'];?> &nbsp;次</p>
                            <span class="help-block">用于说明此公众号被浏览的次数，可以作为排序参考依据(只能填入数字)。</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">腾讯或微信认证</label>
			<div class="col-sm-9 col-xs-12">
                            <p class="form-control-static"><?php  echo $uniaccount['wxrenzheng'];?></p>
				<span class="help-block">用于说明此公众号的认证信息，有认证信息更加有可信度。</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">当前服务套餐</label>
			<div class="col-sm-9 col-xs-12">
				<p class="form-control-static"><?php  echo $groups[$uniaccount['groupid']]['name'];?></p>
				<span class="help-block">指定公众号可使用的功能及权限。基础服务包含系统模块使用权限。所有服务则表示拥有系统中全部权限。</span>
			</div>
		</div>
		
		<?php  if($groupdata['isexpire'] == '1') { ?>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">[付费推广]服务套餐过期时间</label>
				<div class="col-sm-9 col-xs-12">
					<p class="form-control-static"><?php  echo date('Y-m-d H:i', $groupdata['endtime'])?></p>
					<span class="help-block">用户的使用时间过期时,只能使用'基础服务'套餐的功能。</span>
				</div>
			</div>
			<?php  if($groupdata['oldgroupid'] !== '') { ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">过期前服务套餐</label>
					<div class="col-sm-9 col-xs-12">
						<p class="form-control-static"><?php  echo $groups[$groupdata['oldgroupid']]['name'];?></p>
						<span class="help-block">过期后服务套餐是当前服务套餐过期后，系统保存的当前服务套餐的名称。</span>
					</div>
				</div>
			<?php  } ?>
		<?php  } ?>
		<?php  if(!empty($notify['sms'])) { ?>
			<h5 class="page-header">短信参数</h5>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">短信剩余条数</label>
				<div class="col-sm-9 col-xs-12">
					<p class="form-control-static"><?php  echo $notify['sms']['balance'];?></p>
					<span class="help-block">短信剩余条数。</span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">短信签名</label>
				<div class="col-sm-9 col-xs-12">
					<p class="form-control-static"><?php  echo $notify['sms']['signature'];?></p>
					<span class="help-block">短信签名。</span>
				</div>
			</div>
		<?php  } ?>
		
	<h5 class="page-header"><?php  if(!empty($account)) { ?>编辑<?php  } else { ?>添加<?php  } ?>子公众号</h5>
<?php  } ?>

<div class="form-group">
	<label class="col-xs-12 col-sm-3 col-md-2 control-label">添加模式</label>
	<div class="col-sm-9 col-xs-12">
		<label for="b_radio_1" class="radio-inline"><input type="radio" name="model" id="b_radio_1" value="1" checked onclick="$('#normal').show();$('#auto').hide();" autocomplete="off" /> 普通模式</label>
		<label for="b_radio_2" class="radio-inline"><input type="radio" name="model" id="b_radio_2" value="2" onclick="$('#normal').hide();$('#auto').show();" autocomplete="off" /> 一键获取模式</label>
	</div>
</div>
<div class="form-group">
	<label class="col-xs-12 col-sm-3 col-md-2 control-label">类型</label>
	<div class="col-sm-9 col-xs-12">
		<label for="b_radio_3" class="radio-inline"><input type="radio" name="type" id="b_radio_3" value="1" <?php  if(empty($account['type']) || $account['type'] == 1) { ?>checked<?php  } ?> /> 微信</label>
		<label for="b_radio_4" class="radio-inline"><input type="radio" name="type" id="b_radio_4" value="2" <?php  if($account['type'] == 2) { ?>checked<?php  } ?>/> 易信</label>
	</div>
</div>

<div id="normal">
	<?php  if($action == 'bind') { ?>
	<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">公众号名称</label>
		<div class="col-sm-9 col-xs-12">
			<input type="text" name="name" class="form-control" value="<?php  echo $account['name'];?>" autocomplete="off" />
			<span class="help-block">填写公众号的帐号名称</span>
		</div>
	</div>
	<?php  } ?>
	<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">公众号帐号</label>
		<div class="col-sm-9 col-xs-12">
			<input type="text" name="account" class="form-control" value="<?php  echo $account['account'];?>" autocomplete="off" />
			<span class="help-block">填写公众号的帐号，一般为英文帐号</span>
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">原始ID</label>
		<div class="col-sm-9 col-xs-12">
			<input type="text" name="original" class="form-control" value="<?php  echo $account['original'];?>" autocomplete="off" />
			<span class="help-block">在给粉丝发送客服消息时,原始ID不能为空。建议您完善该选项</span>
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">引导关注素材</label>
		<div class="col-sm-9 col-xs-12">
			<input type="text" name="subscribeurl" value="<?php  echo $account['subscribeurl'];?>" class="form-control" autocomplete="off">
			<span class="help-block">建议设置一条引导关注的素材链接,为空则跳转回测试起始界面。例:
				<a href="javascript:;" data-toggle="modal" data-target="#subscribeurl">点击查看</a>
			</span>
		</div>
	</div>
	<!-- 引导素材示例模态框 -->
	<div class="modal fade" id="subscribeurl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content" style="width:740px;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">引导关注示例</h4>
				</div>
				<div class="modal-body">
					<h4>引导关注素材示例页面</h4>
					<span class="help-block"><?php  echo date('Y-m-d', time());?>&nbsp;&nbsp;
					<a href="javascript:;"><?php  echo $account['name'];?></a></span>
					<img src="http://mmbiz.qpic.cn/mmbiz/H4e9icvgf3FWxcBqwf7R3gqMMtZWVzepD5FlCLf5K05Pllyy3FLiaGiamxYZMybQclGbuK4qg3ls46bfEM1lSVNKw/0" />
					<span class="help-block"><?php  if(IMS_FAMILY == 'x') { ?>欢迎关注<?php  echo $account['name'];?><?php  } else { ?>微信生意通是一款微信公众平台管理系统。<?php  } ?></span>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
				</div>
			</div>
		</div>
	</div>
	<div id="panel_1">
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">级别</label>
			<div class="col-sm-9 col-xs-12">
				<label for="status_1" class="radio-inline"><input autocomplete="off" type="radio" name="level" id="status_1" value="1" <?php  if(empty($account['level']) || $account['level'] == 1) { ?> checked<?php  } ?>/> 普通订阅号</label>
				<label for="status_2" class="radio-inline"><input autocomplete="off" type="radio" name="level" id="status_2" value="2" <?php  if($account['level'] == 2) { ?> checked<?php  } ?>> 普通服务号</label>
				<label for="status_3" class="radio-inline"><input autocomplete="off" type="radio" name="level" id="status_3" value="3" <?php  if($account['level'] == 3) { ?> checked<?php  } ?>> 认证订阅号</label>
				<label for="status_4" class="radio-inline"><input autocomplete="off" type="radio" name="level" id="status_4" value="4" <?php  if($account['level'] == 4) { ?> checked<?php  } ?>> 认证服务号</label>
				<span class="help-block">注意：即使公众平台显示为“未认证”, 但只要【公众好设置】/【账号详情】下【认证情况】显示资质审核通过, 即可认定为认证号..</span>
			</div>
		</div>
		<div id="adv">
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">AppId</label>
				<div class="col-sm-9 col-xs-12">
					<input type="text" name="key" class="form-control" value="<?php  echo $account['key'];?>" autocomplete="off"/>
					<div class="help-block">请填写微信公众平台后台的AppId</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">AppSecret</label>
				<div class="col-sm-9 col-xs-12">
					<input type="text" name="secret" class="form-control" value="<?php  echo $account['secret'];?>" autocomplete="off"/>
					<div class="help-block">请填写微信公众平台后台的AppSecret, 只有填写这两项才能管理自定义菜单</div>
				</div>
			</div>
		</div>
	</div>
	<div id="panel_2">
	</div>
	<?php  if(!empty($acid)) { ?>
	<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">接口地址</label>
		<div class="col-sm-9 col-xs-12">
			<input type="text" class="form-control" value="<?php  echo $_W['siteroot'];?>api.php?id=<?php  echo $account['acid'];?>" readonly="readonly" autocomplete="off"/>
			<div class="help-block">设置“公众平台接口”配置信息中的接口地址</div>
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label" style="color:red">Token</label>
		<div class="col-sm-9 col-xs-12">
			<div class="input-group">
				<input type="text" name="wetoken" class="form-control" value="<?php  echo $account['token'];?>" readonly="readonly" />
				<span class="input-group-addon" style="cursor:pointer" onclick="tokenGen();">生成新的</span>
			</div>
			<div class="help-block">与公众平台接入设置值一致，必须为英文或者数字，长度为3到32个字符. 请妥善保管, Token 泄露将可能被窃取或篡改平台的操作数据.</div>
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label" style="color:red">EncodingAESKey</label>
		<div class="col-sm-9 col-xs-12">
			<div class="input-group">
				<input type="text" name="encodingaeskey" class="form-control" value="<?php  echo $account['encodingaeskey'];?>"/>
				<span class="input-group-addon" style="cursor:pointer" onclick="EncodingAESKeyGen();">生成新的</span>
			</div>
			<div class="help-block">与公众平台接入设置值一致，必须为英文或者数字，长度为43个字符. 请妥善保管, EncodingAESKey 泄露将可能被窃取或篡改平台的操作数据.</div>
		</div>
	</div>
	<?php  } ?>
	<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">二维码</label>
		<div class="col-sm-9 col-xs-12">
			<input type="file" name="qrcode" value="<?php  echo $item['qrcode'];?>">
			<span class="help-block">只支持JPG图片</span>
		</div>
	</div>
	<?php  if(file_exists(IA_ROOT . '/attachment/'.$account['acid'].'/qrcode_'.$account['acid'].'.jpg')) { ?>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
			<div class="col-sm-9 col-xs-12">
				<div class="input-group">
					<img src="<?php  echo $_W['attachurl'];?><?php  echo $account['acid'];?>/qrcode_<?php  echo $account['acid'];?>.jpg?time=<?php  echo time()?>" class="img-responsive img-thumbnail" width="150" />
				</div>
			</div>
		</div>
	<?php  } ?>
	<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">头像</label>
		<div class="col-sm-9 col-xs-12">
			<input type="file" name="headimg" value="<?php  echo $item['headimg'];?>">
			<span class="help-block">只支持JPG图片</span>
		</div>
	</div>
	<?php  if(file_exists(IA_ROOT . '/attachment/'.$account['acid'].'/headimg_'.$account['acid'].'.jpg')) { ?>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
			<div class="col-sm-9 col-xs-12">
				<div class="input-group">
					<img src="<?php  echo $_W['attachurl'];?><?php  echo $account['acid'];?>/headimg_<?php  echo $account['acid'];?>.jpg?time=<?php  echo time()?>" class="img-responsive img-thumbnail" width="150" />
				</div>
			</div>
		</div>
	<?php  } ?>
</div>
<div id="auto" style="display:none">
	<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">公众登录用户</label>
		<div class="col-sm-9 col-xs-12">
			<input type="text" name="wxusername" id="username" class="form-control" value="<?php  echo $account['username'];?>" autocomplete="off"  />
			<span class="help-block">请输入你的公众平台用户名</span>
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">公众登录密码</label>
		<div class="col-sm-9 col-xs-12">
			<input type="password" name="wxpassword" class="form-control" value="" autocomplete="off"  />
			<span class="help-block">请输入你的公众平台密码</span>
		</div>
	</div>
</div>
<div class="form-group">
	<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
	<div class="col-sm-9 col-xs-12">
		<input name="submit" type="submit" value="提交" class="btn btn-primary span2" />
		<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
	</div>
</div>

<?php  if($action == 'bind') { ?>
	</form>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer-gw', TEMPLATE_INCLUDEPATH)) : (include template('common/footer-gw', TEMPLATE_INCLUDEPATH));?>
<?php  } ?>
<script type="text/javascript">
	require(['filestyle'], function($){
		$(".form-group").find(':file').filestyle({buttonText: '上传图片'});
		
		$('div[id^="panel"]').hide();
		$('#panel_'+$('input:radio[name="type"]:checked').val()).show();
		$("input[name='type']").click(function(){
			$('div[id^="panel"]').hide();
			$('#panel_'+$(this).val()).show();
		});
	});

	function tokenGen() {
		var letters = 'abcdefghijklmnopqrstuvwxyz0123456789';
		var token = '';
		for(var i = 0; i < 32; i++) {
			var j = parseInt(Math.random() * (31 + 1));
			token += letters[j];
		}
		$(':text[name="wetoken"]').val(token);
	}

	function EncodingAESKeyGen() {
		var letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		var token = '';
		for(var i = 0; i < 43; i++) {
			var j = parseInt(Math.random() * 61 + 1);
			token += letters[j];
		}
		$(':text[name="encodingaeskey"]').val(token);
	}

</script>
