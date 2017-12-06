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
       background: #111111 url(routeg.jpg) no-repeat center;
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
    <div class="info">
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
    $eleve=$_POST["choix_eleve"];

    echo "La date est : $date<br>";

    //Selection des données
    $sql = "SELECT Inscription.id_eleve, Inscription.id_seance, Seance.date_seance, Seance.id_theme, Theme.nom, Theme.id_theme  FROM Inscription, Seance, Theme WHERE Inscription.id_eleve='$eleve' AND Inscription.id_seance=Seance.id_seance AND Seance.id_theme=Theme.id_theme";
    $result = $connexion->prepare($sql);
    $result->execute();
    //$query="SELECT Inscription.id_eleve, Inscription.id_seance, Seance.date_seance, Seance.id_theme, Theme.nom, Theme.id_theme  FROM Inscription, Seance, Theme WHERE Inscription.id_eleve='$eleve' AND Inscription.id_seance=Seance.id_seance AND Seance.id_theme=Theme.id_theme";
    //$result=mysqli_query($connect,$query);
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
      if($row['date_seance']>$date){
      echo "<div>Date séance : ".$row['date_seance']." | Thème :  ".$row['nom']."</div>";
      }
    }

    $connexion = NULL;
    ?>
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
