<?php

class AccountsType extends Model {

    function create ($nazwa) {

        $stmt = $this->db->prepare("INSERT INTO kontaTyp (nazwa) VALUES (?)");

        $stmt->bindParam(1, $nazwa);

        return $stmt->execute();

    }

    function read ($id) {

        $stmt = $this->db->prepare("SELECT * FROM kontaTyp WHERE id = ?");
        
        $stmt->bindParam(1, $id);
        
        $stmt->execute();

        return $stmt->fetch();

    }

    function readAll () {

        $stmt = $this->db->prepare("SELECT * FROM kontaTyp");
        
        $stmt->execute();

        return $stmt->fetchAll();

    }

    function update ($nazwa, $id) {

        $stmt = $this->db->prepare("UPDATE kontaTyp SET nazwa=? WHERE id = ?");

        $stmt->bindParam(1, $nazwa);
        $stmt->bindParam(2, $id);

        return $stmt->execute();

    }

    function delete ($id) {

        $stmt = $this->db->prepare("DELETE FROM kontaTyp WHERE id = ?");
        
        $stmt->bindParam(1, $id);
        
        return $stmt->execute();

    }

}

?>