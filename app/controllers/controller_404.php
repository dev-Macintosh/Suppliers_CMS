<?php
use App\Route;

class Controller_404 extends Controller
{
    function __construct()
    {
        $this->model =null;
        $this->view = new View();
    }

    function action_index($query = null)
    {
        $this->view->generate('404/404_view.php', 'templates/template_empty_view.php', null);
    }
}