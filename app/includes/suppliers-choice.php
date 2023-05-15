<select name="supplier" class="form-custom__select">
    <?php
    use App\Route;

    foreach (Model_Suppliers::get_data() as $row) {
        if (isset(Route::getQuery()["supplier"]) && $row["Наименование"] == Route::getQuery()["supplier"]) {
            echo '<option selected>' . $row['Наименование'] . '</option>';
        } else {
            echo '<option>' . $row['Наименование'] . '</option>';
        }
    }

    ?>
</select>