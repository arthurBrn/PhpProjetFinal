<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, user-scalable=yes" />
		<meta charset="utf-8">
		<title>Supprimer frais forfait</title>
		<link rel="stylesheet" href="/gestfrais/views/protectGSB.css">
		<script src="script.js"></script>
		<link type="image/x-icon" href="logoGSB.JPG" rel="icon"/>
		<style type="text/css"> a:link { text-decoration:none; } </style>
			<script language = "javascript" type="text/javascript">
				function verif_formulaire(){
					if((document.frmFormulaire.idFraisForfait.value != "")){
						return true;
					}
					else{
						alert("Vous devez remplir tous les champs ! ");
							document.frmFormulaire.idFraisForfait.focus();
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
		<h6>Supprimer frais forfait</h6>
			<div id="form">
				<fieldset>
					<form name="frmFormulaire" action="../../index.php" method=POST onSubmit="return verif_formulaire()">
						<p>Saisir le numéro du frais que vous souhaitez supprimer</p>
							<input type="text" name="idFraisForfait"></input>
							</br></br>
								<input type="submit" value="Supprimer"></input>
								<input type="reset" value="Annuler"></input>
					</form>
				</fieldset>
			</div>
		</br>
	</body>
</html>