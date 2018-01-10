<?php

class Login extends Controller {

    function Index () {

        if (!isset($_SESSION['login'])) {

            $this->model('user');

            $this->User->getWelcome();

            $this->view('template/header');
            $this->view('login');
            $this->view('template/footer');

        } else {

            header('Location: /dashboard');

        }

    }

    function Logout () {

        $_SESSION = [];
        session_unset();

    }

}

?>