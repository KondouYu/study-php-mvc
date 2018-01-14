<?php

class ActionsType extends Model {

    function create ($nazwa) {

        $stmt = $this->db->prepare("INSERT INTO typCzynnosci (nazwa) VALUES (?)");

        $stmt->bindParam(1, $nazwa);

        return $stmt->execute();

    }

    function read ($id) {

        $stmt = $this->db->prepare("SELECT * FROM typCzynnosci WHERE id = ?");
        
        $stmt->bindParam(1, $id);
        
        $stmt->execute();

        return $stmt->fetch();

    }

    function readAll () {

        $stmt = $this->db->prepare("SELECT * FROM typCzynnosci");
        
        $stmt->execute();

        return $stmt->fetchAll();

    }

    function update ($nazwa, $id) {

        $stmt = $this->db->prepare("UPDATE typCzynnosci SET nazwa=? WHERE id = ?");

        $stmt->bindParam(1, $nazwa);
        $stmt->bindParam(2, $id);

        return $stmt->execute();

    }

    function delete ($id) {

        $stmt = $this->db->prepare("DELETE FROM typCzynnosci WHERE id = ?");
        
        $stmt->bindParam(1, $id);
        
        return $stmt->execute();

    }

}

?>