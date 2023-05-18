<h1>Страница редактирования товара</h1>

<form action="/products/edit" class="form-custom" method="POST">
    <?php echo '<input type="hidden" class="form-custom__input" name="product" placeholder="Товар" value="' . $data["Код товара"] .'">'?>
    <label class="form-custom__label">Накладная</label>
    <?php include 'app/includes/invoices-choice.php' ?>
    <label class="form-custom__label">Код заказа</label>
    <?php include 'app/includes/orders-choice.php' ?>
    <label class="form-custom__label">Цена</label>
    <?php echo '<input type="text" class="form-custom__input" name="price" placeholder="Цена" value="' . $data["Цена"] .'">'?>

    <label class="form-custom__label">Единица измерения</label>
    <?php echo '<input type="text" class="form-custom__input" name="unit" placeholder="Единица измерения" value="' . $data["Единица измерения"] .'">'?>
    <label class="form-custom__label">Количество</label>
    <?php echo '<input type="number" class="form-custom__input" name="count" placeholder="Количество" value="' . $data["Количество"] .'">'?>


    <input type="submit" value="Отправить" class="form-custom__button">
</form> 