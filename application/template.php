<!DOCTYPE html>
<html>
<head>
	<title>Estate</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="/ap/css/style.css">
	
	<script src="/ap/js/debug.js"></script>
	
	<script src="/ap/js/lib/jquery-2.1.1.js"></script>
	<script src="/ap/js/sc2.js"></script>
	<?=$args['links'];?>
	<?=$args['scripts'];?>


</head>
<body>
	<? include_once "application/content/menu.php";?>
	
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