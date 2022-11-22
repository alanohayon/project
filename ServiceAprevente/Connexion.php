<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="le_css/style-header.css">
  <link rel="stylesheet" href="le_css/connexion.css">

  <!-- LIEN POUR LA POLICE (GOOGLE FONTS) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">

  <!-- LIEN POUR LES ICONES -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

</head>
<body style="background-color:#f5f5f5">
  <header>
    <nav class="nav-header" role="navigation">
        <!-- LOGO A GAUCHE -->
        <div class="menu-gauche">
            <a href="Accueil.php" class="logodaccueil"><h1 class="logogo">TICKETING INC.</a>
        </div>
        <!-- TOUTES LES PAGES -->

        <div class="menu-droite">
            <a href="InscritClient.php" class="pages"><i class="fa fa-user-circle" aria-hidden="true"></i> S'inscrire</a>
            <a href="acceuil.php" class="pages"><i class="fa fa-home" aria-hidden="true"></i> Accueil</a>
 
        </div>
    </nav>
  </header>
  <br>
 
<main>
    <div class="center-form">
      <form action="" method="post">

        <h1>Se connecter</h1><br>

        <input type="email" name="mail" placeholder="Email" required><br><br>  
        <input type="password" name="mdp" placeholder="Mot de passe" required><br><br>
        <input type="submit" value="Connexion" name="bout" class="bout"><br><br>

        <?php         
    $mail = $_POST["mail"];
    $mdp = $_POST["mdp"];
    $id = mysqli_connect("127.0.0.1:8889","root","root","SA");
    $req1 = "select * from responsable where mail='$mail' and mdp='$mdp'" ;
    $resultat = mysqli_query($id, $req1);
    $recu = mysqli_fetch_assoc($resultat);
    $mailb =$recu["mail"];
    $mdpb =$recu["mdp"];

    if(isset($_POST["bout"])){
    $req = "select * from client where mail='$mail' and mdp='$mdp' " ;
    $resultat = mysqli_query($id, $req);
    $recu = mysqli_fetch_assoc($resultat); //recuperation de la requete
    $mailb =$recu["mail"];
    $prenom =$recu["prenom"];
    $mdpb =$recu["mdp"];
      if($mail== $mailb and $mdp==$mdpb){ 
        $_SESSION["id"] = $id;
        $_SESSION["prenom"] = $prenom;
        $_SESSION["mail"] = $mailb;
          header("location:ProbClient.php");
        }
        $req1 = "select * from responsable where mail='$mail' and mdp='$mdp'" ;
        $resultat = mysqli_query($id, $req1);
        $recu = mysqli_fetch_assoc($resultat);
        $mailb =$recu["mail"];
        $mdpb =$recu["mdp"];
        $prenom =$recu["prenom"];
        if($mail== $mailb and $mdp==$mdpb ) {
         $_SESSION["id"] = $id;
         $_SESSION["mail"] = $mail;
         $_SESSION["prenom"] = $prenom;
         header("location:Responsable.php");
        }
          $req2 = "select * from technicien where mail='$mail' and mdp='$mdp' " ;
          $resultat = mysqli_query($id, $req2);
          $recu = mysqli_fetch_assoc($resultat);
          $mailb =$recu["mail"];
         $mdpb =$recu["mdp"];
          $prenom =$recu["prenom"];
          if($mail== $mailb and $mdp==$mdpb) {
           $_SESSION["id"] = $id;
           $_SESSION["mail"] = $mail;
           $_SESSION["prenom"] = $prenom;
            header("location:Technicien.php");
             }else{ 
             echo"Mail ou mot de passe incorrect !";
             }
  }

?>

        <a href="InscritClient.php">Je n'ai pas de compte ? S'inscrire</a>

      </form>
    </div>
</main>

  <br>

<?php

    if(isset($_POST["mail"]))$mail = $_POST["mail"];
    if(isset($_POST["mdp"]))$mdp = $_POST["mdp"];
    $id = mysqli_connect("127.0.0.1:3307","root","","SA");
    if(isset($_POST["bout"])){

    $req = "select * from client where mail='mail' and mdp='$mdp' " ;
    $resultat = mysqli_query($id, $req);
    $recu = mysqli_fetch_assoc($resultat); //recuperation de la requet
    $mailb =$recu["mail"];
    $prenom =$recu["prenom"];
    $mdpb =$recu["mdp"];
      if($mail== $mailb and $mdp==$mdpb){ 
        $_SESSION["id"] = $id;
        $_SESSION["prenom"] = $prenom;
        $_SESSION["mail"] = $mailb;
          header("location:ProbClient.php");
        }
        $req1 = "select * from responsable where mail='$mail' and mdp='$mdp' " ;
        $resultat = mysqli_query($id, $req1);
        $recu = mysqli_fetch_assoc($resultat);
        $mailb =$recu["mail"];
        $mdpb =$recu["mdp"];
        $prenom =$recu["prenom"];
        if($mail== $mailb and $mdp==$mdpb ) {
         $_SESSION["id"] = $id;
         $_SESSION["mail"] = $mail;
         $_SESSION["prenom"] = $prenom;
         header("location:Responsable.php");
        }
          $req2 = "select * from technicien where mail='$mail' and mdp='$mdp' " ;
          $resultat = mysqli_query($id, $req2);
          $recu = mysqli_fetch_assoc($resultat);
          $mailb =$recu["mail"];
         $mdpb =$recu["mdp"];
          $prenom =$recu["prenom"];
          if($mail== $mailb and $mdp==$mdpb) {
           $_SESSION["id"] = $id;
           $_SESSION["mail"] = $mail;
           $_SESSION["prenom"] = $prenom;
            header("location:Technicien.php");
             }else{ 
             echo"Mail ou mot de passe incorrect !";
             }
  }

?>
</body>
</html>