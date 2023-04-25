<form method="GET" action="">
    <select name="supplier">
        <?php
        foreach (Model_Suppliers::get_data() as $row) {
            echo '<option>'.$row['Наименование'] .'</option>';
        }

        ?>
    </select>

    <button type="submit">123</button>
</form>