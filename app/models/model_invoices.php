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

}
