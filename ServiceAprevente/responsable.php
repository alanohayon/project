<?php
session_start();
$prenom=($_SESSION["prenom"]);  
$id = mysqli_connect("127.0.0.1:8889","root","root","SA"); 

$resul = mysqli_query($id, "Select * from responsable where prenom ='$prenom'" );
$ligne = mysqli_fetch_assoc($resul);
$pren=$ligne["prenom"]; //variable 'pren' qui retient le resultat si il y en a
// if($pren == null  ) //si la variable 'pren' est null alors renvoyer l'utilisateur à la page de connexion
// {
// header("location:Connexion.php");
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Responsable</title>

  <link rel="stylesheet" href="le_css/style-header.css">
  <link rel="stylesheet" href="le_css/style-tech.css">

  <!-- LIEN POUR LA POLICE (GOOGLE FONTS) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">

  <!-- LIEN POUR LES ICONES -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

</head>
<body>

<!--***************************************************************************************************************************
                                      LE HEADER
***************************************************************************************************************************-->
<nav class="nav-header" role="navigation">
        <!-- LOGO A GAUCHE -->
        <div class="menu-gauche">
            <a href="Accueil.php" class="logodaccueil"><h1 class="logogo">TICKETING INC.</a>
        </div>
        <!-- TOUTES LES PAGES -->
        <div class="menu-droite">      
        <a href="affichearchive.php" class="pages"><i class="fa fa-eye" aria-hidden="true"></i> Archive</a>
            <a href="Inscrittech.php" class="pages"><i class="fa fa-eye" aria-hidden="true"></i> Ajouter un technicien</a>
            <a href="#" class="pages">|</a>
            <a href="InscritClient.php" class="pages"><i class="fa fa-user-circle" aria-hidden="true"></i> Ajouter un client</a>
            <a href="ChatResp.php" class="pages"><img src='icones/chat.png' width='20'></i> Discuter avec un technicien</a>
            <a href="Deco.php" class="pages"><i class="fa fa-sign-out" aria-hidden="true"></i> Deconnexion</i></a>

        </div>
    </nav>
  </header><br>



<!--***************************************************************************************************************************
                                      CONTENU DE LA PAGE
***************************************************************************************************************************-->
<div class="mainpage">
<h1> <?php echo"bonjour $prenom,"; ?> </h1>

  <table class="content-table"> 
    <thead>
  <tr>
    <!-- Tableau affichant les differentes colonnes renseignant les problemes et les options du responsble -->
   <th>idp</th>
    <th>Produit</th>
    <th>Decription</th>
    <th>Photo</th>
    <th>Date</th>
    <th>Email Client</th>
    <th>Prenom Technicien</th>
    <th>Ajouter un technicien (Max 4 techniciens)</th>
    <th>Chat</th>
    <th>Statut</th>
    <th>Valider</th>
    <th>Pas validé</th>   
</tr>
</thead>
<tbody>
<?php
$id = mysqli_connect("127.0.0.1:8889","root","root","SA"); 

//connexion a la bdd
$resul = mysqli_query($id, "select * from probleme order by statut ='termine' desc"); 
//executer une requete et stockage du resultat dans $resul
while($ligne = mysqli_fetch_assoc($resul)){
//recuperation de la premiere ligne (1er probleme)
$fichier =$ligne["fichier"];
$statut =$ligne["statut"];
//enregistre le nom du fichier du probleme dans la variable 'fichier'
echo //afficher les proprietés du probleme dans les differentes colonnes
"<tr>
<td>". $ligne["idp"]."</td>
<td>". $ligne["produit"]."</td>
<td>". $ligne["description"]."</td>
<td>";
if ($fichier){ //si il existe un fichier 
  echo "<img src='doc/$fichier' width='70'>"; //afficher le fichier
}
else{
  echo "Pas de fichier"; // si il il n'y a pas de fichier afficher 'pas de ficheier'
}
echo "</td>
<td>". $ligne["date"]."</td>
<td>". $ligne["mail"]."</td>
<td>". $ligne["technicien"]."</td>
<td>";
echo"<form action='ajouttech.php?idp=". $ligne["idp"]."' method='POST'><select name='tech'>";
$resultat = mysqli_query($id, 'select * from technicien '); 
while($lig = mysqli_fetch_assoc($resultat)){
  echo"<option ligne=". $lig["prenom"].">". $lig["prenom"]."</option>";
 }
 echo" </select><input type='submit' value='Ajouter'></form>";
echo "</td>
<td>";
echo"<a href='chatResp.php'><img src='icones/message.png' width='20'>";  //possibilité de parler avec le technicien 
  echo "</td>
<td>$statut</td>
<td>";
if($statut=='Termine'){ //si le statut du probleme est 'en attente'
  echo"<a href='valider.php?idp=". $ligne["idp"]."'><img src='icones/fleche.png' width='20'>";
echo "</td>
<td>";
  echo"<a href='pasvalide.php?idp=". $ligne["idp"]."'><img src='icones/invalide.png' width='15'>";
}
  echo "</td>
</th>"; 
}
?>
</tbody>
</table>

</div>
</body>
</html>
