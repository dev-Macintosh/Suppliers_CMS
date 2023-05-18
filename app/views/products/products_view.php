<h1>Товары</h1>
<table>
    <thead>
        <th>Код товара</th>
        <th>Цена</th>
        <th>Количество</th>
        <th>Единица измерения</th>
        <th>Удалить</th>
        <th>Изменить</th>
    </thead>
    <?php

    foreach ($data as $index => $row) {
        echo '<tr><td>' . $row['Код товара']. '</td><td>' . $row['Цена'] . '</td><td>' . $row['Количество'] . '</td><td>' . $row['Единица измерения'] . '</td><td> <form action="/products/delete/' . $row['Код товара'] . '"method="POST"><input type="hidden" name="product" value="' . $row["Код товара"] . '" /><button class="table__delete-button" type="submit"> <img src="/images/icons/trash.svg" alt="Иконка удаления" width="30"></button></form></td><td> <form action="/products/edit/' .$row['Код товара'] .  '"method="POST"><input type="hidden" name="product" value="' . $row["Код товара"] . '" /><button class="table__delete-button" type="submit"> <img src="/images/icons/pencil.svg" alt="Иконка удаления" width="30"></button></form></td></tr>';
    }

    ?>
</table>
<h3 class="h3-gray">Выберите поставщика, по которому необходимому отображить товары</h2>
    <form method="GET" class="form--select-submit">
        <?php
        include 'app/includes/suppliers-choice.php'; ?>
    </form>