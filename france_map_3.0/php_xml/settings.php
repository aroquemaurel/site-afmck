<?php
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
/*
FRANCE-MAP V3.0 - 18/09/20087
Copyright (C) 2008 PAYROUSE NICOLAS - FRANCE-MAP.FR
Pour toutes questions : http://www.france-map/forum/
Merci.

INFORMATIONS SUR CE FICHIER :
Vous trouverez dansz ce fichier tous les param�tres � definir pour personnaliser et configurer votre carte
*/

define ('retour', "\r\n"); // Ne pas modifier
define ('tab', "\t"); // Ne pas modifier
$champFacultatifs = array(); // Ne pas modifier
$variableCible = 'id' ; // Ne pas modifier

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
// Param�tres de la base de donn�es

$hote	= 'mysql51-76.bdb' ;	// Nom de votre serveur SQL
$utilisateur	= 'afmckadh' ;	// Nom d'utilisateur SQL
$motDePasse = 'CSWxtx9i' ;	// Mot de passe SQL
$baseDeDonnees = 'afmckadh' ;	// Nom de la base de donn�es
$tableUtilisee = 'adherents' ;	// Nom de la table utilis�e



//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
// Param�tres de champs

// Nom des champs de votre base // CHAMPS OBLIGATOIRES !
// Vous devez avoir AU MOINS ces champs dans votre base Mysql pour utiliser ce script.
// Modifier les valeurs des varaibles ci-dessous avec les noms des champs de votre base Mysql.
$champId = 'id';
$champNom = 'login';	
$champCodePostal = 'cp';
$champVille = 'ville';
$champPays = 'pays';
$champFacultatifs['adresse'] = 'Adresse:';
$champFacultatifs['telephone'] = 'Tel:';
$champFacultatifs['e-mail'] = 'E-mail:';
$champFacultatifs['niveau'] = 'Niveau MDT';
// Champs facultatifs
// Vous pouvez d�sormais rajouter autant de champ que n�c�ssaire.
// Il suffit de remplir le tableau $champFacultatifs, en mettant :
// en Key : le nom du champ dans votre base mysql
// en Value : le nom qui apparaitra dans le module Flash.
//
// Exemple : vous voulez ajouter le champ 'CLI_Adresse' dans le descriptif d'un membre, ajouter ci dessous la ligne :
// $champFacultatifs['adresse'] = 'Adresse du Client';
//
// Vous pouvez ainsi ajouter tous les champs que vous voulez !


// $champFacultatifs['champ'] = 'Nom du champ';

	 




//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
// Param�tres de couleur de la carte

// Couleur de fond de la carte
// Utiliser le format h�xad�cimal
$backgroundCouleur = 'EAEAEA';

// Couleur de l'infobulle
// Elle apparait au survol d'un d�partement ou d'une r�gion
// Utiliser le format h�xad�cimal
$couleurInfobulle = '313131';

// Couleur du texte de l'infobulle
// Utiliser le format h�xad�cimal
$couleurTexteInfobulle = 'DCDCDC';

// Couleur des l�gendes
// DOM TOM R�gion parisienne...
// Utiliser le format h�xad�cimal
$couleurLegendes = '353535';

// Couleur du contour des d�partements
// Utiliser le format h�xad�cimal
$couleurContourDepartements = '595959';

// Couleur du contour des r�gions
// Utiliser le format h�xad�cimal
$couleurContourRegions = '3C3C3C';

// Couleurs des d�partements
// Utiliser le format h�xad�cimal
// pour vous aider � choisir vos couleurs :
$couleur11 = 'cc0013';
$couleur10 = 'dc2337';
$couleur9 = 'ec4656';
$couleur8 = 'f75464';
$couleur7 = '00326e';
$couleur6 = '0049a1';
$couleur5 = '0b61c9';
$couleur4 = '217ae6';
$couleur3 = '5996e1';
$couleur2 = '8bb2e2';
$couleur1 = 'b8cee8';
$couleur0 = 'e1e9f2';


//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
// Param�tres des tranches de population

// Si vous voulez que les tranches soient calcul�s automatiquement : $tranchesAuto = true;
// Si vous voulez que les tranches NE SOIENT PAS calcul�s automatiquement : $tranchesAuto = false;
$tranchesAuto = false;

// Si vous avez d�fini $tranchesAuto = false, remplissez les tranches ci dessous avec les valeurs que vous voulez.
$tranche1 = 1;
$tranche2 = 3;
$tranche3 = 5;
$tranche4 = 7;
$tranche5 = 9;
$tranche6 = 11;
$tranche7 = 13;
$tranche8 = 15;
$tranche9 = 17;
$tranche10 = 20;




//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
// Options 

// Si vous voulez qu'il y ai un lien vers une fiche de votre site
// Si cette option est TRUE, un bouton apparait en haut du descriptif membre.
$utiliserPageCible = false;

// Si l'option utiliserPageCible est TRUE, veuillez renseigner l'url de cette page // URL relative au fichier map.php
$urlPageCible = 'detail_membre.php' ;

// Le terme que vous voulez voir apparaitre sur la carte
// par exemple : club, client, prospect, magasin...
// Laisser ce terme au singulier
$unLabel = 'Praticien' ;


// Si vous voulez afficher � l'ouverture de la carte les r�gions ou les d�partements
// Si vous voulez voir en premier les d�partements : $afficheFirst = 'dep';
// Si vous voulez voir en premier les r�gions : $afficheFirst = 'reg';
$afficheFirst = 'dep';

// Afficher ou non l'ombre qui entoure la carte
$showOmbre = true;



?>