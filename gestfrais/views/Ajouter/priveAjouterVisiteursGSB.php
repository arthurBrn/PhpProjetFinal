
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, user-scalable=yes" />
		<meta charset="utf-8">
		<title>Ajouter visiteurs</title>
		<link rel="stylesheet" href="/gestfrais/views/protectGSB.css">
		<link type="image/x-icon" href="logoGSB.JPG" rel="icon"/>
		<style type="text/css"> a:link { text-decoration:none; } </style>
			<script language = "javascript" type="text/javascript">
				function verif_formulaire(){
					if((document.frmFormulaire.idVisiteurs.value != "") 
						&& (document.frmFormulaire.nom.value != "") 
						&& (document.frmFormulaire.prenom.value!="")
						&& (document.frmFormulaire.login.value!="") 
						&& (document.frmFormulaire.mdp.value!="") 
						&& (document.frmFormulaire.adresse.value!="") 
						&& (document.frmFormulaire.cp.value!="")
						&& (document.frmFormulaire.ville.value!="")){
							return true;
					}
					else{
						alert("Vous devez remplir tous les champs ! ");
						document.frmFormulaire.idVisiteurs.focus();
						document.frmFormulaire.nom.focus();
						document.frmFormulaire.prenom.focus();
						document.frmFormulaire.login.focus();
						document.frmFormulaire.mdp.focus();
						document.frmFormulaire.adresse.focus();
						document.frmFormulaire.cp.focus();
						document.frmFormulaire.ville.focus();
						return false;
					}
				}
			</script>
	</head>
	<body>
		<div id="class1">
			<a href="/gestfrais/views/indexVue.php">
				<h4>GSB<h4>
			</a>
		</div>
			<h6>Ajouter visiteur </h6>
			<?php // Les données de ce formulaire seront envoyé via la méthode POST au fichier index.php, qui vérifiera leurs existance via isset() 
				  // puis appelera la méthode ajoutVisiteurs();?>
				<div id="form">
					<fieldset>
						<form name="frmFormulaire" action="/gestfrais/index.php" method=POST onSubmit="return verif_formulaire()">
							<p>Numéro</p>
								<input type="text" name="idVisiteurs" ></input>
								</br>
							
							<p>Nom</p>
								<input type="text" name="nom" ></input>
								</br>
					
							<p>Prenom</p>
								<input type="text" name="prenom" ></input>
								</br>
					
							<p>Login</p>
								<input type="text" name="login" ></input>
								</br>
				
							<p>Mot de passe</p>
								<input type="password" name="mdp" ></input>
								</br>
					
							<p>Adresse</p>
								<input type="text" name="adresse" ></input>
								</br>
						
							<p>Code postal</p>
								<input type="text" name="cp" ></input>
								</br>
					
							<p>Ville</p>
								<input type="text" name="ville" ></input>
								</br></br>
				
									<input type ="submit" value="Ajouter"></input>
									<input type="reset" value="Effacer" />
						</form>
					</fieldset>
				</div>
	</body>
</html>