<h1>Страница добавления накладной</h1>
<form action="/invoices/add" class="form-custom" method="POST">
    <label class="form-custom__label">Поставщик</label>
    <?php include 'app/includes/suppliers-choice.php' ?>
    <label class="form-custom__label">Стоимость</label>
    <input type="text" class="form-custom__input" name="price" placeholder="Цена">

    <input type="submit" value="Отправить" class="form-custom__button">
</form>