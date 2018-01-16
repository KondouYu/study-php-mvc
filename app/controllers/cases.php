<?php

class Cases extends Controller {

    function Index () {
        if (!isset($_SESSION['login'])) {

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

        if (!isset($_SESSION['login'])) {

            header('Location: /login');

        } else {
        
            $this->model('cases/M_Case');
            $this->model('cases/CasesDziedzina');
            $this->model('actions/Action');

            $this->view('template/header');

            if (isset($_POST['editCaseButton'])) {
                
                if ($this->M_Case->update($_POST['symbol'], $_POST['nazwa'], $_POST['dziedzina'], $_POST['nazwaInstytucji'], $_POST['adresInstytucji'], $_POST['uwagi'], $id)) {
                    Notifier::success('Sprawa poprawnie edytowana.');
                } else {
                    Notifier::danger('Błąd edycji sprawy!');
                }

            }

            $data['caseData'] = $this->M_Case->read($id);
            $data['dziedzinaList'] = $this->CasesDziedzina->readAll();
            $data['actionData'] = $this->Action->readCase($id);

            $this->view('cases/case', $data);
            $this->view('cases/editcase', $data);

            $this->view('template/footer');

        }

    }

}

?>