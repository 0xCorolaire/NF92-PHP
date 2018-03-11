PHP
===
###### tags: `php` `Programmation`

[TOC]

Base
===

Commentaires : 
```php=
//Commentaire ligne  

/*COmmentaire plusieurs lignes 
hy
*/
```

Ecrire qq chose :
```php=
echo 'Bonjour';
```
Déclaration de constante : 
```php=
define (string $nomdelaconstante, mixed $valeurdelaconstante [, bool $case_sensitive]);
```

Variables : 			
```php=
$nomvraiebl = 'string', 100, true, new etudiant()[objet de type edutiand], array('a','b');
```

Vraiebls dynamique :  		
```php=
$$nomvariable;
```
Test sur l'existance d'une variable : 	
```php=
echo isset($var); //retourne TRUE si défini ( affiche 1 et rien si non défini);
Destruction variable : 			
unset($var);

!empty($var); //retourn false si la variable est NULL et true si qq chose
```

Tableau
===
```php=
$tableau = array();
$tab1 = array('liste','enuméré','pepouz');
$tab2 = array(
		'nom' => 'PAIGNEAU',
		'prenom' => 'Hugo',
		'Etudiant' => true
);
```

#### Ajout d'une valeur : 
```php=
$tab[i]='entrée';
$tab['taille'] = 180; //associatif
```

#### Array multidimensionnels :  
```php=
$matrice = array();
$matrice[0] = array('x','y','z');
Acces : 	$matrice[0][0];
```

#### Parcours d'un tableau : 
```php=
foreach($tab as $valeur){
	echo $valeur ,'<br>';
}

foreach($tab as $cle => $valeur){
	echo $cle, ':', $valeur ,'<br>';
}

for($i=0; $i<sizeof($legume); $i++){	
	echo $legume[$i], '<br>';
}
```


#### Operation sur les tableaux : 

count(), sizeof() = taille du tableau
sort() = trie les elements du plus petit au plus grand
rsort() = " plus grand au pluys petit
in_array() = vérifie si une valeur est présente
current() = retourne la valeur de l'éléemnt courrant du tableau
 \+ = union
 <>, !=...

implode(\$tab, ', '); affiche une liste sur echo.
array_push(\$tab, 'ajout'); ajoute a la fin
array_unshift(\$tab, 'ajout'); ajoute au début.
array_shift(\$tab);  Supprime le 1er
array_pop(\$tab);   Supprime le dernier.
array_splice();    coupe le tableau
array_merge(); merge 2 tableaux
unset(\$tab[i]); Supprime le i eme 

### Utile tableau : 

extract($var_array);    Créer des variables pour un tableau associatif



Opérateurs
===


#### Opérateurs de base : 

-, +, *, /, %
+=, ...

\++$var incrémente a et retourne $var 
\$var++ retourne \$a puis l'incrémente , --$var, \$var--, .= concaténation,  ==, ===, !=, <>, <, <=...

#### logique : 

&& et, || ou, XOR true si $a ou $b est vrai mais pas les deux, !  non

@include('fichier.php') Masque l'erreur générée par la fonction include();

Condition
===

#### IF : 
```php=
if(expression){

}elseif{

}else{}
```
#### SWITCH : 
```php=
switch(expression){
	case val1 : 
		instructions;
	break;
	default : 
		instructions;
	break;
}
```
#### Boucles : 		

```php=
for(init; condit; incrém){	 

}

while(condition){
				
}

do{

}while(condition); //au moins 1 entrée.

foreach($tab as $valà{

}
//on utilise continue;  force le passage à l'itération suivante
//break; Sort de la boucle.
```

Transmission d'informations
===

## Formulaires : 

Dans le .html : 
```html=
<form method="POST" action="fichier.php>
    <input type="text" name="nom" placeholder="Nom">
    <select name="choix">
        <option value="0">A</option>
        <option value="1">B</option>
    </select>
    <input type="submit" value="Envoyer" class="button">
</form>
```

Dans le .php : 
```php=
$var1 = isset($_POST['nom']) ? $_GET['nom'] : 'nobody';
//Prend la valeur de nom et si rien n'est rentré, prend la valeur nobody

$var2 = isset($_POST["choix"]) ? $_POST['choix'] : '-1';
```

Variable de Session
===

## Base 

A placer après la connection par exemple, avant le balse <html> : 
```php=
<?php
session_start();
$_SESSION["pseudo"] = "Hugo";
?>  
```

Pour chaque lien sur la page .php, pas besoin de recreer les variables, il faudra juste placer le session_start(); On peut par exemple rentrer un formulaire puis stocker le pseudo dans la $_SESSION.

