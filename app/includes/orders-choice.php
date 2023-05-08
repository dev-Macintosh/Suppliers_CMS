<form method="GET">
    <select name="order">
        <?php
        foreach (Model_Orders::get_data() as $row) {
            echo '<option>'.$row['Код заказа'] .'</option>';
        }

        ?>
    </select>

    <button type="submit">Выполнить</button>
</form>