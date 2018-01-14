<?php

class Customers extends Controller {

    function Index () {
        if (!isset($_SESSION['login'])) {

            header('Location: /login');

        } else {
        
            

        }
    }

}

?>