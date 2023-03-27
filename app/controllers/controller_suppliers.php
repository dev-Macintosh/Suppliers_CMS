<?php

class Controller_Suppliers extends Controller
{

	function action_index()
	{	
		$this->view->generate('main_view.php', 'main.php');
	}
}