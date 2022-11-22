<?php
session_start();
//retient toutes les varianles sessions
$prenom=($_SESSION["prenom"]);  //variable prenom qui retient le prenom du responsable
$id = mysqli_connect("127.0.0.1:8889","root","root","SA"); 
//connexion a la bdd
$resul = mysqli_query($id, "Select * from responsable where prenom ='$prenom'" );
//requete qui verifie si le prenom est bien dans la table responsable
$ligne = mysqli_fetch_assoc($resul);
$pren=$ligne["prenom"]; //variable 'pren' qui retient le resultat si il y en a
if($pren == null  ) //si la variable 'pren' est null alors renvoyer l'utilisateur à la page de connexion
{
header("location:Connexion.php");
}
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
    <h1>Inscription Technicien</h1>
    <input type="text" name="nom" placeholder="Nom :"required><br><br>
    <input type="text" name="prenom" placeholder="Prénom :"required><br><br>
    <input type="email" name="mail" placeholder="Mail :"required><br><br>
    <input type="password" name="mdp" placeholder="Mot de passe :"required><br><br>
    <input type="submit" value="S'inscrire" name="bout" class="bout">
  </form>
</main>

  <?php
  $id = mysqli_connect("127.0.0.1:8889","root","root","SA"); 
  if(isset($_POST["bout"])){ 
    $resul = mysqli_query($id, "Select * from technicien where mail ='$mail' and mdp ='$mdp' " );
    if( $ligne["mail"]==0){
      $nom=$_POST["nom"];
      $prenom=$_POST["prenom"];
      $mail=$_POST["mail"];
      $mdp=$_POST["mdp"];
      $resul = mysqli_query($id, "insert into technicien values (NULL, '$nom', '$prenom', '$mail','$mdp')" );
 echo"Le technicien $prenom a été ajouté !!";
    }else{
      echo"un compte existe deja sous le mail de $mail";
    }
    }
?>


</body>
</html>
