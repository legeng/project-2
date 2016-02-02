<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<li <?php  if($do == 'display') { ?>class="active"<?php  } ?>><a href="<?php  echo url('site/category/display');?>">管理</a></li>
	<li <?php  if($do == 'post' && empty($id)) { ?>class="active"<?php  } ?>><a href="<?php  echo url('site/category/post');?>">添加</a></li>
	<?php  if($do == 'post' && $id) { ?>
	<li <?php  if($do == 'post' && !empty($id)) { ?>class="active"<?php  } ?>><a href="<?php  echo url('site/category/post', array('id'=>$id));?>">编辑</a></li>
	<?php  } ?>
</ul>
<?php  if($do == 'post') { ?>
<div class="main">
	<form action="" method="post" class="form-horizontal form" id="form1">
	<input type="hidden" name="parentid" value="<?php  echo $parent['id'];?>" />
		<div class="panel panel-default">
			<div class="panel-heading">分类详细设置</div>
			<div class="panel-body">
				<?php  if(!empty($category['name'])) { ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">访问地址</label>
					<div class="col-sm-8 col-xs-12">
						<div class="form-control-static"><a href="<?php  echo $_W['siteroot'];?>/app/index.php?c=site&a=site&cid=<?php  echo $category['id'];?>&i=<?php  echo $_W['uniacid'];?>" target="_blank">/app/index.php?c=site&a=site&cid=<?php  echo $category['id'];?>&i=<?php  echo $_W['uniacid'];?></a></div>
						<span class="help-block">您可以根据此地址，添加回复规则，设置访问。</span>
					</div>
				</div>
				<?php  } ?>
				<?php  if(!empty($parentid)) { ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">上级分类</label>
					<div class="col-sm-8 col-xs-12">
						<div class="form-control-static"><?php  echo $parent['name'];?></div>
					</div>
				</div>
				<?php  } ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">排序</label>
					<div class="col-sm-8 col-xs-12">
						<input type="text" name="displayorder" class="form-control" value="<?php  echo $category['displayorder'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">分类名称</label>
					<div class="col-sm-8 col-xs-12">
						<input type="text" name="cname" class="form-control" value="<?php  echo $category['name'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">分类描述</label>
					<div class="col-sm-8 col-xs-12">
						<textarea name="description" class="form-control" cols="70"><?php  echo $category['description'];?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">是否添加微站首页导航</label>
					<div class="col-sm-8 col-xs-12">
						<label for="isnav_1" class="radio-inline"><input type="radio" name="isnav" id="isnav_1" value="1" autocomplete="off" <?php  if(!empty($category['nid'])) { ?> checked<?php  } ?>/> 是</label>
						<label for="isnav_2" class="radio-inline"><input type="radio" name="isnav" id="isnav_2" value="0" autocomplete="off" <?php  if(empty($category['nid'])) { ?> checked<?php  } ?>/> 否</label>
						<div class="help-block">开启此选项后,系统在微站首页导航自动生成以分类名称为导航名称的记录.关闭此选项后,系统将删除对应的导航记录</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">是否作为首页使用</label>
					<div class="col-sm-8 col-xs-12">
						<label for="radio_1" class="radio-inline"><input type="radio" name="ishomepage" id="radio_1" value="1" autocomplete="off" <?php  if(!empty($category['ishomepage'])) { ?> checked<?php  } ?>/> 是</label>
						<label for="radio_2" class="radio-inline"><input type="radio" name="ishomepage" id="radio_2" value="0" autocomplete="off" <?php  if(empty($category['ishomepage'])) { ?> checked<?php  } ?>/> 否</label>
						<div class="help-block">开启此选项后，分类模板将直接引用首页模板（home.html[注:该文件在home文件夹下面]]），分类的二级分类将作为导航显示</div>
					</div>
				</div>
				<div class="form-group clearfix">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">选择分类风格</label>
					<div class="clearfix">
						<div class="col-sm-4 col-lg-4 col-xs-12">
							<select name="styleid" class="form-control" id="styleid">
								<option value="">使用默认设置</option>
								<?php  if(is_array($styles)) { foreach($styles as $v) { ?>
								<option value="<?php  echo $v['id'];?>"<?php  if($category['styleid'] == $v['id']) { ?> selected="selected"<?php  } ?>><?php  echo $v['name'];?>(<?php  echo $v['tname'];?>)</option>
								<?php  } } ?>
							</select>
						</div>
					</div>
					<div>
						<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label"></label>
						<div class="col-sm-8 col-xs-12">
							<span class="help-block">
								新建分类风格时，请在您选择的风格对应的模板目录下新建“site”文件夹，
								默认的列表页面为list.html，默认的内容页面为detail.html。
							</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">直接链接</label>
					<div class="col-sm-8 col-xs-12">
						<input type="text" class="form-control" placeholder="" name="linkurl" value="<?php  echo $category['linkurl'];?>">
						<span class="help-block">链接必须是以http://或是https://开头</span>
					</div>
				</div>
