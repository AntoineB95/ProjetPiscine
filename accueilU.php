<?php

function get_event(){
    global $db;
    $req = $db->query("SELECT * FROM events");
    $results = array();
    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }
    return $results;
} /* Requete SQL qui permet de recuperer tte les donnés de la base de donné dans un tableau*/

/* Partie qui permet d'afficher les evenements présent dans la base de données
<?php
if(isLogged() == 0){
    header("Location:index.php?page=signin");
}
?>

<h2 class="header">Fil d'actualité</h2>
<?php
foreach(get_event() as $membre){

    ?>
    <div class="membre">
        <strong><?= $membre->sender ?></strong><br/>
        <span><?= $membre->evenement ?></span><br/>
    </div>


    <?php


}
?>