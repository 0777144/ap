 <div class="address">
    <h1>Форма для ввода адреса с картой</h1>
    <div class="col-1">
        <form class="js-form-address">
            <div class="field">
                 <label>Город</label>
                    <select name="city">
                        <option value="7700000000000" >Москва</option>
                        <option value="7800000000000" selected>Санкт-Петербург</option>
                    </select>
            </div>
            <div class="field">
                <label>Улица</label>
                <input name="street" type="text">
            </div>
            <div class="field">
                <label>Номер дома</label>
                <input name="building" type="text">
            </div>
            <div class="field">
                <label>Район</label>
                <select name="area">
                    <option okato="40262"> Адмиралтейский район</option>
                    <option okato="40263"> Василеостровский район</option>
                    <option okato="40265"> Выборгский район</option>
                    <option okato="40273"> Калининский район</option>
                    <option okato="40276"> Кировский район</option>
                    <option okato="40277"> Колпинский район</option>
                    <option okato="40278"> Красногвардейский район</option>
                    <option okato="40279"> Красносельский район</option>
                    <option okato="40280"> Кронштадтский район</option>
                    <option okato="40290"> Петродворцовый район</option>
                    <option okato="40270"> Приморский район</option>
                </select>
            </div>
        </form>
    </div>
    <div class="col-2">
        <div id="map" class="panel-map"></div>
    </div>
</div>

<!-- <form method="post" action="" enctype="multipart/form-data" class="basic-grey addobj">
    <h1>Адрес</h1><br>
    Город:
    <select>
        <option value="Москва">Москва</option>
        <option value="Сочи">Сочи</option>
        <option value="Екатеринбург">Екатеринбург</option>
        <option value="Санкт-Петербург" selected >Санкт-Петербург</option>
    </select><br>
    Улица:
    <input type="text">
    Дом:
    <input type="text"><br>
    <h1>Описание объекта</h1><br>
    Комнат: <input type="text">
    Площадь: <input type="text"> / <input type="text"> / <input type="text"><br>
    Этаж: <input type="text"> / Этажность: <input type="text"><br>
    <h1>Дополнительно</h1><br>
    <input type="checkbox"> Лифт <input type="checkbox">  Балкон <input type="checkbox"> Телефон<br>
    <input type="checkbox"> Мусоропровод <input type="checkbox">  Лоджия <input type="checkbox"> Возможность ипотеки<br>
    Примечание: <br>
    <textarea rows="10" cols="60" placeholder="Впишите сюда дополнительные сведения об объекте, условия оплаты и любую другую информацию, которая поможет вашим потенциальным покупателям принять решение о покупке."></textarea><br>
    Фото:<br>
    <input type="file">
    <h1>Контакты</h1><br>
    Контактное лицо: <input type="text">
    Телефон: <input type="text"><br>
    Стоимость: <input type="text"><br>
    <input type="submit" value="Разместить объявление">
</form> -->