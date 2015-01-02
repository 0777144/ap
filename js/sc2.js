$(function main() {
    //alert("ready-sc2.js");
	popupDialog('#login','form_login');
    function openDialog() {
        alert("a");
        $.ajax({
            url: "/ap/popup/open?content_name=" + content_name,
            success: function(data){
                $('body').prepend('<div id="overlay"><div class="popup" >' + data + '\n</div></div>');
            }
        });
        return false;
    }
    

	$('body').on('click','#bttn_registration', function(){
		var form = $('#bttn_registration').parent();
		var data = form.serializeArray(); // подготавливаем данные
		data[1]['value']=hex_sha512(data[1]['value']); 
		data[2]['value']=0;
		//alert(data);//
		var args = form.attr('id').split('_');
		//alert(args[0]+"/"+args[1]);
		$.ajax({
				url: "/ap/" + args[0] + "/" + args[1],
			type:'POST',
				data: data,
				success: function(response){
					alert(response);
					window.location.replace("/ap/");
				}
		});			
	});

	$('body').on('click','#bttn_enter', function(){
		var form = $('#bttn_enter').parent();
		var data = form.serializeArray(); // подготавливаем данные
		data[1]['value']=hex_sha512(data[1]['value']); 
		//alert(data[1]['value']);//
		var args = form.attr('id').split('_');
		//alert(args[0]+"/"+args[1]);
		$.ajax({
  			url: "/ap/" + args[0] + "/" + args[1],
			type:'POST',
  			data: data,
 			success: function(response){
 				//alert(response);
 				window.location.replace("/ap/");
  			}
		});		
	});

	$('#logout').on('click',function(){
		$.ajax({
			url: "/ap/user/logout",
			type:'POST',
				success: function(response){
					//alert(response);
					window.location.replace("/ap/");
				}
		});		
	});

});



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