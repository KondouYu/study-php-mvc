<?php

class Customers extends Controller {

    function Index () {
        if (!isset($_SESSION['login'])) {

            header('Location: /login');

        } else {

            $this->model('actions/ActionsSubtype');

            $this->ActionsSubtype->delete(1);
        
            $this->view('template/header');

            $this->view('customers/readall');

            $this->view('template/footer');

        }
    }

}

?>