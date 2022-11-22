<?php
session_start();
//retient toutes les varianles sessions
$prenom=($_SESSION["prenom"]);  //variable prenom qui retient le prenom du responsable
$id = mysqli_connect("127.0.0.1:8889","root","root","SA"); 

//connexion a la bdd
$resul = mysqli_query($id, "Select * from technicien where prenom ='$prenom'" );
//requete qui verifie si le prenom est bien dans la table technicien
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
  <title>Technicien.php</title>

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
        <a href="chatTech.php" class="pages"><img src='icones/chat.png' width='20'></i> Envoyer un message</a>
        <a href="acceuil.php" class="pages"><i class="fa fa-home" aria-hidden="true"></i> Accueil</a>

            <a href="#" class="pages">|</a>
            <a href="Deco.php" class="pages"><i class="fa fa-sign-out" aria-hidden="true"></i> Deconnexion</i></a>

        </div>
    </nav>
  </header><br>



<main>

  <h1 class="bjr"><?php $prenom=$_SESSION["prenom"];  echo"bonjour &nbsp; $prenom,"; ?> </h1>  

  <div class="div_table">
  <table class="content-table"> 
    <!--Entête des colonnes du tableau-->
    <thead>
      <tr>
        <th class="iddmd">n°</th>
        <th>Produit</th>
        <th>Decription</th>
        <th>Photo</th>
        <th>Date</th>
        <th>Mail Client</th>
        <th>Technicien</th>
        <th>Chat</th>
        <th>Statut</th>
        <th>Action</th>
        <th>Vue</th>
      </tr>
    </thead>

    <!--Contenu du tableau-->
<tbody>
<?php
$id = mysqli_connect("127.0.0.1:8889","root","root","SA"); 

    $resul = mysqli_query($id, "select * from probleme");  //where technicien like '%$prenom%' or technicien like '' order by statut ='termine' desc
    while($ligne = mysqli_fetch_assoc($resul)){
    $fichier =$ligne["fichier"];
    $statut =$ligne["statut"];
    echo //afficher les proprietes du probleme dans les differentes colonnes
        "<tr>
        <td>". $ligne["idp"]."</td>

        <td>". $ligne["produit"]."</td>

        <td>". $ligne["description"]."</td>

        <td>"; if ($fichier){ echo "<img src='doc/$fichier' width='70'>";}
               else{echo "Pas de fichier";} // si il il n'y a pas de fichier afficher 'pas de ficheier'//e1aeb5
        echo "</td>

        <td bgcolor='#fff9f2'>". $ligne["date"]."</td>
        
        <td bgcolor='#FBF4F9'>". $ligne["mail"]."</td> 

        <td>". $ligne["technicien"]."</td>

        <td> <a href='chatTech.php'><img src='icones/message.png' width='20'></td>

        <td>". $ligne["statut"]."</td>
        
        <td>"; if ($statut =="En attente"){ echo "<a href='commencer.php?idp=". $ligne["idp"]."'><img src='icones/fleche.png' width='20'><a/>";}
               if ($statut =="En cours"){ echo "<img src='icones/oeil.png' width='20'>";}
               if ($statut =="Termine"){ echo "<img src='icones/fait.gif' width='30'>";}
        echo "</td>

        <td>"; if ($statut =="En cours"){ echo "<a href='terminer.php?idp=". $ligne["idp"]."'><img src='icones/verifier.png' width='20'><a/>";}"</td></tr>";
    
    } ?>

</tbody>


  </table>
  </div>
</main>

</body>
</html>

