<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html
    ; charset=UTF-8" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <title>Suppression d'un thème</title>
    <link rel="stylesheet" href="main.css">
  </head>
  <body>
    <h1>Suppression du thème</h1>
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
    $theme = $_POST["choix_theme"];

    //Modification dans la bdd
    $sql = "UPDATE Theme SET Theme.supprimer = 1 WHERE Theme.id_theme = '$theme'";
    $result = $connexion->prepare($sql);
    $result->execute();
    //$query = "UPDATE Theme SET Theme.supprimer = 1 WHERE Theme.id_theme = '$theme'";
    //$result = mysqli_query($connect,$query);

    echo "<p>La date est : $date</p>";
    echo "<p>Vous venez de supprimer le thème $theme</p>";

    $connexion = NULL;
    //mysqli_close($connect);
    ?>
    <a href="accueil.html"><input type="button" value="Accueil" class="button"></a>
    <a href="suppression_theme.php"><input type="button" value="Supprimer un autre thème" class="button"></a>

  </body>
</html>
