<?php

class Cases extends Controller {

    function Index () {
        
        $this->model('accounts/Accounts');

        if (!isset($_SESSION['login']) && $this->Accounts->checkPrivileges($_SESSION['login']) > 2) {

            header('Location: /login');

        } else {

            $this->model('cases/M_Case');
            $this->model('cases/CasesDziedzina');
        
            $this->view('template/header');

            if (isset($_POST['addCaseButton'])) {
                
                if ($this->M_Case->create($_POST['symbol'], $_POST['nazwa'], $_POST['dziedzina'], $_POST['nazwaInstytucji'], $_POST['adresInstytucji'], $_POST['uwagi'], NULL)) {
                    Notifier::success('Sprawa ' . $_POST['nazwa'] . ' poprawnie dodana.');
                } else {
                    Notifier::danger('Błąd dodania sprawy!');
                }

            }

            $data['caseData'] = $this->M_Case->readAll();
            $data['dziedzinaList'] = $this->CasesDziedzina->readAll();

            $this->view('cases/readall', $data);
            $this->view('cases/addcase', $data);

            $this->view('template/footer');

        }
    }

    function read ($id = '') {

        $this->model('accounts/Accounts');

        if (!isset($_SESSION['login']) && $this->Accounts->checkPrivileges($_SESSION['login']) > 2) {

            header('Location: /login');

        } else {
        
            $this->model('cases/M_Case');
            $this->model('cases/CasesDziedzina');
            $this->model('actions/Action');
            $this->model('Settlement');

            $this->view('template/header');

            if (isset($_POST['editCaseButton'])) {

                $sprawa = $this->M_Case->read($id);
                
                if ($this->M_Case->update($_POST['symbol'], $_POST['nazwa'], $_POST['dziedzina'], $_POST['nazwaInstytucji'], $_POST['adresInstytucji'], $_POST['uwagi'], $sprawa['klientID'], $id)) {
                    Notifier::success('Sprawa poprawnie edytowana.');
                } else {
                    Notifier::danger('Błąd edycji sprawy!');
                }

            }

            $data['caseData'] = $this->M_Case->read($id);
            $data['dziedzinaList'] = $this->CasesDziedzina->readAll();
            $data['actionData'] = $this->Action->readCase($id);
            $data['balance'] = $this->Settlement->sumCase($id) - $this->Action->sumCase($id);
            $data['settlementData'] = $this->Settlement->readCase($id);

            $this->view('cases/case', $data);
            $this->view('cases/editcase', $data);

            $this->view('template/footer');

        }

    }

    function delete ($id) {

        $this->model('accounts/Accounts');

        if (!isset($_SESSION['login']) && $this->Accounts->checkPrivileges($_SESSION['login']) > 2) {

            header('Location: /login');

        } else {

            $this->model('cases/M_Case');

            $this->M_Case->delete($id);

            header('Location: /cases');

        }

    }

    function print () {

        $this->model('accounts/Accounts');

        if (!isset($_SESSION['login']) && $this->Accounts->checkPrivileges($_SESSION['login']) > 2) {

            header('Location: /login');

        } else {

            $this->model('cases/M_Case');
            $cases = $this->M_Case->readAll();

            $pdf = new FPDF();
            $pdf->AddPage('L');
            $pdf->AddFont('arial_ce', '', 'arial_ce.php');
            $pdf->SetFont('arial_ce');

            $pdf->Cell(90, 10);
            $pdf->Cell(90, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', 'Wykaz spraw'), 0, 0, 'C');
            $pdf->Ln();

            $pdf->SetFillColor(0, 0, 0);
            $pdf->SetTextColor(255);

            $pdf->Cell(25, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', 'SM'), 0, 0, 'C', 1);
            $pdf->Cell(55, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', 'NAZWA'), 0, 0, 'C', 1);
            $pdf->Cell(55, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', 'DZIEDZINA'), 0, 0, 'C', 1);
            $pdf->Cell(85, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', 'NAZWA INSTYTUCJI'), 0, 0, 'C', 1);
            $pdf->Cell(55, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', 'KLIENT'), 0, 0, 'C', 1);

            $pdf->Ln();

            $pdf->SetTextColor(0);

            $rowColor = true;
            foreach ($cases as $row) {

                if ($rowColor) {
                    $pdf->SetFillColor(240, 240, 240);
                    $rowColor = false;
                } else {
                    $pdf->SetFillColor(220, 220, 220);
                    $rowColor = true;
                }

                $pdf->Cell(25, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', $row['symbol']), 0, 0, 'L', 1);
                $pdf->Cell(55, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', $row['nazwa']), 0, 0, 'L', 1);
                $pdf->Cell(55, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', $row['dziedzinaNazwa']), 0, 0, 'L', 1);
                $pdf->Cell(85, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', $row['nazwaInstytucji']), 0, 0, 'L', 1);
                $pdf->Cell(55, 10, iconv('UTF-8', 'ISO-8859-2//TRANSLIT//IGNORE', $row['klient']), 0, 0, 'L', 1);

                $pdf->Ln();

            }

            $pdf->Output();

        }

    }

}

?>