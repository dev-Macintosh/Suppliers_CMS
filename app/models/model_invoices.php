<?php

class Model_Invoices extends Model
{
	public function get_data($query)
	{	
		$string_query=null;
		if(isset($query["supplier"])){
			$string_query="SELECT * FROM Накладная WHERE `Код поставщика`={$query["supplier"]}";
		}
		else{
			$string_query="SELECT * FROM Накладная";
		}

		return App::$db->execute($string_query);
	}

}
