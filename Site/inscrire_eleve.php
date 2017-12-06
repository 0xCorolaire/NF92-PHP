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
    <?php
      //Connexion à la BDD
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
      $id_eleve=$_POST["choix_eleve"];
      $id_seance=$_POST["choix_seance"];
      $verif=true;
      $eff=0;
      echo "<br> La date est : "."'$date'"." <br>";

      //Test sur la validité du formulaire

      //Meme eleve pour une id seances + effectif max pour une seances
      $sql = "SELECT Inscription.id_eleve, Inscription.id_seance, Seance.eff_max FROM Inscription, Seance WHERE Inscription.id_seance='$id_seance' AND Inscription.id_seance=Seance.id_seance";
      $result = $connexion->prepare($sql);
      $result->execute();
      //$result = mysqli_query($connect,"SELECT Inscription.id_eleve, Inscription.id_seance, Seance.eff_max FROM Inscription, Seance WHERE Inscription.id_seance='$id_seance' AND Inscription.id_seance=Seance.id_seance");
      while($row=$result->fetch(PDO::FETCH_ASSOC)){
        $eff+=1;
        if($id_eleve==$row['id_eleve']){
          $verif=false;
          echo "<p>L'élève que vous essayez d'inscrire est déjà inscrit pour cette séance.<br>";
          echo '<a href="inscription_eleve.php"><input type="button" value="Modifier" class="button" style="margin-top: 25px"></a></p>';
          break;
        }
        if($eff>=$row['eff_max']){
          $verif=false;
          echo "<p>Vous aveint atteint l'effetif maximum pour cette séance.<br>";
          echo '<a href="inscription_eleve.php"><input type="button" value="Modifier" class="button" style="margin-top: 25px"></a></p>';
          break;
        }
      }

      //Implémentation dans la BDD
      if($verif){
        $sql2 = "INSERT INTO Inscription VALUES ('$id_seance','$id_eleve','-1')";
        $result2 = $connexion->prepare($sql2);
        $result2->execute();
        //$query = "INSERT INTO Inscription VALUES ('$id_seance','$id_eleve','-1')";
        //$result = mysqli_query($connect,$query);

        echo "<p>L'élève a bien été ajouté à la séance !</p>";
      }

      $connexion = NULL;
    // mysqli_close($connect);
    ?>
    <a href="accueil.html"><input type="button" value="Retour au menu" class="button"></a>
    <a href="inscription_eleve.php"><input type="button" value="Ajouter un autre élève" class="button"></a>
  </body>
</html>
