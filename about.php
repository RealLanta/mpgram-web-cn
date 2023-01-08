<?php

include 'redirect.php';

header('Content-Type: text/html; charset=utf-8');
header('Cache-Control: private, no-cache, no-store');
include 'mp.php';
$theme = MP::getSettingInt('theme', 0);
include 'themes.php';
Themes::setTheme($theme);
$lng = MP::initLocale1();
echo MP::x('<head><title>'.$lng['about'].'</title>');
echo Themes::head();
echo '</head>';
echo Themes::bodyStart();
echo MP::x('<div><a href="login.php">'.$lng['back'].'</a></div>');
echo '<h1>MPGram Web</h1>';
echo MP::x('<p>MPGram Web (别名 MIDletPascalGram Web) 是一个基于 MadelineProto 运行库的简洁 Telegram 客户端, 用于支持互联网访问和基本 HTML 和 CSS 的设备使用</p>');
echo MP::x('<p>中文翻译由 <a href="https://github.com/RealLanta">RealLanta</a> 进行翻译工作</p>');
echo MP::x('<p>社交媒体:<br>');
echo '<a href="https://github.com/RealLanta/mpgram-web-cn">GitHub（中文版）</a><br>';
echo '<a href="https://github.com/shinovon/mpgram-web">GitHub（原版）</a><br>';
if(MP::getUser()) {
	echo '<a href="chat.php?c=nnmidletschat">Discussion chat</a>';
} else {
	echo '<a href="https://t.me/nnmidletschat">Discussion chat</a>';
}
echo '</p>';
echo MP::x('<p>开发者:<br>');
echo '<b>Shinovon</b> <a href="https://github.com/shinovon">github</a>';
echo ' <a href="https://t.me/shinovon">t.me</a>';
echo '<br>';
echo MP::x('<b>MuseCat77</b></i>');
echo ' <a href="https://github.com/musecat77">github</a>';
echo ' <a href="https://t.me/musecat77">t.me</a>';
echo '</p>';
echo MP::x('<p>Idea author:<br>');
echo '<b>twsparkle</b> <a href="https://github.com/diller444">github</a>';
echo ' <a href="https://t.me/twsparkle">t.me</a>';
echo '</p>';
echo '<p><small>';
try {
	$date = exec("git log -1 --format=%ci");
	$commit = exec("git rev-list HEAD --max-count=1 --abbrev-commit");
	$branch = exec("git branch | sed '/* /s///p'");
	if(strpos($date, ' ') !== false) {
		$date = substr($date,0, strpos($date, ' '));
	}
	$date = str_replace('-', '.', $date);
	echo 'Date: '.$date.'<br>';
	echo 'Commit: '.$commit.'<br>';
	echo 'Branch: '.$branch;
} catch (Exception $e) {
	echo 'Error getting version:<br>';
	echo '<xmp>'.$e->getMessage()."\n".$e->getTraceAsString().'</xmp>';
}
echo '</small></p>';
echo Themes::bodyEnd();