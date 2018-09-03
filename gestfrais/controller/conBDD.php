<?php

/*
--> Récupération du fichier models
--> Donne accès à toutes les fonctions présentes dans modele.php
*/
// Mettre le chemin absolu pour le répertoire filezila depuis la racine vers modele.php
require_once('C:\wamp64\www\gestfrais\models\modele.php');
//require_once('/gestfrais/models/modele.php');

/*
--> Création de la fonction accueil 
--> But : Va chercher le fichier indexVue.php qui correspond à la vue et l'affiche
*/
function accueil(){
	require_once('C:\wamp64\www\gestfrais\views\indexVue.php');
	//require_once('/gestfrais/views/indexVue.php');
}


/*
--> Création de la fonction connexion()
--> Va chercher le fichier connexionGSB.php qui correspond ua formulaire de connexion 
*/
function connexion(){
	require '../gestfrais/views/connexionGSB.php';
	//require '/gestfrais/views/connexionGSB.php';
}

function refusConnexion(){
		echo '<script type="text/javascript">alert("Impossible de vous connecter.");</script>';
		$sql_select = null;
		$st = null;
		$db = null;
		$lignes = null;
	}
/*
--> Création de la fonction controleCo()
--> Récupère la fonction testConnexion() présente dans models/modele.php 	
	--> testConnexion() effectue une connexion à la base de donnée puis une requête de test pour vérifier le bon fonctionnement de la connexion
--> Explication de controleCo():
--> Si le première élément du tableau $lignes contenant le résultat de la requête testConnexion() est différent de nul il exécute les instructions suivantes
	--> Il récupère via la méthode post les données venant d'un formulaire, les stocks dans des variables $_SESSION et renvoie :
		--> un $connecte true
		--> un message de bienvenue
		--> la vue du fichier tableauAdmin placé dans views/tableauAdmin.php
-->Sinon il appelle le fichier erreurCo.php situé dans views/erreurCo.php qui renvoie un simple message d'erreur.
*/
function controleCo(){
$lignes = testConnexion();
$verif = VerifDate();
	if($lignes[0] && $verif == true){
		$_SESSION['login'] = $_POST['txtLogin'];
			$_SESSION['mdp'] = $_POST['txtMdp'];
			$_SESSION['idVisiteurs'] = $lignes[0];
			$_SESSION['nom'] = $lignes[1];
			$_SESSION['prenom'] = $lignes[2];
			$_SESSION['adresse'] = $lignes[3];
			$_SESSION['cp'] = $lignes[4];
			$_SESSION['ville'] = $lignes[5];
			$_SESSION['dateEmbauche'] = $lignes[6];
			$connecte = true;

			require"../gestfrais/views/tableauAdmin.php";
	}
	elseif($lignes[0] && $verif == false){
			require"../gestfrais/views/VerifMdpSup30Vue.php";
	}
	else{
		echo "Erreur dans la méthode controleCo() de conBDD.php";
	}
}


function controleMdpDate(){
	
	
		
}


//Affiche le tableau d'administration qui permet d'ajouter, supprimer...
/*
--> Création de la fonction tableauAdmin()
--> Va chercher le fichier tableauAdmin.php qui sert à afficher le tableau d'administration
*/
function tableauAdmin(){
	require "/gestfrais/views/tableauAdmin.php";
}

/*
--> Création de la fonction inscription()
--> Va chercher le fichier inscritpionGSB.php qui va afficher le formulaire d'inscription
*/
function inscription(){
	require "/gestfrais/views/inscriptionGSB.php";
}


/*
--> Création de la fonction testConnect()
--> Récupère la fonction bdd() présente dans models/modele.php qui sert à se connecter à la base de donnée
--> Vérifier si cette fonction ne correspond pas à la fonction utilisé plus haut nommé controleCo() qui utilise une fonction nommé testConnexion()
*/
function testConnect(){
	bdd();
}

/*
--> Création de la fonctino envoyer()
--> A pour but de récupérer la fonction envoyerGSB() présente dans models/modele.php
--> Est appelé dans index.php en cas d'ajout d'un visiteur 
--> Est utilisé pour les formulaires : ajouter un visiteur, inscription
*/
function envoyer(){
	envoyerGSB();
}


					/*
					##################################
					##################################
					########## VISITEURS #############
					##################################
					##################################
					*/


/*
FONCTION GROUPE VISITEURS 

--> consVisiteurs() qui récupère la fonction consulterVisiteurs() présente dans models/modele.php
	--> Utilisé dans le fichier www/view/Consulter/consulterVisiteurs.php. 
--> Création de la fontion ajoutVisiteurs() qui récupère la fonction ajouterVisiteurs() présente dans models/modele.php
--> Création de la fonction modifVisiteurs() qui récupère la fonction modifierVisiteurs() présente dans models/modele.php
--> Création de la fonction suppVisiteurs() qui récupère la fonction supprimerVisiteurs() présente dans models/modele.php
*/
function consVisiteurs(){
	consulterVisiteurs();
}
function ajoutVisiteurs(){
	ajouterVisiteurs();
}
function modifVisiteurs(){
	modifierVisiteurs();
	
}
function suppVisiteurs(){
	supprimerVisiteurs();
}


					/*
					##################################
					##################################
					############ FRAIS ###############
					##################################
					##################################
					*/

/*
FONCTION GROUPE FRAIS 

--> conFrais() récupère la fonction consulterFrais() présente dans models/modele.php
--> ajoutFrais() récupère la fonction ajouterFrais() présente dans models/modele.php
	--> Utilisé dans index.php, une fois que les champs retourner par la méthode POST on bien été vérifié
	--> Appel la fonctione ajouterFrais() définit dans www/models/modele.php
--> modifFrais() récupère la fonction modifierFrais() présente dans models/modele.php
--> suppFrais() récupère la fonction supprimerFrais() présente dans models/modele.php
*/

function conFrais(){
	consulterFrais();
}
function ajoutFrais(){
	ajouterFrais();
}
function modifFrais(){
	modifierFrais();
}
function suppFrais(){
	supprimerFrais();
}

					/*
					##################################
					##################################
					############### ETAT #############
					##################################
					##################################
					*/
				
/*
FONCTION GROUPE ETAT 

--> Création de la fonction conEtat() qui récupère la fonction consulterEtat() présente dans models/modele.php
--> Création de la fonction ajoutEtat() qui récupère la fonction ajouterEtat() présente dans models/modele.php
--> Création de la fonction modifEtat() qui récupère la fonction modifierEtat() présente dans models/modele.php
--> Création de la fonction suppEtat() qui récupère la fonction supprimerEtat() présente dans models/modele.php
*/

function conEtat(){
	consulterEtat();
}
function ajoutEtat(){
	ajouterEtat();
}
function modifEtat(){
	modifierEtat();
}
function suppEtat(){
	supprimerEtat();
}
?>