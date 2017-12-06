<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html
    ; charset=UTF-8" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <title>Ajout séance</title>
    <link rel="stylesheet" href="main.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <style>
     #footer-wrapper{
       background: #111111 url(routec.jpg) no-repeat center;
     }
    </style>
  </head>
  <body>
    <div class="formulaire">
      <h2>Ajouter une séance</h2>
      <form action="ajouter_seance.php" method="POST">
        <div class="datee">
          <label>Date de la séance : </label>
          <span id="datej">
          </span>
          <span id="datem">
          </span>
          <span id="datea">
          </span>
        </div>
        <div class="datee">
          <label>Effectif maximum de la séance : </label>
          <span id="effectif">

          </span>
        </div>
        <div class="datee">
          <label>Choix du thème :</label>
          <?php
          $host = "localhost";
          $user = "root";
          $bdd = "Auto_Ecole";
          $passwd="";

          $connexion = new PDO("mysql:host=localhost;dbname=Auto_Ecole", "root", "");
          $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "SELECT id_theme,nom FROM Theme where supprimer = '0'";
          $result = $connexion->prepare($sql);
          $result->execute();
          //$connect = mysqli_connect($host, $user, $passwd, $bdd) or die ('Error connecting to mysql');
          //$result = mysqli_query($connect,"SELECT id_theme,nom FROM Theme where supprimer = '0'");
          echo "<select name='choix_theme'>";
          while ($row=$result->fetch(PDO::FETCH_ASSOC)){
              echo "<option value=".$row['id_theme'].">";
              echo $row['nom'];
              echo "</option>";
          }
          echo "</select>";
          $connexion = NULL;
          ?>
        </div>
        <div>
        <input type="submit" value="Ajouter le thème" class="button">
        </div>
      </form>
    </div>
    <div>
    </div>
    <footer>
      <div id="footer-wrapper">
        <div id="footer" class="container">
          <h1 id="titre"><b> ~ Auto-école de l'UTC ~ </b></h1>
        </div>
      </div>
    </footer>
    <script src="script.js"></script>
  </body>
</html>
