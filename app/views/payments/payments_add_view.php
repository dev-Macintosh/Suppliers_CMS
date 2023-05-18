<h1>Страница добавления оплаты за заказ</h1>

<form action="/payments/add" class="form-custom" method="POST">
    <?php echo '<input type="hidden" class="form-custom__input" name="order" placeholder="Заказ" value="' . $data["Код заказа"] .'">'?>

    <label class="form-custom__label">Тип оплаты</label>
    <?php include 'app/includes/payment-type-choice.php' ?>
    <label class="form-custom__label">Сумма</label>
    <input type="number" class="form-custom__input" name="price" placeholder="Цена">


    <input type="submit" value="Отправить" class="form-custom__button">
</form>