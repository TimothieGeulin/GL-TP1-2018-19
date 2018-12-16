<!doctype html>
<html>
<head>
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <title>Suppression</title>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		
</head>
	<body>
		<div class="haut"></div>
		<p style="text-align: center;"><img src="logo_amu_rvb" style="width: 650px;height: 220px;"></p>
		<div class="login4" style="margin-top: 3%; text-align: center;" >
			<!-- Formulaire permettant de choisir quelle option on veut supprimer -->
    		<form name="DeleteOption" enctype="multipart/form-data" action="DeleteOptioni.php" method="post">
    		<p style="font-size: 20px;">Veuillez entrer le numéro de l'option à supprimer</p><br>
		        <input type="number" style="width: 15%;" id="numOption" step="1" value="0" min="0" name="numOption" required/>
		        <br>
		        <input class="envoyer" type="submit" name="submit" value="Supprimer cette option">
    		</form>
    		<br>
    		<br>
    		<!-- Formulaire permettant de supprimer l'ensemble des options et donc l'ensemble des tables de la BD -->
		    <form name="DeleteAll" enctype="multipart/form-data" action="DeleteAll.php" method="post">
		        <input class="envoyerd" type="submit" name="submit" value ="Supprimer l'intégralité des options">
		    </form>
		</div>
		<div class="footer" style="text-align: center; bottom: 0;"> Affectation des options 1</div>
	</body>
</html>


