<?php
if(!isset($_GET['id'])) die();
$i = 0;
if(isset($_GET['i']))
	$i = $_GET['i'];
$limit = 0;
if(isset($_GET['l']))
	$limit = $_GET['l'];
include 'mp.php';
$user = MP::getUser();
if(!$user) die();
$id = $_GET['id'];
$timeoff = MP::getSettingInt('timeoff');
$lng = MP::initLocale1();

header('Content-Type: text/html; charset=utf-8');
header('Cache-Control: private, no-cache, no-store');

try {
	$MP = MP::getMadelineAPI($user);
	$r = $MP->messages->getHistory([
	'peer' => $id,
	'offset_id' => 0,
	'offset_date' => 0,
	'add_offset' => 0,
	'limit' => $limit,
	'max_id' => 0,
	'min_id' => $i,
	'hash' => 0]);
	$rm = $r['messages'];
	if(count($rm) == 0 || !isset($rm[0])) die();
	$info = $MP->getInfo($id);
	$name = null;
	$pm = false;
	$ch = false;
	if(isset($info['Chat'])) {
		$ch = isset($info['type']) && $info['type'] == 'channel';
		if(isset($info['Chat']['title'])) {
			$name = $info['Chat']['title'];
		}
	} else if(isset($info['User']) && isset($info['User']['first_name'])) {
		$name = $info['User']['first_name'];
		$pm = true;
	}
	$channel = isset($info['channel_id']);
	unset($info);
	echo $rm[0]['id'].'||';
	MP::addUsers($r['users'], $r['chats']);
	MP::printMessages($MP, $rm, $id, $pm, $ch, $lng, true, $name, $timeoff, $channel, true);
	// Mark as read
	try {
		if($ch || (int)$id < 0) {
			$MP->channels->readHistory(['channel' => $id, 'max_id' => 0]);
		} else {
			$MP->messages->readHistory(['peer' => $id, 'max_id' => 0]);
		}
	} catch (Exception $e) {
	}
	unset($rm);
	unset($r);
	MP::gc();
} catch (Exception $e) {
}
