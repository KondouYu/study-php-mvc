<?php

class Main extends Controller {

    function Index () {
        
        if (isset($_SESSION['login'])) {

            header('Location: /dashboard');

        } else {

            header('Location: /login');
            
        }
        
    }

}

?>