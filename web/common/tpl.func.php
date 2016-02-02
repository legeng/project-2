<?php
/**
 * [WeEngine System] Copyright (c) 2014 WE7.CC
 * WeEngine is NOT a free software, it under the license terms, visited http://www.we7.cc/ for more details.
 */
defined('IN_IA') or exit('Access Denied');


function tpl_form_field_audio($name, $value = '', $options = array()) {
	$s = '';
	if (!defined('TPL_INIT_AUDIO')) {
		$s =
		'
<script type="text/javascript">
	function showAudioDialog(elm, base64options, options) {
		require(["util"], function(util){
			var btn = $(elm);
			var ipt = btn.parent().prev();
			var val = ipt.val();
			util.audio(val, function(url){
				if(url && url.filename && url.url){
					btn.prev().show();
		
					ipt.val(url.filename);
					ipt.attr("filename",url.filename);
					ipt.attr("url",url.url);
		
					setAudioPlayer();
				}
				if(url && url.media_id){
					ipt.val(url.media_id);
				}
			}, base64options , options);
		});
	}

	function setAudioPlayer(){
		require(["jquery", "util", "jquery.jplayer"], function($, u){
			$(function(){
				$(".audio-player").each(function(){
					$(this).prev().find("button").eq(0).click(function(){
						var src = $(this).parent().prev().val();
						if($(this).find("i").hasClass("fa-stop")) {
							$(this).parent().parent().next().jPlayer("stop");
						} else {
							if(src) {
								$(this).parent().parent().next().jPlayer("setMedia", {mp3: u.tomedia(src)}).jPlayer("play");
							}
						}
					});
				});

				$(".audio-player").jPlayer({
					playing: function() {
						$(this).prev().find("i").removeClass("fa-play").addClass("fa-stop");
					},
					pause: function (event) {
						$(this).prev().find("i").removeClass("fa-stop").addClass("fa-play");
					},
					swfPath: "resource/components/jplayer",
					supplied: "mp3"
				});
				$(".audio-player-media").each(function(){
					$(this).next().find(".audio-player-play").css("display", $(this).val() == "" ? "none" : "");
				});
			});
		});
	}

	setAudioPlayer();
</script>';
		define('TPL_INIT_AUDIO', true);
	}
	$val = $default;
	if(!empty($value)) {
		$val = tomedia($value);
	}
	if(empty($options)){
		$options['tabs'] = array('browser'=>'active', 'upload'=>'');
	}
	$options = array_elements(array('extras','tabs'), $options);
	$s .= '
	<div class="input-group">
		<input type="text" value="'.$value.'" name="'.$name.'" class="form-control audio-player-media" autocomplete="off" '.($options['extras']['text'] ? $options['extras']['text'] : '').'>
		<span class="input-group-btn">
			<button class="btn btn-default audio-player-play" type="button" style="display:none;"><i class="fa fa-play"></i></button>
			<button class="btn btn-default" type="button" onclick="showAudioDialog(this, \''.base64_encode(iserializer($options)).'\','.str_replace('"','\'', json_encode($options)).');">选择媒体文件</button>
		</span>
	</div>
	<div class="input-group audio-player">
	</div>';
	return $s;
}


