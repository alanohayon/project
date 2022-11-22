<?php
session_start();
$prenom=($_SESSION["prenom"]);  //variable prenom qui retient le prenom de la personne connecté
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Affiche Client</title>

  <link rel="stylesheet" href="le_css/style-header.css">
  <link rel="stylesheet" href="le_css/style-tech.css">

      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">

      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

</head>
<body>
<header>
    <nav class="nav-header" role="navigation">
        <!-- LOGO A GAUCHE -->
        <div class="menu-gauche">
            <a href="Accueil.php" class="logodaccueil"><h1 class="logogo">TICKETING INC.</a>
        </div>
        <!-- TOUTES LES PAGES -->
        <div class="menu-droite">
            <!-- <a href="Technicien.php" class="pages"><i class="fa fa-user-circle" aria-hidden="true"></i> Technicien</a> -->
            <a href="accueil.php" class="pages"><i class="fa fa-home" aria-hidden="true"></i> Accueil</a>
            <a href="#" class="separation">|</a>
            <a href="Deco.php" class="pages"><i class="fa fa-sign-out" aria-hidden="true"></i> Deconnexion</a>
        
          

            <!-- <a href="Deco.php" class="pages"><i class="fa fa-sign-out" aria-hidden="true"></i> Deconnexion</i></a> -->
        </div>
    </nav>
  </header><br>

  <div class="mainpage">
<h1> <?php echo"bonjour $prenom,"; ?> </h1>
<!-- affiche bonjour avec le prenom du client connecté -->
  <table class="content-table"> 
  <thead>
  <tr>
    <!-- Tabeau affichant les differente colonnes renseignant les problemes et les options du client-->
    <th>id</th>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Mail</th>

</tr>
</thead>
<tbody>
<?php

$id = mysqli_connect("127.0.0.1:8889","root","root","SA"); 
$resul = mysqli_query($id, "select * from client"); 
//executer une requete et stockage du resultat dans $resul
while($ligne = mysqli_fetch_assoc($resul)){
//recuperation de la premiere ligne (1er medecin)
  $fichier =$ligne["fichier"];
//enregistre le nom du fichier du probleme dans la variable 'fichier'
  $statut =$ligne["statut"];
//enregistre le statut du probleme dans la variable 'statue'
echo //afficher les proprietes du probleme dans les differentes colonnes
"<tr>
<td>". $ligne["id"]."</td>
<td>". $ligne["nom"]."</td>
<td>". $ligne["prenom"]."</td>
<td>". $ligne["mail"]."</td>

</th>";
}

?>

</tbody>
</table>
</div>
</body>
</html>
<!-- // <td>";
echo"<a href='afficheClient.php?prenom=". $ligne["prenom"]."'><img src='icones/user.png' width='15'>";
echo"</td> -->
