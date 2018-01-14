<?php

class CasesDziedzina extends Model {

    function create ($nazwa) {

        $stmt = $this->db->prepare("INSERT INTO sprawyDziedzina (nazwa) VALUES (?)");

        $stmt->bindParam(1, $nazwa);

        return $stmt->execute();

    }

    function read ($id) {

        $stmt = $this->db->prepare("SELECT * FROM sprawyDziedzina WHERE id = ?");
        
        $stmt->bindParam(1, $id);
        
        $stmt->execute();

        return $stmt->fetch();

    }

    function readAll () {

        $stmt = $this->db->prepare("SELECT * FROM sprawyDziedzina");
        
        $stmt->execute();

        return $stmt->fetchAll();

    }

    function update ($nazwa, $id) {

        $stmt = $this->db->prepare("UPDATE sprawyDziedzina SET nazwa=? WHERE id = ?");

        $stmt->bindParam(1, $nazwa);
        $stmt->bindParam(2, $id);

        return $stmt->execute();

    }

    function delete ($id) {

        $stmt = $this->db->prepare("DELETE FROM sprawyDziedzina WHERE id = ?");
        
        $stmt->bindParam(1, $id);
        
        return $stmt->execute();

    }

}

?>