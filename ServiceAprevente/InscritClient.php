<?php
session_start();
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

<body  style="background-color:#f5f5f5">
<header>
    <nav class="nav-header" role="navigation">
        <!-- LOGO A GAUCHE -->
        <div class="menu-gauche">
            <a href="Accueil.php" class="logodaccueil"><h1 class="logogo">TICKETING INC.</a>
        </div>
        <!-- TOUTES LES PAGES -->
        <div class="menu-droite">
        <a href="acceuil.php" class="pages"><i class="fa fa-home" aria-hidden="true"></i> Accueil</a>
            <a href="connexion.php" class="pages"><i class="fa fa-user-circle" aria-hidden="true"></i> Connexion</a>
        </div>
    </nav>
  </header>
  <br>
<main>
  <form action="" method="post">  
    <h1>Inscription Client</h1>
    <h4>vous inscrire vous permettra de formuler<br>des demandes au SAV</h4>
    <input type="text" name="nom" placeholder="Nom :"required><br><br>
    <input type="text" name="prenom" placeholder="Prénom :"required><br><br>
    <input type="email" name="mail" placeholder="Mail :"required><br><br>
    <input type="password" name="mdp" placeholder="Mot de passe :"required><br><br>
    <input type="password" name="vmdp" placeholder="Verifier mot de passe :" required><br><br>
    <input type="submit" value="S'inscrire" name="bout" class="bout">
  </form>
</main>

  <?php
$id = mysqli_connect("127.0.0.1:8889","root","root","SA"); 

  if(isset($_POST["bout"])){ 
      $mdp=$_POST["mdp"];
      $vmdp=$_POST["vmdp"];
  if($mdp== $vmdp){
  if(isset($_POST["bout"])){
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $mail=$_POST["mail"];
    $mdp=$_POST["mdp"];
    $_SESSION["prenom"] = $prenom;
    $resul = mysqli_query($id, "insert into client values (NULL, '$nom', '$prenom', '$mail','$mdp')" );

 header("location:ProbClient.php");

  }
}else{
  echo"Verification du mot de passe incorrecte";
  }
}
?>
</body>
</html>