<!-- 				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">是否定义图标</label>
					<div class="col-sm-8">
					<label for="customicon_1" class="radio-inline"><input type="radio" name="customicon" id="customicon_1" value="1" onclick="$('#style').show();" autocomplete="off" /> 是</label>
					<label for="customicon_2" class="radio-inline"><input type="radio" name="customicon" id="customicon_2" value="0" onclick="$('#style').hide();" autocomplete="off" /> 否</label>
					<div class="help-block">是否要定义分类的图标样式</div>	
					</div>
				</div>
 -->			</div>
		</div>

		<div class="panel panel-default" id="style">
			<div class="panel-heading">导航样式</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">图标类型</label>
					<div class="col-sm-8 col-xs-12">
						<label for="icontype1" class="radio-inline"><input type="radio" <?php  if(empty($category['icontype']) || $category['icontype'] == 1) { ?> checked<?php  } ?> value="1" name="icontype" id="icontype1" onclick="$('#iconsys').show();$('#iconuser').hide();colorpicker();" autocomplete="off"> 系统内置</label>&nbsp;&nbsp;&nbsp;
						<label for="icontype2" class="radio-inline"><input type="radio" <?php  if($category['icontype'] == 2) { ?> checked<?php  } ?> value="2" name="icontype" id="icontype2" onclick="$('#iconsys').hide();$('#iconuser').show();" autocomplete="off"> 自定义上传</label>
					</div>
				</div>
				<div class="" id="iconsys" <?php  if($category['icontype'] == 2) { ?> style="display:none;"<?php  } ?>>
					<div class="form-group">
						<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">系统图标</label>
						<div class="col-sm-8 col-xs-12">
							<div class="input-group"">
								<?php  echo tpl_form_field_icon('icon[icon]', $category['css']['icon']['icon']);?>
							</div>
							<span class="help-block">导航的背景图标，系统提供了丰富的图标ICON。</span></div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">图标颜色</label>
						<div class="col-sm-8 col-xs-12">
							<?php  echo tpl_form_field_color('icon[color]', $category[css]['icon']['color']);?>
							<span class="help-block">图标颜色，上传图标时此设置项无效</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">图标大小</label>
						<div class="col-sm-8 col-xs-12">
							<div class="input-group">
								<input class="form-control" type="text" name="icon[size]" id="icon" value="<?php  if($category[css]['icon']['width']) { ?><?php  echo $category[css]['icon']['width'];?><?php  } else { ?>35<?php  } ?>">
								<span class="input-group-addon">PX</span>
							</div>
							<span class="help-block">图标的尺寸大小，单位为像素，上传图标时此设置项无效</span>
						</div>
					</div>
				</div>
				<div class="" id="iconuser" <?php  if(empty($category['icontype']) || $category['icontype'] == 1) { ?> style="display:none;"<?php  } ?>>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">上传图标</label>
						<div class="col-sm-9 col-xs-12">
							<?php  echo tpl_form_field_image('iconfile', $category['icon']);?>
							<span class="help-block">自定义上传图标图片，“系统图标”优先于此项</span>
						</div>
					</div>
				</div>
			</div>
		</div>

	<div class="form-group">
		<div class="col-sm-12">
			<input name="submit" type="submit" value="提交" class="btn btn-primary col-lg-1">
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
	</div>
	</form>
</div>
<script type="text/javascript">
<!--
	require(['jquery', 'util'], function($, u){
		$('input[name="ishomepage"]').click(function(){
			$("#template option[value='']").attr('selected', true);
			if($(this).val() == 1) {
				$('#file').hide();
				return;
			} else {
				$('#file').show();
			}
			$('#file').empty();
			$('#file').append('<option value="">请选择分类模板文件</option>');
		});
		
		
		$("#form1").submit(function(){
			if($("input[name='cname']").val() == '') {
				u.message('请输入分类名称', '', 'error');
				return false;
			}
		});
	});
