<!doctype html>
<html>
<head>
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <title>Ajout</title>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		
</head>
	<body>
		<div class="haut"></div>
			<p style="text-align: center;"><img src="logo_amu_rvb" style="width: 650px;height: 220px;"></p>
			<div class="encadrer">
			<form method="POST" id="form2" action="/site/enseignant/envoiMail2.php"> 
				<input type="email" name="mail" id="mail" value="mail-de-la-scolarite@mail.fr" style="width: 100%; height: 20px;">
				<input  name="objet" id="objet" value="Objet du mail" style="width: 100%; height: 20px;">
				<br><br>
				<textarea  name="Text1" cols="1000" rows="5" id="text" style="width: 100%; height: 200px;">Bonjour, Voici le résultat des affectations. Bien cordialement, Monsieur Dupont</textarea><br>
				                                                             
				<input class="envoyer" style="width: 100%; text-align: center;" type="submit" name="submit">
			</form>
		</div>
		
		<div class="footer" style="text-align: center; bottom: 0;"> Affectation des options 1</div>
	</body>
</html>