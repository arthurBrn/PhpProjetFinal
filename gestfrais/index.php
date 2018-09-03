<?php 

/*
# Clarification de certaines fonctions #
--> isset() permet de vérifier qu'une variable est définit (qu'elle existe) et permet de vérifier qu'elle n'est pas null
*/


/*
--> Utilisation de la fonction require permettant d'inclure le contenu d'un fichier dans celui ou il est appelé.
--> 'require "/controller/conBDD.php"' donne accès aux fonctions présentes dans le fichier conBDD.php
*/
require "../gestfrais/controller/conBDD.php";
//require "/gestfrais/controller/conBDD.php";



/*
--> La condition if ici, vérifie que les données reçu par la méthode POST soient non null
	--> Si elles sont non null, la fonction testConnect() est appelée
		--> testConnect() est présent dans /controller/conBDD.php 
		--> Sert à appeler la fonction bdd(); qui est présente dans models/modele.php
		--> La fonction bdd(); permet de vérifier si un utilisateur est déjà connecté ou non.
	--> Sinon
		--> Condition if permettant de vérifier que le contenu de la valeur qu'il examine est non null grâce à la fonction isset puis vérifie si etat est égale à condition 		
		--> Condition if vérifie si la valeur de etat est égale à connexion, si c'est le cas cela signifie que l'utilisateur est déjà connecté et le renvoie donc à la page de connexion
			--> La fonction connexion() est présente dans /controller/conBDD.php sert à appeler le fichier "/views/connexionGSB.php"; grâce à un require.
			--> La valeur de etat est utilisé ligne 25 du fichier /views/indexVue.php
		--> Sinon, appel de la fonction acceui() pour renvoyer le visiteur à l'accueil 
		--> Fonction accueil() présente dans controller/conBDD.php fait appel à "/views/indexVue.php" grâce à la fonction require 
*/
/*if((isset($_POST["txtLogin"]))&& (isset($_POST["txtMdp"]))){
	testConnect();

}
else if((isset($_POST["txtLogin"])) &&  (isset($_POST['textMdp']))){
		if((isset($_POST["frmFormulaire"]))&&($_POST["frmFormulaire"] == "connexion")){
			tableauAdmin();
		}
		else if((isset($_POST["frmFormulaire"]))&&($_POST["frmFormulaire"] == "deco")){
			accueil();
		}
		else{
			connexion();
		}

}
*/



if(isset($_POST['nom']) 
			&& isset($_POST['prenom']) 
			&& isset($_POST['login']) 
			&& isset($_POST['mdp']) 
			&& isset($_POST['adresse']) 
			&& isset($_POST['cp']) 
			&& isset($_POST['ville']) 
			&& isset($_POST['idVisiteurs']) 
			&& isset($_POST['modifVisiteurHidden'])){	modifVisiteurs();			}
else if((isset($_POST['idVisiteurs'])) 
			&& (isset($_POST['nom'])) 
			&& (isset($_POST['prenom'])) 
			&& (isset($_POST['login'])) 
			&& (isset($_POST['mdp'])) 
			&& (isset($_POST['adresse'])) 
			&& (isset($_POST['cp'])) 
			&& (isset($_POST['ville']))){	envoyer();}
			//Ici on va vérifier que le mdp ne correspond pas aux 5 mdp précédent 
else if((isset($_POST['txtLogin'])) && (isset($_POST['txtMdp'])) && (isset($_POST['txtMdp2']))){controleMdpDate();}

			//Ici on va vérifier que le mdp rentrer n'ai pas une date superier ou égale à 30 jours 
else if((isset($_POST['txtLogin'])) && (isset($_POST['txtMdp']))){	controleCo(); }
else if((isset($_GET['etat'])) && ($_GET['etat'] == 'connex')){	connexion(); }
else{	accueil();}



	

/*
--> Cette conditions if sert pour le formulaire d'inscription
	--> Vérification de l'existance des variables réçu via méthode POST + on vérifie que les variables ne sont pas null
	--> Si le if est vérifié
		--> Appel de la fonction envoyer() présente dans /controller/conBDD.php qui fait elle même appel à la fonction envoyerGSB() présente dans /models/modele.php
		--> envoyerGSB() présente dans /models/modele.php est utilisé dans le formulaire d'inscription et est utilisé pour insérer les valeurs du formulaire dans la base de donnée 
		--> Puis appel de la fonction ajoutVisiteursReussi() présent dans /controller/conBDD.php et qui appel "/views/ajoutVisiteursReussi.php"; grâce à la fonction require
		--> Affiche une vue indiquant l'ajout avec succès d'un nouvelle utilisateur 
*/

	



//Pour la page connexion 
/*
-->Déclaration d'une variable $connecte de type boolean initialiser à false
-->try 
	--> Si la valeur deconnexion est existante et déclaré, n'est pas null et est égale à déconnexion
	--> Création et destruction de la connexion pour remettre les conteurs à 0
	
	--> Sinon si les valeurs login et mdp rentrer par utilisateur sont existantes et non null on applle la fonction controleCo()
		--> déclaré dans /controller/conBDD.php
			--> controleCo() peremt de vérifier la connexion à la base de donnée 
			--> controleCo() permet de stocker les informations de l'utilisateur qui se connecte dans des variables
			--> controleCo() permet de changer la valeur de $connecte à true 
		
	--> Sinon 
		--> renvoie d'un message d'erreur
		--> Réinitialisation de toutes les variables à null.
		
	--> Si le try ne marche pas on affiche un message d'erreur à l'utilisateur via le catch	
*/

/*
$connecte = false;
try{
	if(isset($_POST['deconnexion']) && $_POST['deconnexion'] == "Deconnexion"){
		session_start ();
		session_unset ();
		session_destroy ();
	}
	/*else if(isset($_POST['txtLogin']) && isset($_POST['txtMdp']) && $_POST['txtLogin']!="" && $_POST['txtMdp']!="") {	
		controleCo();
		}			
}

catch(Exception $e){
	die('Erreurs : ' . $e->getMessage());
}*/

					/*
					##########################
					########## ETAT ##########
					##########################
					*/
					
if(isset($_POST['libelle']) && isset($_POST['idEtat']) && isset($_POST['modifEtatHidden'])){
	modifEtat();
}
else if(isset($_POST['idEtat']) && isset($_POST['libelle']) && isset($_POST['AjoutEtat'])){
	ajoutEtat();
}
else if(isset($_POST['idEtat']) && isset($_POST['SupEtat'])){
	suppEtat();
}




					/* 
					###############################
					########## VISITEURS ##########
					###############################
					*/ 
if(isset($_POST['idVisiteurs'])){
	suppVisiteurs();
}
if(isset($_POST['idVisiteurs']) && ($_POST['idVisiteurs'] != null) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['login']) && isset($_POST['mdp']) && isset($_POST['adresse']) && isset($_POST['cp']) && isset($_POST['ville'])){
	ajoutVisiteurs();
}



					/* 
					###############################
					########## FRAIS ##########
					###############################
					*/ 
  


if(isset($_POST['libelle']) && isset($_POST['montant']) && isset($_POST['idFraisForfait']) && isset($_POST['modifFraisHidden'])){
	modifFrais();
}
else if(isset($_POST['idFraisForfait']) && isset($_POST['libelle']) && isset($_POST['montant'])){
	ajoutFrais();
}
 
else if(isset($_POST['idFraisForfait'])){
	suppFrais();
}




?>