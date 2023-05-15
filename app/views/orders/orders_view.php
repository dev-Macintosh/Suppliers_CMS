<h1>Заказы</h1>
<table>
    <thead>
        <th>Код заказа</th>
        <th>Название получателя</th>
        <th>Адрес получателя</th>
        <th>Детальная информация</th>
        <th>Удалить</th>
    </thead>
    <?php

    foreach ($data as $index=>$row) {
        echo '<tr><td>Заказ №' . ($index + 1)   . '</td><td>' . $row['Название получателя'] . '</td><td>' . $row['Адрес получателя'] . '</td><td><button><a href="/orders/ones?order=' . (int)$row["Код заказа"] . '">Изучить</a></button></td><td> <form action="/orders/delete/' .$row['Код заказа'] .  '"method="POST"><input type="hidden" name="order" value="' . $row["Код заказа"] . '" /><button class="table__delete-button" type="submit"> <img src="/images/icons/trash.svg" alt="Иконка удаления" width="30"></button></form></td></tr>';
    }
    ?>
</table>
<h3 class="h3-white">Выберите поставщика, по которому необходимому отображить заказы</h2>
    <?php
    include 'app/includes/suppliers-choice.php';