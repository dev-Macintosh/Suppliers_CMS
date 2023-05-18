<?php

class Model_Payment_Type extends Model
{
	static public function get_data($query=NULL)
	{	
		$string_query=null;
		 if(isset($query["payment-type"]) && $query["payment-type"]!==""){
			$string_query="SELECT * FROM `Тип оплаты` WHERE `Тип оплаты`.`Тип оплаты`='{$query["payment-type"]}'";
		}
        else {
            $string_query="SELECT * FROM `Тип оплаты`";
        }
		return App::$db->execute($string_query);
	}

}
