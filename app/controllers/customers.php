<?php

class Customers extends Controller {

    function Index () {
        if (!isset($_SESSION['login'])) {

            header('Location: /login');

        } else {

            $this->model('Customer');
        
            $this->view('template/header');

            if (isset($_POST['addCustomerButton'])) {
                
                if ($this->Customer->create($_POST['symbol'], $_POST['imie'], $_POST['nazwisko'], $_POST['pesel'], $_POST['email'], $_POST['nrUmowy'])) {
                    Notifier::success('Klient ' . $_POST['imie'] . ' ' . $_POST['nazwisko'] . ' poprawnie dodany.');
                } else {
                    Notifier::danger('Błąd dodania klienta!');
                }

            }

            $this->view('customers/readall', $this->Customer->readAll());
            $this->view('customers/addcustomer');

            $this->view('template/footer');

        }
    }

    function read ($id = '') {

        if (!isset($_SESSION['login'])) {

            header('Location: /login');

        } else {
        
            $this->model('Customer');
            $this->model('cases/Cases');

            $this->view('template/header');

            if (isset($_POST['editCustomerButton'])) {
                
                if ($this->Customer->update($_POST['symbol'], $_POST['imie'], $_POST['nazwisko'], $_POST['pesel'], $_POST['email'], $_POST['nrUmowy'], $id)) {
                    Notifier::success('Klient poprawnie edytowany.');
                } else {
                    Notifier::danger('Błąd edycji klienta!');
                }

            }

            if (isset($_POST['addCustomerCaseButton'])) {
                
                $sprawa = $this->Cases->read($_POST['sprawa']);

                if ($this->Cases->update($sprawa['symbol'], $sprawa['nazwa'], $sprawa['dziedzina'], $sprawa['nazwaInstytucji'], $sprawa['adresInstytucji'], $sprawa['uwagi'], $id, $sprawa['id'])) {
                    Notifier::success('Klient poprawnie połączony ze sprawą.');
                } else {
                    Notifier::danger('Błąd!');
                }

            }

            $data['customerData'] = $this->Customer->read($id);
            $data['caseData'] = $this->Cases->readCustomer($id);
            $data['caseList'] = $this->Cases->readAll();

            $this->view('customers/customer', $data);
            $this->view('customers/editcustomer', $data);
            $this->view('customers/addcustomercase', $data);

            $this->view('template/footer');

        }

    }

}

?>