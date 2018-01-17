<?php

class Actions extends Controller {

    function Index () {

        $this->model('accounts/Accounts');

        if (!isset($_SESSION['login']) && $this->Accounts->checkPrivileges($_SESSION['login']) > 2) {

            header('Location: /login');

        } else {

            $this->model('cases/M_Case');
            $this->model('actions/Action');
            $this->model('actions/ActionsType');
            $this->model('actions/ActionsSubtype');
        
            $this->view('template/header');

            if (isset($_POST['addActionButton'])) {
                
                if ($this->Action->create($_POST['koszt'], $_POST['sprawa'], $_POST['symbol'], $_POST['nazwa'], $_POST['miejsce'], $_POST['typCzynnosci'], $_POST['podtypCzynnosci'], $_POST['dataRozpoczecia'], $_POST['dataZakonczenia'], $_POST['opis'])) {
                    Notifier::success('Czynność ' . $_POST['nazwa'] . ' poprawnie dodana.');
                } else {
                    Notifier::danger('Błąd dodania czynności!');
                }

            }

            $data['actionData'] = $this->Action->readAll();
            $data['caseData'] = $this->M_Case->readAll();
            $data['typCzynnosciList'] = $this->ActionsType->readAll();
            $data['podtypCzynnosciList'] = $this->ActionsSubtype->readAll();

            $this->view('actions/readall', $data);
            $this->view('actions/addaction', $data);

            $this->view('template/footer');

        }
    }

    function read ($id = '') {

        $this->model('accounts/Accounts');

        if (!isset($_SESSION['login']) && $this->Accounts->checkPrivileges($_SESSION['login']) > 2) {

            header('Location: /login');

        } else {
        
            $this->model('cases/M_Case');
            $this->model('actions/Action');
            $this->model('actions/ActionsType');
            $this->model('actions/ActionsSubtype');

            $this->view('template/header');

            if (isset($_POST['editActionButton'])) {
                
                if ($this->Action->update($_POST['koszt'], $_POST['sprawa'], $_POST['symbol'], $_POST['nazwa'], $_POST['miejsce'], $_POST['typCzynnosci'], $_POST['podtypCzynnosci'], $_POST['dataRozpoczecia'], $_POST['dataZakonczenia'], $_POST['opis'], $id)) {
                    Notifier::success('Czynność poprawnie edytowana.');
                } else {
                    Notifier::danger('Błąd edycji czynności!');
                }

            }

            $data['actionData'] = $this->Action->read($id);
            $data['caseData'] = $this->M_Case->readAll();
            $data['typCzynnosciList'] = $this->ActionsType->readAll();
            $data['podtypCzynnosciList'] = $this->ActionsSubtype->readAll();

            $this->view('actions/action', $data);
            $this->view('actions/editaction', $data);
            
            $this->view('template/footer');

        }

    }

    function delete ($id) {

        $this->model('accounts/Accounts');

        if (!isset($_SESSION['login']) && $this->Accounts->checkPrivileges($_SESSION['login']) > 2) {

            header('Location: /login');

        } else {

            $this->model('actions/Action');

            $this->Action->delete($id);

            header('Location: /actions');

        }

    }

    function print () {

        $this->model('accounts/Accounts');

        if (!isset($_SESSION['login']) && $this->Accounts->checkPrivileges($_SESSION['login']) > 2) {

            header('Location: /login');

        } else {

            $this->model('actions/Action');
            $actions = $this->Action->readAll();

            $pdf = new FPDF();
            $pdf->AddPage('L');
            $pdf->AddFont('arial_ce', '', 'arial_ce.php');
            $pdf->SetFont('arial_ce');

            $pdf->Cell(90, 10);
            $pdf->Cell(90, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', 'Wykaz czynności'), 0, 0, 'C');
            $pdf->Ln();

            $pdf->SetFillColor(0, 0, 0);
            $pdf->SetTextColor(255);

            $pdf->Cell(20, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', 'SM'), 0, 0, 'C', 1);
            $pdf->Cell(30, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', 'KOSZT'), 0, 0, 'C', 1);
            $pdf->Cell(70, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', 'NAZWA'), 0, 0, 'C', 1);
            $pdf->Cell(50, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', 'D. ROZPOCZĘCIA'), 0, 0, 'C', 1);
            $pdf->Cell(50, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', 'D. ZAKOŃCZENIA'), 0, 0, 'C', 1);
            $pdf->Cell(50, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', 'SPRAWA'), 0, 0, 'C', 1);


            $pdf->Ln();

            $pdf->SetTextColor(0);

            $rowColor = true;
            foreach ($actions as $row) {

                if ($rowColor) {
                    $pdf->SetFillColor(240, 240, 240);
                    $rowColor = false;
                } else {
                    $pdf->SetFillColor(220, 220, 220);
                    $rowColor = true;
                }

                $pdf->Cell(20, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', $row['symbol']), 0, 0, 'L', 1);
                $pdf->Cell(30, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', $row['koszt'] . 'PLN'), 0, 0, 'L', 1);
                $pdf->Cell(70, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', $row['nazwa']), 0, 0, 'L', 1);
                $pdf->Cell(50, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', date_format(date_create($row['dataRozpoczecia']), 'd.m.Y')), 0, 0, 'L', 1);
                $pdf->Cell(50, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', date_format(date_create($row['dataZakonczenia']), 'd.m.Y')), 0, 0, 'L', 1);
                $pdf->Cell(50, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', $row['sprawa']), 0, 0, 'R', 1);

                $pdf->Ln();

            }

            $pdf->Output();

        }

    }

}

?>