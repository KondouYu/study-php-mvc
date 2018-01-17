<?php

class M_Case extends Model {

    function create ($symbol = '', $nazwa = '', $dziedzina = '', $nazwaInstytucji = '', $adresInstytucji = '', $uwagi = '', $klientID = '') {

        $stmt = $this->db->prepare("INSERT INTO sprawy (symbol, nazwa, dziedzina, nazwaInstytucji, adresInstytucji, uwagi, klientID) VALUES (?, ?, ?, ?, ?, ?, ?)");

        $stmt->bindParam(1, $symbol);
        $stmt->bindParam(2, $nazwa);
        $stmt->bindParam(3, $dziedzina);
        $stmt->bindParam(4, $nazwaInstytucji);
        $stmt->bindParam(5, $adresInstytucji);
        $stmt->bindParam(6, $uwagi);
        $stmt->bindParam(7, $klientID);

        return $stmt->execute();

    }

    function read ($id) {

        $stmt = $this->db->prepare("SELECT s.*, sd.nazwa as dziedzinaNazwa, CONCAT(k.imie, \" \", k.nazwisko) as klient FROM sprawy s LEFT JOIN sprawyDziedzina sd ON s.dziedzina = sd.id LEFT JOIN klienci k ON s.klientID = k.id WHERE s.id = ?");
        
        $stmt->bindParam(1, $id);
        
        $stmt->execute();

        return $stmt->fetch();

    }

    function readCustomer ($klientID) {

        $stmt = $this->db->prepare("SELECT s.*, sd.nazwa as dziedzinaNazwa FROM sprawy s LEFT JOIN sprawyDziedzina sd ON s.dziedzina = sd.id WHERE klientID = ?");

        $stmt->bindParam(1, $klientID);
        
        $stmt->execute();

        return $stmt->fetchAll();

    }

    function readAll () {

        $stmt = $this->db->prepare("SELECT s.*, sd.nazwa as dziedzinaNazwa, CONCAT(k.imie, \" \", k.nazwisko) as klient FROM sprawy s LEFT JOIN sprawyDziedzina sd ON s.dziedzina = sd.id LEFT JOIN klienci k ON s.klientID = k.id");
        
        $stmt->execute();

        return $stmt->fetchAll();

    }

    function update ($symbol, $nazwa, $dziedzina, $nazwaInstytucji, $adresInstytucji, $uwagi, $klientID, $id) {

        $stmt = $this->db->prepare("UPDATE sprawy SET symbol=?, nazwa=?, dziedzina=?, nazwaInstytucji=?, adresInstytucji=?, uwagi=?, klientID = ? WHERE id = ?");

        $stmt->bindParam(1, $symbol);
        $stmt->bindParam(2, $nazwa);
        $stmt->bindParam(3, $dziedzina);
        $stmt->bindParam(4, $nazwaInstytucji);
        $stmt->bindParam(5, $adresInstytucji);
        $stmt->bindParam(6, $uwagi);
        $stmt->bindParam(7, $klientID);
        $stmt->bindParam(8, $id);

        return $stmt->execute();

    }

    function delete ($id) {

        $stmt = $this->db->prepare("DELETE FROM sprawy WHERE id = ?");
        
        $stmt->bindParam(1, $id);
        
        return $stmt->execute();

    }

}

?>