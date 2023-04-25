<h1>Накладные от поставщиков</h1>
<table>
    <tr>
        <td>Код накладной</td>
        <td>Дата</td>
        <td>Стоимость</td>
    </tr>
    <?php

    foreach ($data as $row) {
        echo '<tr><td>' . $row['Код накладной'] . '</td><td>' . $row['Дата'] . '</td><td>' . $row['Стоимость'] . '</td></tr>';
    }

    ?>
</table>
<h3>Выберите поставщика, по которому необходимому отображить накладные</h2>
<form method="GET" action="">
<select name="supplier">
<?php

foreach ($data as $row) {
    echo '<option>1</option><option>2</option>';
}

?>
</select>

<button type="submit">123</button>
</form>