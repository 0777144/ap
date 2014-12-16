<ul class="menu">
	<li><a href="/ap/">ap-mainpage</a></li>
	<?if(!isset($_SESSION['AUTH'])):?>
		<li id="enter">enter</li>
		<li><a href="/ap/registration/">registration</a></li>
	<?elseif(isset($_SESSION['AUTH'])):?>
	<li><a href="/ap/object/add">add object</a></li>
	<li id="exit">exit</li>
		<?=$_SESSION['USER_NAME']; ?>
	<?endif?>
</ul>