<h1>Страница добавления заказа</h1>

<form action="/orders/add" class="form-custom" method="POST">

    <label class="form-custom__label">Наименование получателя</label>
    <input type="text" class="form-custom__input" name="name" placeholder="Наименование получателя">
    <label class="form-custom__label">Адрес получателя</label>
    <input type="text" class="form-custom__input" name="address" placeholder="Адрес получателя">


    <input type="submit" value="Отправить" class="form-custom__button">
</form>