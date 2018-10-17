<?php
header ( "content-type:text/html;charset=utf-8" );
	$id = $_REQUEST['id'];
	require_once 'dbconfig.php';
	// 删除语句
	$sql = "delete from user where id='$id'";
	//exit($sql);
	$result = mysql_query ( $sql, $conn );
	if ($result) {
		echo "删除成功";
		header("location:07161707.php");
	} else {
		echo "删除失败";
		header("location:07161707.php");
	}

?>