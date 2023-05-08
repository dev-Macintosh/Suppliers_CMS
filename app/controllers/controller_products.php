<?php

class Controller_Products extends Controller
{
	function __construct()
	{
		$this->model = new Model_Products();
		$this->view = new View();
	}

	function action_index($query=null)
	{	
		$data = Model_Products::get_data($query);		
		$this->view->generate('products/products_view.php', 'template_view.php', $data);
	}
}