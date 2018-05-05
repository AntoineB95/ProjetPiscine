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
