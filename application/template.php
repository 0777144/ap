<!DOCTYPE html>
<html>
<head>
	<title>Estate</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="/ap/css/style.css">
	<script src="/ap/js/jquery-1.6.2.js"></script>
	<script src="/ap/js/sc.js"></script>

</head>
<body>
	<div id="menu"><? include "application/components/menu.php";?></div>
	
	<div id="page_layout">
		<div id="page_header"><?=$header;?></div>
		<div id="page_body">
			<div id="content"><? include "application/content/$content";?></div>
		</div>
		<div id="page_footer"></div>
		<div class="clear"></div>
	</div>
</body>
</html>