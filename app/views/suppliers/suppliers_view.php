<h1>Поставщики</h1>
<table cellpadding="0" cellspacing="0" border="0">
    <thead>
        <th>Код поставщика</th>
        <th>Наименование</th>
        <th>Адрес</th>
    </thead>


    <?php

    foreach ($data as $row) {
        echo '<tr><td>' . $row['Код поставщика'] . '</td><td>' . $row['Наименование'] . '</td><td>' . $row['Адрес'] . '</td></tr>';
    }


    ?>
    </tbody>
</table>