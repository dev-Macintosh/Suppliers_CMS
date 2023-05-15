<h1>Страница добавления\редактирования накладной</h1>
<form action="/invoices/edit" class="form-custom" method="POST">
    <?php echo '<input type="hidden" class="form-custom__input" name="invoice" placeholder="Накладная" value="' . $data["Код накладной"] .'">'?>
    <label class="form-custom__label">Поставщик</label>
    <?php include 'app/includes/suppliers-choice.php' ?>
    <label class="form-custom__label">Стоимость</label>
    <?php echo '<input type="text" class="form-custom__input" name="price" placeholder="Цена" value="' . $data["Стоимость"] .'">'?>


    <input type="submit" value="Отправить" class="form-custom__button">
</form>