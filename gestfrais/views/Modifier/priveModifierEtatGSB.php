<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, user-scalable=yes" />
		<meta charset="utf-8">
		<title>Modifier etats</title>
		<link rel="stylesheet" href="/gestfrais/views/protectGSB.css">
		<script src="script.js"></script>
		<link type="image/x-icon" href="logoGSB.JPG" rel="icon"/>
		<style type="text/css"> a:link { text-decoration:none; } </style>
			<script language = "javascript" type="text/javascript">
				function verif_formulaire(){
					if((document.frmFormulaire.idEtat.value != "") 
						&& (document.frmFormulaire.libelle.value != "")){
					return true;
					}
					else{
						alert("Vous devez remplir tous les champs ! ");
							document.frmFormulaire.idEtat.focus();
							document.frmFormulaire.libelle.focus();
						return false;
					}
				}
			</script>
	</head>
	<body>
		<div id="class1">
			<a href="../indexVue.php">
				<h4>GSB<h4>
			</a>
		</div>
		<h6>Modifier etat</h6>
			<div id="form">
				<fieldset>
					<form name="frmFormulaire" action="/gestfrais/index.php" method=POST onSubmit="return verif_formulaire()">
						<p>Rentrer le numéro de l'etat que vous souhaitez modifier : </p>
							<input type="text" name="idEtat"></input>
							</br>
						
						<p>Libelle</p>
							<input type="text" name="libelle"></input>
							<input type="hidden" name="modifEtatHidden"></input>
							</br></br>
								<input type="submit" value="Modifier"></input>
								<input type="reset" value="Annuler"></input>
					</form>
				</fieldset>
			</div>
	</body>
</html>