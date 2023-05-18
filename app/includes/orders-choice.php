<select name="order" class="form-custom__select" onchange="submitSelect(this.form)">
    <?php
    use App\Route;
    echo '<option></option>';
    foreach (Model_Orders::get_data() as $row) {
        if ((isset(Route::getQuery()["order"]) && $row["Код заказа"] == Route::getQuery()["order"]) || (!is_null($data) && $data["Код заказа"] == $row['Код заказа'])) {
            echo '<option selected>' . $row['Код заказа'] . '</option>';
        } else {
            echo '<option>' . $row['Код заказа'] . '</option>';
        }

    }

    ?>
</select>

<script>
    function submitSelect(form){
        if(form.classList.contains("form--select-submit")){
            form.submit();
        }

    }
</script>