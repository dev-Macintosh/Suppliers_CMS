<select name="order" class="form-custom__select">
    <?php
    use App\Route;

    foreach (Model_Orders::get_data() as $row) {
        if (isset(Route::getQuery()["order"]) && $row["Код заказа"] == Route::getQuery()["order"]) {
            echo '<option selected>' . $row['Код заказа'] . '</option>';
        } else {
            echo '<option>' . $row['Код заказа'] . '</option>';
        }

    }

    ?>
</select>