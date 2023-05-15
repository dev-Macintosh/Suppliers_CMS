<select name="invoice" class="form-custom__select">
    <?php
    use App\Route;
    echo '<option></option>';
    foreach (Model_Invoices::get_data() as $row) {
        if (isset(Route::getQuery()["order"]) && $row["Код накладной"] == Route::getQuery()["order"]) {
            echo '<option selected>' . $row['Код накладной'] . '</option>';
        } else {
            echo '<option>' . $row['Код накладной'] . '</option>';
        }

    }

    ?>
</select>