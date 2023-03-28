<h1>Поставщики</h1>
<table>
    <tr>
        <td>Код поставщика</td>
        <td>Наименование</td>
        <td>Адрес</td>
    </tr>
    <?php

    foreach ($data as $row) {
        echo '<tr><td>' . $row['Код поставщика'] . '</td><td>' . $row['Наименование'] . '</td><td>' . $row['Адрес'] . '</td></tr>';
    }

    ?>
</table>