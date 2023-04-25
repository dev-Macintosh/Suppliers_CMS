<?php

class Controller_Invoices extends Controller
{
	function __construct()
	{
		$this->model = new Model_Invoices();
		$this->view = new View();
	}

	function action_index($query)
	{	
		$data = $this->model->get_data($query);		
		$this->view->generate('invoices_view.php', 'template_view.php', $data);
	}
}