<?php

class Accounts extends Model {

    function checkCredentials ($username, $password) {

        $seed = $this->getSeed($username);
        $hPassword = $this->hashPassword($password, $seed);

        $stmt = $this->db->prepare("SELECT login FROM konta WHERE aktywne = '1' AND login = ? AND haslo = ?");
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $hPassword);
        $stmt->execute();

        $result = $stmt->fetch();

        if($result)
            return $result['login'];
        else
            return 0;

    }

    function checkPrivileges ($username) {

        $stmt = $this->db->prepare("SELECT typ FROM konta WHERE login = ?");
        $stmt->bindParam(1, $username);
        $stmt->execute();

        $result = $stmt->fetch();

        return $result[0];

    }

    private function getSeed ($username) {

        $stmt = $this->db->prepare("SELECT ziarno FROM konta WHERE login = ?");
        $stmt->bindParam(1, $username);
        $stmt->execute();

        $result = $stmt->fetch();

        return $result[0];

    }

    private function hashPassword ($password, $seed) {

        return hash('sha512', $password . $seed);

    }

    // CRUD
    function create ($login = '', $ziarno = '', $haslo = '', $typ = '', $aktywne = '') {

        $stmt = $this->db->prepare("INSERT INTO klienci (login, ziarno, haslo, typ, aktywne) VALUES (?, ?, ?, ?, ?)");

        $stmt->bindParam(1, $login);
        $stmt->bindParam(2, $ziarno);
        $stmt->bindParam(3, $haslo);
        $stmt->bindParam(4, $typ);
        $stmt->bindParam(5, $aktywne);

        return $stmt->execute();

    }

    function read ($id) {

        $stmt = $this->db->prepare("SELECT * FROM konta WHERE id = ?");
        
        $stmt->bindParam(1, $id);
        
        $stmt->execute();

        return $stmt->fetch();

    }

    function readAll () {

        $stmt = $this->db->prepare("SELECT * FROM konta");
        
        $stmt->execute();

        return $stmt->fetchAll();

    }

    function update ($login, $ziarno, $haslo, $typ, $aktywne, $id) {

        $stmt = $this->db->prepare("UPDATE konta SET login=?, ziarno=?, haslo=?, typ=?, aktywne=? WHERE id = ?");

        $stmt->bindParam(1, $login);
        $stmt->bindParam(2, $ziarno);
        $stmt->bindParam(3, $haslo);
        $stmt->bindParam(4, $typ);
        $stmt->bindParam(5, $aktywne);
        $stmt->bindParam(6, $id);

        return $stmt->execute();

    }

    function delete ($id) {

        $stmt = $this->db->prepare("DELETE FROM konta WHERE id = ?");
        
        $stmt->bindParam(1, $id);
        
        return $stmt->execute();

    }

}

?>