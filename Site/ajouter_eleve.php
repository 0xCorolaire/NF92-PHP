<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html
    ; charset=UTF-8" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <title>Ajout élève</title>
    <link rel="stylesheet" href="main.css">
  </head>
  <body>
    <div>
    <h1> * Vous ajoutez un élève * </h1>
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
    $prenom=$_POST["prenom"];
    $nom=$_POST["nom"];
    $jnais=$_POST["jnaissance"];
    $mnais=$_POST["mnaissance"];
    $anais=$_POST["anaissance"];
    $datenais="$anais-$mnais-$jnais";
    $verif=true;

    //Test sur la validité du formulaire
    switch($mnais){
    					case '02' :
    						if($jnais=="31"||$jnais=="30"){
                  echo "Veuillez saisir une date de naissance valide<br>";
                  $verif=false;
                  echo '<a href="ajout_eleve.html"><input type="button" value="Modifier la date de naissance" class="button"></a>';
                }elseif($jnais=="29"&&$anais%4!=0){
                  echo "Veuillez saisir une date de naissance valide<br>";
                  $verif=false;
                  echo '<a href="ajout_eleve.html"><input type="button" value="Modifier la date de naissance" class="button"></a>';
                }
    					break;
              case '04' :
              case '06' :
              case '09' :
              case '11' :
                if($jnais=="31"){
                  echo "Veuillez saisir une date de naissance valide<br>";
                  echo '<a href="ajout_eleve.html"><input type="button" value="Modifier la date de naissance" class="button"></a>';
                  $verif=false;
                }
              break;
    					default :
    					break;
    				}
    if(empty($prenom)||empty($prenom)){
      echo "Vous n'avez pas rentré de nom et/ou prénom<br>";
      $verif=false;
      echo '<a href="ajout_eleve.html"><input type="button" value="Modifier" class="button"></a>';
    }

    $sql = "SELECT * FROM Eleve";
    $result = $connexion->prepare($sql);
    $result->execute();
    //$result = mysqli_query($connect,"SELECT * FROM Eleve");
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
      if($nom==$row['nom']&&$prenom==$row['prenom']){
        $verif=false;
        echo "<p>Un élève avez le même nom et prénom a déjà été rentré, voulez vous confirmé l'implémentation dans la Base de donnée ?</p>";
        echo '<form action="valider_eleve.php" method="POST">';
        echo "<input type='text' name='nom' value='$nom'><br>";
        echo "<input type='text' name='prenom' value='$prenom'><br>";
        echo "<input type='text' name='datenais' value='$datenais'><br>";
        echo '<a href="valider_eleve.php"><input type="submit" value="oui" class="button" style="margin-right: 5px,margin-top: 10px" name="reponse"></a>';
        echo '<a href="valider_eleve.php"><input type="submit" value="non" class="button" name="reponse"></a><br>';
        echo "</form>";
      }
    }

    //Implémentation dans la BDD
    if ($verif){
    $sql2 = "insert into Eleve values (NULL, '$nom','$prenom','$datenais','$date')";
    $result2 = $connexion->prepare($sql2);
    $result2->execute();

    $connexion = NULL;
    //$query = "insert into Eleve values (NULL, '$nom','$prenom','$datenais','$date')";
    //$result = mysqli_query($connect, $query);
    //@mysqli_close($connect);

    echo "<br> La date est : "."'$date'"." <br>";

    echo "<br>L'ajout de l'élève est validé! En voici le récapitulatif : <br><br>";

    echo "<b>Nom de l'élève:</b> ".$nom."<br><br>";
    echo "<b>Prénom de l'élève:</b> ".$prenom."<br><br>";
    echo "<b>Date de naissance:</b> ".$datenais."<br>";
    }
    ?>
    <p></p>
    <a href="accueil.html"><input type="button" value="Retour au menu" class="button"></a>
    <a href="ajout_eleve.html"><input type="button" value="Ajouter un autre élève" class="button"></a>

  </body>
</html>
