<?php
/**
 * 自定义函数
 */
if (!defined('__TYPECHO_ROOT_DIR__'))
	exit ;

//获取文章图片
function img_postthemb($thiz, $default_img) {
	$content = $thiz -> content;
	$ret = preg_match("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $content, $thumbUrl);
	if ($ret === 1 && count($thumbUrl) == 2) {
		return $thumbUrl[1];
	} else {
		return $default_img;
	}
}

//开始时间
function timer_start() {
	global $timestart;
	$mtime = explode(' ', microtime());
	$timestart = $mtime[1] + $mtime[0];
	return true;
}

timer_start();

//结束时间
function timer_stop($display = 0, $precision = 3) {
	global $timestart, $timeend;
	$mtime = explode(' ', microtime());
	$timeend = $mtime[1] + $mtime[0];
	$timetotal = $timeend - $timestart;
	$r = number_format($timetotal, $precision);
	if ($display)
		echo $r;
	return $r;
}
