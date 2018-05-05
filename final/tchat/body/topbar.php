<div class="topbar">
    <a class="app-name" href="index.php">ProStudentECE</a>
    <span class="menu">
        <?php
            if(isLogged() == 1){
                ?>
                    <a href="index.php?page=membres" class="<?php echo ($page=='membres') ? 'active' : '' ?>">Mon Réseau</a>
                    <a href="index.php?page=photos" class="<?php echo ($page=='photos') ? 'active' : '' ?>">Photos</a>
                    <a href="index.php?page=events" class="<?php echo ($page=='eveents') ? 'active' : '' ?>">Accueil</a>
                    <a href="index.php?page=ajout" class="<?php echo ($page=='eveents') ? 'active' : '' ?>">Evenement</a>

                    <a href="index.php?page=logout">Déconnexion</a>
                <?php
            }else{
                ?>
                    <a href="index.php?page=register" class="<?php echo ($page=='register') ? 'active' : '' ?>">S'inscrire</a>
                    <a href="index.php?page=signin" class="<?php echo ($page=='signin') ? 'active' : '' ?>">Se connecter</a>
                <?php
            }
        ?>
    </span>
</div>