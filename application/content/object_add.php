
    
        <form enctype="multipart/form-data" >
            <div class="block1">
                <div class="field_block">
                    <div class="field">
                         <label>Город</label>
                            <select name="city" class="soflow">
                                <option value="7700000000000" >Москва</option>
                                <option value="7800000000000" selected>Санкт-Петербург</option>
                            </select>
                    </div>
                    <div class="field">
                        <label>Улица</label>
                        <input name="street" type="text">
                    </div>
                    <div class="field">
                        <label>Дом</label>
                        <input name="building" type="text">
                    </div>
                    <div class="field">
                        <label>Район</label>
                        <select name="area" class="soflow">
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
                    <div class="field">
                        <label>Метро</label>
                        <input type="text" name="metro">
                    </div>
                </div>
                <div id="map" class="panel-map"></div>
        </div>

        <div class="block1">
            Описание объекта<br>
            <div class="field">
                <label>Комнат: </label>
                <input type="text"><br>
            </div>
            Площадь: 
            <div class="field">
                <label>Общая</label>
                <input type="text"> 
            </div>
            <div class="field">
                <label>Жилая</label>
                <input type="text">
            </div>
            <div class="field">
                <label>Кухни</label>
                 <input type="text"><br>
            </div>
            <div class="field">
                <label>Этаж: </label>
                <input type="text">
            </div>
            <div class="field">
                <labe> Этажность: </labe>
                <input type="text"><br>
            </div>
        </div>
        <div class="block1">
            Дополнительно<br>
                <input type="checkbox"> Лифт <br>
                <input type="checkbox">  Балкон <br>
                <input type="checkbox"> Телефон<br>
        
                <input type="checkbox"> Мусоропровод <br>
                <input type="checkbox">  Лоджия <br>
                <input type="checkbox"> Возможность ипотеки<br>
        </div>
        <div class="block1">
            Примечание: <br>
            <div class="field">
                <textarea rows="10" cols="60" placeholder="Впишите сюда дополнительные сведения об объекте, условия оплаты и любую другую информацию, которая поможет вашим потенциальным покупателям принять решение о покупке."></textarea><br>
            </div>
            <div class="field">
                Фото:<br>
                <input type="file">
            </div>
        </div>
        <div class="block1">
            Контакты<br>
            <div class="field">
                Контактное лицо: <input type="text">
            </div>
            <div class="field">
                Телефон: <input type="text"><br>
            </div>
            <div class="field">
                Стоимость: <input type="text"><br>
            </div>
            <input type="submit" value="Разместить объявление">
        </div>
    </form>
