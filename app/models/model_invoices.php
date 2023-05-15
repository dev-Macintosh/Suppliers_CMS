<?php

class Model_Invoices extends Model
{
	static public function get_data($query=NULL)
	{	
		$string_query=null;
		if(isset($query["supplier"])){
			$string_query="SELECT * FROM Накладная INNER JOIN Поставщики ON Накладная.`Код поставщика` =Поставщики.`Код поставщика` WHERE Поставщики.`Наименование`='{$query["supplier"]}'";
		}
		else{
			$string_query="SELECT * FROM Накладная";
		}
		
		return App::$db->execute($string_query);
	}
	public function add_data($data)
	{
		$string_query = null;
		$string_query = "INSERT INTO Накладная (`Код накладной`, `Код поставщика`, `Дата`, `Стоимость`) VALUES (NULL, " . Model_Suppliers::get_data($data)[0]["Код поставщика"]. ",CURRENT_TIMESTAMP,{$data['price']})";
		return App::$db->execute($string_query);
	}

}
