<?php

class Login extends Controller {

    function Index () {

        $this->view('template/header');
        $this->view('login');
        $this->view('template/footer');

    }

    function Logout () {

        // TODO: Logout implementation`

    }

}

?>