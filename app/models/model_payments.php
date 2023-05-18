<?php

class Model_Payments extends Model
{
	static public function get_data($query=NULL)
	{	
		$string_query=null;
		if (isset($query["order"]) && $query["order"]!=="") {
            $string_query = "SELECT * FROM Заказы 
			INNER JOIN `Этап оплаты` ON Заказы.`Код заказа` = `Этап оплаты`.`Код заказа`
            INNER JOIN `Тип оплаты` ON `Этап оплаты`.`Код оплаты` = `Тип оплаты`.`Код оплаты` 
			WHERE Заказы.`Код заказа`='{$query["order"]}' ORDER BY `Этап оплаты`.`ID Этапа оплаты`";
        } 
		else{
			return array();
		}

		return App::$db->execute($string_query);
		
	}
	public function add_data($data)
	{
		$string_query = null;
		$string_query = "INSERT INTO `Этап оплаты` (`ID Этапа оплаты`, `Код заказа`, `Код оплаты`, `Сумма`) VALUES (NULL, {$data["order"]}," . Model_Payment_Type::get_data($data)[0]["Код оплаты"] . ", '{$data["price"]}')";
		return App::$db->execute($string_query);
	}
	public function delete_data($id)
	{
		$string_query = null;
		if (isset($id)) {

			$string_query = "DELETE FROM `Этап оплаты` WHERE `Этап оплаты`.`ID Этапа оплаты` = {$id}";
		}
		return App::$db->execute($string_query);
	}

}
