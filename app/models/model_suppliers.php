<?php

class Model_Suppliers extends Model
{
	public function get_data()
	{	
		$string_query="SELECT * FROM Поставщики";
		return App::$db->execute($string_query);
	}

}
