<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html
    ; charset=UTF-8" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <title>Valider élève</title>
    <link rel="stylesheet" href="main.css">
    <style>
     #footer-wrapper{
       position: relative;
       padding: 0em 0em 0em 0em;
       background: #111111 url(routed.jpg) no-repeat center;
       background-size: cover;
       border-radius:35px;
     }
    </style>
  </head>
  <body>
    <div>
      <h1 id="titre"><b> * Notation de la séance * </b></h1>
      <p></p>
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
    $seance=$_POST["choix_seance"];

    echo "<br> La date est : "."'$date'"." <br>";

    //implémentation de la note dans le bdd
    $sql = "SELECT Inscription.id_eleve, Inscription.note, Eleve.nom, Eleve.prenom FROM Inscription, Eleve WHERE Inscription.id_seance = '$seance' AND Inscription.id_eleve = Eleve.id_eleve";
    $result = $connexion->prepare($sql);
    $result->execute();
    //$result = mysqli_query($connect,"SELECT Inscription.id_eleve, Inscription.note, Eleve.nom, Eleve.prenom FROM Inscription, Eleve WHERE Inscription.id_seance = '$seance' AND Inscription.id_eleve = Eleve.id_eleve");

    while($row=$result->fetch(PDO::FETCH_ASSOC)){
      $note = $_POST[$row['id_eleve']];
      if ($note>40){
        echo "<p>Vous avez rentré une mauvaise valeur pour l'élève ".$row['nom'].$row['prenom'].", le nombre de faute ne peut exceder 40.</p>";
      }else{
        $sql2 = "UPDATE Inscription SET Inscription.note = $note WHERE Inscription.id_eleve=".$row['id_eleve']." AND Inscription.id_seance='$seance'";
        $result2 = $connexion->prepare($sql2);
        $result2->execute();
        //$query = "UPDATE Inscription SET Inscription.note = $note WHERE Inscription.id_eleve='$row[0]' AND Inscription.id_seance='$seance'";
        //$result2 = mysqli_query($connect,$query);
        if ($note !== ''){
        echo "<p> La note $note a été attribuée à l'élève ".$row['nom']." ".$row['prenom']." pour cette seance.</p>";
        }
      }
    }

    $connexion = NULL;
    //mysqli_close($connect);
    ?>
    <a href="accueil.html"><input type="button" value="Retour au menu" class="button"></a>
    <a href="validation_seance.php"><input type="button" value="Noter une autre séance" class="button"></a>
    <footer>
      <div id="footer-wrapper">
        <div id="footer" class="container">
          <h1 id="titre"><b> ~ Auto-école de l'UTC ~ </b></h1>
        </div>
      </div>
    </footer>
  </body>
</html>
