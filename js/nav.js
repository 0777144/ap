$(function (){
	//alert("ready-nav.js");

	// $('#menu a[href]').attr('onclick','return false;').click(function(){
	// 	clearResourcer();
 //            /* Запоминаем адрес ссылки */
 //        var href = $(this).attr('href');
	// 	var URL = href.split('/');
	// 	var controller = URL[2] || 'main',
 //        action = URL[3] || 'index';
 //            /* Добавляем надпись загрузки по вкусу */
 //        $('#content').text('Loading...');
 //            /* Загружаем в объект с классом «wrapper» объект
 //            с классом «content» с другой страницы */
 //        $('#content').load('content/open?' + controller + '=' + action, function(){
 //              /* Меняем текст в адресной строке на тот, что был в адресе ссылки */
 //          history.pushState(null, null, href);
 //          loadContent(href);
 //        });
 //      });


});



function loadCss(path) {
    //alert('loading css ' + path);
    var links = document.getElementsByTagName('link');
    var baseURL = document.location.href.slice(0,-document.location.pathname.length);
    //проверка не загруженны ли еще такие css
    for (var key in links) { 
        var val = links[key].href;//
        if(val){
            val = val.slice(baseURL.length);
            if(path == val) return false;
        }
    }

    var head  = document.getElementsByTagName('head')[0];
    var link  = document.createElement('link');
    link.rel  = 'stylesheet';
    link.type = 'text/css';
    link.href = path;
    link.media = 'all';
    head.appendChild(link); 
}


function loadContent(link) {

	var URL = link.split('/');
	var controller = URL[2] || 'main',
        action = URL[3] || 'index';

    $.getJSON('/ap/js/resources.json', function(data){
        //alert(dump(data));

        for(var key in data[controller][action]['js']){
            $.getScript('/ap/js/' + data[controller][action]['js'][key]);
        }
        for(var key in data[controller][action]['css']){
            loadCss('/ap/css/' + data[controller][action]['css'][key]);
        }
    });
}



function clearResourcer() {
	var baseURL = document.location.href.slice(0,-document.location.pathname.length);
    var mainResorces = ["/ap/js/jquery-2.1.1.js","/ap/js/debug.js","/ap/js/sc2.js","/ap/css/style.css","/ap/js/nav.js"];
    var links = $('link'),
    	scripts = $('script');


    for(var key in links){
    	var val = links[key].href;
    	if(val){
            val = val.slice(baseURL.length);
            if($.inArray(val, mainResorces)=="-1")links[key].remove();
        }
    }
    for(var key in scripts){
    	var val = scripts[key].src;
    	if(val){
            val = val.slice(baseURL.length);
            if($.inArray(val, mainResorces)=="-1")scripts[key].remove();
        }
    }
}