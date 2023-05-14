<?php

class Controller_Main extends Controller
{
	function __construct()
	{
		$this->model = null;
		$this->view = new View();
	}

	function action_index($query=null)
	{		
		$this->view->generate('main/main_view.php', 'template_view.php', null);
	}
}