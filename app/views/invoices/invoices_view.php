<h1>Накладные от поставщиков</h1>
<table>
    <thead>
        <th>Код накладной</th>
        <th>Дата</th>
        <th>Стоимость</th>
        <th>Удалить</th>
        <th>Изменить</th>
    </thead>
    <?php

    foreach ($data as $row) {
        echo '<tr><td>' . $row['Код накладной'] . '</td><td>' . $row['Дата'] . '</td><td>' . $row['Стоимость'] . '</td><td> <form action="/invoices/delete/' .$row['Код накладной'] .  '"method="POST"><input type="hidden" name="invoice" value="' . $row["Код накладной"] . '" /><button class="table__delete-button" type="submit"> <img src="/images/icons/trash.svg" alt="Иконка удаления" width="30"></button></form></td><td> <form action="/invoices/edit/' .$row['Код накладной'] .  '"method="POST"><input type="hidden" name="invoice" value="' . $row["Код накладной"] . '" /><button class="table__delete-button" type="submit"> <img src="/images/icons/pencil.svg" alt="Иконка удаления" width="30"></button></form></td></tr>';
    }

    ?>
</table>
<h3 class="h3-gray">Выберите поставщика, по которому необходимому отображить накладные: </h2>
<form method="GET" class="form--select-submit">
<?php
    include 'app/includes/suppliers-choice.php';?>
</form>
