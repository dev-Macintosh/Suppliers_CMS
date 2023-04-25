<?php

class Controller_Invoices extends Controller
{
	function __construct()
	{
		$this->model = new Model_Invoices();
		$this->view = new View();
	}

	function action_index($query=null)
	{	
		$data = Model_Invoices::get_data($query);		
		var_dump($data);	
		$this->view->generate('invoices_view.php', 'template_view.php', $data);
	}
}