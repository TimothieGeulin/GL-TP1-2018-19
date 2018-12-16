<!doctype html>
<html>
<head>
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <title>Formulaire</title>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		
</head>

<body>
<div class="haut"></div>
<p style="text-align: center;"><img src="logo_amu_rvb" style="width: 650px;height: 220px;"></p>
	<div class="login3" style="text-align: center; margin-top: 2%;">
		<p style="font-size: 25px;"> Attention ! Le fichier importé doit avoir un format particulier : <br>
		1. Il doit être au format .csv <br>
		2. Les colonnes du csv doivent contenir les informations suivantes (en respectant cet ordre) :<br>
		- Nom de l'etudiant<br>
		- Prenom de l'etudiant<br>
		- Identifiant AMU de l'etudiant (premiere lettre du nom de famille suivit de 8 chiffres)<br>
		- Mail de l'etudiant <br>
		- La première ligne de chaque colonnes devra avoir un titre (Exemple : "nom" pour la colonne comprennant les noms)<br>
		3. Les étudiants redoublants ayant déjà validé une ou plusieurs options ne doivent pas être present dans le fichier .csv<br></p>
		<!-- permet de telecharger un exemple de CSV valide -->
		<a href="ExempleCSV.csv">Telecharger un exemple</a>
	<br>
	</p>
	<!-- Fomulaire permettant d'importer le CSV contenant toutes les informations des etudiants -->
	<form name="ImportCSV" enctype="multipart/form-data" action="updateBDCSV.php" method="post">
		<input style="margin-top: 2%;" type="file" name="csvfile" required="required" accept=".csv"/><br>
		<input class="envoyer" type="submit"/>

		</form>
	</div>
<div class="footer" style="text-align: center;"> Affectation des options 1</div>
</body>
</html>