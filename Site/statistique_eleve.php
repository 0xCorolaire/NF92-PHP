<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html
    ; charset=UTF-8" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <title>Statistique élève</title>
    <link rel="stylesheet" href="main.css">
    <style>
     #footer-wrapper{
       position: relative;
       padding: 0em 0em 0em 0em;
       background: #111111 url(routek.jpg) no-repeat center;
       background-size: cover;
       border-radius:35px;
     }
    table {
           display: block;
           text-align: center;
           border: 3px solid #320E15;
           border-radius: 12px;
           width: 500px;
           margin: auto;
       }
    tr:nth-child(even){background-color: #333399;}
    tr:hover {background-color: black;}
    tr{
      font-size: 1.35em;
    }
    </style>
  </head>
  <body>
    <div id="header-wrapper">
      <div id="header" class="container">
          <h1 id="titre"><b> ~ Statistique des élèves ~ </b></h1>
      </div>
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
    echo "<p> La date est : "."'$date'"." </p>";

    //Statistique par Thème
    $sql = "SELECT id_theme, nom FROM Theme";
    $result = $connexion->prepare($sql);
    $result->execute();
    //$query = "SELECT id_theme, nom FROM Theme";
    //$result = mysqli_query($connect,$query);
    echo "<div classe='datee' id='stheme'>";
    echo "<table id='stat_theme'>";
    echo "<legend> Statistique par thème</legend>";
    echo "<tr><th>Thème</th><th>Moyenne</th><th>Taux de Réussite( en % )</th></tr>";
    while($row=$result->fetch(PDO::FETCH_ASSOC)){

      //Partie Moyenne
      $sql2 = "SELECT AVG(Inscription.note) AS note FROM Inscription,Seance WHERE Inscription.note!='-1' AND Seance.id_theme=".$row['id_theme']." AND Inscription.id_seance=Seance.id_seance";
      $result2 = $connexion->prepare($sql2);
      $result2->execute();
      //$query2 = "SELECT AVG(Inscription.note) FROM Inscription,Seance WHERE Inscription.note!='-1' AND Seance.id_theme=$row[0] AND Inscription.id_seance=Seance.id_seance";
      //$result2 = mysqli_query($connect,$query2);
      $row2=$result2->fetch(PDO::FETCH_ASSOC);
      if(!empty($row2['note'])){
        $moy_theme = round($row2['note'],1);
      }

      //Partie Pourcentage
      $total=0;
      $reussi=0;
      $sql3 = "SELECT Inscription.note, Seance.id_theme FROM Inscription,Seance WHERE Inscription.note!='-1' AND Seance.id_theme=".$row['id_theme']." AND Inscription.id_seance=Seance.id_seance";
      $result3 = $connexion->prepare($sql3);
      $result3->execute();
      //$query3 = "SELECT Inscription.note, Seance.id_theme FROM Inscription,Seance WHERE Inscription.note!='-1' AND Seance.id_theme=$row[0] AND Inscription.id_seance=Seance.id_seance";
      //$result3 = mysqli_query($connect,$query3);
      while($row3=$result3->fetch(PDO::FETCH_ASSOC)){
        if(!empty($row3['note'])){
          $total+=1;
          if($row3['note']<6){
              $reussi+=1;
          }
          $pourc=round(($reussi/$total)*100,2);
        }
      }
      if(!empty($pourc)||!empty($moy_theme)){
      echo "<tr><td>".$row['nom']."</td><td>$moy_theme</td><td> $pourc </td></tr>";
      }
      $pourc = NULL;
      $moy_theme = NULL;
    }
    echo "</table>";
    echo "</div><br><br>";

    //Statistique par Élève
    echo "<div class='datee' id='seleve'>";
    echo "<table id='stat_élève'>";
    echo "<legend> Statistique par élève</legend>";
    echo "<tr><th>Elève</th><th>Moyenne</th><th>Taux de Réussite( en % )</th></tr>";
    $sql4 = "SELECT id_eleve, nom, prenom FROM Eleve";
    $result4 = $connexion->prepare($sql4);
    $result4->execute();
    //$query4 = "SELECT id_eleve, nom, prenom FROM Eleve";
    //$result4 = mysqli_query($connect,$query4);
    while($row=$result4->fetch(PDO::FETCH_ASSOC)){

      //Partie Moyenne
      $sql5 = "SELECT AVG(Inscription.note) AS notea FROM Inscription,Seance WHERE Inscription.note!='-1' AND Inscription.id_eleve=".$row['id_eleve']." AND Inscription.id_seance=Seance.id_seance";
      $result5 = $connexion->prepare($sql5);
      $result5->execute();
      $row5=$result5->fetch(PDO::FETCH_ASSOC);
      //$query5 = "SELECT AVG(Inscription.note) FROM Inscription,Seance WHERE Inscription.note!='-1' AND Inscription.id_eleve=$row[0] AND Inscription.id_seance=Seance.id_seance";
      //$result5 = mysqli_query($connect,$query5);
      //$row5 = mysqli_fetch_array($result5);
      if(!empty($row5['notea'])){
        $moy_eleve = round($row5['notea'],1);
      }

      //Partie Pourcentage
      $total=0;
      $reussi=0;
      $sql6 = "SELECT Inscription.note FROM Inscription,Seance WHERE Inscription.note!='-1' AND Inscription.id_eleve=".$row['id_eleve']." AND Inscription.id_seance=Seance.id_seance";
      $result6 = $connexion->prepare($sql6);
      $result6->execute();
      //$query6 = "SELECT Inscription.note FROM Inscription,Seance WHERE Inscription.note!='-1' AND Inscription.id_eleve=$row[0] AND Inscription.id_seance=Seance.id_seance";
      //$result6 = mysqli_query($connect,$query6);
      while($row6=$result6->fetch(PDO::FETCH_ASSOC)){
        if(!empty($row6['note'])){
          $total+=1;
          if($row6['note']<6){
              $reussi+=1;
          }
          $pourc=round(($reussi/$total)*100,2);
        }
      }
      if(!empty($pourc)||!empty($moy_theme)){
        echo "<tr><td>".$row['nom']." ".$row['prenom']."</td><td>$moy_eleve</td><td> $pourc </td></tr>";
      }
      $pourc = NULL;
      $moy_theme = NULL;
    }

    $connexion = NULL;
    //mysqli_close($connect);
    ?>
    </table>
  </div>
  <br>
  <br>
    <footer>
      <div id="footer-wrapper">
        <div id="footer" class="container">
          <h1 id="titre"><b> ~ Auto-école de l'UTC ~ </b></h1>
        </div>
      </div>
    </footer>
  </body>
</html>
