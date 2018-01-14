<?php

class Customers extends Controller {

    function Index () {
        if (!isset($_SESSION['login'])) {

            header('Location: /login');

        } else {
        
            $this->view('template/header');

            $this->view('customers/readAll');

            $this->view('template/footer');

        }
    }

}

?>