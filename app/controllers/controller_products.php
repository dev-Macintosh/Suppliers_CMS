<?php

class Controller_Products extends Controller
{
	function __construct()
	{
		$this->model = new Model_Products();
		$this->view = new View();
	}

	function action_index($query = null)
	{
		$data = Model_Products::get_data($query);
		$this->view->generate('products/products_view.php', 'template_view.php', $data);
	}
	function action_add($query = null)
	{
		$check_array = array('invoice', 'order', 'price', 'unit', 'count');
		if (!array_diff($check_array, array_keys($_POST))) {
			$data_array = $this->get_values_for_keys($_POST, $check_array);
			View::printData($data_array);
			$this->model->add_data($data_array);
			// exit('<meta http-equiv="refresh" content="0; url=/products/index" />');
		} else {
			$this->view->generate('products/products_add_view.php', 'template_view.php', null);
		}
	}
	function action_delete()
	{
		$this->model->delete_data($_POST["product"]);
		exit('<meta http-equiv="refresh" content="0; url=/products/index" />');
	}

}