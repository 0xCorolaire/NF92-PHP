<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html
    ; charset=UTF-8" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <title>Ajout séance</title>
    <link rel="stylesheet" href="main.css">
  </head>
  <body>
    <div>
    <h1> * Vous venez d'ajouter une séance * </h1>
    </div>
    <?php

    //Connexion à la base de donnée sur phpMyAdmin en localhost
    $host = "localhost";
    $user = "root";
    $bdd = "Auto_Ecole";
    $passwd="";
    $connexion = new PDO("mysql:host=localhost;dbname=Auto_Ecole", "root", "");
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$connect = mysqli_connect($host, $user, $passwd, $bdd) or die ('Error connecting to mysql');

    //Déclaration des variables
    $verif=true;
    date_default_timezone_set('Europe/Paris');
    $date = date("Y-m-d");
    $jdate=$_POST["jour_seance"];
    $mdate=$_POST["mois_seance"];
    $adate=$_POST["annee_seance"];
    $eff=$_POST["effectif_max"];
    $theme=$_POST["choix_theme"];
    $dateseance="$adate-$mdate-$jdate";
    echo "<br> La date est : "."'$date'"." <br>";

    //Test de la validité du formulaire
    if($dateseance < $date){
      $dateseance="$jdate-$mdate-$adate";
      echo "<p>Vous avez entrez une date invalide.<br>Veuillez entrer une date valide</p>";
      $verif=false;
      echo '<a href="ajout_seance.php"><input type="button" value="Modifier la date" class="button"></a>';
    }elseif(empty($eff)){
      $verif=false;
      echo "<p>Vous n'avez pas indiqué d'effectif maxmimum.<br>Veuillez en entrer un</p>";
      echo '<a href="ajout_seance.php"><input type="button" value="Modifier" class="button"></a>';
    }
    $sql = "SELECT * FROM Seance";
    $result = $connexion->prepare($sql);
    $result->execute();
    //$result = mysqli_query($connect,"SELECT * FROM Seance");
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
      if($dateseance==$row['date_seance'] && $theme==$row['id_theme']){
        $verif=false;
        echo "<p>Une séance est déjà prévue pour le $dateseance sur le thème $theme</p>";
        echo '<a href="ajout_seance.php"><input type="button" value="Modifier" class="button"></a>';
      }
    }

    //Implémentation dans la BDD
    if($verif){
      $sql = "insert into Seance values (NULL, '$dateseance','$eff','$theme')";
      $result = $connexion->prepare($sql);
      $result->execute();
      //$query = "insert into Seance values (NULL, '$dateseance','$eff','$theme')";
      //$result = mysqli_query($connect, $query);
      echo "<br>L'ajout de la séance est validé! En voici le récapitulatif : <br><br>";
      echo "<p>Séance prévue pour le $dateseance<br>Effectif maximal prévu pour la séance : $eff<br>Le thème choisi est : $theme</p>";
    }
    $connexion = NULL;
    //mysqli_close($connect);
    ?>

    <a href="accueil.html"><input type="button" value="Retour au menu" class="button"></a>
    <a href="ajout_seance.php"><input type="button" value="Ajouter une autre séance" class="button"></a>
  </body>
</html>
