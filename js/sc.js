window.onload = function(){
 
  // вызов нужных функций скрипта

}

window.onclick = function(){
	if(event.target.parentNode.className=="menu"){
		switch(event.target.id){
			case 'enter':
				$.ajax({
		  			url: "/ap/application/components/form_enter.php",
		 			success: function(data){
		 				$('body').prepend('<div id="dark_layer"><div id="layer_content">' + data + '\n</div></div>');
		  			}
				});
				break;
			case 'exit':
				$.ajax({
		  			url: "/ap/application/func/exit.php",
		  			success: function(data){
						window.location.reload();		
		  			}
				});	
				break;
		}
	}

	switch(event.target.id){
		case 'dark_layer':
			$('#dark_layer').remove();
			break;
	}
	if(event.target.id=="bttn_enter"){

		//var s = $('#form_enter').serializeArray();
		//alert(s[0]['value']+s[1]['value']);
		
		//var s = $('#form_enter').serialize();
		//alert(s);
		
		var data = $('#form_enter').serialize(); // подготавливаем данные
		$.ajax({
  			url: "/ap/application/func/enter.php",
			type:'POST',
  			data: data,
 			success: function(response){
 				if(response=="yes"){
 					$('#dark_layer').remove();
 					window.location.reload();	
 				}
  			}
		});
	}
	if(event.target.id=="bttn_reg"){
		var data = $('#form_reg').serialize(); // подготавливаем данные
		$.ajax({
  			url: "/ap/application/func/reg.php",
			type:'POST',
  			data: data,
 			success: function(response){
 					$('#form_reg').remove();
 					$('#content').prepend('<form id="form_reg2">Введите пароль из смс:<br><input type="text" name="check" id="check"><br><input type="button" name="" id="bttn_reg2" value="Send"><br></form>');

  			}
		});
	}
	
	if(event.target.id=="bttn_reg2"){
		var data = $('#check').val(); // подготавливаем данные
		$.ajax({
  			url: "/ap/application/func/reg2.php",
			type:'POST',
  			data: data,
 			success: function(response){
 					if(response == data){
 						$('#form_reg2').remove();
 						window.location.replace("/ap/");	
 					}

  			}
		});
	}
	
}