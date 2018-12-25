# xml-projet
# mini-projet-xml
# mini-projet-xml
# Mini-projet  XML Avancé & Web 2.0 Gestion d’emplois du temps 
 
# Dans ce mini-projet, nous proposons de construire différentes briques logicielles permettant de définir, de visualiser, d’interroger et d’éditer des emplois du temps. Alors : 
 
#  On souhaite créer une application web en utilisant la technologie XML et Ajax qui permet de gérer les emplois de temps du département informatique. 
 
#  Le département est constitué des étudiants.  
 
#  Chaque étudiant appartient à une promotion (Licence, Master). 
  
#  Chaque promotion appartient à une spécialité (MGL, MGI, MRT, 3L, 2L, 1L). 
 
#  Les enseignants assurent des cours des modules à des promotions dans des salles à un jour donné, pendant une durée définie par une heure de début et une heure de fin de la séance. 
#  Le schéma relationnel proposé pour ce mini projet est le suivant : etudiant (num_et,nom_et,prenom_et,adresse) promotion (id_promo,id_speci,niveau) spécialité (id_speci,nom_speci,description) cours (id_cours,id_promo,id_ens,id_salle,id_mod,jour,heure_debut,heure_fin) modules (id_mod,nom_mod,description) salles (id_salle,nom_salle,description) enseignant (id_ens,nom_ens,tel) 
 
 
# 1- Créer et remplir la base de données par des données réelles correspondantes à votre emploi de temps. 
# 2- Créer un schéma XML qui permet de décrire un emploi de temps sous la forme suivante : 

<?xml version="1.0" encoding="iso-8859-1"?> <emploi promotion="2MGL">   <seance jour="Mercredi" debut="08:00" fin="09:30" prof="A"     module="XML" salle="15"/>   <seance jour="Mercredi" debut="09:30" fin="11:00" prof="B"     module="Anglais" salle="Amphi A"/>   ......   ......    </emploi> 
 
 2 /2 
# 3-Créer un script PHP qui permet de générer dynamiquement le fichier XML présentant les données de l’emploi du temps d’une promotion donnée. 
 
# 4- Créer un script PHP, utilisant Ajax qui permet de :  Sélectionner une promotion dans une liste déroulante.   Après sélection de la promotion, afficher l’emploi du temps de cette promotion. 
 
# 5- Créer une feuille de style XSL qui permet de transformer le fichier XML en une page HTML qui permet de présenter l’emploi du temps d’une promotion donnée.  
 
# 6- Créer un schéma XML qui permet de décrire la structure du fichier XML qui contient la liste des étudiants d’une promotion. La forme de ce fichier est la suivante : 
<?xml version="1.0" encoding="iso-8859-1"?> <promotion option="MGL" niveau="2" > <etudiants>     <etudiant numInscription="E200" nom="X" prenom="Y"/>      ......   ...... </etudiants> <modules>  <module idModule="E200" nomModule="Web 2.0"/>   ......   ...... </modules> </promotion> 
 
# 7- Créer une page PHP qui permet de générer dynamiquement le fichier XML précédent. 
 
# 8- Créer une feuille de style XSL qui permet de transformer une le fichier XML en un tableau HTML qui présente les étudiants et les modules de la promotion. 
 
# 9- Créer une page HTML qui permet de :  Sélectionner une promotion dans une liste  Afficher dans la même page les étudiants et les modules de cette promotion. 
 
# 10- Créer page principale en utilisant Ajax, XML et PHP pour la saisie d’un nouveau emploi du temps.  