<?php

class Model_Products extends Model
{
	static public function get_data($query = NULL)
	{
		$string_query = null;
		if (isset($query["supplier"]) && $query["supplier"]!=="") {
			$string_query = "SELECT * FROM Товары 
			INNER JOIN Накладная ON Товары.`Код накладной` =Накладная.`Код накладной` 
			INNER JOIN Поставщики ON Накладная.`Код поставщика` =Поставщики.`Код поставщика` 
			WHERE Поставщики.`Наименование`='{$query["supplier"]}'";
		} 
		else if(isset($query["product"]) && $query["product"]!==""){
			$string_query="SELECT * FROM Товары WHERE Товары.`Код товара`='{$query["product"]}'";
		}
		else {
			$string_query = "SELECT * FROM Товары";
		}

		return App::$db->execute($string_query);
	}
	public function add_data($data)
	{
		$string_query = null;
		$string_query = "INSERT INTO Товары (`Код товара`, `Код накладной`, `Код заказа`, `Цена`, `Единица измерения`, `Количество`) VALUES (NULL, {$data['invoice']}, {$data['order']},{$data['price']},'{$data['unit']}',{$data['count']})";
		return App::$db->execute($string_query);
	}
	public function edit_data($data)
	{
		$string_query = null;
		$string_query = "UPDATE `Товары` SET `Код накладной` = " . Model_Invoices::get_data($data)[0]["Код накладной"] . " , `Код заказа` = {$data['order']}" . " , `Цена` = {$data['price']} " . " , `Единица измерения` = '{$data['unit']}'" . " , `Количество` = {$data['count']} WHERE `Товары`.`Код товара` = {$data['product']}";
		return App::$db->execute($string_query);
	}
	public function delete_data($id)
	{
		$string_query = null;
		if (isset($id)) {

			$string_query = "DELETE FROM Товары WHERE `Товары`.`Код товара` = {$id}";
		}
		return App::$db->execute($string_query);
	}

}