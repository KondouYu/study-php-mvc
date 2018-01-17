<?php

class Customers extends Controller {

    function Index () {

        $this->model('accounts/Accounts');

        if (!isset($_SESSION['login']) && $this->Accounts->checkPrivileges($_SESSION['login']) > 2) {

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

        $this->model('accounts/Accounts');

        if (!isset($_SESSION['login']) && $this->Accounts->checkPrivileges($_SESSION['login']) > 2) {

            header('Location: /login');

        } else {
        
            $this->model('Customer');
            $this->model('cases/M_Case');

            $this->view('template/header');

            if (isset($_POST['editCustomerButton'])) {
                
                if ($this->Customer->update($_POST['symbol'], $_POST['imie'], $_POST['nazwisko'], $_POST['pesel'], $_POST['email'], $_POST['nrUmowy'], $id)) {
                    Notifier::success('Klient poprawnie edytowany.');
                } else {
                    Notifier::danger('Błąd edycji klienta!');
                }

            }

            if (isset($_POST['addCustomerCaseButton'])) {
                
                $sprawa = $this->M_Case->read($_POST['sprawa']);

                if ($this->M_Case->update($sprawa['symbol'], $sprawa['nazwa'], $sprawa['dziedzina'], $sprawa['nazwaInstytucji'], $sprawa['adresInstytucji'], $sprawa['uwagi'], $id, $sprawa['id'])) {
                    Notifier::success('Klient poprawnie połączony ze sprawą.');
                } else {
                    Notifier::danger('Błąd!');
                }

            }

            $data['customerData'] = $this->Customer->read($id);
            $data['caseData'] = $this->M_Case->readCustomer($id);
            $data['caseList'] = $this->M_Case->readAll();

            $this->view('customers/customer', $data);
            $this->view('customers/editcustomer', $data);
            $this->view('customers/addcustomercase', $data);

            $this->view('template/footer');

        }

    }

    function delete ($id) {

        $this->model('accounts/Accounts');

        if (!isset($_SESSION['login']) && $this->Accounts->checkPrivileges($_SESSION['login']) > 2) {

            header('Location: /login');

        } else {

            $this->model('Customer');

            $this->Customer->delete($id);

            header('Location: /customers');

        }

    }

    function print () {

        $this->model('accounts/Accounts');

        if (!isset($_SESSION['login']) && $this->Accounts->checkPrivileges($_SESSION['login']) > 2) {

            header('Location: /login');

        } else {

            $this->model('Customer');
            $customers = $this->Customer->readAll();

            $pdf = new FPDF();
            $pdf->AddPage('L');
            $pdf->AddFont('arial_ce', '', 'arial_ce.php');
            $pdf->SetFont('arial_ce');
            
            $pdf->Cell(90, 10);
            $pdf->Cell(90, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', 'Wykaz klientów'), 0, 0, 'C');
            $pdf->Ln();
            
            $pdf->SetFillColor(0, 0, 0);
            $pdf->SetTextColor(255);

            $pdf->Cell(25, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', 'SM'), 0, 0, 'C', 1);
            $pdf->Cell(45, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', 'IMIĘ'), 0, 0, 'C', 1);
            $pdf->Cell(45, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', 'NAZWISKO'), 0, 0, 'C', 1);
            $pdf->Cell(45, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', 'PESEL'), 0, 0, 'C', 1);
            $pdf->Cell(65, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', 'EMAIL'), 0, 0, 'C', 1);
            $pdf->Cell(45, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', 'NR. UMOWY'), 0, 0, 'C', 1);


            $pdf->Ln();

            $pdf->SetTextColor(0);

            $rowColor = true;
            foreach ($customers as $row) {

                if ($rowColor) {
                    $pdf->SetFillColor(240, 240, 240);
                    $rowColor = false;
                } else {
                    $pdf->SetFillColor(220, 220, 220);
                    $rowColor = true;
                }

                $pdf->Cell(25, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', $row['symbol']), 0, 0, 'L', 1);
                $pdf->Cell(45, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', $row['imie']), 0, 0, 'L', 1);
                $pdf->Cell(45, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', $row['nazwisko']), 0, 0, 'L', 1);
                $pdf->Cell(45, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', $row['pesel']), 0, 0, 'L', 1);
                $pdf->Cell(65, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', $row['email']), 0, 0, 'L', 1);
                $pdf->Cell(45, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', $row['nrUmowy']), 0, 0, 'R', 1);

                $pdf->Ln();

            }

            $pdf->Output();

        }

    }

}

?>