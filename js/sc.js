
$(function () {

	popupDialog('#enter','form_enter');


	window.onclick = function(){
			switch(event.target.id){
			case 'overlay':
				$('#overlay').remove();
				break;
			case 'exit':
				$.ajax({
		  			url: "/ap/user/logout",
		  			success: function(data){
						window.location.reload();		
		  			}
				});	
				break;
		}
	}


	sendForm('#bttn_registration', function action(){ window.location.replace("/ap/");});
	sendForm('#bttn_enter',function action(){ window.location.replace("/ap/");});


});


	function popupDialog(element, content_name){//на какую кнопку or link какой файл выводить на overlay
		$('body').on('click',element, function(){
			$.ajax({
				url: "/ap/popup/open?content_name=" + content_name,
				success: function(data){
					$('body').prepend('<div id="overlay"><div class="popup" >' + data + '\n</div></div>');
				}
			});
		});	
	}

	function sendForm(button, action){
		$('body').on('click',button, function(){
			var form = $(button).parent();
			var data = form.serialize(); // подготавливаем данные
			//alert(data);//
			var args = form.attr('id').split('_');
			//alert(args[0]+"/"+args[1]);
			$.ajax({
	  			url: "/ap/" + args[0] + "/" + args[1],
				type:'POST',
	  			data: data,
	 			success: function(response){
	 				alert(response);
	 				//action();
	  			}
			});			
		});
	}


function regformhash(form, user_phone, user_password, user_confpassword, email) {
    // Check each field has a value
    if (user_phone.value == '' || user_password.value == '' || user_confpassword.value == '' || email.value == '') {
        alert('You must provide all the requested details. Please try again');
        return false;
    }
    
    // Check the username
    var re = /^\+7[0-9]{10}$/; //!!!написать регулярку на +71234567890
    if(!re.test(form.user_phone.value)) { 
        alert("User phone must be like +79345671234 Please try again"); 
        form.user_phone.focus();
        return false; 
    }
    
    // Check that the password is sufficiently long (min 6 chars)
    // The check is duplicated below, but this is included to give more
    // specific guidance to the user
    if (user_password.value.length < 6) {
        alert('Passwords must be at least 6 characters long.  Please try again');
        form.user_password.focus();
        return false;
    }
    
    // At least one number, one lowercase and one uppercase letter 
    // At least six characters 
    re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/; 
    if (!re.test(user_password.value)) {
        alert('Passwords must contain at least one number, one lowercase and one uppercase letter.  Please try again');
        return false;
    }
    
    // Check password and confirmation are the same
    if (user_password.value != user_confpassword.value) {
        alert('Your password and confirmation do not match. Please try again');
        form.user_password.focus();
        return false;
    }
        
    // Create a new element input, this will be our hashed password field. 
    var p = document.createElement("input");

    // Add the new element to our form. 
    form.appendChild(p);
    p.name = "p";
    p.type = "text";
    p.value = hex_sha512(user_password.value);

    // Make sure the plaintext password doesn't get sent. 
    user_password.value = "";
    user_confpassword.value = "";

    // Finally submit the form. 
    //form.submit();
    return true;
}


/*
window.onload = function(){
 
  // вызов нужных функций скрипта

}

window.onclick = function(){
	if(event.target.parentNode.className=="menu"){
		switch(event.target.id){/*
			case 'enter':
				$.ajax({
		  			url: "/ap/application/content/-pdialog-form_enter.php",
		 			success: function(data){
		 				$('body').prepend('<div id="dark_layer"><div id="layer_content">' + data + '\n</div></div>');
		  			}
				});
				break;
			case 'exit':
				$.ajax({
		  			url: "/ap/application/func/user_exit.php",
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
  			url: "/ap/application/func/user_enter.php",
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
  			url: "/ap/application/func/user_reg.php",
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
*/