<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<li><a href="<?php  echo url('site/multi/display');?>">微站管理</a></li>
	<?php  if($do == 'post' && !$id) { ?><li class="active"><a href="<?php  echo url('multi/post');?>">添加微站</a></li><?php  } ?>
	<?php  if($do == 'post' && $id) { ?><li class="active"><a href="<?php  echo url('multi/post', array('id' => $id));?>">编辑微站</a></li><?php  } ?>
</ul>
<form class="form-horizontal form" action="" method="post">
<div class="clearfix">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
		<div class="panel panel-default">
			<div class="panel-heading">
				站点风格选择
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">站点标识</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="title" class="form-control" value="<?php  echo $multi['title'];?>" />
						<div class="help-block">用于区分于其他微站。比如:中秋专题</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">是否启用</label>
					<div class="col-sm-9 col-xs-12">
						<label class="radio-inline"><input type="radio" name="status" value="1" <?php  if($multi['status'] == '' || $multi['status'] == 1) { ?>checked<?php  } ?>>是</label>
						<label class="radio-inline"><input type="radio" name="status" value="0" <?php  if($multi['status'] === 0) { ?>checked<?php  } ?>>否</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">选择微站风格</label>
					<div class="col-sm-9 col-xs-12">
						<select class="form-control" name="styleid">
							<option value="">请选择微站默认风格</option>
							<?php  if(is_array($styles)) { foreach($styles as $style) { ?>
								<option value="<?php  echo $style['id'];?>" <?php  if($multi['styleid'] == $style['id']) { ?>selected<?php  } ?>><?php  echo $style['name'];?></option>
							<?php  } } ?>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				站点信息
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">绑定域名</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="bindhost" class="form-control" value="<?php  echo $multi['bindhost'];?>" />
						<span class="help-block">绑定时请先将域名解析指向到本服务器，请只填写host部分，例如 www.baidu.com 或是 we7.baidu.com。</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">标题附加内容</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="sitename" class="form-control" value="<?php  echo $multi['site_info']['sitename'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">keywords</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="keywords" class="form-control" value="<?php  echo $multi['site_info']['keywords'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">description</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="description" class="form-control" value="<?php  echo $multi['site_info']['description'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">底部自定义</label>
					<div class="col-sm-9 col-xs-12">
						<textarea style="height:150px;" class="form-control" cols="70" name="footer" autocomplete="off"><?php  echo $multi['site_info']['footer'];?></textarea>
						<span class="help-block">自定义底部信息，支持HTML</span>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12">
				<input name="submit" type="submit" value="提交" class="btn btn-primary col-lg-1" />
				<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
			</div>
		</div>
	</form>
</div>
</form>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
