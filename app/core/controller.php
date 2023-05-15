<?php

class Controller {
	
	public $model;
	public $view;
	
	function __construct()
	{
		$this->view = new View();
	}

	function action_index($query=NULL)
	{
		//
	}
	protected function get_values_for_keys($mapping, $keys)
	{
		foreach ($keys as $key) {
			$output_arr[$key] = $mapping[$key];
		}
		return $output_arr;
	}
}