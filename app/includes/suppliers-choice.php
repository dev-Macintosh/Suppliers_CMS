<select name="supplier" class="form-custom__select" onchange="submitSelect(this.form)">
    <?php
    use App\Route;
    echo '<option></option>';
    foreach (Model_Suppliers::get_data() as $row) {
        if ((isset(Route::getQuery()["supplier"]) && $row["Наименование"] == Route::getQuery()["supplier"]) || (!is_null($data) && $data["Код поставщика"] == $row['Код поставщика'])) {
            echo '<option selected>' . $row['Наименование'] . '</option>';
        } else {
            echo '<option>' . $row['Наименование'] . '</option>';
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