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
       background: #111111 url(routef.jpg) no-repeat center;
       background-size: cover;
       border-radius:35px;
     }
    </style>
  </head>
  <body>
    <div class="formulaire">
      <h2>Visualisation du calendrier</h2>
      <form action="visualiser_calendrier_eleve.php" method="POST">
        <div class="datee">
        <label>Choix de l'élève</label>
    <?php
    //Connexion à la base de donnée sur phpMyAdmin en localhost
    $host = "localhost";
    $user = "root";
    $bdd = "Auto_Ecole";
    $passwd="";
    $connexion = new PDO("mysql:host=localhost;dbname=Auto_Ecole", "root", "");
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$connect = mysqli_connect($host, $user, $passwd, $bdd) or die ('Error connecting to mysql');

    //Selection de l'élève
    $sql = "SELECT * FROM Eleve";
    $result = $connexion->prepare($sql);
    $result->execute();
    //$query="SELECT * FROM Eleve";
    //$result = mysqli_query($connect,$query);
    echo "<select name='choix_eleve'>";
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
      echo "<option value=".$row['id_eleve'].">";
      echo $row['nom']." ".$row['prenom'];
      echo "</option>";
    }
    echo "</select>";
    echo "</div>";


    $connexion = NULL;
    //mysqli_close($connect);
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
