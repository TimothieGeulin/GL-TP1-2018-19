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
		<div class="login3" style="text-align: center; margin-top: 2%;"> 
			<!-- Un simple formulaire dans le quel on renseigne des information concernant l'etudiant qu'on est en train d'ajouter (nom,prenom,id...) -->
			<form name="ajoutEtu" enctype="multipart/form-data" action="actualiserBD.php" method="post">
				<p style="font-size: 20px;">Nom de famille</p>
				<input style="font-size: 20px;" onFocus="javascript:this.value=''" type="text" name="nom" value="Dupont"><br>
				<p style="font-size: 20px;">Prénom</p>
				<input style="font-size: 20px;" onFocus="javascript:this.value=''" type="text" name="prenom" value="Jean"><br>
				<p style="font-size: 20px;">Id étudiant</p>
				<input style="font-size: 20px;" onFocus="javascript:this.value=''" type="text" name="id"  value="d12345678"><br>
				<p style="font-size: 20px;">Mail</p>
				<input style="font-size: 20px;" onFocus="javascript:this.value=''" type="text" name="mail" value="xxxxx@etu.univ-amu.fr" required="required"><br>
				<p style="font-size: 20px;">Redoublant qui a validé une option</p>
				<p style="font-size: 20px;">(1 si oui 0 sinon)</p>
				<input style="font-size: 20px;" onFocus="javascript:this.value=''" type="number" name="valided" value="1" onkeypress="verifierCaracteres(event); return false;"><br>
				<p style="font-size: 20px;">Entrez l'option a laquelle ajouter cet etudiant</p>
				<input style="font-size: 20px;" onFocus="javascript:this.value=''" type="number" name="numOption" value="0"><br>
				  <br>

			  <input class="envoyer" type="submit" value="Envoyer">
			</form>
		</div>
		<div class="footer" style="text-align: center;"> Affectation des options 1</div>
	</body>
</html>

<script>
	
	function verifierCaracteres(event){ // Fonction qui permet de n'avoir que des chiffres dans notre formulaire.
          
      var keyCode = event.which ? event.which : event.keyCode;
      var touche = String.fromCharCode(keyCode);
          
      var champ = document.getElementById('mon_input');
          
      var caracteres = '01';
          
      if(caracteres.indexOf(touche) >= 0) {
        champ.value += touche;
      }      
    }
</script>