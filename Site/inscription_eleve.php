<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html
    ; charset=UTF-8" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <title>Inscription élève</title>
    <link rel="stylesheet" href="main.css">
  </head>
  <body>
    <div class="formulaire">
      <h2>Inscription d'un élève</h2>
      <form action="inscrire_eleve.php" method="POST">
        <div class="datee">
        <label>Choix de l'élève</label>
        <?php
        //Connexion à la BDD
        $today = date ('Y-m-d');
        $host = "localhost";
        $user = "root";
        $bdd = "Auto_Ecole";
        $passwd="";
        $connexion = new PDO("mysql:host=localhost;dbname=Auto_Ecole", "root", "");
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$connect = mysqli_connect($host, $user, $passwd, $bdd) or die ('Error connecting to mysql');

        //Choix Eleve et Choix Seance par SQL
        $sql = "SELECT id_eleve,nom,prenom FROM Eleve";
        $result = $connexion->prepare($sql);
        $result->execute();
        //$result = mysqli_query($connect,"SELECT id_eleve,nom,prenom FROM Eleve");
        echo "<select name='choix_eleve'>";
        while ($row=$result->fetch(PDO::FETCH_ASSOC)){
          echo "<option value=".$row['id_eleve'].">";
          echo $row['nom']." ".$row['prenom'];
          echo "</option>";
        }
        echo "</select>";
        echo "</div><div class='datee'>";
        echo "<label>Choix de la Seance</label>";
        $sql2 = "SELECT Seance.id_seance, Seance.date_seance, Theme.nom, Theme.id_theme FROM Seance, Theme WHERE Seance.date_seance>='$today' AND Theme.id_theme = Seance.id_theme";
        $result2 = $connexion->prepare($sql2);
        $result2->execute();
        //$res = mysqli_query($connect,"SELECT Seance.id_seance, Seance.date_seance, Theme.nom, Theme.id_theme FROM Seance, Theme WHERE Seance.date_seance>='$today' AND Theme.id_theme = Seance.id_theme");
        echo "<select name='choix_seance'>";
        while ($row=$result2->fetch(PDO::FETCH_ASSOC)){
          echo "<option value=".$row['id_seance'].">";
          echo $row['date_seance']." | (".$row['nom'].")";
          echo "</option>";
        }
        echo "</select></div>";

        $connexion = NULL;
        ?>
        <div>
          <input type="submit" value="Inscrire l'élève" class="button">
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
