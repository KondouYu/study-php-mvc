<?php

class Settlements extends Controller {

    function Index () {
        if (!isset($_SESSION['login'])) {

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

    function read ($id = '') {

        if (!isset($_SESSION['login'])) {

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

}

?>