function tpl_form_field_multi_audio($name, $value = array()) {
	global $_W;

	$s = '';
	if (!defined('TPL_INIT_MULTI_AUDIO')) {
		$s .= '
<script type="text/javascript">
	function showMultiAudioDialog(elm, name) {
		require(["util"], function(util){
			var btn = $(elm);
			var ipt = btn.parent().prev();
			var val = ipt.val();

			util.audio(val, function(url){
				var obj = $(\'<div class="multi-audio-item" style="height: 40px; position:relative; float: left; margin-right: 18px;"><div class="multi-audio-player"></div><div class="input-group"><input type="text" class="form-control" readonly value="\' + url.filename + \'" /><div class="input-group-btn"><button class="btn btn-default" type="button"><i class="fa fa-play"></i></button><button class="btn btn-default" onclick="deleteMultiAudio(this)" type="button"><i class="fa fa-remove"></i></button></div></div><input type="hidden" name="\'+name+\'[]" value="\'+url.filename+\'"></div>\');
				$(elm).parent().parent().next().append(obj);
				setMultiAudioPlayer(obj);
			});
		});
	}
	function deleteMultiAudio(elm){
		require([\'jquery\'], function($){
			$(elm).parent().parent().parent().remove();
		});
	}
	function setMultiAudioPlayer(elm){
		require(["jquery", "util", "jquery.jplayer"], function($, u){
			$(".multi-audio-player",$(elm)).next().find("button").eq(0).click(function(){
				var src = $(this).parent().prev().val();
				if($(this).find("i").hasClass("fa-stop")) {
					$(this).parent().parent().prev().jPlayer("stop");
				} else {
					if(src) {
						$(this).parent().parent().prev().jPlayer("setMedia", {mp3: u.tomedia(src)}).jPlayer("play");
					}
				}
			});
			$(".multi-audio-player",$(elm)).jPlayer({
				playing: function() {
					$(this).next().find("i").eq(0).removeClass("fa-play").addClass("fa-stop");
				},
				pause: function (event) {
					$(this).next().find("i").eq(0).removeClass("fa-stop").addClass("fa-play");
				},
				swfPath: "resource/components/jplayer",
				supplied: "mp3"
			});
		});
	}
</script>';
		define('TPL_INIT_MULTI_AUDIO', true);
	}

	$s .= '
<div class="input-group">
	<input type="text" class="form-control" readonly="readonly" value="" placeholder="批量上传音乐" autocomplete="off">
	<span class="input-group-btn">
		<button class="btn btn-default" type="button" onclick="showMultiAudioDialog(this,\''.$name.'\');">选择音乐</button>
	</span>
</div>
<div class="input-group multi-audio-details clear-fix" style="margin-top:.5em;">';
	if(!empty($value) && !is_array($value)){
		$value = array($value);
	}
	if (is_array($value) && count($value)>0) {
		$n = 0;
		foreach ($value as $row) {
			$m = random(8);
			$s .= '
	<div class="multi-audio-item multi-audio-item-'.$n.'-'.$m.'" style="height: 40px; position:relative; float: left; margin-right: 18px;">
		<div class="multi-audio-player"></div>
		<div class="input-group">
			<input type="text" class="form-control" value="'. $row .'" readonly/>
			<div class="input-group-btn">
				<button class="btn btn-default" type="button"><i class="fa fa-play"></i></button>
				<button class="btn btn-default" onclick="deleteMultiAudio(this)" type="button"><i class="fa fa-remove"></i></button>
			</div>
		</div>
		<input type="hidden" name="'.$name.'[]" value="'.$row.'">
	</div>
	<script language="javascript">setMultiAudioPlayer($(".multi-audio-item-'.$n.'-'.$m.'"));</script>';
			$n++;
		}
	}
	$s .= '
</div>';

	return $s;
}


function tpl_form_field_link($name, $value = '', $options = array()) {
	$s = '';
	if (!defined('TPL_INIT_LINK')) {
		$s = '
		<script type="text/javascript">
			function showLinkDialog(elm) {
				require(["util","jquery"], function(u, $){
					var ipt = $(elm).parent().prev();
					u.linkBrowser(function(href){
						ipt.val(href);
					});
				});
			}
		</script>';
		define('TPL_INIT_LINK', true);
	}
	$s .= '
	<div class="input-group">
		<input type="text" value="'.$value.'" name="'.$name.'" class="form-control ' . $options['css']['input'] . '" autocomplete="off">
		<span class="input-group-btn">
			<button class="btn btn-default ' . $options['css']['btn'] . '" type="button" onclick="showLinkDialog(this);">选择链接</button>
		</span>
	</div>
	';
	return $s;
}


function tpl_form_field_emoji($name, $value='') {
	$s = '';
	if (!defined('TPL_INIT_EMOJI')) {
		$s = '
		<script type="text/javascript">
			function showEmojiDialog(elm) {
				require(["util","jquery"], function(u, $){
					var btn = $(elm);
					var spview = btn.parent().prev();
					var ipt = spview.prev();
					if(!ipt.val()){
						spview.css("display","none");
					}
					u.emojiBrowser(function(emoji){
						ipt.val("\\\" + emoji.find("span").text().replace("+", "").toLowerCase());
						spview.show();
						spview.find("span").removeClass().addClass(emoji.find("span").attr("class"));
					});
				});
			}
		</script>';
		define('TPL_INIT_EMOJI', true);
	}
	$s .= '
	<div class="input-group" style="width: 500px;">
		<input type="text" value="'.$value.'" name="'.$name.'" class="form-control" autocomplete="off">
		<span class="input-group-addon" style="display:none"><span></span></span>
		<span class="input-group-btn">
			<button class="btn btn-default" type="button" onclick="showEmojiDialog(this);">选择表情</button>
		</span>
	</div>
	';
	return $s;
}


function tpl_form_field_color($name, $value = '') {
	$s = '';
	if (!defined('TPL_INIT_COLOR')) {
		$s = '
		<script type="text/javascript">
			require(["jquery", "util"], function($, util){
				$(function(){
					$(".colorpicker").each(function(){
						var elm = this;
						util.colorpicker(elm, function(color){
							$(elm).parent().prev().find(":text").val(color.toHexString());
						});
					});
					$(".colorclean").click(function(){
						$(this).parent().prev().val("");
						var $container = $(this).parent().parent().parent().next();
						$container.find(".colorpicker").val("");
						$container.find(".sp-preview-inner").css("background-color","#000000");
					});
				});
			});
		</script>';
		define('TPL_INIT_COLOR', true);
	}
	$s .= '
		<div class="row row-fix">
			<div class="col-xs-6 col-sm-4" style="padding-right:0;">
				<div class="input-group">
					<input class="form-control" type="text" placeholder="请选择颜色" value="'.$value.'">
					<span class="input-group-btn">
						<button class="btn btn-default colorclean" type="button">
							<span><i class="fa fa-remove"></i></span>
						</button>
					</span>
				</div>
			</div>
			<div class="col-xs-2" style="padding:2px 0;">
				<input class="colorpicker" type="text" name="'.$name.'" value="'.$value.'" placeholder="">
			</div>
		</div>
		';
	return $s;
}


function tpl_form_field_icon($name, $value='') {
	if(empty($value)){
		$value = 'fa fa-external-link';
	}
	$s = '';
	if (!defined('TPL_INIT_ICON')) {
		$s = '
		<script type="text/javascript">
			function showIconDialog(elm) {
				require(["util","jquery"], function(u, $){
					var btn = $(elm);
					var spview = btn.parent().prev();
					var ipt = spview.prev();
					if(!ipt.val()){
						spview.css("display","none");
					}
					u.iconBrowser(function(ico){
						ipt.val(ico);
						spview.show();
						spview.find("i").attr("class","");
						spview.find("i").addClass("fa").addClass(ico);
					});
				});
			}
		</script>';
		define('TPL_INIT_ICON', true);
	}
	$s .= '
	<div class="input-group" style="width: 300px;">
		<input type="text" value="'.$value.'" name="'.$name.'" class="form-control" autocomplete="off">
		<span class="input-group-addon"><i class="'.$value.' fa"></i></span>
		<span class="input-group-btn">
			<button class="btn btn-default" type="button" onclick="showIconDialog(this);">选择图标</button>
		</span>
	</div>
	';
	return $s;
}


function tpl_form_field_image($name, $value = '', $default = '', $options = array()) {
	global $_W;

	$s = '';
	if (!defined('TPL_INIT_IMAGE')) {
		$s = '
		<script type="text/javascript">
			function showImageDialog(elm, opts, options) {
				require(["util"], function(util){
					var btn = $(elm);
					var ipt = btn.parent().prev();
					var val = ipt.val();
					var img = ipt.parent().next().children();
					util.image(val, function(url){
						if(url.url){
							if(img.length > 0){
								img.get(0).src = url.url;
							}
							ipt.val(url.filename);
							ipt.attr("filename",url.filename);
							ipt.attr("url",url.url);
						}
						if(url.media_id){
							if(img.length > 0){
								img.get(0).src = "";
							}
							ipt.val(url.media_id);
						}
					}, opts, options);
				});
			}
		</script>';

		define('TPL_INIT_IMAGE', true);
	}
	if(empty($default)) {
		$default = './resource/images/nopic.jpg';
	}
	$val = $default;
	if(!empty($value)) {
		$val = tomedia($value);
	}
	if(empty($options['tabs'])){
		$options['tabs'] = array('browser'=>'', 'upload'=>'active');
	}
	if(!empty($options['global'])){
		$options['global'] = true;
	} else {
		$options['global'] = false;
	}
	if(empty($options['class_extra'])) {
		$options['class_extra'] = '';
	}
	if (isset($options['dest_dir']) && !empty($options['dest_dir'])) {
		if (!preg_match('/^\w+([\/]\w+)?$/i', $options['dest_dir'])) {
			exit('图片上传目录错误,只能指定最多两级目录,如: "we7_store","we7_store/d1"');
		}
	}

	if(isset($options['thumb'])){
		$options['thumb'] = !empty($options['thumb']);
	}

	$s .= '
<div class="input-group '. $options['class_extra'] .'">
	<input type="text" name="'.$name.'" value="'.$value.'"'.($options['extras']['text'] ? $options['extras']['text'] : '').' class="form-control" autocomplete="off">
	<span class="input-group-btn">
		<button class="btn btn-default" type="button" onclick="showImageDialog(this, \'' . base64_encode(iserializer($options)) . '\', '. str_replace('"','\'', json_encode($options)).');">选择图片</button>
	</span>
</div>';
	if(!empty($options['tabs']['browser']) || !empty($options['tabs']['upload'])){
		$s .=
		'<div class="input-group '. $options['class_extra'] .'" style="margin-top:.5em;">
	<img src="' . $val . '" onerror="this.src=\''.$default.'\'; this.title=\'图片未找到.\'" class="img-responsive img-thumbnail" '.($options['extras']['image'] ? $options['extras']['image'] : '').' width="150" />
</div>';
	}
	return $s;
}



function tpl_form_field_multi_image($name, $value = array(), $options = array()) {
	global $_W;

	$s = '';
	if (!defined('TPL_INIT_MULTI_IMAGE')) {
		$s = '
<script type="text/javascript">
	function uploadMultiImage(elm) {
		require(["util"], function(util){
			util.image( "", function(url){
				$(elm).parent().parent().next().append(\'<div class="multi-item" style="height: 150px; position:relative; float: left; margin-right: 18px;"><img style="max-width: 150px; max-height: 150px;" onerror="this.src=\\\'./resource/images/nopic.jpg\\\'; this.title=\\\'图片未找到.\\\'" src="\'+url.url+\'" class="img-responsive img-thumbnail"><input type="hidden" name="'.$name.'[]" value="\'+url.filename+\'"><em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片" onclick="deleteMultiImage(this)">×</em></div>\');
			}, "", '.json_encode($options).');
		});
	}
	function deleteMultiImage(elm){
		require(["jquery"], function($){
			$(elm).parent().remove();
		});
	}
</script>';
		define('TPL_INIT_MULTI_IMAGE', true);
	}

	$s .= '
<div class="input-group">
	<input type="text" class="form-control" readonly="readonly" value="" placeholder="批量上传图片" autocomplete="off">
	<span class="input-group-btn">
		<button class="btn btn-default" type="button" onclick="uploadMultiImage(this);">选择图片</button>
	</span>
</div>
<div class="input-group multi-img-details" style="margin-top:.5em;">';
	if (is_array($value) && count($value)>0) {
		foreach ($value as $row) {
			$s .=
			'<div class="multi-item" style="height: 150px; position:relative; float: left; margin-right: 18px;">
	<img style="max-width: 150px; max-height: 150px;" src="'.tomedia($row).'" onerror="this.src=\'./resource/images/nopic.jpg\'; this.title=\'图片未找到.\'" class="img-responsive img-thumbnail">
	<input type="hidden" name="'.$name.'[]" value="'.$row.'" >
	<em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片" onclick="deleteMultiImage(this)">×</em>
</div>';
		}
	}
	$s .= '</div>';

	return $s;
}
