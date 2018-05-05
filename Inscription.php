<?php
    session_start();

    require_once('ConnexionBDD.php');
    require_once('fonction.php');
?>

<h2 class="header header-form">S'inscrire</h2>

<?php
    if(isset($_POST['submit'])){
        $profil = htmlspecialchars(trim($_POST['profil']));
        $email = htmlspecialchars(trim($_POST['email']));
        $password = sha1(htmlspecialchars(trim($_POST['mdp'])));

        if(email_taken($email) == 1){
            $error_email = "L'adresse email est déjà utilisée...";
        }else{
            register($email, $password, $profil);
            $_SESSION['email'] = $email;
            echo "Inscription réussie";
        }
    }
?>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/3.3/favicon.ico">

    <title>Inscription</title>

    <!-- Bootstrap core CSS -->
    <link href="./Signin Template for Bootstrap_files/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="./Signin Template for Bootstrap_files/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./Signin Template for Bootstrap_files/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./Signin Template for Bootstrap_files/ie-emulation-modes-warning.js.téléchargement"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <form method="post">

    <div class="container">

      <form class="form-signin">
        <h2 class="form-signin-heading">Please register</h2>
        <label for="inputProfil" class="sr-only">Profil</label>
        <select name="profil">
            <option value="et" selected>Etudiant</option>
            <option value="em" selected>Employeur</option>
        </select>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="" name="email">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="" name="mdp">
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./Signin Template for Bootstrap_files/ie10-viewport-bug-workaround.js.téléchargement"></script>
    </form>

</body></html>