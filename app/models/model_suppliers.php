<?php

class Model_Suppliers extends Model
{
	static public function get_data($query = NULL)
	{	
		if(isset($query["supplier"])){
			$string_query="SELECT * FROM Поставщики WHERE Поставщики.`Наименование` = '{$query["supplier"]}'";
		}
		else{
			$string_query="SELECT * FROM Поставщики";
		}

		return App::$db->execute($string_query);
	}

}
