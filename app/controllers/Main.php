<?php

class Main extends Controller {

    function Index () {
        
        if (!isset($_SESSION['login'])) {

            header('Location: /login');

        } else {

            header('Location: /dashboard');
            
        }
        
    }

}

?>