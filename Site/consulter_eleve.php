<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html
    ; charset=UTF-8" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <title>Consulter élève</title>
    <link rel="stylesheet" href="main.css">
    <style>
     #footer-wrapper{
       position: relative;
       padding: 0em 0em 0em 0em;
       background: #111111 url(routea.jpg) no-repeat center;
       background-size: cover;
       border-radius:35px;
     }
     .info {
       border: 2px solid #320E15;
       border-radius: 4px;
       padding: 12px 20px;
       color: #320E15;
       font-weight: 400;
       margin: 50px auto;
       box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
       -moz-box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
       -webkit-box-shadow:  0px 0px 15px rgba(0, 0, 0, 0.22);
       width: 500px;
     }
    </style>
  </head>
  <body>
    <h1> * Resumé de l'élève *</h1>
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
    $id_eleve = $_POST["choix_eleve"];
    echo "<p> La date est : "."'$date'"." </p>";

    //Affichage de la requête
    $sql = "SELECT * FROM Eleve WHERE id_eleve=$id_eleve";
    $result = $connexion->prepare($sql);
    $result->execute();
    //$result = mysqli_query($connect,"SELECT * FROM Eleve WHERE id_eleve=$id_eleve");
    echo "<div class='info'>";
    while ($row=$result->fetch(PDO::FETCH_ASSOC)){
      echo "Nom : ".$row['nom']."<br>";
      echo "Prenom : ".$row['prenom']."<br>";
      echo "Date de naissance : ".$row['date_naissance']."<br>";
      echo "Date d'inscription : ".$row['date_inscription'];

    }
    echo "</div>";

    $connexion = NULL;
    //mysqli_close($connect);
     ?>
     <a href="accueil.html"><input type="button" value="Retour au menu" class="button"></a>
     <a href="consultation_eleve.php"><input type="button" value="Consulter le profil d'un autre élève" class="button"></a>
   <footer>
     <div id="footer-wrapper">
       <div id="footer" class="container">
         <h1 id="titre"><b> ~ Auto-école de l'UTC ~ </b></h1>
       </div>
     </div>
   </footer>
   </body>
</html>
