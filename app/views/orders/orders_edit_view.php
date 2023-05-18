<h1>Страница редактирования заказа</h1>

<form action="/orders/edit" class="form-custom" method="POST">
    <?php echo '<input type="hidden" class="form-custom__input" name="order" placeholder="Заказ" value="' . $data["Код заказа"] .'">'?>


    <label class="form-custom__label">Наименование получателя</label>
    <?php echo '<input type="text" class="form-custom__input" name="name" placeholder="Наименование получателя" value="' . $data["Наименование получателя"] .'">'?>
    <label class="form-custom__label">Адрес получателя</label>
    <?php echo '<input type="text" class="form-custom__input" name="address" placeholder="Адрес получателя" value="' . $data["Адрес получателя"] .'">'?>

    <input type="submit" value="Отправить" class="form-custom__button">
</form> 