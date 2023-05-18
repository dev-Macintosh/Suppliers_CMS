<?php

class Controller_Orders extends Controller
{
	function __construct()
	{
		$this->model = new Model_Orders();
		$this->view = new View();
	}

	function action_index($query=null)
	{	
		$data = Model_Orders::get_data($query);		
		$this->view->generate('orders/orders_view.php', 'templates/template_view.php', $data);
	}
    function action_ones($query=null){
        $data=$this->model->get_order_detail($query);
        $this->view->generate('orders/orders_detail_view.php', 'templates/template_view.php', $data);
    }
	function action_add($query = null)
	{
		$check_array = array('name', 'address');
		if (!array_diff($check_array, array_keys($_POST))) {
			$data_array = $this->get_values_for_keys($_POST, $check_array);
			$this->model->add_data($data_array);
			exit('<meta http-equiv="refresh" content="0; url=/orders/index" />');
		} else {
			$this->view->generate('orders/orders_add_view.php', 'templates/template_view.php', null);
		}
	}
	function action_edit()
	{
		$check_array = array('order', 'name', 'address');
		if (!array_diff($check_array, array_keys($_POST))) {
			$data_array = $this->get_values_for_keys($_POST, $check_array);
			$this->model->edit_data($data_array);
			exit('<meta http-equiv="refresh" content="0; url=/orders/index" />');
		} else if (isset($_POST["order"])) {
			$data_array = [];
			array_walk_recursive($this->model->get_data(array("order" => $_POST["order"])), function ($item, $key) use (&$data_array) {
				$data_array[$key] = $item;
			});
			$this->view->generate('orders/orders_edit_view.php', 'templates/template_view.php', $data_array);
		}
		else{
			exit('<meta http-equiv="refresh" content="0; url=/orders/index" />');
		}

	}
	function action_delete()
	{
		
		$this->model->delete_data($_POST["order"]);
		exit('<meta http-equiv="refresh" content="0; url=/orders/index" />');
	}
}