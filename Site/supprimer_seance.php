<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html
    ; charset=UTF-8" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <title>Desinscire un élève</title>
    <link rel="stylesheet" href="main.css">
  </head>
  <body>
    <h1>Vous supprimez une séance</h1>
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
    $seance = $_POST["choix_seance"];
    echo "<p> La date est : "."'$date'"." </p>";

    //Modification de la bdd
    $sql = "DELETE FROM Inscription WHERE id_seance = $seance";
    $result = $connexion->prepare($sql);
    $result->execute();
    //$query = "DELETE FROM Inscription WHERE id_seance = $seance";
    //$result = mysqli_query($connect,$query);
    $sql2 = "DELETE FROM Seance WHERE id_seance = $seance";
    $result2 = $connexion->prepare($sql2);
    $result2->execute();
    //$query2 = "DELETE FROM Seance WHERE id_seance = $seance";
    //$result2 = mysqli_query($connect,$query2);
    echo "<p>Vous venez de supprimer la séance.</p>";

    $connexion = NULL;
    //mysqli_close($connect);
    ?>

    <a href="accueil.html"><input type="button" value="Retour au menu" class="button"></a>
    <a href="desinscription_seance.php"><input type="button" value="Supprimer une autre séance" class="button"></a>

  </body>
</html>
