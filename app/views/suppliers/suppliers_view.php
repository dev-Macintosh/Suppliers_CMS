<h1>Поставщики</h1>
<table>
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
</table>