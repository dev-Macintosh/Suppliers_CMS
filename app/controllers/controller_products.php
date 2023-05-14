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
	function action_add(){
		$this->view->generate('products/products_add_view.php', 'template_view.php', null);
	}
	function action_delete(){
		$this->model->delete_data($_POST["product"]);
		exit('<meta http-equiv="refresh" content="0; url=/products/index" />');
	}
}