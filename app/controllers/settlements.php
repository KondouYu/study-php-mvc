<?php

class Settlements extends Controller {

    function Index () {

        $this->model('accounts/Accounts');

        if (!isset($_SESSION['login']) && $this->Accounts->checkPrivileges($_SESSION['login']) <= 2) {

            header('Location: /login');

        } else {

            $this->model('cases/M_Case');
            $this->model('Settlement');
        
            $this->view('template/header');

            if (isset($_POST['addSettlementButton'])) {
                
                if ($this->Settlement->create($_POST['sprawa'], $_POST['kwota'], $_POST['opis'])) {
                    Notifier::success('Rozliczenie poprawnie dodane.');
                } else {
                    Notifier::danger('Błąd dodania rozliczenia!');
                }

            }

            $data['settlementData'] = $this->Settlement->readAll();
            $data['caseData'] = $this->M_Case->readAll();

            $this->view('settlements/readall', $data);
            $this->view('settlements/addsettlement', $data);

            $this->view('template/footer');

        }
    }

    function delete ($id) {

        $this->model('accounts/Accounts');

        if (!isset($_SESSION['login']) && $this->Accounts->checkPrivileges($_SESSION['login']) <= 2) {

            header('Location: /login');

        } else {

            $this->model('Settlement');

            $this->Settlement->delete($id);

            header('Location: /settlements');

        }

    }

    function print () {

        $this->model('accounts/Accounts');

        if (!isset($_SESSION['login']) && $this->Accounts->checkPrivileges($_SESSION['login']) <= 2) {

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