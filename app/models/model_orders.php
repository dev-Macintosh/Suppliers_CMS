<?php

class Model_Orders extends Model
{
    static public function get_data($query = NULL)
    {
        $string_query = null;
        if (isset($query["supplier"]) && $query["supplier"]!=="") {
            $string_query = "SELECT * FROM Заказы 
			INNER JOIN Товары ON Заказы.`Код заказа` =Товары.`Код заказа` 
			INNER JOIN Накладная ON Товары.`Код накладной` =Накладная.`Код накладной` 
            INNER JOIN Поставщики ON Накладная.`Код поставщика` =Поставщики.`Код поставщика` 
			WHERE Поставщики.`Наименование`='{$query["supplier"]}'";
        } 
        else if(isset($query["order"]) && $query["order"]!==""){
			$string_query="SELECT * FROM Заказы WHERE Заказы.`Код заказа`={$query["order"]}";
		}
        else {
            $string_query = "SELECT * FROM Заказы";
        }   
        return App::$db->execute($string_query);
    }
    public function get_order_detail($query = null)
    {
        $string_query = null;
        if (isset($query["order"])) {
            $array_transactions =[];
            foreach (Model_Payments::get_data($query) as $row) {
                array_push($array_transactions, ["Тип" => $row['Тип оплаты'], "Сумма" => $row['Сумма']]);
            }

            $string_query = "SELECT Поставщики.`Наименование`,Поставщики.`Адрес`,Поставщики.`Телефон`,Поставщики.`Факс`,Поставщики.`Эл. адрес`,Товары.`Цена`,Товары.`Количество`  FROM Заказы 
			INNER JOIN `Товары` ON Заказы.`Код заказа` = Товары.`Код заказа` 
            INNER JOIN Накладная ON Товары.`Код накладной` =Накладная.`Код накладной` 
			INNER JOIN Поставщики ON Накладная.`Код поставщика` =Поставщики.`Код поставщика` 
			WHERE Заказы.`Код заказа`='{$query["order"]}'";
            $array_data = [];
            foreach (App::$db->execute($string_query) as $row) {
                array_push($array_data, $row);
            }
            return array_merge(
                ["Операции" => Model_Payments::get_data($query)],
                [
                    "Общая сумма" => array_sum(array_map(function ($element) {
                        return $element['Цена'] * $element['Количество'];
                    }, $array_data))
                ],
                call_user_func(function () use ($array_data) {
                    $array_temp=[];
                    array_walk_recursive(array_unique($array_data), function ($item, $key) use (&$array_temp) {
                        switch($key){
                            case 'Цена':
                            case 'Количество':
                                break;
                            default:
                                $array_temp[$key] = $item;    
                                break;
                        }

                    });
                    return $array_temp;

                })
            );
        } else {
            $string_query = "SELECT * FROM Заказы";
            return App::$db->execute($string_query);
        }

    }
    public function add_data($data)
	{
		$string_query = null;
		$string_query = "INSERT INTO `Заказы` (`Код заказа`, `Наименование получателя`, `Адрес получателя`)  VALUES (NULL, '{$data['name']}', '{$data['address']}')";
		return App::$db->execute($string_query);
	}
    public function edit_data($data)
	{
		$string_query = null;
		$string_query = "UPDATE `Заказы` SET `Наименование получателя` = '{$data['name']}', `Адрес получателя` = '{$data['address']}' WHERE `Заказы`.`Код заказа` = {$data['order']}";
		return App::$db->execute($string_query);
	}
    public function delete_data($id)
    {
        $string_query = null;
        if (isset($id)) {
            $string_query = "DELETE FROM `Заказы` WHERE `Заказы`.`Код заказа` = ?";
        }
       return App::$db->execute($string_query, array($id));
    }

}
?>