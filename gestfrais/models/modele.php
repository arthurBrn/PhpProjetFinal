<?php

//14h44

/*
--> Cette classe sert à faire le lien entre le controller et la base de données
--> Précision sur la classe : 
	--> Aucun insert ne présente de valeur à insérer pour la variable dateEmbauche car elle est fixer à now();
*/


// Test la bonne connexion à la base de donnée
/*
--> Création de la classe bdd()
	--> Se connecte à la base de données via méthode PDO stocker dans la variable $db
	--> Réalise une requête de tests pour se connecter à la base de donnée stocker dans la variable $sql_select
	--> $st se connecte à la base de données via la fonction $db créé au dessus puis prépare la requête en passant en paramètre la variable stockant la requête de test
	--> Execution de la requête $st
	--> $st->fetch(); va chercher le résultat de la requête $st-execute() au dessus et les stocks dans la variable $lignes
--> La fonction bdd() retourne la variables lignes
--> Renvoie une erreur si la connexion n'a pas aboutie  
*/
/*

--> Adresse IP serveur : 192.176.1.13
--> Identifiant serveur : slam
--> Mot de passe serveur : password 

*/

function bdd(){
	try{
		$db = new PDO('mysql:host=10.99.98.192;dbname=gsbv2;charset=utf8','GSBPHP','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$sql_select = "SELECT idVisiteurs, nom, prenom, adresse, cp, ville, dateEmbauche FROM visiteur WHERE login='".$_POST['txtLogin']."' AND mdp='".$_POST['txtMdp']."';";
			$st = $db->prepare($sql_select);
			$st->execute();
			$lignes = $st->fetch();
		return $lignes;
	}
	catch(Exceptions $e){
		die('Erreurs : ' . $e->getMessage());	
		return false;
	}
}

//Vérifie la date du mdp 
function verifDateForm(){
	$source = 'mysql:host=10.99.98.192;dbname=gsbv2';
	$utilisateur = 'GSBPHP';
	$mot_de_passe = '';
		$db = new PDO($source, $utilisateur, $mot_de_passe);
		$sql_select = "SELECT dateCreation FROM visiteur,mdp WHERE visiteur.idVisiteurs = mdp.idVisiteurs AND login='".$_POST['txtLogin']."' AND visiteur.mdp='".$_POST['txtMdp']."';";
			$st = $db->prepare($sql_select);
			$st->execute();
			$ResDate = $st->fetch();
	return $ResDate;	
}


function obtDate(){
		$dateJour = verifDateForm();
	
	$dateJour = new DateTime($dateJour[0]);
	return 	$dateJour;//->format('Y-m-d');;
	
}


function VerifDate(){

	$dateD = obtDate();

	date_add($dateD, date_interval_create_from_date_string('30 days'));
//echo date_format($dateD, 'Y-m-d');
//echo date_format(obtDate(), 'Y-m-d');

	if(date_add(obtDate(), date_interval_create_from_date_string('31 days')) < $dateD ){
	
		return false;
	}
	
	else{
		return true;
	}
}






/*
--> Création de la fonction testConnexion()
	--> La fonction se connecte à la base de données 
	--> Réalise une requête de test 
	--> retourne $lignes
*/
function testConnexion(){
	$source = 'mysql:host=10.99.98.192;dbname=gsbv2';
	$utilisateur = 'GSBPHP';
	$mot_de_passe = '';
		$db = new PDO($source, $utilisateur, $mot_de_passe);
		$sql_select = "SELECT idVisiteurs, nom, prenom, adresse, cp, ville, dateEmbauche FROM visiteur WHERE login='".$_POST['txtLogin']."' AND mdp='".$_POST['txtMdp']."';";
			$st = $db->prepare($sql_select);
			$st->execute();
			$lignes = $st->fetch();
	return $lignes;
}


/*
--> Création de la fonction envoyerGSB()
--> Est utiliser dans la formulaire inscription présent dans /views/inscriptionGSB.php en tant que action
	--> Se connecte à la base de données 
	--> prépare la requête d'insertion dans la base de données
	--> exécute la requête d'insertion dans la base de données
*/
function envoyerGSB(){
	try{
		$db = new PDO('mysql:host=10.99.98.192;dbname=gsbv2;charset=utf8','GSBPHP','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exceptions $e){
		die('Erreurs : ' . $e->getMessage());
		return false;
	}

	$req = $db->prepare('INSERT INTO Visiteur(idVisiteurs, nom, prenom, login, mdp, adresse, cp, ville, dateEmbauche) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())');
	$req->execute(array(
		$_POST['idVisiteurs'],
		$_POST['nom'],
		$_POST['prenom'],
		$_POST['login'],
		$_POST['mdp'],
		$_POST['adresse'],
		$_POST['cp'],
		$_POST['ville']));
}




					/*
					##################################
					##################################
					########## VISITEURS #############
					##################################
					##################################
					*/







/*
--> Création de la requête consulterVisiteurs()
	--> Déclaration d'une balise titre h5
	--> Création variable $reponse dans laquelle on réalise une connexion à la base grâce à $bdd puis on insert une requête de sélection de données
	--> Déclaraiton d'une boucle while dans un if qui ne s'exécute qui si $reponse est vrai. Le while exécute alors la requête $reponse
	--> Déclaration d'un tablau 
	--> Stock et affiche via la variable $donnee toutes les valeurs présentes dans la base dans le tableau
	--> Sinon renvoie un message d'erreur 
*/

function consulterVisiteurs(){
	try{
		$bdd = new PDO('mysql:host=10.99.98.192;dbname=gsbv2;charset=utf8','GSBPHP','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exceptions $e){
		die('Erreurs : ' . $e->getMessage());
			echo"Erreur connexion dans la méthode consulterVisiteurs dans modele.php";
		return false;
	}
	?>
	<h5> - Liste visiteurs - </h5>
	<?php
		$reponse = $bdd->query('SELECT UPPER(nom) as nom_Maj, idVisiteurs, prenom, login, mdp, adresse, cp, ville, dateEmbauche, session_id FROM visiteur');
		if($reponse){
			while($donnee = $reponse->fetch()){
	?>
				<table colspan = 2>
					<tr>
						<th>Numéro :</th>
						<td><?php echo $donnee['idVisiteurs'];?></td>
					</tr>
					<tr>
						<th>Nom :</th>
						<td><?php echo $donnee['nom_Maj']; ?></td>
					</tr>
					<tr>
						<th>Prénom :</th>
						<td> <?php echo $donnee['prenom']; ?></td>
					</tr>
					<tr>
						<th>Login :</th>
						<td><?php echo $donnee['login']; ?></td>
					</tr>
					<tr>
						<th>Mot de passe :</th>
						<td><?php echo $donnee['mdp']; ?> </td>
					</tr>
					<tr>
						<th>Adresse :</th>
						<td><?php echo $donnee['adresse']; ?></td>
					</tr>
					<tr>
						<th>Code postale :</th>
						<td><?php echo $donnee['cp'];?></td>
					</tr>
					<tr>
						<th>Ville :</th>
						<td><?php echo $donnee['ville'];?></td>
					</tr>
					<tr>
						<th>Date de l'embauche :</th>
						<td><?php echo $donnee['dateEmbauche'];?></td>
					</tr>
					<tr>
						<th>Numéro de session :</th>
						<td><?php echo $donnee['session_id'];?></td>
					</tr>
				</table>
	<p>____________________________________________________________________________________________________________________________________________________</p>
	<p>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - </p>
	<p>______________________________________________________________________________________</p>
	<?php
			}		

		}		
		else{
			echo "Aucune donnée enregistrer";
		}
}








/*
--> Création de la requête ajouterVisiteurs()
--> Cette fonction devrait servir dans le formulaire de priveAjouterVisiteursGSB.php placé dans /views/ajouter mais ne semble pas y être 
	--> Connexion à la base de données stocker dans la variable $db. Renvoie faux si la connexion n'a pas aboutie
	--> Création d'un if avec vérification de champ non null grâce à la fonction isset. Récupération des données renvoyé d'un formulaire via la variables $_POST 
	--> $req permet de stocker la préparation de la requête d'insertion à la base de données
	--> Puis exécution de la requête d'insetion à la base de données 
*/
function ajouterVisiteurs(){
	try{
		$db = new PDO('mysql:host=10.99.98.192;dbname=gsbv2;charset=utf8','GSBPHP','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exceptions $e){
		die('Erreurs : ' . $e->getMessage());
	
		return false;
	}
	
	if(isset($_POST['idVisiteurs']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['login']) && isset($_POST['mdp']) && isset($_POST['adresse']) && isset($_POST['cp']) && isset($_POST['ville'])){
		
		$req = $db->prepare('INSERT INTO Visiteur(idVisiteurs, nom, prenom, login, mdp, adresse, cp, ville, dateEmbauche) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())');
			
		$req->execute(array(
			$_POST['idVisiteurs'],
			$_POST['nom'],
			$_POST['prenom'],
			$_POST['login'],
			$_POST['mdp'],
			$_POST['adresse'],
			$_POST['cp'],
			$_POST['ville']));
	}
}







/*
--> Création de la requête modifierVisiteurs()
	--> Connection à la base de données stocker dans la variable $db. Renvoie une erreur si la connexion à échoué
	--> Prépare la requête de mise à jour des données d'un visiteur dans la base de données stocker dans $modif
	--> Exécution de la requête stocké dans $modif
*/
function modifierVisiteurs(){

	try{
		$db = new PDO('mysql:host=10.99.98.192;dbname=gsbv2;charset=utf8','GSBPHP','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exceptions $e){
		die('Erreurs : ' . $e->getMessage());
	
		return false;
	}

	$modif = $db->prepare('UPDATE visiteur SET nom = ?, prenom = ?, login = ?, mdp = ?, adresse = ?, cp = ?, ville = ?, dateEmbauche = NOW() WHERE idVisiteurs = ?');
		$modif->execute(array(
			$_POST['nom'],
			$_POST['prenom'],
			$_POST['login'],
			$_POST['mdp'],
			$_POST['adresse'],
			$_POST['cp'],
			$_POST['ville'],
			$_POST['idVisiteurs']
		));
} 








/*
--> Création de la requête supprimerVisiteurs()
	--> Connexion à la base de données stocké dans la variable $db. Renvoie une erreur sinon
	--> Prépare la requête de suppression d'un visiteur à la base de données dans la variable $req
	--> Execute la requête stocké dans $req en récupérant l'id du visiteur que l'utilisateur souhaite modifier
*/
function supprimerVisiteurs(){
	try{
		$bdd = new PDO('mysql:host=10.99.98.192;dbname=gsbv2;charset=utf8','GSBPHP','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exceptions $e){
		die('Erreurs : ' . $e->getMessage());
	
		return false;
	}
	
	
$req = $bdd->prepare('DELETE FROM visiteur WHERE idVisiteurs = ?');
	$req->execute(array(
		$_POST['idVisiteurs']));
}






					/*
					##################################
					##################################
					############ FRAIS ###############
					##################################
					##################################
					*/

/*
--> Création de la fonction consulterFrais()
	--> Connexion à la base de données stocké dans la variable $db. Renvoie une erreur si la connexion à échoué 
	--> Préparation de la requête de sélection des données de la table fraisForfait suivant le mois et le visiteur souhaité
	--> Exécution de la requête de sélection 
	
	--> Des erreurs sont présentes dans cette fonction, et elle n'est pas terminé.
*/
function consulterFrais(){
	try{
		$bdd = new PDO('mysql:host=10.99.98.192;dbname=gsbv2;charset=utf8','GSBPHP','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exceptions $e){
		die('Erreurs : ' . $e->getMessage());
			echo"Erreur connexion dans la méthode consulterVisiteurs dans modele.php";
		return false;
	}
	?>
	<h5> - Liste des frais - </h5>
	<?php
		$reponse = $bdd->query('SELECT idFraisForfait, libelle, montant FROM fraisforfait');
		if($reponse){
			while($donnee = $reponse->fetch()){
	?>
				<table colspan = 2>
					<tr>
						<th>Numéro frais :</th>
						<td><?php echo $donnee['idFraisForfait'];?></td>
					</tr>
					<tr>
						<th>Libelle :</th>
						<td><?php echo $donnee['libelle']; ?></td>
					</tr>
					<tr>
						<th>Montant :</th>
						<td> <?php echo $donnee['montant']; ?></td>
					</tr>
				</table>
	<p>____________________________________________________________________________________________________________________________________________________</p>
	<p>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - </p>
	<p>______________________________________________________________________________________</p>
	<?php
			}		

		}		
		else{
			echo "Aucune donnée enregistrer";
		}
}


/*
--> Création de la fonction ajouterFrais()
	--> Connexion à la base de données stocké dans la variable $db. Renvoie une erreur si la connexion à échoué 
	--> Préparation de la requête d'insertion stocké dans la variable $req
	--> Exécution de la requête d'insertion
*/
function ajouterFrais(){
	try{
		$db = new PDO('mysql:host=10.99.98.192;dbname=gsbv2;charset=utf8','GSBPHP','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exceptions $e){
		die('Erreurs : ' . $e->getMessage());
		return false;
	}

	if(isset($_POST['idFraisForfait']) && 
		isset($_POST['libelle']) && 
		isset($_POST['montant']))
		{
			echo"ok";
		$req = $db->prepare('INSERT INTO fraisforfait(idFraisForfait, libelle, montant) VALUES (?, ?, ?)');
		$req->execute(array(
			$_POST['idFraisForfait'],
			$_POST['libelle'],
			$_POST['montant']));
	}
}


//10.99.98.192




	
	
	
	
	
/*
--> Création de la requête modifierFrais()
	--> Connexion à la base de données stocké dans la variable $db. Renvoie un message d'erreur si la connexion à échoué 
	--> Préparation de la requête de mise à jour d'une des lignes de la table fraisforfait stocké dans la variable $modif
	--> Exécution de la requête $modif
*/


	
function modifierFrais(){
	
	try{
		$db = new PDO('mysql:host=10.99.98.192;dbname=gsbv2;charset=utf8','GSBPHP','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exceptions $e){
		die('Erreurs : ' . $e->getMessage());
	
		return false;
	}
	
	if(isset($_POST['libelle']) && isset($_POST['montant']) && isset($_POST['idFraisForfait']) && isset($_POST['modifFraisHidden'])){
$modif = $db->prepare('UPDATE fraisforfait SET libelle = ?, montant = ? WHERE idFraisForfait = ?');
	$modif->execute(array(
		$_POST['libelle'],
		$_POST['montant'],
		$_POST['idFraisForfait']
	));
}
}


/*
--> Création de la variable supprimerFrais()
	--> Connexion à la base de données stocké dans la variable $db. Renvoie un message d'erreur si la connexion  à échoué 
	--> Prépare la requête de suppresion en fonction de l'id rentré par l'utilisateur. Stocké dans la variable $req
	--> Récupère l'id du frais à supprimer et execute la requête
*/
function supprimerFrais(){
	try{
		$db = new PDO('mysql:host=10.99.98.192;dbname=gsbv2;charset=utf8','GSBPHP','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exceptions $e){
		die('Erreurs : ' . $e->getMessage());
	
		return false;
	}
	$req = $db->prepare('DELETE FROM fraisforfait WHERE idFraisForfait = ?');
		$req->execute(array(
			$_POST['idFraisForfait']));
}



					/*
					##################################
					##################################
					############### ETAT #############
					##################################
					##################################
					*/


/*
--> La fonction consulterEtat() est appelé par la fonction conEtat() dans conBDD().
	--> La fonction conEtat() est, elle, appeler dans le fichier www/views/Consulter/priveConsulterEtatGSB.php.
	--> But : va chercher l'ensemble des données de chaque état et les retourne dans un tableau.
	
--> Explication du code :

--> Création de la fonction consultEtat()
	--> Connexion à la base de données stocké dans la variable $db. Renvoie un message d'erreur si la connexion à échoué.
	--> Prépare la requête de sélection des informations de la table etat. Stocké dans la variable $reponse.
	--> Exécute la requête $réponse à travers un while qui affiche toutes les informations renvoyé dans un tableau.
*/ 
function consulterEtat(){
try{
		$bdd = new PDO('mysql:host=10.99.98.192;dbname=gsbv2;charset=utf8','GSBPHP','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exceptions $e){
		die('Erreurs : ' . $e->getMessage());
	
		return false;
	}
 
$reponse = $bdd->query('SELECT * FROM Etat');
	while($donnee = $reponse->fetch()){
		?>
			<table colspan = 2>
				<tr>
					<th>Numéro : </th>
						<td><?php echo $donnee['idEtat'];?></td>
					</th>
				</tr>
				<tr>
					<th>Libelle : </th>
						<td><?php echo $donnee['libelle'];?></td>
				</tr>
			</table>
			
	<p>____________________________________________________________________________________________________________________________________________________</p>
	<p>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - </p>
	<p>______________________________________________________________________________________</p>	
	<?php
	}
}

/*
--> Création de la fonction ajouterEtat()
	--> Connexion à la base de données stocké dans $db. Renvoie un message d'erruer si la connexion à échoué 
	--> Prépare la requête d'insertion des données de l'état à ajouter dans la base. Stocker dans la variable $req 
	--> Exécute la variable $req

*/
function ajouterEtat(){
	try{
		$db = new PDO('mysql:host=10.99.98.192;dbname=gsbv2;charset=utf8','GSBPHP','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exceptions $e){
		die('Erreurs : ' . $e->getMessage());
		return false;
	}
	if(isset($_POST['idEtat']) && isset($_POST['libelle']) && isset($_POST['AjoutEtat'])){
		$req = $db->prepare('INSERT INTO Etat(idEtat, libelle) VALUES (?, ?)');
			$req->execute(array(
				$_POST['idEtat'],
				$_POST['libelle']));
	}
}


/*
--> Création de la variable modifierEtat()
	--> Connexion à la base de données stocké dans $db. Renvoie un message d'erreur si la connexion à échoué 
	--> Prépare la requête de mise à jour de la table etat en fonction de l'id de l'état à modifier rentré par l'utilisateur. Stocké dans la variable $modif
	--> Execution de la variable $modif
*/



function modifierEtat(){
	try{
		$db = new PDO('mysql:host=10.99.98.192;dbname=gsbv2;charset=utf8','GSBPHP','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exceptions $e){
		die('Erreurs : ' . $e->getMessage());
		return false;
	}	
	if(isset($_POST['idEtat']) && isset($_POST['libelle']) && isset($_POST['modifEtatHidden'])){
			$modif = $db->prepare('UPDATE etat SET libelle = ? WHERE idEtat = ?');
			$modif->execute(array(
				$_POST['libelle'],
				$_POST['idEtat']));
	}
}


/*
--> Création de la varibale supprimerEtat()
	--> Connexion à la base de données stocké dans la variable $db. Renvoie un message d'erreur si la connexion à échoué
	--> Préparation de la requête de suppression d'un état en fonction de l'id rentré par l'utilisateur. Stocké dans la variable $req.
	--> Exécution de la variable $req.
*/
function supprimerEtat(){
	try{
		$db = new PDO('mysql:host=10.99.98.192;dbname=gsbv2;charset=utf8','GSBPHP','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exceptions $e){
		die('Erreurs : ' . $e->getMessage());
	
		return false;
	}
	if(isset($_POST['idEtat']) && isset($_POST['SupEtat'])){
	$req = $db->prepare('DELETE FROM etat WHERE idEtat = ?');
		$req->execute(array(
			$_POST['idEtat']));
	}
}

?>





