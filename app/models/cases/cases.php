<?php

class Cases extends Model {

    function create ($symbol = '', $nazwa = '', $dziedzina = '', $nazwaInstytucji = '', $adresInstytucji = '', $uwagi = '', $klientID = '') {

        $stmt = $this->db->prepare("INSERT INTO klienci (symbol, nazwa, dziedzina, nazwaInstytucji, adresInstytucji, uwagi, klientID) VALUES (?, ?, ?, ?, ?, ?, ?)");

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

        $stmt = $this->db->prepare("SELECT * FROM sprawy WHERE id = ?");
        
        $stmt->bindParam(1, $id);
        
        $stmt->execute();

        return $stmt->fetch();

    }

    function readAll () {

        $stmt = $this->db->prepare("SELECT * FROM sprawy");
        
        $stmt->execute();

        return $stmt->fetchAll();

    }

    function update ($symbol, $nazwa, $dziedzina, $nazwaInstytucji, $adresInstytucji, $uwagi, $klientID, $id) {

        $stmt = $this->db->prepare("UPDATE klienci SET symbol=?, nazwa=?, dziedzina=?, nazwaInstytucji=?, adresInstytucji=?, uwagi=?, klientID = ? WHERE id = ?");

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