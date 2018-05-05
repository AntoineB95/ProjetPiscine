<?php

    function register($sender, $evenement){
        $sender='vinuu';
        global $db;
        $r = array(
            'sender'=>$sender,
            'evenement'=>$evenement
        );
        $sql = "INSERT INTO events(sender,evenement) VALUES(:sender,:evenement)";
        $req = $db->prepare($sql);
        $req->execute($r);
    }