<?php

class Login extends Controller {

    function Index () {

        if (!isset($_SESSION['login'])) {

            $this->model('account');

            $this->view('template/header');

            $this->view('login');

            if (isset($_POST['submit'])) {

                if ($login = $this->Account->checkCredentials($_POST['username'], $_POST['password'])) {

                    $_SESSION['login'] = $login;
                    header('Location: /dashboard');

                } else {

                    echo '<div class="container"><div class="row"><span class="col-md-6 offset-md-3 alert alert-danger">Błędne dane logowania.</span></div></div>';
                
                }

            }

            $this->view('template/footer');

        } else {

            header('Location: /dashboard');

        }

    }

    function Logout () {

        $_SESSION = [];
        session_unset();
        header('Location: /');

    }

}

?>