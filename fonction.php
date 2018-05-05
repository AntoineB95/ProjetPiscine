<?php

    function email_taken($email){
        global $conn;
        $e = array('email' => $email);
        $sql = 'SELECT * FROM utilisateurs WHERE email = :email';
        $req = $conn->prepare($sql);
        $req->execute($e);
        $free = $req->rowCount($sql);

        return $free;
    }

    function register($email, $password, $profil){
        global $conn;
        $r = array(
            'email'=>$email,
            'password'=>$password,
            'profil' =>$profil
        );
        $sql = "INSERT INTO `utilisateurs`(`email`, `mdp`, `profil`) VALUES (:email,:password,:profil)";
        $req = $conn->prepare($sql);
        $req->execute($r);
    }