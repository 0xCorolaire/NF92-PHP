<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html
    ; charset=UTF-8" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <title>Valider séance</title>
    <link rel="stylesheet" href="main.css">
    <style>
      #footer-wrapper
      {
        position: auto;
        padding: 0em 0em 0em 0em;
        background: #111111 url(routed.jpg) no-repeat center;
        background-size: cover;
        border-radius:35px;
      }
    </style>
  </head>
  <body>
    <div class="formulaire">
      <h2>Noter un élève</h2>
      <form action="noter_eleve.php" method="POST">
    <?php
    //Connexion à la base de donnée sur phpMyAdmin en localhost
    $host = "localhost";
    $user = "root";
    $bdd = "Auto_Ecole";
    $connexion = new PDO("mysql:host=localhost;dbname=Auto_Ecole", "root", "");
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$connect = mysqli_connect($host, $user, $passwd, $bdd) or die ('Error connecting to mysql');

    //Déclaration des variables
    date_default_timezone_set('Europe/Paris');
    $date = date("Y-m-d");
    $seance=$_POST["choix_seance"];

    //Choix de l'élève à noter
    echo "<div class='datee'>";

    $sql = "SELECT Inscription.id_eleve, Eleve.nom, Eleve.prenom, Inscription.id_seance, Inscription.note FROM Inscription, Eleve WHERE Inscription.id_seance='$seance' AND Inscription.id_eleve=Eleve.id_eleve";
    $result = $connexion->prepare($sql);
    $result->execute();
    //$result = mysqli_query($connect,"SELECT Inscription.id_eleve, Eleve.nom, Eleve.prenom, Inscription.id_seance, Inscription.note FROM Inscription, Eleve WHERE Inscription.id_seance='$seance' AND Inscription.id_eleve=Eleve.id_eleve");
    echo "<table style='margin: 0px auto;'><tr><legend style='margin-bottom: 20px'>Elèves inscrits à la séance</legend></tr>";
    while ($row=$result->fetch(PDO::FETCH_ASSOC)){
      echo "<tr><th>";
      echo "<span title=' ID =".$row['id_eleve']."'>";
      echo $row['nom'].' '.$row['prenom'];
      echo "</span>";
      echo "</th><td>";
      echo "<input name=".$row['id_eleve']." size = '8' value=".$row['note']." class = 'button'></td>";
    }
    echo "</table></div>";
    echo "<input type='hidden' name='choix_seance' value='$seance'><br>";

    $connexion = NULL;
    //mysqli_close($connect);

    ?>
      <div>

        <input type="submit" value="Noter les élèves" class="button">
      </div>
    </form>
    </div>
    <footer>
      <div id="footer-wrapper">
        <div id="footer" class="container">
          <h1 id="titre"><b> ~ Auto-école de l'UTC ~ </b></h1>
        </div>
      </div>
    </footer>
  </body>
</html>
