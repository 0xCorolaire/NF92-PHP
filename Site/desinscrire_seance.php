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
    <h1>Vous désinscrivez un élève d'une séance</h1>
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
    $eleve = $_POST["choix_eleve"];
    echo "<p> La date est : "."'$date'"." </p>";

    //Test pour voir si l'élève est bien inscrit à la séance
    $sql = "SELECT COUNT(*) AS total FROM Inscription WHERE id_eleve = $eleve AND id_seance = $seance";
    $result = $connexion->prepare($sql);
    $result->execute();
    //$query2 = "SELECT COUNT(*) AS total FROM Inscription WHERE id_eleve = $eleve AND id_seance = $seance";
    //$result2 = mysqli_query($connect,$query2);
    $nb=$result->fetch(PDO::FETCH_ASSOC);
    //$nb = mysqli_fetch_array($result2);
    if ($nb['total'] == 0){
        echo "<p>L'élève selectionné n'est pas inscrit à cette séance.<br>";
        echo "Vous pouvez modifier votre saisie : ";
    	  echo"<div class='datee'><a href='desinscription_seance.php'><input type='button' value='Modifier la saisie' class='button'></a></div></p>";
    }else{
        //Modification de la bdd
        $sql2 = "DELETE FROM Inscription WHERE id_eleve = $eleve AND id_seance = $seance";
        $result2 = $connexion->prepare($sql2);
        $result2->execute();
        //$query = "DELETE FROM Inscription WHERE id_eleve = $eleve AND id_seance = $seance";
        //$result = mysqli_query($connect,$query);
        echo "<p>L'élève a bien été désinscrit de la base de données.</p>";
    }

    $connexion = NULL;
    //mysqli_close($connect);
    ?>

    <a href="accueil.html"><input type="button" value="Retour au menu" class="button"></a>
    <a href="desinscription_seance.php"><input type="button" value="Désinscrire un autre élève" class="button"></a>

  </body>
</html>
