<?php
require_once 'dbconfig.php';
// 访问传过来的id对应的用户名与信息
$id = $_REQUEST ['id'];
$query = "select * from user where id=$id";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
// 访问comments中指定的userId
if ($id < 3) {
	$query1 = "select * from comments where userId=$id";
}else{
	$query1 = "select * from comments where userId=3";
}
$result1 = mysql_query($query1);
$comname1 = array();
$content1 = array();
$comments1 = array();
$praise1 = array();
$userId1 = array();
$index = 0;
while ($row1 = mysql_fetch_array($result1)) {
	$comname1[] = $row1['comname'];
	$content1[] = $row1['content'];
	$comments1[] = $row1['comments'];
	$praise1[] = $row1['praise'];
	$userId1[] = $row1['userId'];
	$index++;
}
//判断评论内容是否为空
if ($content1[0] != null) {
	$CN = count($content1);
}else{
	$CN = 0;
}
?>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width"/>
<script type="text/javascript" src="jquery-1.8.3.js"></script>
<link rel="stylesheet" type="text/css" href="details.css">
</head>
<body>
<div class="all">
	<!-- 标题部分 -->
	<div class="top">
		<a href="07161707.php">
			<div class="back"><img src="img/返回.png"/></div>
		</a>
			<div class="delete"><img src="img/编辑.png"/></div>
			<div class="h1">话题</div>
	</div>

	<!-- 内容部分 -->
	<div class="content">
		<div class="content-top">
			<div class="head1"><img src="<?php echo $row['head'] ?>"></div>
			<div class="h2">
				<li><?php echo $row['name'] ?></li>
				<li class="li">&nbsp;&nbsp;<?php echo $row['Tdata'] ?></li>
			</div>
			<div class="collection"><img src="img/收 藏.png"></div>
		</div>
		<div class="name">
			<li><?php echo $row['title'] ?></li>
		</div>
		<div class="inside-content"><?php echo $row['content'] ?></div>
		<?php
		if($row['img1'] != null){
		?>
		<div class="photo">
			<div class="photo1"><img src="<?php echo $row['img1'] ?>"/></div>
			<div class="photo1"><img src="<?php echo $row['img2'] ?>"/></div>
			<div class="photo1"><img src="<?php echo $row['img3'] ?>"/></div>
		</div>
		<?php
		}
		?>
	</div>

	<!-- 评论部分 -->
	
	<div class="content2">
		<div class="content2-top">热门评论（<?php echo $CN; ?>）</div>
		<?php 
			if ($content1[0] != null) {
				$CN = count($content1);
				for ($i = $index -1; $i >= 0; $i--) {
		 ?>
		 			<div class="content2">
		 				<div class="content2-head"><img src="img/头像2.png"></div>
						<div class="content2-h2">
							<li><?php echo $comname1[$i];?></li>
							<li class="li">&nbsp;&nbsp;2017-12-28 19:00</li>
						</div>
						<div class="content2-center"><?php echo $content1[$i];?></div>
						<div class="content2-delete"><img src="img/delete.png"></div>
						<div class="content2-bottom">
							<div class="content2-bottom-1"><img src="img/parise.png"/></div>
							<div class="content2-bottom-2"><?php echo $praise1[$i];?></div>
							<div class="content2-bottom-3"><img src="img/comments.png"/></div>
							<div class="content2-bottom-4"><?php echo $comments1[$i];?></div>
						</div>
		 			</div>
		<?php 
				}
			}else{
		?>
			<div class="nullContent">
				<p>暂无任何评论</p>
			</div>

		<?php
			}
		 ?>
	</div>
	
	<!-- 页脚部分 -->
	<div class="footer">
		<div class="footer-1">
			<img src="img/comments.png">
			<p class="char">评论</p>
		</div>
		<div class="footer-2">
			<img src="img/parise.png">
			<p class="char">赞</p>
		</div>
	</div>
</div>


	<script type="text/javascript">
		$(function(){
			$('.content2-bottom-1').click(function(){
				if ($(this).children().attr('src') == 'img/parised.png') {
					$(this).children().attr('src','img/parise.png');
					var PN = Number($(this).next().html()) - 1;
					$(this).next().html(PN);
				}else{
					$(this).children().attr('src','img/parised.png');
					var PN = Number($(this).next().html()) + 1;
					$(this).next().html(PN);
				}
			});
		});
	</script>
</body>
</html>