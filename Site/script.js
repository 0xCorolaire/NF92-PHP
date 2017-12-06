/******************************************************************************
//                      CODE ECRIT PAR Hugo Paigneau                          *
//                                                                            *
//                 Garder ce header si vous utilisez le code                  *
//                                                                            *
//                                UTC 2017                                    *
******************************************************************************/


//Translate de la page accueil.html

$( "select" ).change(function () {
    var str = "";
    $( "select option:selected" ).each(function() {
      if ($(this).val() == "Fr"){
        str += " ~ Auto-école de l'UTC ~ ";
        $("#titre").text(str);
        str = "Bonjour et bienvenue sur le site de gestion de votre auto-école! Plusieurs possibilités s'offrent à vous sur cette interface."
        $("#intro").text(str);
        $("#intro").css("font-weight","Bold");
        str = " * Ajouter un élève * "
        $("#ajout_eleve").text(str);
        str = " Vous pouvez dans un premer temps ajouter un élèvre s'étant inscrit à l'auto école. Rien de plus simple pour ceci, il suffit de vous rendre dans Inscrire un élève. Pour la suite, il vous est demandé d'entrer un nom, un prénom et une date de naissance. "
        $("#texte_ajout_eleve").text(str);
        str = " * Ajouter un thème * ";
        $("#ajout_theme").text(str);
        str = " Les thèmes des questions du code de la route sont sujettes à de nombreuses modifications dans le temps. Il y a effectivement beaucoup de mise à jour réalisé, dans un monde qui évolue chaque jour. Vous pouvez ainsi dans Ajouter un thème rentrer les caractéristiques d'un nouveau thème que vous souhaitez utiliser dans le cadrede séance d'apprentissage au sein de l'auto-école. Cela permet également de récupérer un thème supprimé. "
        $("#texte_ajout_theme").text(str);
        str = " * Ajouter une séance * "
        $("#ajout_seance").text(str);
        str = " Le site vous offre la possibilité d'ajouter une séance de code la route dans Ajouter une séance. Ainsi s'organiser n'a jamais été aussi simple, vous aurez la possibilité de créer une séance sur un thème défini à une date précise avec un nombre maximum de participants. Cela évitera tout défaut d'organisation en entrant dans la base de données toutes les informations. "
        $("#texte_ajout_seance").text(str);
        str = " * Inscription séance * "
        $("#inscription_seance").text(str);
        str = " Une fois votre séance définie, vous pourrez ajouter les élèves voulant se présenter à la séance en question et ainsi ne pas dépasser le nombre maximum de participants. En cas d'affluence maximum atteinte, le site vous indiquera automatiquement que l'inscription est refusée. "
        $("#texte_inscription_seance").text(str);
        str = " * Noter un élève * "
        $("#noter_eleve").text(str);
        str = " Après chaque séance de code de la route, comme vous en avez l'habitude, le participant vient à vous pour que vous lui indiquiez son nombre de fautes. Une fois connuevous aurez la possibilité de rentrer ici dans Noter un élève le nombre de fautes réalisés par le participant. Cela permet à long terme de posséder un véritable suivi de toutes les personnes passant le code au sein de votre auto-école. "
        $("#texte_noter_eleve").text(str);
        str = " * Consultation profil * "
        $("#consultation_profil").text(str);
        str = " Il est important de pouvoir à chaque instant accéder au profil de chaque élève. C'est pourquoi dans Consultation élève, tout profil est accessible. Ce dernier affiche les caractéristiques de l'élève en question. "
        $("#texte_consultation_profil").text(str);
        str = " * Supprimer un thème * "
        $("#supprimer_theme").text(str);
        str = " Comme indiqué plus haut il existe de nombreux thèmes de code de la route avec beaucoup de modifications possibles. La page Supprimer un thème permet de temporairement ou pas écarter un thème des possiblités envisageables dans Ajouter une séance. "
        $("#texte_supprimer_theme").text(str);
        str = " * Consultation calendrier * "
        $("#consultation_calendrier").text(str);
        str = " A tout moment dans Visualisation calendrier vous pouvez sélectionner le nom d'un élève et ainsi consulter son calendrier des prochaines séances où il a été inscrit. Cela permet de pouvoir faire visualiser la participation, l'implication d'un élève en particulier. "
        $("#texte_consultation_calendrier").text(str);
        str = " * Visualisation calendrier * "
        $("#visualisation_calendrier").text(str);
        str = " A tout moment dans Visualisation calendrier vous pouvez sélectionner le nom d'un élève et ainsi consulter son calendrier des prochaines séances où il a été inscrit. Cela permet de pouvoir faire visualiser la participation, l'implication d'un élève en particulier. "
        $("#texte_visualisation_calendrier").text(str);
        str = " * Désinscription séance * "
        $("#desinscription_seance").text(str);
        str = " Vous avez la possibilité de désinscrire, peu importe la raison, un élève d'une séance auquelle il s'est inscrit. Cela mettra à jour le nombre d'élèves inscrits à cette séance. "
        $("#texte_desinscription_seance").text(str);
        str = " * Suppression séance * "
        $("#Suppression_seance").text(str);
        str = " Si une séance ne peut être assurée, elle doit être supprimée. C'est pourquoi dans Suppression séance cette action est réalisable de manière très simple en sélectionnant la séance à supprimer. Elle désinscrit les élèves qui auraient du y participer par la même occasion. "
        $("#texte_suppression_seance").text(str);
        str = " * Statistique élève * "
        $("#statistique_eleve").text(str);
        $("#texte_statistique_eleve").html('Un compte rendu statistique pour chaque élève est disponible dans "Statistique élève". La page génère les statistiques de chaque élève de deux manières différentes : <br> -Soit séance par séance <br> -Soit par thème');
        $("#fr").text("Français");
        $("#es").text("Espagnol");
      }else if ($(this).val() == "Es"){
        str += " ~ Autoescuela de la UTC ~ ";
        $("#titre").text( str );
        str = "¡Hola y bienvenidos al sitio de administración de tu autoescuela! Varias posibilidades están disponibles para usted en esta interfaz."
        $("#intro").text(str);
        $("#intro").css("font-weight","Bold");
        str = " * Agregar un estudiante * "
        $("#ajout_eleve").text(str);
        str = " En un primer momento puede agregar un alumno habiéndose matriculado en la escuela. Nada más simple para esto, solo ve a Registrar un estudiante. Por lo demás, se le pide que ingrese un nombre, un nombre y una fecha de nacimiento. "
        $("#texte_ajout_eleve").text(str);
        str = " * Añadir un tema * ";
        $("#ajout_theme").text(str);
        str = " Los temas de las preguntas sobre la ley de tránsito están sujetos a muchos cambios a lo largo del tiempo. En realidad, se realizan muchas actualizaciones en un mundo que evoluciona todos los días. De modo que puede, en Agregar un tema, ingresar las características de un nuevo tema que desee usar en el contexto de la sesión de aprendizaje dentro de la escuela de manejo. También permite recuperar un tema eliminado. "
        $("#texte_ajout_theme").text(str);
        str = " * Agregar una sesión * "
        $("#ajout_seance").text(str);
        str = " El sitio le ofrece la oportunidad de agregar una sesión de código de la ruta en Agregar una sesión. Así que organizarse nunca ha sido tan fácil, tendrá la oportunidad de crear una sesión sobre un tema definido en una fecha específica con un número máximo de participantes. Esto evitará cualquier falla organizacional ingresando toda la información en la base de datos. "
        $("#texte_ajout_seance").text(str);
        str = " * Registro de sesión * "
        $("#inscription_seance").text(str);
        str = " Una vez que se establece su sesión, puede agregar estudiantes que quieran asistir a la sesión y que no excedan el número máximo de participantes. En caso de afluencia máxima alcanzada, el sitio indicará automáticamente que se rechazó el registro. "
        $("#texte_inscription_seance").text(str);
        str = " * Marcar un estudiante * "
        $("#noter_eleve").text(str);
        str = " Después de cada sesión de código de la ruta, como está acostumbrado, el participante se acerca a usted para que le cuente mi número de errores. Una vez conocido, tendrá la oportunidad de ingresar aquí en Marcar un estudiante la cantidad de errores cometidos por el participante. Esto permite a largo plazo tener un seguimiento real de todas las personas que pasan el código dentro de su autoescuela. "
        $("#texte_noter_eleve").text(str);
        str = " * Consulta de perfil * "
        $("#consultation_profil").text(str);
        str = " Es importante poder acceder al perfil de cada alumno en cualquier momento. Es por eso que en Consulta Estudiantil, cualquier perfil es accesible. Este último muestra las características del estudiante en cuestión. "
        $("#texte_consultation_profil").text(str);
        str = " * Eliminar un tema * "
        $("#supprimer_theme").text(str);
        str = " Como se mencionó anteriormente, hay muchos temas de códigos de tráfico con muchas modificaciones posibles. La página Eliminar un tema le permite descartar temporalmente o no un tema de las posibilidades que se pueden considerar en Agregar una sesión. "
        $("#texte_supprimer_theme").text(str);
        str = " * Consulta de calendario * "
        $("#consultation_calendrier").text(str);
        str = " En cualquier momento en el calendario de visualización, puede seleccionar el nombre de un alumno y, por lo tanto, consultar su calendario de las próximas sesiones en las que se registró. Esto permite visualizar la participación, la participación de un estudiante en particular. "
        $("#texte_consultation_calendrier").text(str);
        str = " * Visualización del calendario * "
        $("#visualisation_calendrier").text(str);
        str = " En cualquier momento en el calendario de visualización, puede seleccionar el nombre de un alumno y, por lo tanto, consultar su calendario de las próximas sesiones en las que se registró. Esto permite visualizar la participación, la participación de un estudiante en particular. "
        $("#texte_visualisation_calendrier").text(str);
        str = " * Darse de baja una sesión * "
        $("#desinscription_seance").text(str);
        str = " Usted tiene la opción de darse de baja, por cualquier razón, un estudiante de una sesión en la que se registró. Esto actualizará la cantidad de estudiantes inscritos en esta sesión. "
        $("#texte_desinscription_seance").text(str);
        str = " * Supresión de sesión * "
        $("#suppression_seance").text(str);
        str = " Si no se puede garantizar una sesión, se debe eliminar. Esta es la razón por la cual en la supresión de sesión esta acción se puede hacer de una manera muy simple al seleccionar la sesión que se eliminará. Desinscribe a los estudiantes que deberían haber participado al mismo tiempo. "
        $("#texte_suppression_seance").text(str);
        str = " * Estadísticas del alumno * "
        $("#statistique_eleve").text(str);
        $("#texte_statistique_eleve").html('Un informe estadístico para cada estudiante está disponible en "Estadísticas del alumno". La página genera las estadísticas de cada alumno de dos maneras diferentes: <br> -Sesión sesión por sesión <br> -Por tema');
        $("#fr").text("Francés");
        $("#es").text("Español");
      }});
  }).change();

