<?php
use App\Route;

class Controller_Payments extends Controller
{
	function __construct()
	{
		$this->model = new Model_Payments();
		$this->view = new View();
	}

	function action_index($query = null)
	{
		Route::ErrorPage404();
	}
	function action_add($query = null)
	{
		$check_array = array('order', 'payment-type', 'price');
		if (!array_diff($check_array, array_keys($_POST))) {
			$data_array = $this->get_values_for_keys($_POST, $check_array);
			$this->model->add_data($data_array);
			exit('<meta http-equiv="refresh" content="0; url=/orders/ones?order=' . $data_array['order'] . '"/>');
		} else {
			$this->view->generate('payments/payments_add_view.php', 'templates/template_view.php', $_POST['order'] ? ["Код заказа" => $_POST['order']] : null);
		}
	}
	function action_delete()
	{
		$check_array = array('order', 'payment');
		if (!array_diff($check_array, array_keys($_POST)))
		{
			$this->model->delete_data($_POST["payment"]);
			exit('<meta http-equiv="refresh" content="0; url=/orders/ones?order=' . $_POST["order"] . '"/>');
		}
		else
			exit('<meta http-equiv="refresh" content="0; url=/orders/index" />');
	}

}