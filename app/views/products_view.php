<h1>Товары</h1>
<table>
    <tr>
        <td>Код товара</td>
        <td>Цена</td>
        <td>Единица измерения</td>
    </tr>
    <?php

    foreach ($data as $index=>$row) {
        echo '<tr><td>Товар №' . ($index + 1)   . '</td><td>' . $row['Цена'] . '</td><td>' . $row['Единица измерения'] . '</td></tr>';
    }

    ?>
</table>