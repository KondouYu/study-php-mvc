<?php

class Account extends Controller {

    function Index () {

        $this->model('accounts/Accounts');
        $this->model('accounts/AccountsType');

        if (!isset($_SESSION['login']) && $this->Accounts->checkPrivileges($_SESSION['login']) > 1) {

            header('Location: /login');

        } else {
        
            $this->view('template/header');

            if (isset($_POST['addAccountButton'])) {

                $bytes = openssl_random_pseudo_bytes(4, $cstrong);
                $seed = bin2hex($bytes);

                $hPassword = $this->Accounts->hashPassword($_POST['password'], $seed);
                
                if ($this->Accounts->create($_POST['email'], $seed, $hPassword, $_POST['typ'], isset($_POST['aktywne']))) {
                    Notifier::success('Konto poprawnie dodane.');
                } else {
                    Notifier::danger('Błąd dodania konta!');
                }

            }

            $data['accountData'] = $this->Accounts->readAll();
            $data['accountType'] = $this->AccountsType->readAll();

            $this->view('account/readall', $data);
            $this->view('account/addaccount', $data);

            $this->view('template/footer');

        }
    }

    function delete ($id) {

        $this->model('accounts/Accounts');

        if (!isset($_SESSION['login']) && $this->Accounts->checkPrivileges($_SESSION['login']) > 1) {

            header('Location: /login');

        } else {

            $this->Accounts->delete($id);

            header('Location: /account');

        }

    }

    function print () {

        $this->model('accounts/Accounts');

        if (!isset($_SESSION['login']) && $this->Accounts->checkPrivileges($_SESSION['login']) > 1) {

            header('Location: /login');

        } else {

            $this->model('Settlement');
            $settlements = $this->Settlement->readAll();

            $pdf = new FPDF();
            $pdf->AddPage('L');
            $pdf->AddFont('arial_ce', '', 'arial_ce.php');
            $pdf->SetFont('arial_ce');

            $pdf->Cell(90, 10);
            $pdf->Cell(90, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', 'Wykaz rozliczeń'), 0, 0, 'C');
            $pdf->Ln();

            $pdf->SetFillColor(0, 0, 0);
            $pdf->SetTextColor(255);

            $pdf->Cell(50, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', 'SPRAWA'), 0, 0, 'C', 1);
            $pdf->Cell(50, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', 'KWOTA'), 0, 0, 'C', 1);
            $pdf->Cell(175, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', 'OPIS'), 0, 0, 'C', 1);

            $pdf->Ln();

            $pdf->SetTextColor(0);

            $rowColor = true;
            foreach ($settlements as $row) {

                if ($rowColor) {
                    $pdf->SetFillColor(240, 240, 240);
                    $rowColor = false;
                } else {
                    $pdf->SetFillColor(220, 220, 220);
                    $rowColor = true;
                }

                $pdf->Cell(50, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', $row['sprawa']), 0, 0, 'L', 1);
                $pdf->Cell(50, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', $row['kwota'] . ' PLN'), 0, 0, 'L', 1);
                $pdf->Cell(175, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', $row['opis']), 0, 0, 'L', 1);

                $pdf->Ln();

            }

            $pdf->Output();

        }

    }

}

?>