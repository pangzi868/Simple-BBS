<?php
require_once 'dbconfig.php';
// 访问user
$query = "select * from user";
$result = mysql_query($query);
$id = array();
$name = array();
$title = array();
$content = array();
$praise = array();
$comments = array();
$head = array();
$img1 = array();
$img2 = array();
$img3 = array();
$date = array();
$index = 0;
while ($row = mysql_fetch_array($result)) {
	$id[] = $row['id'];
	$name[] = $row['name'];
	$title[] = $row['title'];
	$content[] = $row['content'];
	$praise[] = $row['praise'];
	$comments[] = $row['comments'];
	$head[] = $row['head'];
	$img1[] = $row['img1'];
	$img2[] = $row['img2'];
	$img3[] = $row['img3'];
	$date[] = $row['Tdata'];
	$index++;
}
?>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width"/>
<script type="text/javascript" src="jquery-1.8.3.js"></script>
<link href="07161707.css" rel="stylesheet" />
</head>
<body>
<div class="a">
	<div class="c"><a href="edit.php"><img src="img/编辑.png"/></a></div>
	<div class="T">话题</div>
</div>
<?php 
for ($i = $index -1; $i >= 0; $i--) {
 ?>
<div class="aaa">
	<a href="details.php?id=<?php echo $id[$i] ?>">
		<div class="h">
			<div class="f"><img src="<?php echo $head[$i] ?>"/></div>
			<div class="g"><?php echo $name[$i];?>
				<div class="j"><?php echo $date[$i];?></div>
			</div>
			<div class="i"><a href="delete.php?id=<?php echo $id[$i];?>"><img src="img/delete.png"/></a></div>
		</div>
		<div id="hehe">
				<li><?php echo $title[$i];?></li>
		</div>
		<div class="l"><?php echo $content[$i];?></div>

		<?php 
			if (!is_null($img1[$i])) {
			 ?>

		<div class="x">
			<div class="m"><img src="<?php echo $img1[$i];?>"/></div>
			<div class="n"><img src="<?php echo $img2[$i];?>"/></div>
			<div class="o"><img src="<?php echo $img3[$i];?>"/></div>
		</div>

		<?php 
			}
		 ?>

	</a>
	<div class="r">
		<div class="p"><img src="img/parise.png"/></div>
		<div class="s"><?php echo $praise[$i];?></div>
		<div class="t"><img src="img/comments.png"/></div>
		<div class="u"><?php echo $comments[$i];?></div>
	</div>
</div>
<?php 
	}
 ?>

	<script type="text/javascript">
		$(function(){
			$('.p').click(function(){
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