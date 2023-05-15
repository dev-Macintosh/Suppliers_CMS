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
		$this->view->generate('invoices/invoices_view.php', 'template_view.php', $data);
	}
	function action_add(){
		$check_array = array('supplier', 'price');
		if (!array_diff($check_array, array_keys($_POST))) {
			$data_array = $this->get_values_for_keys($_POST, $check_array);
			View::printData($data_array);
			$this->model->add_data($data_array);
			// exit('<meta http-equiv="refresh" content="0; url=/products/index" />');
		} else {
			$this->view->generate('invoices/invoices_add_view.php', 'template_view.php', null);
		}

	}
}