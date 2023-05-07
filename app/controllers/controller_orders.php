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
		$this->view->generate('orders_view.php', 'template_view.php', $data);
	}
    function action_ones($query=null){
        $data=$this->model->get_order_detail($query);
        $this->view->generate('orders_view.php', 'template_view.php', $data);
    }
}