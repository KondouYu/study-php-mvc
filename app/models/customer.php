<?php

class Customer extends Model {

    function create ($symbol = '', $imie = '', $nazwisko = '', $pesel = '', $email = '', $nrUmowy = '') {

        $stmt = $this->db->prepare("INSERT INTO klienci (symbol, imie, nazwisko, pesel, email, nrUmowy) VALUES (?, ?, ?, ?, ?, ?)");

        $stmt->bindParam(1, $symbol);
        $stmt->bindParam(2, $imie);
        $stmt->bindParam(3, $nazwisko);
        $stmt->bindParam(4, $pesel);
        $stmt->bindParam(5, $email);
        $stmt->bindParam(6, $nrUmowy);

        return $stmt->execute();

    }

    function read ($id) {

        $stmt = $this->db->prepare("SELECT * FROM klienci WHERE id = ?");
        
        $stmt->bindParam(1, $id);
        
        $stmt->execute();

        return $stmt->fetch();

    }

    function readAll () {

        $stmt = $this->db->prepare("SELECT * FROM klienci");
        
        $stmt->execute();

        return $stmt->fetchAll();

    }

    function update ($symbol, $imie, $nazwisko, $pesel, $email, $nrUmowy, $id) {

        $stmt = $this->db->prepare("UPDATE klienci SET symbol=?, imie=?, nazwisko=?, pesel=?, email=?, nrUmowy=? WHERE id = ?");

        $stmt->bindParam(1, $symbol);
        $stmt->bindParam(2, $imie);
        $stmt->bindParam(3, $nazwisko);
        $stmt->bindParam(4, $pesel);
        $stmt->bindParam(5, $email);
        $stmt->bindParam(6, $nrUmowy);
        $stmt->bindParam(7, $id);

        return $stmt->execute();

    }

    function delete ($id) {

        $stmt = $this->db->prepare("DELETE FROM klienci WHERE id = ?");
        
        $stmt->bindParam(1, $id);
        
        return $stmt->execute();

    }

}

?>