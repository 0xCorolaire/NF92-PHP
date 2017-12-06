<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html
    ; charset=UTF-8" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <title>Validation séance</title>
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
      <h2>Noter un élève</h2>
      <form action="valider_seance.php" method="POST">
        <div class="datee">
    <?php
    //Connexion à la base de donnée sur phpMyAdmin en localhost
    $host = "localhost";
    $user = "root";
    $bdd = "Auto_Ecole";
    $connexion = new PDO("mysql:host=localhost;dbname=Auto_Ecole", "root", "");
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$connect = mysqli_connect($host, $user, $passwd, $bdd) or die ('Error connecting to mysql');

    echo "<label>Choix de la Seance</label>";
    //Choix de la séance
    $sql = "SELECT Seance.id_seance, Seance.date_seance, Theme.nom, Theme.id_theme FROM Seance, Theme WHERE Theme.id_theme = Seance.id_theme";
    $result = $connexion->prepare($sql);
    $result->execute();
    //$result = mysqli_query($connect,"SELECT Seance.id_seance, Seance.date_seance, Theme.nom, Theme.id_theme FROM Seance, Theme WHERE Theme.id_theme = Seance.id_theme");
    echo "<select name='choix_seance'>";
    while ($row=$result->fetch(PDO::FETCH_ASSOC)){
      echo "<option value=".$row['id_seance'].">";
      echo $row['date_seance']." | (".$row['nom'].")";
      echo "</option>";
    }
    echo "</select></div>";

    $connexion=NULL;
    //mysqli_close($connect);
    ?>
        <div>
          <input type="submit" value="Choisir la séance" class="button">
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
