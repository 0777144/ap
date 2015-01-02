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