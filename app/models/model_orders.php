<?php

class Model_Orders extends Model
{
    static public function get_data($query = NULL)
    {
        $string_query = null;
        if (isset($query["supplier"])) {
            $string_query = "SELECT * FROM Заказы 
			INNER JOIN Товары ON Заказы.`Код заказа` =Товары.`Код заказа` 
			INNER JOIN Накладная ON Товары.`Код накладной` =Накладная.`Код накладной` 
            INNER JOIN Поставщики ON Накладная.`Код поставщика` =Поставщики.`Код поставщика` 
			WHERE Поставщики.`Наименование`='{$query["supplier"]}'";
        } else {
            $string_query = "SELECT * FROM Заказы";
        }
        return App::$db->execute($string_query);
    }
    public function get_order_detail($query = null)
    {
        $string_query = null;
        $toral_sum = 0;
        if (isset($query["order"])) {
            $string_query = "SELECT * FROM Заказы 
			INNER JOIN `Этап оплаты` ON Заказы.`Код заказа` = `Этап оплаты`.`Код заказа`
            INNER JOIN `Тип оплаты` ON `Этап оплаты`.`Код оплаты` = `Тип оплаты`.`Код оплаты` 
			WHERE Заказы.`Код заказа`='{$query["order"]}'";
            $array_transactions=[];
            foreach (App::$db->execute($string_query) as $row) {
                array_push($array_transactions,["Тип"=>$row['Тип оплаты'],"Сумма" => $row['Сумма']]);
            }

            $string_query = "SELECT * FROM Заказы 
			INNER JOIN `Товары` ON Заказы.`Код заказа` = Товары.`Код заказа` 
			WHERE Заказы.`Код заказа`='{$query["order"]}'";
            foreach (App::$db->execute($string_query) as $row) {
                $toral_sum += $row['Цена'] * $row['Количество'];
            }
            return array_merge(["Операции"=>$array_transactions,"Общая сумма" => $toral_sum]);
        } else {
            $string_query = "SELECT * FROM Заказы";
            return App::$db->execute($string_query);
        }

    }

}
?>
