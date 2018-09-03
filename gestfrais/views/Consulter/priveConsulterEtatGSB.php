<?php
	require_once('/../../controller/conBDD.php');
?>

<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, user-scalable=yes" />
		<meta charset="utf-8">
		<title>Consulter etat</title>
		<link rel="stylesheet" href="../styleGSB.css">
		<script src="script.js"></script>
		<link type="image/x-icon" href="logoGSB.JPG" rel="icon"/>
		<style type="text/css"> a:link { text-decoration:none; } </style>
	</head>
	<body>
		<div id="class1">
			<a href="/gestfrais/views/indexVue.php">
				<h4>GSB<h4>
			</a>
		</div>
	<h5> - Etat - </h5>
		<?php
			conEtat();
		?>
	</body>
</html>