<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, user-scalable=yes" />
		<meta charset="utf-8">
		<title>Ajouter frais </title>
		<link rel="stylesheet" href="/gestfrais/views/protectGSB.css">
		<script src="script.js"></script>
		<link type="image/x-icon" href="logoGSB.JPG" rel="icon"/>
		<style type="text/css"> a:link { text-decoration:none; } </style>
			<script language = "javascript" type="text/javascript">
				function verif_formulaire(){
					if((document.frmFormulaire.idFraisForfait.value != "") 
						&& (document.frmFormulaire.libelle.value != "") 
						&& (document.montant.prenom.value!="")){
						return true;
					}
					else{
						alert("Vous devez remplir tous les champs ! ");
							document.frmFormulaire.idFraisForfait.focus();
							document.frmFormulaire.libelle.focus();
							document.frmFormulaire.montant.focus();
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
		<h6>Ajouter des frais</h6>
		<div id="form">
			<fieldset>
				<form name="frmFormulaire" action="/gestfrais/index.php" method=POST onSubmit="return verif_formulaire()">
					<p>Numéro</p>
						<input type="text" name="idFraisForfait"></input>
						</br>
						
					<p>Libelle</p>
						<input type="text" name="libelle"></input>
						</br>
						
					<p>montant</p>
						<input type="number" name="montant"></input>
						</br></br>
							<input type="submit" value="Ajouter"></input>
							<input type="reset" value="Effacer"></input>
							</br>
				</form>
			</fieldset>
		</div>
	</body>
</html>