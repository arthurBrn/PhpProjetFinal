<html>
	<head>
		<meta name="viewport" content="width=device-width, user-scalable=yes" />
		<meta charset="utf-8">
		<title>Modifier frais forfait</title>
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
		<h6>Quel frais souhaitez vous modifier ?</h6>
			<div id="form">
				<fieldset>
					<form name="frmFormulaire" action="../../index.php" method=POST onSubmit="return verif_formulaire()">
						<p>Numéro du frais que vous souhaitez modifier : </p>
							<input type="text" name="idFraisForfait"></input>
							</br>
						
						<p> Modifier les données du frais :</p>
							</br>	
					
						<p>Libelle</p>
							<input type="text" name="libelle"></input>
							</br>
					
						<p>Montant</p>
							<input type="number" name="montant"></input>
							</br>
							
							<input type="hidden" name="modifFraisHidden"></input>
							</br></br>
								<input type="submit" value="Modifier"></input>
								<input type="reset" value="Annuler"></input>
					</form>
				</fieldset>
			</div>
	</body>
</html>