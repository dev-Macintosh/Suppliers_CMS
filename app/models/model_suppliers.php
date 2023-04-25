<?php

class Model_Suppliers extends Model
{
	static public function get_data($query = NULL)
	{	
		$string_query="SELECT * FROM Поставщики";
		return App::$db->execute($string_query);
	}

}
