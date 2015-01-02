<ul id="menu">
	<li><a href="/ap/">FindHome</a></li>
	
	
	<?if($logged == 'in'):?>
		<li><a href="/ap/object/add">Добавить объявление</a></li>
	<?endif?>
		
	<span class="right">
		<?if($logged == 'out'):?>
			<li><a href="/ap/user/login_form">Войти</a></li>
			<li><a href="/ap/reg">Зарегистрироваться</a></li>
		<?elseif ($logged == 'in'):?>
			<li><a id="logout" href="/ap/user/logout">Выйти</a></li>
			<li><a href="/ap/user/profile"><?=$_SESSION['user_name'];?></a></li>
		<?endif?>
	</span>		

</ul>