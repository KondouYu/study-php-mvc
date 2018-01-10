<?php

class Account extends Model {

    function checkCredentials ($username, $password) {

        $seed = $this->getSeed($username);
        $hPassword = $this->hashPassword($password, $seed);

        $stmt = $this->db->prepare("SELECT login FROM accounts WHERE login = ? AND password = ?");
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $hPassword);
        $stmt->execute();

        $result = $stmt->fetch();

        if($result)
            return $result['login'];
        else
            return 0;

    }

    private function getSeed ($username) {

        $stmt = $this->db->prepare("SELECT seed FROM accounts WHERE login = ?");
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