<?php
/**
 * [WeEngine System] Copyright (c) 2014 WE7.CC
 * WeEngine is NOT a free software, it under the license terms, visited http://www.we7.cc/ for more details.
 */
defined('IN_IA') or exit('Access Denied');
error_reporting(0);

$do = !empty($_GPC['do']) ? $_GPC['do'] : exit('Access Denied');

$type = $_GPC['type'];
$types = array('image','audio');
$type = in_array($type, $types) ? $type : 'image';

$result = array('error' => 1, 'message' => '');

$option = array();
if(isset($_GPC['options'])){
	$option = @base64_decode($_GPC['options']);
	$option = @iunserializer($option);
}

$dest_dir = trim($_GPC['dest_dir']);
if(!empty($dest_dir)){
	$dest_dir = trim($dest_dir, '/');
}

if ($do == 'upload') {
	if($type == 'image'){
		
		if (!empty($option['global']) && empty($_W['isfounder'])) {
			$result['message'] = '没有向 global 文件夹上传图片的权限.';
			frameCallback($_GPC['callback'], json_encode($result));
			exit;
		}
		
		$thumb = 0; 		$width = 0; 		
		load()->model('setting');
		$uploadsetting = setting_load('upload');
		$uploadsetting = $uploadsetting['upload'];
		
		if(!empty($uploadsetting) && is_array($uploadsetting)){
			$thumb = empty($uploadsetting['image']['thumb']) ? 0 : 1;
			$width = intval($uploadsetting['image']['width']);
		}
		if(isset($option['thumb'])){
			$thumb = empty($option['thumb']) ? 0 : 1;
		}
		if (isset($option['width'])) {
			$width = intval($option['width']);
		}
		
		load()->func('file');
		
		if (( !empty($_GPC['ajax']) && !empty($_FILES['imgFile']['name']))) { 			
			$result = array('error' => 1, 'message' => '');
			
			$_W['uploadsetting'] = array();
			$_W['uploadsetting']['image']['folder'] = 'images/' . $_W['uniacid'];
			$_W['uploadsetting']['image']['extentions'] = $_W['config']['upload']['image']['extentions'];
			$_W['uploadsetting']['image']['limit'] = $_W['config']['upload']['image']['limit'];
			
			if(!empty($dest_dir)){
				$extention = pathinfo($_FILES['imgFile']['name'], PATHINFO_EXTENSION);
				$dir = $_W['uploadsetting']['image']['folder'] .'/'. $dest_dir . '/';
				$fname = file_random_name(ATTACHMENT_ROOT . '/' . $dir, $extension);
				$file = file_upload($_FILES['imgFile'], 'image', $dir . $fname);
			}else{
				$file = file_upload($_FILES['imgFile'], 'image');
			}
			
			if (is_error($file)) {
				$result['message'] = $file['message'];
				frameCallback($_GPC['callback'], json_encode($result));
				exit;
			}
			
			if($thumb == 1 && $width > 0){
				$ret = file_image_thumb(ATTACHMENT_ROOT.'/'.$file['path'],'',$width);
				if(is_error($ret)){
					$result['message'] = $ret['message'];
					frameCallback($_GPC['callback'], json_encode($result));
					exit;
				}
				
				@unlink(ATTACHMENT_ROOT.'/'.$file['path']);
				$file['path'] = $ret;
			}
			
			$result['error'] = 0;
			$result['filename'] = $file['path'];
			$result['url'] = $_W['attachurl'] . $result['filename'];
			
			pdo_insert('core_attachment', array(
				'uniacid' => $_W['uniacid'],
				'uid' => $_W['uid'],
				'filename' => $_FILES['file']['name'],
				'attachment' => $result['filename'],
				'type' => 1,
				'createtime' => TIMESTAMP,
			));
			frameCallback($_GPC['callback'], json_encode($result));
			exit;
		}
		
		if (!empty($_FILES['file']['name'])) {
			if ($_FILES['file']['error'] != 0) {
				$result['message'] = '上传失败，请重试！';
				frameCallback($_GPC['callback'], json_encode($result));
				exit;
			}
			if (empty($_GPC['mediatype'])) {
				$_W['uploadsetting'] = array();
				$_W['uploadsetting']['image']['folder'] = 'images/' . $_W['uniacid'];
				$_W['uploadsetting']['image']['extentions'] = $_W['config']['upload']['image']['extentions'];
				$_W['uploadsetting']['image']['limit'] = $_W['config']['upload']['image']['limit'];
				if (isset($option['global']) && !empty($option['global'])) {
					$_W['uploadsetting']['image']['folder'] = 'images/global';
				}
			} else {
				$_W['uploadsetting'] = array();
				$_W['uploadsetting']['image']['folder'] = 'images/' . $_W['uniacid'];
				$_W['uploadsetting']['image']['extentions'] = array('jpg');
				if($_GPC['mediatype'] == 'image'){
					$_W['uploadsetting']['image']['limit'] = 1024;
				} elseif($_GPC['mediatype'] == 'thumb') {
					$_W['uploadsetting']['image']['limit'] = 64;
				} else {
					$result['message'] = '媒体类型不正确。';
					frameCallback($_GPC['callback'], json_encode($result));
					exit;
				}
			}
			
			if(empty($dest_dir)){
				$file = file_upload($_FILES['file']);
			} else {
				$extention = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
				$dir = $_W['uploadsetting']['image']['folder'] .'/'.$dest_dir.'/';
				$fname = file_random_name($dir, $extension);
				$file = file_upload($_FILES['file'], 'image', $dir . $fname);
			}
			if (is_error($file)) {
				$result['message'] = $file['message'];
				frameCallback($_GPC['callback'], json_encode($result));
				exit;
			}
			
			$path = ATTACHMENT_ROOT. '/' ;
			$srcfile = ATTACHMENT_ROOT . '/' . $file['path'];
			
			if (!empty($_GPC['mediatype'])) {				
				load()->model('account');
				$token = WeAccount::token(WeAccount::TYPE_WEIXIN);
				if (is_error($token)) {
					$result['message'] = $token['message'];
					frameCallback($_GPC['callback'], json_encode($result));
					exit;
				}
				$media = array(
					'type' => $_GPC['mediatype'],
					'media' => $srcfile
				);
				$sendapi = "http://file.api.weixin.qq.com/cgi-bin/media/upload?access_token={$token}&type={$media['type']}";
				$data = array(
					'media' => '@'.$media['media']
				);
				
				load()->func('communication');
				$response = ihttp_request($sendapi, $data);
				$response = json_decode($response['content'], true);
				
				if (!empty($response['type'])) {
					$ret = $response;
				} else {
					$ret = error($response['errcode'], $response['errmsg']);
				}
				
				if(is_error($ret)){
					$result['error'] = $ret['errno'];
					$result['message'] = $ret['errno'].': '.$ret['message'];
					frameCallback($_GPC['callback'], json_encode($result));
					exit;
				} elseif (!empty($ret['type'])) {
					$result['error'] = 0;
					if(!empty($ret['media_id'])){
						$result['media_id'] = $ret['media_id'];
					}
					if(!empty($ret['thumb_media_id'])){
						$result['media_id'] = $ret['thumb_media_id'];
					}
					$result['type'] = $ret['type'];
										$r = file_image_thumb($srcfile, '', 300);
					pdo_insert('core_wechats_attachment', array(
						'uniacid' => $_W['uniacid'],
						'uid' => $_W['uid'],
						'filename' => $_FILES['file']['name'],
						'attachment' => $r,
						'media_id' => $result['media_id'],
						'type' => $result['type'],
						'createtime' => $ret['created_at']
					));
					@unlink($srcfile);
					frameCallback($_GPC['callback'], json_encode($result));
					exit;
				}
			}
			
			if ($thumb == 1 && $width > 0) {
				$extention = pathinfo($srcfile, PATHINFO_EXTENSION);
				do {
					if(!empty($option['global'])){
						$filename = "{$_W['uploadsetting']['image']['folder']}/" . random(30) . ".{$extention}";
					} else {
						if(empty($dest_dir)){
							$filename = "{$_W['uploadsetting']['image']['folder']}/" . date('Y/m/'). random(30) . ".{$extention}";
						} else {
							$filename = "{$_W['uploadsetting']['image']['folder']}/" . $dest_dir .'/' . random(30) . ".{$extention}";
						}
					}
				} while(file_exists(ATTACHMENT_ROOT . '/' .$result['path']. $filename));
				$result['path'] .= $filename;
				$r = file_image_thumb($srcfile, $path . $result['path'], $option['width']);
				
				@unlink($srcfile);
				if (is_error($r)) {
					$result['message'] = $r['message'];
					frameCallback($_GPC['callback'], json_encode($result));
					exit;
				}
			} else {
				$result['path'] = $file['path'];
			}
			
			$result['filename'] = $result['path'];
			$result['url'] = $_W['attachurl'].$result['path'];
			$result['error'] = 0;
			
			pdo_insert('core_attachment', array(
				'uniacid' => $_W['uniacid'],
				'uid' => $_W['uid'],
				'filename' => $_FILES['file']['name'],
				'attachment' => $result['filename'],
				'type' => 1,
				'createtime' => TIMESTAMP,
			));
			frameCallback($_GPC['callback'], json_encode($result));
			exit;
		} else {
			$result['message'] = '请选择要上传的图片！';
			frameCallback($_GPC['callback'], json_encode($result));
			exit;
		}
				exit;
	} elseif($type == 'audio'){

		if (!empty($_FILES['file']['name'])) {
			if ($_FILES['file']['error'] != 0) {
				$result['message'] = '上传失败,请检查站点文件上传大小限制,或重试！';
				frameCallback($_GPC['callback'], json_encode($result));
				exit;
			}
			
			if(empty($_GPC['mediatype'])){
				$_W['uploadsetting'] = array();
				$_W['uploadsetting']['audio']['folder'] = 'audios/' . $_W['uniacid'];
				$_W['uploadsetting']['audio']['extentions'] = $_W['config']['upload']['audio']['extentions'];
				$_W['uploadsetting']['audio']['limit'] = $_W['config']['upload']['audio']['limit'];
			} else {
				$ext = end(explode('.', $_FILES['file']['name']));
				$ext = strtolower($ext);
				if(in_array($ext, array('mp3','amr'))){
					$_GPC['mediatype'] = 'voice';
				} elseif (in_array($ext, array('mp4'))){
					$_GPC['mediatype'] = 'video';
				}
				$_W['uploadsetting'] = array();
				$_W['uploadsetting']['audio']['folder'] = 'audios/' . $_W['uniacid'];
				if($_GPC['mediatype'] == 'voice'){
					$_W['uploadsetting']['audio']['extentions'] = array('mp3','amr');
					$_W['uploadsetting']['audio']['limit'] = 2048;
				} else if($_GPC['mediatype'] == 'video') {
					$_W['uploadsetting']['audio']['extentions'] = array('mp4');
					$_W['uploadsetting']['audio']['limit'] = 10240;
				} else {
					$result['message'] = '媒体类型不正确。';
					frameCallback($_GPC['callback'], json_encode($result));
					exit;
				}
			}
			
			load()->func('file');
			$file = file_upload($_FILES['file'], 'audio');
			if (is_error($file)) {
				$result['message'] = $file['message'];
				frameCallback($_GPC['callback'], json_encode($result));
				exit;
			}
			
			$path = IA_ROOT .'/'. $_W['config']['upload']['attachdir'].'/';
			$srcfile = $path . $file['path'];
			
			if (!empty($_GPC['mediatype'])) {
				
				load()->model('account');
				$token = WeAccount::token(WeAccount::TYPE_WEIXIN);
				if (is_error($token)) {
					$result['message'] = $token['message'];
					frameCallback($_GPC['callback'], json_encode($result));
					exit;
				}
				$media = array(
					'type' => $_GPC['mediatype'],
					'media' => $srcfile
				);
				$sendapi = "http://file.api.weixin.qq.com/cgi-bin/media/upload?access_token={$token}&type={$media['type']}";
				$data = array(
					'media' => '@'.$media['media']
				);
				load()->func('communication');
				$response = ihttp_request($sendapi, $data);
				$response = json_decode($response['content'], true);
				
				if (!empty($response['type'])) {
					$ret = $response;
				} else {
					$ret = error($response['errcode'], $response['errmsg']);
				}
				
				if(is_error($ret)){
					$result['error'] = $ret['errno'];
					$result['message'] = $ret['errno'].': '.$ret['message'];
					frameCallback($_GPC['callback'], json_encode($result));
					exit;
				} elseif (!empty($ret['type'])) {
					$result['error'] = 0;
					$result['media_id'] = $ret['media_id'];
					$result['type'] = $ret['type'];
					pdo_insert('core_wechats_attachment', array(
						'uniacid' => $_W['uniacid'],
						'uid' => $_W['uid'],
						'filename' => $_FILES['file']['name'],
						'attachment' => $file['path'],
						'media_id' => $result['media_id'],
						'type' => $result['type'],
						'createtime' => $ret['created_at']
					));
										frameCallback($_GPC['callback'], json_encode($result));
					exit;
				}
			}
			
			$result['path'] .= $file['path'];
			$result['error'] = 0;
			$result['filename'] = $result['path'];
			$result['url'] = $_W['attachurl'].$result['path'];
			
			pdo_insert('core_attachment', array(
				'uniacid' => $_W['uniacid'],
				'uid' => $_W['uid'],
				'filename' => $_FILES['file']['name'],
				'attachment' => $result['filename'],
				'type' => 2,
				'createtime' => TIMESTAMP,
			));
			frameCallback($_GPC['callback'], json_encode($result));
		} else {
			$result['message'] = '请选择要上传的音乐！';
			frameCallback($_GPC['callback'], json_encode($result));
		}
		exit;
	} } 
