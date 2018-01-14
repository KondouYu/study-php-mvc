<?php

class Actions extends Model {

    function create ($sprawaID = '', $symbol = '', $nazwa = '', $miejsce = '', $typCzynnosci = '', $podtypCzynnosci = '', $dataRozpoczecia = '', $dataZakonczenia = '', $opis = '') {

        $stmt = $this->db->prepare("INSERT INTO czynnosci (sprawaID, symbol, nazwa, miejsce, typCzynnosci, podtypCzynnosci, dataRozpoczecia, dataZakonczenia, opis) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bindParam(1, $sprawaID);
        $stmt->bindParam(2, $symbol);
        $stmt->bindParam(3, $nazwa);
        $stmt->bindParam(4, $miejsce);
        $stmt->bindParam(5, $typCzynnosci);
        $stmt->bindParam(6, $podtypCzynnosci);
        $stmt->bindParam(7, $dataRozpoczecia);
        $stmt->bindParam(8, $dataZakonczenia);
        $stmt->bindParam(9, $opis);

        return $stmt->execute();

    }

    function read ($id) {

        $stmt = $this->db->prepare("SELECT * FROM czynnosci WHERE id = ?");
        
        $stmt->bindParam(1, $id);
        
        $stmt->execute();

        return $stmt->fetch();

    }

    function readAll () {

        $stmt = $this->db->prepare("SELECT * FROM czynnosci");
        
        $stmt->execute();

        return $stmt->fetchAll();

    }

    function update ($sprawaID, $symbol, $nazwa, $miejsce, $typCzynnosci, $podtypCzynnosci, $dataRozpoczecia, $dataZakonczenia, $opis, $id) {

        $stmt = $this->db->prepare("UPDATE czynnosci SET sprawaID=?, symbol=?, nazwa=?, miejsce=?, typCzynnosci=?, podtypCzynnosci=?, dataRozpoczecia=?, dataZakonczenia=?, opis=? WHERE id = ?");

        $stmt->bindParam(1, $sprawaID);
        $stmt->bindParam(2, $symbol);
        $stmt->bindParam(3, $nazwa);
        $stmt->bindParam(4, $miejsce);
        $stmt->bindParam(5, $typCzynnosci);
        $stmt->bindParam(6, $podtypCzynnosci);
        $stmt->bindParam(7, $dataRozpoczecia);
        $stmt->bindParam(8, $dataZakonczenia);
        $stmt->bindParam(9, $opis);
        $stmt->bindParam(10, $id);

        return $stmt->execute();

    }

    function delete ($id) {

        $stmt = $this->db->prepare("DELETE FROM czynnosci WHERE id = ?");
        
        $stmt->bindParam(1, $id);
        
        return $stmt->execute();

    }

}

?>