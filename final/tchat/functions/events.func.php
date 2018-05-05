<?php

function get_event(){
    global $db;
    $req = $db->query("SELECT * FROM events");
    $results = array();
    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }
    return $results;
}