<?php

class Action extends Model {

    function create ($koszt = '', $sprawaID = '', $symbol = '', $nazwa = '', $miejsce = '', $typCzynnosci = '', $podtypCzynnosci = '', $dataRozpoczecia = '', $dataZakonczenia = '', $opis = '') {

        $stmt = $this->db->prepare("INSERT INTO czynnosci (koszt, sprawaID, symbol, nazwa, miejsce, typCzynnosci, podtypCzynnosci, dataRozpoczecia, dataZakonczenia, opis) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bindParam(1, $koszt);
        $stmt->bindParam(2, $sprawaID);
        $stmt->bindParam(3, $symbol);
        $stmt->bindParam(4, $nazwa);
        $stmt->bindParam(5, $miejsce);
        $stmt->bindParam(6, $typCzynnosci);
        $stmt->bindParam(7, $podtypCzynnosci);
        $stmt->bindParam(8, $dataRozpoczecia);
        $stmt->bindParam(9, $dataZakonczenia);
        $stmt->bindParam(10, $opis);

        return $stmt->execute();

    }

    function read ($id) {

        $stmt = $this->db->prepare("SELECT c.*, tc.nazwa as typCzynnosciNazwa, ptc.nazwa as podtypCzynnosciNazwa, s.nazwa AS sprawa FROM czynnosci c LEFT JOIN typCzynnosci tc ON c.typCzynnosci = tc.id LEFT JOIN podtypCzynnosci ptc ON c.podtypCzynnosci = ptc.id LEFT JOIN sprawy s ON c.sprawaID = s.id WHERE c.id = ?");
        
        $stmt->bindParam(1, $id);
        
        $stmt->execute();

        return $stmt->fetch();

    }

    function readAll () {

        $stmt = $this->db->prepare("SELECT c.*, tc.nazwa as typCzynnosciNazwa, ptc.nazwa as podtypCzynnosciNazwa, s.nazwa AS sprawa FROM czynnosci c LEFT JOIN typCzynnosci tc ON c.typCzynnosci = tc.id LEFT JOIN podtypCzynnosci ptc ON c.podtypCzynnosci = ptc.id LEFT JOIN sprawy s ON c.sprawaID = s.id");
        
        $stmt->execute();

        return $stmt->fetchAll();

    }

    function readCase ($id) {

        $stmt = $this->db->prepare("SELECT c.*, tc.nazwa as typCzynnosciNazwa, ptc.nazwa as podtypCzynnosciNazwa, s.nazwa AS sprawa FROM czynnosci c LEFT JOIN typCzynnosci tc ON c.typCzynnosci = tc.id LEFT JOIN podtypCzynnosci ptc ON c.podtypCzynnosci = ptc.id LEFT JOIN sprawy s ON c.sprawaID = s.id WHERE c.sprawaID = ?");
        
        $stmt->bindParam(1, $id);
        
        $stmt->execute();

        return $stmt->fetchAll();

    }

    function update ($koszt, $sprawaID, $symbol, $nazwa, $miejsce, $typCzynnosci, $podtypCzynnosci, $dataRozpoczecia, $dataZakonczenia, $opis, $id) {

        $stmt = $this->db->prepare("UPDATE czynnosci SET koszt=?, sprawaID=?, symbol=?, nazwa=?, miejsce=?, typCzynnosci=?, podtypCzynnosci=?, dataRozpoczecia=?, dataZakonczenia=?, opis=? WHERE id = ?");

        $stmt->bindParam(1, $koszt);
        $stmt->bindParam(2, $sprawaID);
        $stmt->bindParam(3, $symbol);
        $stmt->bindParam(4, $nazwa);
        $stmt->bindParam(5, $miejsce);
        $stmt->bindParam(6, $typCzynnosci);
        $stmt->bindParam(7, $podtypCzynnosci);
        $stmt->bindParam(8, $dataRozpoczecia);
        $stmt->bindParam(9, $dataZakonczenia);
        $stmt->bindParam(10, $opis);
        $stmt->bindParam(11, $id);

        return $stmt->execute();

    }

    function delete ($id) {

        $stmt = $this->db->prepare("DELETE FROM czynnosci WHERE id = ?");
        
        $stmt->bindParam(1, $id);
        
        return $stmt->execute();

    }

}

?>