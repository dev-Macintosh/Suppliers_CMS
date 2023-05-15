<?php

class Controller_Invoices extends Controller
{
	function __construct()
	{
		$this->model = new Model_Invoices();
		$this->view = new View();
	}

	function action_index($query = null)
	{
		$data = Model_Invoices::get_data($query);
		$this->view->generate('invoices/invoices_view.php', 'templates/template_view.php', $data);
	}
	function action_add()
	{
		switch (Model_Auth::check_auth()) {
			case true:
				$check_array = array('supplier', 'price');
				if (!array_diff($check_array, array_keys($_POST))) {
					$data_array = $this->get_values_for_keys($_POST, $check_array);
					$this->model->add_data($data_array);
					exit('<meta http-equiv="refresh" content="0; url=/invoices/index" />');
				} else {
					$this->view->generate('invoices/invoices_add_view.php', 'templates/template_view.php', null);
				}
				break;
			case false:
				exit('<meta http-equiv="refresh" content="0; url=/invoices/index" />');
				break;
		}


	}
	function action_edit()
	{
		$check_array = array('supplier', 'price', 'invoice');
		if (!array_diff($check_array, array_keys($_POST))) {
			$data_array = $this->get_values_for_keys($_POST, $check_array);
			$this->model->edit_data($data_array);
			exit('<meta http-equiv="refresh" content="0; url=/invoices/index" />');
		} else if (isset($_POST["invoice"])) {
			$data_array = [];
			array_walk_recursive($this->model->get_data(array("invoice" => $_POST["invoice"])), function ($item, $key) use (&$data_array) {
				$data_array[$key] = $item;
			});
			$this->view->generate('invoices/invoices_edit_view.php', 'templates/template_view.php', $data_array);
		}
		else{
			exit('<meta http-equiv="refresh" content="0; url=/invoices/index" />');
		}

	}
	function action_delete()
	{
		$this->model->delete_data($_POST["invoice"]);
		exit('<meta http-equiv="refresh" content="0; url=/invoices/index" />');
	}
}