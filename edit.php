<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width"/>
<link href="details.css" rel="stylesheet" />
</head>
<body>
<div class="all">
	<!-- 标题部分 -->
	<div class="top">
		<a href="07161707.php">
			<div class="back"><img src="img/返回.png"/></div>
		</a>
		<div class="h1">发表话题</div>
	</div>
	<form role="form" action="editdo.php" method='post'>
		<!-- 内容部分 -->
		<input type="text" name="title" class="Etitle" placeholder="请输入标题">
		<input type="text" name="content" class="Econtent" placeholder="请输入内容">

		<!-- 页脚部分 -->
		<input type="submit" name="published" value="发表" class="Epublished">
	</form>

</div>
</body>
</html>