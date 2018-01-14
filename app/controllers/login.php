<?php

class Login extends Controller {

    function Index () {

        if (!isset($_SESSION['login'])) {

            $this->model('accounts/Accounts');

            $this->view('template/header');

            if (isset($_POST['submit'])) {

                if ($login = $this->Accounts->checkCredentials($_POST['username'], $_POST['password'])) {

                    $_SESSION['login'] = $login;
                    header('Location: /dashboard');

                } else {

                    echo '<div class="systemAlert alert-danger text-center">Błąd logowania! Podano zły login/hasło lub Twoje konto jest nieaktywne.</div>';
                
                }

            }

            $this->view('login');

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