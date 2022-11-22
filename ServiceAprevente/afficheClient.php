<?php
session_start();
//retient toutes les varianles sessions
$prenom=($_SESSION["prenom"]);  //variable prenom qui retient le prenom du responsable
$mail=($_SESSION["mail"]);  //variable prenom qui retient le prenom du responsable
$id = mysqli_connect("127.0.0.1:8889","root","root","SA"); 
//connexion a la bdd
$resul = mysqli_query($id, "Select * from client where prenom ='$prenom'" );
// $resul1 = mysqli_query($id, "Select * from client where prenom ='$preno'" );
$ligne = mysqli_fetch_assoc($resul);
// $ligne1 = mysqli_fetch_assoc($resul1);
// $mailb =$ligne1["mail"];
$pren=$ligne["prenom"]; //variable 'pren' qui retient le resultat si il y en a

if($pren == null)  //si la variable 'pren' est null alors renvoyer l'utilisateur à la page de connexion
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
            <a href="InscritClient.php" class="pages"><i class="fa fa-user-circle"aria-hidden="true"></i> Inscription</a>
            <a href="chatClient.php" class="pages"><img src='icones/chat.png' width='20'></i> Discuter  avec un technicien</a>
            <a href="#" class="separation">|</a>
            <a href="Deco.php" class="pages"><i class="fa fa-cubes" aria-hidden="true"></i> Deconnexion</a>
            <!-- <a href="Deco.php" class="pages"><i class="fa fa-sign-out" aria-hidden="true"></i> Deconnexion</i></a> -->
        </div>
    </nav>
  </header>
  <div class="mainpage">
  <h1 class="bjr"><?php  echo"bonjour &nbsp; $prenom,"; ?> </h1>  
 <!-- affiche bonjour avec le prenom du client connecté -->
  <table class="content-table"> 
  <thead>
  <tr>
    <!-- Tabeau affichant les differente colonnes renseignant les problemes et les options du client-->
    <th>idp</th>
    <th>date</th>
    <th>produit</th>
    <th>descripton</th>
    <th>fichier</th>
    <th>Prenom Technicien</th>
    <th>Chat avec un technicien</th>
    <th>Etat</th>
    <th>supp</th>
</tr>
</thead>
<tbody>
<?php
$resul = mysqli_query($id, "select * from probleme where mail='$mail' order by date desc"); 
//executer une requete et stockage du resultat dans $resul
while($ligne = mysqli_fetch_assoc($resul)){
//recuperation de la premiere ligne (1er medecin)
  $fichier =$ligne["fichier"];
//enregistre le nom du fichier du probleme dans la variable 'fichier'
  $statut =$ligne["statut"];
//enregistre le statut du probleme dans la variable 'statue'
echo //afficher les proprietes du probleme dans les differentes colonnes
"<tr>
<td>". $ligne["idp"]."</td>
<td>". $ligne["date"]."</td>
<td>". $ligne["produit"]."</td>
<td>". $ligne["description"]."</td>
<td>";
if ($fichier){ //si il existe un fichier 
  echo "<img src='doc/$fichier' alt='$fichier' width='70'>"; //afficher le fichier
}
else{
  echo "Pas de fichier"; // si il il n'y a pas de fichier afficher 'pas de ficheier'
}
echo "</td>
<td>". $ligne["technicien"]."</td>
<td>";
echo"<a href='chatClient.php'><img src='icones/chat.png' width='20'>";  //possibilité de parler avec le technicien 
  echo "</td>
<td>". $ligne["statut"]."</td>
<td>";
  echo"<a href='supp.php?idp=". $ligne["idp"]."'><img src='icones/poubelle.png' width='20'><a/>";  //si le client souhaite supprimer un probleme 
  echo "</td>
</th>";
}
?>
</tbody>
</table>
</div>
</body>
</html>