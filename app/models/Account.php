<?php

class Account extends Model {

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

}

?>