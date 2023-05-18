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
		$this->view->generate('products/products_view.php', 'templates/template_view.php', $data);
	}
	function action_add($query = null)
	{
		$check_array = array('invoice', 'order', 'price', 'unit', 'count');
		if (!array_diff($check_array, array_keys($_POST))) {
			$data_array = $this->get_values_for_keys($_POST, $check_array);
			$this->model->add_data($data_array);
			exit('<meta http-equiv="refresh" content="0; url=/products/index" />');
		} else {
			$this->view->generate('products/products_add_view.php', 'templates/template_view.php', null);
		}
	}
	function action_edit()
	{
		$check_array = array('product', 'order', 'invoice','price','unit','count');
		if (!array_diff($check_array, array_keys($_POST))) {
			$data_array = $this->get_values_for_keys($_POST, $check_array);
			$this->model->edit_data($data_array);
			exit('<meta http-equiv="refresh" content="0; url=/products/index" />');
		} else if (isset($_POST["product"])) {
			$data_array = [];
			array_walk_recursive($this->model->get_data(array("product" => $_POST["product"])), function ($item, $key) use (&$data_array) {
				$data_array[$key] = $item;
			});
			$this->view->generate('products/products_edit_view.php', 'templates/template_view.php', $data_array);
		}
		else{
			exit('<meta http-equiv="refresh" content="0; url=/products/index" />');
		}

	}
	function action_delete()
	{
		$this->model->delete_data($_POST["product"]);
		exit('<meta http-equiv="refresh" content="0; url=/products/index" />');
	}

}