<?php

class Model_Invoices extends Model
{
	static public function get_data($query=NULL)
	{	
		$string_query=null;
		if(isset($query["supplier"]) && $query["supplier"]!==""){
			$string_query="SELECT * FROM Накладная INNER JOIN Поставщики ON Накладная.`Код поставщика` =Поставщики.`Код поставщика` WHERE Поставщики.`Наименование`='{$query["supplier"]}'";
		}
		else if(isset($query["invoice"]) && $query["invoice"]!==""){
			$string_query="SELECT * FROM Накладная WHERE Накладная.`Код накладной`='{$query["invoice"]}'";
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
	public function edit_data($data)
	{
		$string_query = null;
		$string_query = "UPDATE `Накладная` SET `Код поставщика` = " . Model_Suppliers::get_data($data)[0]["Код поставщика"] . " , `Стоимость` = {$data['price']} WHERE `Накладная`.`Код накладной` = {$data['invoice']}";
		return App::$db->execute($string_query);
	}
	public function delete_data($id)
	{
		$string_query = null;
		if (isset($id)) {

			$string_query = "DELETE FROM Накладная WHERE `Накладная`.`Код накладной` = {$id}";
		}
		return App::$db->execute($string_query);
	}

}
