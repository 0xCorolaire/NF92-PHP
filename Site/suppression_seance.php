<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html
    ; charset=UTF-8" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <title>Calendrier</title>
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
    <div class="formulaire">
      <h2>Suppression séance</h2>
      <form action="supprimer_seance.php" method="POST">
        <div class="datee">
        <label>Choix de la séance</label>
    <?php
    //Connexion à la base de donnée sur phpMyAdmin en localhost
    $host = "localhost";
    $user = "root";
    $bdd = "Auto_Ecole";
    $passwd="";
    $connexion = new PDO("mysql:host=localhost;dbname=Auto_Ecole", "root", "");
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$connect = mysqli_connect($host, $user, $passwd, $bdd) or die ('Error connecting to mysql');

    //Selection de la séance
    $sql = "SELECT Seance.id_seance, Seance.date_seance, Theme.nom, Seance.id_theme FROM Seance, Theme WHERE Theme.id_theme = Seance.id_theme";
    $result = $connexion->prepare($sql);
    $result->execute();
    //$query2="SELECT Seance.id_seance, Seance.date_seance, Theme.nom, Seance.id_theme FROM Seance, Theme WHERE Theme.id_theme = Seance.id_theme";
    //$result2 = mysqli_query($connect,$query2);
    echo "<select name='choix_seance'>";
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
      echo "<option value=".$row['id_seance'].">";
      echo $row['date_seance']." | ".$row['nom'];
      echo "</option>";
    }
    echo "</select>";
    echo "</div>";

    $connexion = NULL;
    ?>
        <div>
          <input type="submit" value="Valider" class="button">
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
