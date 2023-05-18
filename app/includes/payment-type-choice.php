<select name="payment-type" class="form-custom__select">
    <?php
    use App\Route;

    echo '<option></option>';
    foreach (Model_Payment_Type::get_data() as $row) {
            echo '<option>' . $row['Тип оплаты'] . '</option>';
    }

    ?>
</select>
