<?php

class Model_Products extends Model
{
	static public function get_data($query=NULL)
	{	
		$string_query=null;
		$string_query="SELECT * FROM Товары";
		
		return App::$db->execute($string_query);
	}

}
