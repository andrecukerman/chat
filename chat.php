<?php

include_once 'Db.php';
$db = Db::getInstance();

$lastDate = $db->query("SELECT MAX(datetime) as dates FROM messages LIMIT 1");
header('last-modified:'.$lastDate['dates']);
if(!empty($_POST['msg'])){
	$db->insert($_POST);
	
}
if(!empty($_GET['msg'])){
	$result = $db->getAll("SELECT msg, name, datetime FROM messages WHERE datetime > '".urldecode($_GET['msg']."'"));
	header("Content-Type: application/json");
	echo json_encode($result);
}
