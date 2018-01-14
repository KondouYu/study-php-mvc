<?php

class Dashboard extends Controller {

    function Index () {
        
        if (!isset($_SESSION['login'])) {

            header('Location: /login');

        } else {

            $this->view('template/header');

            $this->model('accounts/Accounts');
            $privilege = $this->Accounts->checkPrivileges($_SESSION['login']);

            switch($privilege) {

                case 1:
                    $this->view('dashboard/admin');
                    break;
                
                case 2:
                    $this->view('dashboard/employee');
                    break;
                
                case 3:
                    $this->view('dashboard/customer');
                    break;

            }

            $this->view('template/footer');
            
        }

    }

}

?>