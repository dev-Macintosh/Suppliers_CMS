<h1>Накладные от поставщиков</h1>
<table>
    <thead>
        <th>Код накладной</th>
        <th>Дата</th>
        <th>Стоимость</th>
    </thead>
    <?php

    foreach ($data as $row) {
        echo '<tr><td>' . $row['Код накладной'] . '</td><td>' . $row['Дата'] . '</td><td>' . $row['Стоимость'] . '</td></tr>';
    }

    ?>
</table>
<h3>Выберите поставщика, по которому необходимому отображить накладные</h2>
    <?php
    include 'app/includes/suppliers-choice.php';