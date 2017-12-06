<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html
    ; charset=UTF-8" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <title>Ajout thème</title>
    <link rel="stylesheet" href="main.css">
  </head>
  <body>
    <div>
    <h1> * Vous venez d'ajouter un thème * </h1>
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
    $suppr=false;

    //Déclaration des variables
    date_default_timezone_set('Europe/Paris');
    $date = date("Y-m-d");
    $nomtheme=$_POST["nomt"];
    $descri=$_POST["descriptif"];
    echo "<br> La date est : "."'$date'"." <br>";
    $verif=true;

    //Test si un thème est déjà présent
    $sql = "SELECT * FROM Theme WHERE supprimer = 0";
    $result = $connexion->prepare($sql);
    $result->execute();
    //$res = mysqli_query($connect,"SELECT * FROM Theme WHERE supprimer = 0");
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
      if($nomtheme==$row['nom']){
        echo "<p>Ce thème est déjà présent dans la Base de données</p>";
        echo "<a href='ajout_theme.html'><input type='button' value='Changer le nom du thème' class='button'></a>";
        $verif = false;
      }
    }

    //Test si re-activation d'un thème
    $sql2 = "SELECT * FROM Theme WHERE supprimer = 1";
    $result2 = $connexion->prepare($sql2);
    $result2->execute();
    //$res = mysqli_query($connect,"SELECT * FROM Theme WHERE supprimer = 1");
    while($row=$result2->fetch(PDO::FETCH_ASSOC)){
      if($nomtheme==$row['nom']){
        echo "<p>Ce thème a déjà été entré dans cette base avant d'être supprimé.<br>";
        echo "Le thème $nomtheme est de nouveau accessible pour vos prochaines séances</p>";
        $sql2b = "UPDATE Theme SET supprimer = 0 WHERE nom = '$nomtheme'";
        $result2b = $connexion->prepare($sql2b);
        $result2b->execute();
        //$result2 = mysqli_query($connect,"UPDATE Theme SET supprimer = 0 WHERE nom = '$nomtheme'");
        $verif = false;
      }
    }

    //Test sur la validité + implémentation BDD
    if(empty($nomtheme)||empty($descri)){
      echo "Vous avez oublié de remplir un champ";
      echo '<a href="ajout_theme.html"><input type="button" value="Modifier" class="button"></a>';
      $verif=false;
    } elseif($verif){
    echo "<br>L'ajout du thème est validé! En voici le récapitulatif : <br><br>";
    echo "<b>Titre du thème:</b> ".$nomtheme."<br><br>";
    echo "<b>Descriptif du thème:</b> "."<p>$descri</p><br><br>";
    $sql3 = "insert into Theme values (NULL,'$nomtheme','$descri','$suppr')";
    $result3 = $connexion->prepare($sql3);
    $result3->execute();
    //$query = "insert into Theme values (NULL,'$nomtheme','$descri','$suppr')";
    //$result = mysqli_query($connect, $query);
    }
    $connexion = NULL;
      //mysqli_close($connect);
    ?>
    <a href="accueil.html"><input type="button" value="Retour au menu" class="button"></a>
    <a href="ajout_theme.html"><input type="button" value="Ajouter un autre thème" class="button"></a>

  </body>
</html>
