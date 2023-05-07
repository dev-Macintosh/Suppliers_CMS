<?php

class Model_Products extends Model
{
	static public function get_data($query = NULL)
	{
		$string_query = null;
		if (isset($query["supplier"])) {
			$string_query = "SELECT * FROM Товары 
			INNER JOIN Накладная ON Товары.`Код накладной` =Накладная.`Код накладной` 
			INNER JOIN Поставщики ON Накладная.`Код поставщика` =Поставщики.`Код поставщика` 
			WHERE Поставщики.`Наименование`='{$query["supplier"]}'";
			echo $string_query;
		} else {
			$string_query = "SELECT * FROM Товары";
		}

		return App::$db->execute($string_query);
	}

}