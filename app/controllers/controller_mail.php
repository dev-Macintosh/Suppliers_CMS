<?php

class Controller_Mail extends Controller
{
    function __construct()
    {
        $this->model = null;
        $this->view = null;
    }

    function action_index($query = null)
    {
        $name = "Тестировщик";
        $email = "ivan.200512340@gmail.com";
        $header = "Тестирование системы рассчёта с поставщиками";
        $message = $_POST['message'];

        $mes = "Имя: $name \nE-mail: $email \nТема: $header \nТекст: $message";


        $send = mail($email, $header, $mes, "Content-type:text/plain; charset = UTF-8\r\nFrom:$email");

        if ($send == 'true') {
            echo "Сообщение отправлено";
        } else {
            echo "Ой, что-то пошло не так";
        }
    }
}