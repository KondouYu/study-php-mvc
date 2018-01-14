<?php

class Settlements extends Model {

    function create ($sprawaID, $kwota, $opis = '') {

        $stmt = $this->db->prepare("INSERT INTO rozliczenia (sprawaID, kwota, opis) VALUES (?, ?, ?)");

        $stmt->bindParam(1, $sprawaID);
        $stmt->bindParam(2, $kwota);
        $stmt->bindParam(3, $opis);

        return $stmt->execute();

    }

    function read ($id) {

        $stmt = $this->db->prepare("SELECT * FROM rozliczenia WHERE id = ?");
        
        $stmt->bindParam(1, $id);
        
        $stmt->execute();

        return $stmt->fetch();

    }

    function readAll () {

        $stmt = $this->db->prepare("SELECT * FROM rozliczenia");
        
        $stmt->execute();

        return $stmt->fetchAll();

    }

    function update ($kwota, $opis, $id) {

        $stmt = $this->db->prepare("UPDATE rozliczenia SET kwota=?, opis=? WHERE id = ?");

        $stmt->bindParam(1, $kwota);
        $stmt->bindParam(2, $opis);
        $stmt->bindParam(3, $id);

        return $stmt->execute();

    }

    function delete ($id) {

        $stmt = $this->db->prepare("DELETE FROM rozliczenia WHERE id = ?");
        
        $stmt->bindParam(1, $id);
        
        return $stmt->execute();

    }

}

?>