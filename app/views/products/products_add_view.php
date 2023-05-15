<h1>Страница добавления товара</h1>

<form action="/products/add" class="form-custom" method="POST">
    <label class="form-custom__label">Накладная</label>
    <?php include 'app/includes/invoices-choice.php' ?>
    <label class="form-custom__label">Код заказа</label>
    <?php include 'app/includes/orders-choice.php' ?>
    <label class="form-custom__label">Цена</label>
    <input type="text" class="form-custom__input" name="price" placeholder="Цена">

    <label class="form-custom__label">Единица измерения</label>
    <input type="text" class="form-custom__input" name="unit" placeholder="Единица измерения">
    <label class="form-custom__label">Количество</label>
    <input type="number" class="form-custom__input" name="count" placeholder="Количество">


    <input type="submit" value="Отправить" class="form-custom__button">
</form>