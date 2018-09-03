<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, user-scalable=yes" />
		<meta charset="utf-8">
		<title>Supprimer visiteurs</title>
		<link rel="stylesheet" href="/gestfrais/views/protectGSB.css">
		<script src="script.js"></script>
		<link type="image/x-icon" href="logoGSB.JPG" rel="icon"/>
		<style type="text/css"> a:link { text-decoration:none; } </style>
		<script language = "javascript" type="text/javascript">
			function verif_formulaire(){
				if((document.frmFormulaire.idVisiteurs.value != "")){
					return true;
				}
				else{
					alert("Vous devez remplir tous les champs ! ");
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
		<h6>Supprimer visiteurs</h6>
		<?php 
			/*
				--> Renvoie les données entré par l'utilisateur dans le formulaire vers la fichier index.php qui se trouvent à la racine  grâce à la méthode POST
				--> Appele deux méthodes : 
					suppVisiteurs(); --> Active la suppression des données correspondant au numéro du visiteurs rentré
					supprVisiteursReussi(); --> Renvoie un message confirmant la suppression du visiteur.
			*/
		?>
		<div id="form">
			<fieldset>
				<form name="frmFormulaire" action="/gestfrais/index.php" method=POST onSubmit="return verif_formulaire()">
					<p>Saisir le numéro du visiteur que vous souhaitez supprimer</p>
						<input type="text" name ="idVisiteurs" id="idVisiteurs" ></input>
						</br></br>
							<input type="submit" value="Supprimer"></input>
							<input type="reset" value="Annuler"></input>
							</br>	
				</form>
			</fieldset>
		</div>
		
	</body>
</html>	