//création des options pour l'ajout séance.

var spanj=document.getElementById('datej');
var spanm=document.getElementById('datem');
var spana=document.getElementById('datea');
var spane=document.getElementById('effectif')
var selectj=document.createElement('select');
var selectm=document.createElement('select');
var selecta=document.createElement('select');
var selecte=document.createElement('select');
selecte.setAttribute('name','effectif_max');
selectj.setAttribute('name','jour_seance');
selectm.setAttribute('name','mois_seance');
selecta.setAttribute('name','annee_seance');
spane.appendChild(selecte);
spanj.appendChild(selectj);
spanm.appendChild(selectm);
spana.appendChild(selecta);
for(var i=1; i<32 ; i+=1 ){
  var option_date=document.createElement('option');
  if(i<=9){
    option_date.setAttribute('value', '0'+i);
    option_date.text = '0'+i;
  } else{
    option_date.setAttribute('value', i);
    option_date.text = i;
  }
  selectj.appendChild(option_date)
}
for(var i=1; i<13 ; i+=1 ){
  var option_date=document.createElement('option');
  if(i<=9){
    option_date.setAttribute('value', '0'+i);
    option_date.text = '0'+i;
  } else{
    option_date.setAttribute('value', i);
    option_date.text = i;
  }
  selectm.appendChild(option_date)
}
var year = new Date().getFullYear()
for(var i=year; i<year+3 ; i+=1 ){
  var option_date=document.createElement('option');
  option_date.setAttribute('value', i);
  option_date.text = i;
  selecta.appendChild(option_date)
}
for(var i=1; i<21 ; i+=1 ){
  var option_date=document.createElement('option');
  option_date.setAttribute('value', i);
  option_date.text = i;
  selecte.appendChild(option_date)
}
