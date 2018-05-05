<?php
    session_start();

    //on se connecte a la base
    require_once('ConnexionBDD.php');

    //recuperer le login et le mot de passe
    $mail = $_POST['email'];
    $mdp = $_POST['mdp'];

    //verifier si l'mail et le mot de passe sont remplis
    if(empty($mail) || empty($mdp)) {
      echo "Entry your password or email";
    }
    //executer les codes suivants si les champs sont remplis
    else {
      try{
        //vérifier si le mail et le mot de passe sont corrects.
        $statement = $conn -> prepare("SELECT email, mdp FROM utilisateurs WHERE email ='".$mail."' and mdp = '".$mdp."'");
        $statement -> bindParam('".$mail"', $mail,PDO::PARAM_STR);
        $statement -> bindParam('".$mdp"', $mdp,PDO::PARAM_STR);

        //executer la requete preparée.
        $statement -> EXECUTE();
        $em = $statement -> fetchColumn();

        //vérifier si l'identification est correcte.
        if ($em == true){
          echo "Connexion Réussie";

          $statement_id = $conn -> prepare("SELECT id FROM utilisateurs WHERE email ='".$mail."' AND mdp = '".$mdp."'");
          $statement_id -> EXECUTE();
          $id = $statement_id -> fetchColumn();

          $statement_profil = $conn -> prepare("SELECT profil FROM utilisateurs WHERE email ='".$mail."' AND mdp = '".$mdp."'");
          $statement_profil -> EXECUTE();
          $profil = $statement_profil -> fetchColumn();

          if($profil == 'et')
          {
               //recuperer les données de l'utilisateur dans la BDD
              $statement_nom = $conn -> prepare("SELECT nom FROM etudiants WHERE email ='".$mail."' AND mdp = '".$mdp."'");
              $statement_nom -> EXECUTE();
              $nom = $statement_nom -> fetchColumn();

              $statement_prenom = $conn -> prepare("SELECT prenom FROM etudiants WHERE email ='".$mail."' AND mdp = '".$mdp."'");
              $statement_prenom -> EXECUTE();
              $prenom = $statement_prenom -> fetchColumn(0);

              $statement_date_naissance = $conn -> prepare("SELECT datenaissance FROM etudiants WHERE email ='".$mail."' AND mdp = '".$mdp."'");
              $statement_date_naissance -> EXECUTE();
              $date_naissance = $statement_date_naissance -> fetchColumn(0);

              $statement_sexe = $conn -> prepare("SELECT sexe FROM etudiants WHERE email ='".$mail."' AND mdp = '".$mdp."'");
              $statement_sexe -> EXECUTE();
              $sexe = $statement_sexe -> fetchColumn(0);

              $statement_promotion = $conn -> prepare("SELECT promotion FROM etudiants WHERE email ='".$mail."' AND mdp = '".$mdp."'");
              $statement_promotion -> EXECUTE();
              $promotion = $statement_promotion -> fetchColumn(0);

              $statement_majeur = $conn -> prepare("SELECT majeur FROM etudiants WHERE email ='".$mail."' AND mdp = '".$mdp."'");
              $statement_majeur -> EXECUTE();
              $majeur = $statement_majeur -> fetchColumn(0);

              $statement_administrateur = $conn -> prepare("SELECT administrateur FROM etudiants WHERE email ='".$mail."' AND mdp = '".$mdp."'");
              $statement_administrateur -> EXECUTE();
              $administrateur = $statement_administrateur -> fetchColumn(0);

              //enregistrer les données de l'utilisateur dans la session.
              $_SESSION["id"] = $id;
              $_SESSION["email"] = $mail;
              $_SESSION["mdp"] = $mdp;
              $_SESSION["nom"] = $nom;
              $_SESSION["prenom"] = $prenom;
              $_SESSION["date_naissance"] = $date_naissance;
              $_SESSION["sexe"] = $sexe;
              $_SESSION["promotion"] = $promotion;
              $_SESSION["majeur"] = $majeur;
              $_SESSION["administrateur"] = $administrateur;

              //test si les données sont bien stockées dans la session.
              echo $_SESSION["nom"];
              echo $_SESSION["prenom"];
          }
          else
          {
               //recuperer les données de l'utilisateur dans la BDD
              $statement_nom = $conn -> prepare("SELECT nom FROM employeurs WHERE email ='".$mail."' AND mdp = '".$mdp."'");
              $statement_nom -> EXECUTE();
              $nom = $statement_nom -> fetchColumn();

              $statement_prenom = $conn -> prepare("SELECT prenom FROM employeurs WHERE email ='".$mail."' AND mdp = '".$mdp."'");
              $statement_prenom -> EXECUTE();
              $prenom = $statement_prenom -> fetchColumn(0);

              $statement_date_naissance = $conn -> prepare("SELECT datenaissance FROM employeurs WHERE email ='".$mail."' AND mdp = '".$mdp."'");
              $statement_date_naissance -> EXECUTE();
              $date_naissance = $statement_date_naissance -> fetchColumn(0);

              $statement_sexe = $conn -> prepare("SELECT sexe FROM employeurs WHERE email ='".$mail."' AND mdp = '".$mdp."'");
              $statement_sexe -> EXECUTE();
              $sexe = $statement_sexe -> fetchColumn(0);

              $statement_secteur = $conn -> prepare("SELECT secteur FROM employeurs WHERE email ='".$mail."' AND mdp = '".$mdp."'");
              $statement_secteur -> EXECUTE();
              $secteur = $statement_secteur -> fetchColumn(0);

              $statement_nomsociete = $conn -> prepare("SELECT nomsociete FROM employeurs WHERE email ='".$mail."' AND mdp = '".$mdp."'");
              $statement_nomsociete -> EXECUTE();
              $nomsociete = $statement_nomsociete -> fetchColumn(0);

              $statement_administrateur = $conn -> prepare("SELECT administrateur FROM employeurs WHERE email ='".$mail."' AND mdp = '".$mdp."'");
              $statement_administrateur -> EXECUTE();
              $administrateur = $statement_administrateur -> fetchColumn(0);

              //enregistrer les données de l'utilisateur dans la session.
              $_SESSION["id"] = $id;
              $_SESSION["email"] = $mail;
              $_SESSION["mdp"] = $mdp;
              $_SESSION["nom"] = $nom;
              $_SESSION["prenom"] = $prenom;
              $_SESSION["date_naissance"] = $date_naissance;
              $_SESSION["sexe"] = $sexe;
              $_SESSION["secteur"] = $secteur;
              $_SESSION["nomsociete"] = $nomsociete;
              $_SESSION["administrateur"] = $administrateur;

              //test si les données sont bien stockées dans la session.
              echo $_SESSION["nom"];
              echo $_SESSION["prenom"];
          }          
        } 
        else 
        { //si l'identification est echouée.
          echo "email or password incorrect";
        }
      }
      catch (Exception $e)
      {
          echo "".$e->getMessage();
      }
    }

    $conn = null;

?>