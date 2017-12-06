<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html
    ; charset=UTF-8" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <title>Valider élève</title>
    <link rel="stylesheet" href="main.css">
  </head>
  <body>
    <div>
    <h1> * Vous venez d'ajouter un élève * </h1>
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
    date_default_timezone_set('Europe/Paris');
    $date = date("Y-m-d");
    if(isset($_POST["prenom"])){
      $prenomp=$_POST["prenom"];
    }
    if(isset($_POST["nom"])){
      $nomp=$_POST["nom"];
    }
    if(isset($_POST["datenais"])){
      $naiss=$_POST["datenais"];
    }
    if(isset($_POST["reponse"])){
      $reponsee=$_POST["reponse"];
    }


    //Implémentation dans la BDD
    if($reponsee == "oui"){
      $sql = "insert into Eleve values (NULL, '$nomp','$prenomp','$naiss','$date')";
      $result = $connexion->prepare($sql);
      $result->execute();
      //$query = "insert into Eleve values (NULL, '$nomp','$prenomp','$naiss','$date')";
      //$result = mysqli_query($connect, $query);



      echo "<br> La date est : "."'$date'"." <br>";

      echo "<br>L'ajout de l'élève est validé! En voici le récapitulatif : <br><br>";

      echo "<b>Nom de l'élève:</b> ".$nomp."<br><br>";
      echo "<b>Prénom de l'élève:</b> ".$prenomp."<br><br>";
      echo "<b>Date de naissance:</b> ".$naiss."<br>";
    }elseif($reponsee == "non"){
      echo "<p>Vous avez décidé de ne pas ajouter cet élève</p>";
    }

    $connexion = NULL;
    //mysqli_close($connect);
    ?>
    <a href="accueil.html"><input type="button" value="Retour au menu" class="button"></a>
    <a href="ajout_eleve.html"><input type="button" value="Ajouter un autre élève" class="button"></a>

  </body>
</html>