Pour fermer une session : 
```php=
<?php
session_start();
session_destroy();
?>  
```
## Cookie

Permet de garder la session ouverte jusqu'à x temps.
```php=
setcookie('var','value',time()+1000); //En seconde
```

BDD
===

## Connection BDD

#### Solution 1 (phpMyAdmin): 
```php=
$host = "localhost";
$user = "root";
$bdd = "Auto_Ecole";
$passwd="";
$connect = mysqli_connect($host, $user, $passwd, $bdd) or die ('Error connecting to mysql');
```
#### Solution 2 (postgreSQL/mySQL): 
```php=
$host = "tuxa.sme.utc";
$user = "na18p002";
$bdd = "dbna18p002";
$port = 5432
$passwd="nBia1XzQ";
$connexion = new PDO('pgsql:host=$host ; dbname=$bdd; port=$port',$user,$passwd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


$connexion=null;
```

## Selection BDD

Deux types de selections possible, une direct : 
```php=
$sql="Commande SQL";
$result=$connexion->query($sql);
```
Une préparée (utilisé si on ne connait pas une valeur d'une contrainte par ex): 
```php=
$sql="Commande SQL WHERE attr = ?";
$result=$connexion->query($sql);
$result->execute(array($_POST["attr1"],..));
```
<=>
```php=
$sql="Commande SQL WHERE attr1 = :att1 AND attr2 = :attr2";
$result=$connexion->query($sql);
$result->execute(array(
    'attr1' => $_POST["attr1"],
    'attr2' => $_POST["attr2"]
));
```

Exemple : 

```php=
$sql="SELECT * FROM maTable WHERE condition;//Group By etc..
$result=$connexion->prepare($sql);
$result->execute();
```

## Affichage BDD
```php=
while($row=$result->fetch(PDO::FETCH_ASSOC)){
   echo "$row['attribut']";
}
```

## Insertion BDD

```php=
$sql="INSERT INTO maTable (attr1, attr2) values('$val1','$val2')";
$result=$connexion->prepare($sql);
$result->execute();

OU

$sql="INSERT INTO maTable (attr1, attr2) values(:val1,:val2)";
$result=$connexion->prepare($sql);
$result->execute(array(
    'val1' => $val1,
    'val2' => $val2
));
```

## Mise a jour de données
```php=
$sql="UPDATE maTable SET attr1 = ?, attr2 = ? WHERE condition";
$result=$connexion->prepare($sql);
$result->execute(array(
    $val1,
    $val2,
    $condit
));

```


# NF92-Auto-Ecole
Lien du site :  https://hugofloter.github.io/NF92-PHP/Site/
TP : NF92 			                                                    
Sujet : Site pour gérer une Auto_Ecole			                                   *
PAIGNEAU Hugo 		                                                             *

:::info
Amélioration du code PHP : Migration de PHP4(encore dans le code, mais en commentaire //) à PHP7 (Connection à la base de donnée grace à PDO [Orienté object])
:::



- Liste Fichiers : 
```html=
	.
	├── Base_De_Donnée.SQL  //Base de donnée à Exectuer sur phpmyadmin
	│
	├── Site	
	│    ├── accueil.html
	│    ├── menu.html
	│    ├── index.html
	│    ├── ajout_eleve.html
	│    ├── ajouter_eleve.php
	│    ├── ajout_theme.html
	│    ├── ajouter_theme.php
	│    ├── ajout_seance.php
	│    ├── ajouter_seance.php
	│    ├── inscription_eleve.php
	│    ├── inscrire_eleve.php
	│    ├── validation_seance.php
	│    ├── valider_seance.php
	│    ├── noter_eleve.php
	│    ├── consultation_eleve.php
	│    ├── consulter_eleve.php
	│    ├── suppression_theme.php
	│    ├── supprimer_theme.php
	│    ├── visualisation_calendrier_eleve.php
	│    ├── visualiser_calendrier_eleve.php
	│    ├── desinscription_seance.php
	│    ├── desinscrire_seance.php
	│    ├── suppression_seance.php
	│    ├── supprimer_seance.php
	│    ├── statistique_eleve.php
	│    ├── main.css
	│    ├── script.js
	│    ├── autoecole.ico
	│    ├── ecole.jpg
	│    ├── logo.svg
	│    ├── routea.jpg
	│    ├── routeb.jpg
	│    ├── routec.jpg
	│    ├── routed.jpg
	│    ├── routee.jpg
	│    ├── routef.jpg
	│    ├── routeg.jpg
	│    └── routek.jpg
	│
	└─── README.txt		//Texte explicatif
```

- Language utilisés : HTML; PHP; JavaScript; CSS
