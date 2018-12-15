<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<meta charset="UTF-8">
<TITLE>Initialisation des options</TITLE>
</head>
<body>

<style>



button{
	   	width:20%;
	    height: 10%;
	    background-color:#2ECCFA;
	    color:#fff;
	    border:2px solid #06F;
	    padding:20px;
	    font-size:20px;
	    cursor:pointer;
	    border-radius:5px;
	    margin-bottom:15px;
	    text-align: center; 
}

</style>
	<div class="haut"></div>
	<p style="text-align: center;"><a href="../../index.php" ><img src="logo_amu_rvb" style="width: 650px;height: 220px;"><br><br></p></a>
	
		
			<div class="login3" style="text-align: center; margin-top: 2%;">

			 <h1 style="font-size: 30px;">Création des options</h1>
		    <p style="font-size: 20px;">Dans cette partie vous allez pouvoir créer des options en entrant le nom de chaque UE, les effectifs, ainsi que le code de l'UE.<br>
		    </p>
		    <br>
		    <a href="/site/enseignant/CreateForm1.php"><button type="button">Initialisation des options</button></a>
		    <a href="/site/enseignant/DeleteOption.php"><button type="button">Supprimer une option</button></a>

		    <h1 style="font-size: 30px;">CSV</h1>
		    <p style="font-size: 20px;">Dans cette partie vous allez pouvoir importer le  fichier ".csv" contenant toutes les informations des étudiants.<br>
		    </p>
		    <br>
		    <a href="/site/enseignant/ImportCSV.php"><button type="button">Importer le csv</button></a>

			<h1 style="font-size: 30px;">Ajout manuel d'un étudiant</h1>
			<p style="font-size: 20px;">Il est possible d'ajouter manuellement un/des étudiant/s<br>
			</p>
			<br>
			<a href="/site/enseignant/AjoutManuelEtu.php"><button type="button">Ajout d'un etudiant</button></a>

			<h1 style="font-size: 30px;">Prévisualisation du formulaire</h1>
			<p style="font-size: 20px;">Une fois toutes les matiéres ajoutées à la base de données.<br>
			Vous pouvez previsualiser le formulaire avant de l'envoyer aux étudiants<br>
			</p>
			<br>
			<a href="/site/etudiant/formulaire2.php"><button type="button">Previsualiser le formulaire</button></a>

			<h1 style="font-size: 30px;">Envoi des formulaires aux étudiants</h1>
			<p style="font-size: 20px;">Une fois la création des formulaires terminées et le fichier .csv importé.</br>
										 Vous aller pouvoir envoyer les formulaires aux étudiants.<br>
			</p>
			<br>
			<a href="/site/enseignant/envoiForm.php"><button type="button">Envoi des formulaires</button></a>

			<h1 style="font-size: 30px;">Lancer les affectations</h1>
			<p style="font-size: 20px;">Cette partie permet de lancer l'algorithme d'affectation.</br>
		    C'est également dans cette partie que vous allez pouvoir consulter et envoyer les résultats.<br>
			</p>
			<br>
			<a href="/site/enseignant/Resultat/testSortie.php"><button type="button">Affecter les étudiants</button></a>
			<br>
		
	</div>
 	
</body>
<div class="footer" style="text-align: center; margin-left: -2px;"> Affectation des options 1</div>
</html> 