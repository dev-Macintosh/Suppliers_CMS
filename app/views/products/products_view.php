<h1>Товары</h1>
<table>
    <thead>
        <th>Код товара</th>
        <th>Цена</th>
        <th>Единица измерения</th>
    </thead>
    <?php

    foreach ($data as $index=>$row) {
        echo '<tr><td>Товар №' . ($index + 1)   . '</td><td>' . $row['Цена'] . '</td><td>' . $row['Единица измерения'] . '</td></tr>';
    }

    ?>
</table>
<h3>Выберите поставщика, по которому необходимому отображить товары</h2>
    <?php
    include 'app/includes/suppliers-choice.php';