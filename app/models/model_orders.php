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
			echo $string_query;
		} else {
			$string_query = "SELECT * FROM Заказы";
		}
		return App::$db->execute($string_query);
	}
    public function get_order_detail($query=null){
        return [];
    }

}