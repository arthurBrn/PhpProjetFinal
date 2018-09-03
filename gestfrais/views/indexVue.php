<?php 
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, user-scalable=yes" />
		<meta charset="utf-8">
		<title>Accueil</title>
		<link rel="stylesheet" href="/gestfrais/views/styleGSB.css">
		<script src="script.js"></script>
		<link type="image/x-icon" href="logoGSB.JPG" rel="icon"/>
		<style type="text/css"> a:link { text-decoration:none; } 	</style>
	</head>
	<body>
		<div id="class1">
			<a href="indexVue.php">
				<h4>GSB  <h4>
			</a>
		</div>	
		<ul>
			<li>
				<a href="/gestfrais/index.php?etat=connex">
					<p>Connexion</p>
				</a>
			</li>
			<li>
				<a href="/gestfrais/views/inscriptionGSB.php?etat=nouveau">
					<p>Inscription</p>
				</a>
			</li>
		</ul>
		</br></br></br></br>
		
	</body>
</html>