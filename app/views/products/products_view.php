<h1>Товары</h1>
<table>
    <thead>
        <th>Код товара</th>
        <th>Цена</th>
        <th>Единица измерения</th>
        <th>Удалить</th>
    </thead>
    <?php

    foreach ($data as $index=>$row) {
        echo '<tr><td>Товар №' . ($index + 1)   . '</td><td>' . $row['Цена'] . '</td><td>' . $row['Единица измерения'] . '</td><td><button> <img src="/images/icons/trash.svg" alt="Иконка удаления" width="30"></button></td></tr>';
    }

    ?>
</table>
<h3 class="h3-white">Выберите поставщика, по которому необходимому отображить товары</h2>
    <?php
    include 'app/includes/suppliers-choice.php';