if ($do == 'browser') {
	
	function file_compare($a, $b) {
		if ($a['is_dir'] && !$b['is_dir']) {
			return -1;
		} elseif(!$a['is_dir'] && $b['is_dir']) {
			return 1;
		} elseif($a['is_dir'] && $b['is_dir']) {
			return strcmp($a['filename'], $b['filename']);
		} else {
			return $a['datetime'] < $b['datetime'] ? -1 : 1;
		}
	}
	
	if($type == 'image') {
		
		$path = $_GPC['path'];
		
		if(!empty($option['global'])){
			if(empty($path)){
				$rootpath = IA_ROOT .'/'.$_W['config']['upload']['attachdir'].'/'.'images/global';
				$currentpath = $rootpath;
				$currentimage = '';
			}else{
				$rootpath = IA_ROOT .'/'.$_W['config']['upload']['attachdir'].'/'.'images/global';
				$currentpath = $rootpath;
				$currentimage = str_replace('images/global/','',$_GPC['path']);
			}
		} else {
			$browser = 'images/'.$_W['uniacid'];
			$parentbrowser = 'images/'.$_W['uniacid'];
			
			if(empty($path)){
				$rootpath = IA_ROOT .'/'.$_W['config']['upload']['attachdir'].'/'.'images/'.$_W['uniacid'];
				$currentpath = $rootpath . $path;
				$currentimage = '';
			} else {
				$strs = explode('/', $path);
				if(isset($strs[0])){
					$imag = intval($strs[0]);
				}
				if(isset($strs[1])){
					$weid = intval($strs[1]);
				}
				
				if($weid == $_W['uniacid']){
					if (isset($strs[2])) {
						$year = strval($strs[2]);
					}
					if (isset($strs[3])) {
						if (strexists($strs[3], '.')) {
							$currentimage = strval($strs[3]);
						} else {
							$month = strval($strs[3]);
						}
					}
					if (isset($strs[4])) {
						if (strexists($strs[4], '.')) {
							$currentimage = strval($strs[4]);
						}
					}
				}
				
				$rootpath = ATTACHMENT_ROOT. '/' .'images/'.$_W['uniacid'];
				$currentpath = $rootpath;
				if(!empty($year)){
					$currentpath .= '/'.$year;
					$browser .= '/'.$year;
				}
				if(!empty($month)){
					$currentpath .= '/'.$month;
					$browser .= '/'.$month;
					$parentbrowser .= '/'.$year;
				}
			}
		}
		$exts = array('gif', 'jpg', 'jpeg', 'png', 'bmp');
		
				$files = array();
		if(empty($option['global'])){
			$files[] = array(
				'filename' => '..',
				'is_dir' => true,
				'datetime' => date('Y-m-d H:i:s', filemtime($file)),
			);
		}
		
		if (is_dir($currentpath)) {
			if ($handle = opendir($currentpath)) {
				while (false !== ($filename = readdir($handle))) {
					if($filename == '.') continue;
					if($filename == '..') continue;
					$file = $currentpath .'/'. $filename;
					$file = str_replace('//', '/', $file);
					if (is_dir($file)) {
						if(!empty($option['global'])){
							continue;
						}
						$files[] = array(
							'filename' => $filename,
							'is_dir' => true,
							'datetime' => date('Y-m-d H:i:s', filemtime($file)),
						);
					} else {
						$fileext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
						$entry = array();
						$entry['url'] = $_W['attachurl'].'images/'.$_W['uniacid'].'/'.$year.'/'.$month.'/'.$filename;
						$entry['filename'] = 'images/' . $_W['uniacid'] . '/'.$year.'/'.$month.'/' . $filename;
						if($option['global']){
							$entry['url'] = $_W['attachurl'] . 'images/global/'. $filename;
							$entry['filename'] = 'images/global/'. $filename;
						}
						$entry['url'] = str_replace('//', '/', $entry['url']);
						$entry['url'] = str_replace(':/', '://', $entry['url']);
						$entry['filename'] = str_replace('//', '/', $entry['filename']);
						$files[] = array(
							'filename' => $filename,
							'is_dir' => false,
							'is_photo' => in_array($fileext, $exts),
							'filesize' => filesize($file),
							'filetype' => $fileext,
							'url' => $entry['url'],
							'attachment' => $entry['filename'],
							'entry' => str_replace('"', '\'', json_encode($entry)),
							'datetime' => date('Y-m-d H:i:s', filemtime($file)),
						);
					}
				}
			}
		}
		usort($files, 'file_compare');
		$callback = $_GPC['callback'];
		template('utility/file-browser');
		exit;
	}
	
	if($type == 'audio') {
		
		$path = $_GPC['path'];
		$path = str_replace('..', '', $path);
		$path = str_replace('//', '', $path);
		$path = rtrim($path, '/');
		$path .= '/';
		
		$rootpath = IA_ROOT .'/'.$_W['config']['upload']['attachdir'].'/'.'audios/'.$_W['uniacid'];
		$exts = array('mp3');
		
		$currentpath = $rootpath . $path;
		if ($path == '/') {
			$currentpath = $rootpath . $path;
		}
		
				$files = array();
		if (is_dir($currentpath)) {
			if ($handle = opendir($currentpath)) {
				while (false !== ($filename = readdir($handle))) {
					if($filename == '.') continue;
					if($path == '/' && $filename == '..') continue;
					$file = $currentpath . $filename;
					if (is_dir($file)) {
						$files[] = array(
							'filename' => $filename,
							'is_dir' => true,
							'datetime' => date('Y-m-d H:i:s', filemtime($file)),
						);
					} else {
						$fileext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
						$entry = array();
						$entry['url'] = $_W['attachurl'] . 'audios/' . $_W['uniacid'] . '' . $path . $filename;
						$entry['filename'] = 'audios/' . $_W['uniacid'] . '' . $path . $filename;
						$files[] = array(
							'filename' => $filename,
							'is_dir' => false,
							'is_photo' => in_array($fileext, $exts),
							'filesize' => filesize($file),
							'filetype' => $fileext,
							'url' => $entry['url'],
							'attachment'=>$entry['filename'],
							'entry' => str_replace('"', '\'', json_encode($entry)),
							'datetime' => date('Y-m-d H:i:s', filemtime($file)),
						);
					}
				}
			}
		}
		usort($files, 'file_compare');
		$callback = $_GPC['callback'];
		template('utility/file-browser');
		exit;
	}
}

if ($do == 'delete') {
	
	if (empty($_GPC['file'])) {
		$result['message'] = '请选择要删除的图片！';
		exit(json_encode($result));
	}
	if (empty($_W['isfounder']) && !empty($option['global'])) {
		$result['message'] = '没有删除 global 文件夹中图片的权限.';
		exit(json_encode($result));
	}
	$attachment = $_GPC['file'];
	load()->func('file');
	file_delete($attachment);
	if(empty($option['global'])){
		pdo_delete('core_attachment', array('uniacid'=>$_W['uniacid'], 'attachment'=>$attachment));
	}else{
		pdo_delete('core_attachment', array('attachment'=>$attachment));
	}
	exit('success');
}

function frameCallback($callback, $val) {
	echo '<script type="text/javascript">window.parent.' . $callback . '(' . $val . ');</script>';
	exit;
}