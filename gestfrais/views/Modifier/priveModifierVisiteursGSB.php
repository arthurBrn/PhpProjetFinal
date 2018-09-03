<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, user-scalable=yes" />
		<meta charset="utf-8">
		<title>modifier visiteurs</title>
		<link rel="stylesheet" href="../protectGSB.css">
		<script src="script.js"></script>
		<link type="image/x-icon" href="logoGSB.JPG" rel="icon"/>
		<style type="text/css"> a:link { text-decoration:none; } </style>
			<script language = "javascript" type="text/javascript">
				function verif_formulaire(){
					if((document.frmFormulaire.nom.value != "") 
						&& (document.frmFormulaire.prenom.value!="")
						&& (document.frmFormulaire.login.value!="") 
						&& (document.frmFormulaire.mdp.value!="")
						&& (document.frmFormulaire.adresse.value!="")
						&& (document.frmFormulaire.cp.value!="")
						&& (document.frmFormulaire.ville.value!="")
						&& (document.frmFormulaire.idVisiteurs.value != "")){
						return true;
					}
					else{
						alert("Vous devez remplir tous les champs ! ");
							document.frmFormulaire.nom.focus();
							document.frmFormulaire.prenom.focus();
							document.frmFormulaire.login.focus();
							document.frmFormulaire.mdp.focus();
							document.frmFormulaire.adresse.focus();
							document.frmFormulaire.cp.focus();
							document.frmFormulaire.ville.focus();
							document.frmFormulaire.idVisiteurs.focus();
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

		<h6> Modifier visiteur</h6>
		
		<div id="form">
			<fieldset>
				<form name="frmFormulaire" action="/gestfrais/index.php" method=POST onSubmit="return verif_formulaire()">
							<p>Dans un premier temps rentrer les nouvelles données du visiteurs souhaité dans les chmaps ci-dessous</p>
							<p>Dans un second temps vous pourrez indiquer le numéro du visiteurs auquel doit s'appliquer ces modifications</p>
									</br>
							<p>Nom</p>
								<input type="text" name="nom"></input>
								</br>
						
							<p>Prenom</p>
								<input type="text" name="prenom"></input>
								</br>
						
							<p>Login</p>
								<input type="text" name="login"></input>
								</br>
						
							<p>Mot de passe</p>
								<input type="password" name="mdp"></input>
								</br>
						
							<p>Adresse</p>
								<input type="text" name="adresse"></input>
								</br>
						
							<p>Code postal</p>
								<input type="text" name="cp"></input>
								</br>
						
							<p>Ville</p>
								<input type="text" name="ville"></input>
								</br>
								
							<p>Numéro du visiteur que vous souhaitez modifier :</p>
								<input type="text" name="idVisiteurs"></input>
							
								<input type="hidden" name="modifVisiteurHidden"></input>
							</br></br>
					
								<input type ="submit" value="Modifier"></input>
								<input type="reset" value="Annuler" />
				</form>
			</fieldset>
		</div>
	</body>
</html>