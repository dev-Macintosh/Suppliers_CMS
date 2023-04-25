<?php

class Controller_Suppliers extends Controller
{
	function __construct()
	{
		$this->model = new Model_Suppliers();
		$this->view = new View();
	}

	function action_index($query=null)
	{	
		$data = Model_Suppliers::get_data();	

		$this->view->generate('suppliers_view.php', 'template_view.php', $data);
	}
}