<?php
    include 'functions/main-functions.php';
    /* BLINDAGE SI L'UTILISATEUR S'AMUSE A MODIFIER LE TEXTE CONTENUE DANS LA BARRE DE RECHERCHE */

    $pages = scandir('pages/'); /*SCAN DU DOSSIER PAGES*/

    if(isset($_GET['page']) && !empty($_GET['page']) && in_array($_GET['page'].'.php',$pages)){
        $page = $_GET['page'];
    }else{
        $page = 'home';
    }

    $pages_functions = scandir('functions/'); /* SCAN DU DOSSIER FUNCTIONS*/

    if(in_array($page.'.func.php',$pages_functions)){ /* SI LE FICHIER EXISTE ALORS ON LE MET DANS PAGE*/
        include 'functions/'.$page.'.func.php';
    }

?>


<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Application web de tchat</title>
        <link rel="stylesheet" href="css/style.css"/>
        /*Ajout de la police*/
        <link href='http://fonts.googleapis.com/css?family=Roboto:500,700,400' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <?php
            include 'body/topbar.php'; /*AJOUT DE LA BARRE DE MENU DANS*/
        ?>
        <div class="container">
            <?php
                include 'pages/'.$page.'.php'; /* AJOUT DE LA PAGE SELECTIONNER DANS L'INDEX*/
            ?>
        </div>
        <script src="js/jquery.js"></script>
        <?php
            $pages_js = scandir('js/');
            if(in_array($page.'.func.js',$pages_js)){
                ?>
                    <script src="js/<?= $page ?>.func.js"></script>
                <?php
            }

        ?>

    </body>
</html>