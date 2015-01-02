<!DOCTYPE html>
<html>
<head>
	<title>Estate</title>
	 <meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="/ap/css/style.css">
	
	<script src="/ap/js/debug.js"></script>
	
	<script src="/ap/js/jquery-2.1.1.js"></script>
	<script src="/ap/js/sc2.js"></script>
	<script src="/ap/js/nav.js"></script>


	<script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
	<script src="/ap/js/sha512.js"></script>
	<script src="/ap/js/object_add.js"></script>
	
	



        <link href="/ap/js/jquery.kladr.min.css" rel="stylesheet">
        <link href="/ap/css/form_with_map.css" rel="stylesheet">
        <script src="/ap/js/jquery.kladr.min.js" type="text/javascript"></script>


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