//-->
</script>
<?php  } else if($do == 'display') { ?>
<div class="main">
	<div class="category">
		<form action="" method="post" onsubmit="return formcheck(this)">
		<div class="panel panel-default">
		<div class="panel-body table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th style="width:5%; text-align:center;">显示顺序</th>
					<th style="width:25%;">分类名称</th>
					<th style="width:20%;text-align:center;">链接</th>
					<th style="width:5%; text-align:center;">设为栏目</th>
					<th style="width:15%; text-align:center">操作</th>
				</tr>
			</thead>
			<tbody>
			<?php  if(is_array($category)) { foreach($category as $row) { ?>
				<tr>
					<td class="text-center"><input type="text" class="form-control" name="displayorder[<?php  echo $row['id'];?>]" value="<?php  echo $row['displayorder'];?>"></td>
					<td class="text-left"><div style="height:30px;line-height:30px"><?php  echo $row['name'];?>&nbsp;&nbsp;<?php  if(empty($row['parentid'])) { ?><a href="<?php  echo url('site/category/post', array('parentid' => $row['id']))?>" title="添加子分类"><i class="fa fa-plus"></i></a><?php  } ?></div></td>
					<td class="text-center"><input type="text" class="form-control" value="app/index.php?c=site&a=site&cid=<?php  echo $row['id'];?>&i=<?php  echo $_W['uniacid'];?>"></td>
					<td class="text-center"><?php echo $row['nid'] ? '是' : '否'?></td>
					<td class="text-center">
						<a href="<?php  echo url('site/article/post', array('pcate' => $row['id']));?>" title="添加文章" class="btn btn-default btn-sm"  data-toggle="tooltip" data-placement="top"><i class="fa fa-plus"></i></a>
						<a href="<?php  echo url('site/category/post', array('id' => $row['id']));?>" title="编辑" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top"><i class="fa fa-edit"></i></a>
						<a href="<?php  echo url('site/category/delete', array('id' => $row['id']));?>" onclick="return confirm('确认删除此分类吗？');return false;" title="删除" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
					</td>
				</tr>
				<?php  if(is_array($children[$row['id']])) { foreach($children[$row['id']] as $row) { ?>
				<tr>
					<td class="text-center"><input type="text" class="form-control" name="displayorder[<?php  echo $row['id'];?>]" value="<?php  echo $row['displayorder'];?>"></td>
					<td class="text-left"><div style="padding-left:50px;height:30px;line-height:30px;background:url('./resource/images/bg_repno.gif') no-repeat -245px -545px;"><?php  echo $row['name'];?>&nbsp;&nbsp;<?php  if(empty($row['parentid'])) { ?><a href="<?php  echo url('category', array('foo' => 'post', 'parentid' => $row['id']))?>"><i class="fa fa-plus" title="添加子分类"></i></a><?php  } ?></div></td>
					<td class="text-center"><input type="text" class="form-control" value="app/index.php?c=site&a=site&cid=<?php  echo $row['id'];?>&i=<?php  echo $_W['uniacid'];?>"></td>
					<td class="text-center"><?php echo $row['enabled'] ? '是' : '否'?></td>
					<td class="text-center">
						<a href="<?php  echo url('site/article/post', array('pcate' => $row['parentid'], 'ccate' => $row['id']));?>" title="添加文章" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top"><i class="fa fa-plus"></i></a>
						<a href="<?php  echo url('site/category/post', array('id' => $row['id'], 'parentid' => $row['parentid']));?>" title="编辑" class="btn btn-default btn-sm"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top"></i></a>
						<a href="<?php  echo url('site/category/delete', array('id' => $row['id']));?>" onclick="return confirm('确认删除此分类吗？');return false;" title="删除" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
					</td>
				</tr>
				<?php  } } ?>
			<?php  } } ?>
				<tr>
					<td colspan="5">
						<a href="<?php  echo url('site/category/post');?>"><i class="fa fa-plus-circle" title="添加新分类"></i> 添加新分类</a>
					</td>
				</tr>
			</tbody>
		</table>
		</div>
		</div>
			<div class="form-group col-sm-12">
				<input name="submit" type="submit" class="btn btn-primary col-lg-1" value="提交">
				<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
			</div>
		</form>
	</div>
</div>
<script>
	require(['bootstrap'],function($){
		$('.btn').hover(function(){
			$(this).tooltip('show');
		},function(){
			$(this).tooltip('hide');
		});
	});
</script>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
