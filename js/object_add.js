$(function () {
	
	/* */
	    var $city = $('[name="city"]'),
        	$street = $('[name="street"]'),
        	$building = $('[name="building"]');

    var map = null,
        map_created = false;

    $.kladr.setDefault({
        parentInput: '.js-form-address',
        verify: true,
        parentType: $.kladr.type.city,
        parentId: $city.val(),
        select: function (obj) {
            if(obj['okato'])setArea(obj);
            //addressUpdate();
            mapUpdate();
            if(obj['contentType']=='street'){
                $building.kladr('controller').clear();
                $building.focus();
            }
        },
        check: function (obj) {
            //addressUpdate();
            mapUpdate();
        },
        checkBefore: function () {
            var $input = $(this);

            if (!$.trim($input.val())) {
                //addressUpdate();
                mapUpdate();
                return false;
            }
        },
        valueFormat: function (obj, query) {
            var value = '';

            var name = obj.name.toLowerCase();
            query = query.name.toLowerCase();

            value += obj.typeShort + '. ' + name;

            return value;
        }
    });

    //$city.kladr('type', $.kladr.type.city);
    $street.kladr('type', $.kladr.type.street);
    $building.kladr('type', $.kladr.type.building);

    //$city.kladr('withParents', true);

    $city.change(function(){
        // Изменение родительского объекта для автодополнения улиц
        $street.kladr({parentId: $city.val()});
        $street.val('');
        $building.val('');
        $street.kladr('controller').clear();
        $building.kladr('controller').clear();
        //addressUpdate();
        mapUpdate();
    });

    // Отключаем проверку введённых данных для строений
    $building.kladr('verify', false);


   

    ymaps.ready(function () {
        if (map_created) return;
        map_created = true;

        map = new ymaps.Map('map', {
            center: [59.94, 30.30],
            zoom: 12,
            controls: []
        });

        map.controls.add('zoomControl', {
            position: {
                right: 10,
                top: 10
            }
        });

        //addressUpdate();
        mapUpdate();
    });



    function mapUpdate() {
        var zoom = 10;

        var address = $.kladr.getAddress('.js-form-address', function (objs) {
            var result = 'г. ' + $(':selected').text();
            
            $.each(objs, function (i, obj) {
                var name = '',
                    type = '';

                if ($.type(obj) === 'object') {
                    name = obj.name;
                    type = ' ' + obj.type;

                    switch (obj.contentType) {
                        case $.kladr.type.city:
                            zoom = 10;
                            break;

                        case $.kladr.type.street:
                            zoom = 13;
                            break;

                        case $.kladr.type.building:
                            zoom = 16;
                            break;
                    }
                }
                else {
                    name = obj;
                }

                if (result) result += ', ';
                result += type + name;
            });

            return result;
        });

        if (address && map_created) {
            var geocode = ymaps.geocode(address);
            geocode.then(function (res) {
                map.geoObjects.each(function (geoObject) {
                    map.geoObjects.remove(geoObject);
                });

                var position = res.geoObjects.get(0).geometry.getCoordinates(),
                    placemark = new ymaps.Placemark(position, {}, {});

                map.geoObjects.add(placemark);
                map.setCenter(position, zoom);
            });
        }
    }

/*    function addressUpdate() {
        var address = $.kladr.getAddress('.js-form-address', function (objs) {
            var result = 'г. ' + $(':selected').text();
            
            $.each(objs, function (i, obj) {
                var name = '',
                    type = '';

                if ($.type(obj) === 'object') {
                    name = ' ' + obj.name;
                    type = ' ' + obj.typeShort + '.';
                }
                else {
                    name = obj;
                }

                if (result) result += ', ';
                result += type + name;
            });

            return result;

    });

        //$('#address').text(address);
    }*/

    function setArea(obj) {
        var okato, i;
        okato = obj['okato'].substr(0,5);
        $('[okato='+okato+']').attr("selected","selected");
    }
	/**/

});