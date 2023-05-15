<?php
use App\Route;

class Controller_Auth extends Controller
{
    function __construct()
    {
        $this->model = new Model_Auth();
        $this->view = new View();
    }

    function action_index($query = null)
    {
        $this->view->generate('auth/login_view.php', 'templates/template_empty_view.php', null);
    }
    function action_login()
    {
        $check_array = array('username', 'password');
		if (!array_diff($check_array, array_keys($_POST))) {
			$data_array = $this->get_values_for_keys($_POST, $check_array);
            Model_Auth::login($data_array);
		}

    }
    function action_logout(){
        $_SESSION['user_id'] = null;
        Route::AuthPage();
    }
}