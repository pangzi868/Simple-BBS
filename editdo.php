<?php
require_once 'dbconfig.php';
header ( "content-type:text/html;charset=utf-8" );

// 取表单数据
$title = $_REQUEST['title'];
$content = $_REQUEST['content'];
date_default_timezone_set("PRC");
$date = date("Ymd");
if ($title != null && $content != null) {
	// sql语句中字符串数据类型都要加引号，评论与赞数为0
	$sql = "INSERT INTO user(name, title, content, praise, comments, head, Tdata) VALUES ('西豪','$title','$content',0,0,'img/头像1.png','$date')";
	$sql1 = "INSERT INTO comments(comname, comments, praise, userId) VALUES ('南瓜',0,0,3);";
	if (mysql_query ( $sql ) && mysql_query( $sql1 )) {
		header("location:07161707.php");
	} else {
		header("location:edit.php");
	}
}else{
	header("location:edit.php");
}

?>


