<?php

$mail=isset($_GET['email'])?$_GET['email']:"";
$mdp=isset($_GET['mdp'])?$_GET['mdp']:"";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ece";


try {
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connexion à la base de donnée réussie<br>";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

 if($login="" || $pass="")
 {
      echo "Un ou plusieurs champs sont vides";
 }
 else 
 {
      try
      {
    	//  Récupération de l'utilisateur et de son pass hashé
		$req = $bdd->prepare('SELECT email FROM utilisateurs WHERE email = ? AND mdp = ?');
		$req->execute(array(email => $_GET['email'], mdp => $_GET['mdp']));
		$resultat = $req->fetch();

		// Comparaison du pass envoyé via le formulaire avec la base
		$isEmailCorrect = password_verify($_GET['mdp']), $resultat['mdp']);
		if (!$resultat)
		{
		    echo 'Mauvais identifiant ou mot de passe !';
		}
		else
		{
		    if ($isEmailCorrect) 
		    {
		        session_start();
		        $_SESSION['id'] = $resultat['id'];
		        $_SESSION['pseudo'] = $pseudo;
		        echo 'Vous êtes connecté !';
		    }
		    else {
		        echo 'Mauvais identifiant ou mot de passe !';
		    }
		}
      }
      catch (Exception $e)
      {
          echo "".$e->getMessage();
      }
    }
?> 	