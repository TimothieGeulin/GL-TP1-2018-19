<?php
//$i = 0;
foreach ($_POST as $key => $value) {
	if (preg_match('#objet#', $key)) {
		$objet = $value;
	}
	if (preg_match('#Text1#', $key)) {
		$text = $value;
	}
	//i++;
}

// Creation d'un script en JS qui permet d'envoyer les mails d'affectations a la scolarité (dont le mail a été entré dans la page Resultat/EnvoiAffectScol.php)
echo '<body>';
echo '<button onclick="envoiMail()">Valider envoi</button>';
echo '<script src="https://smtpjs.com/v2/smtp.js">';
echo '</script>';

echo '<script>function envoiMail(){ ';
echo 'var mdp = "affectopt1";';

echo 'Email.sendWithAttachment("optionaffectation@gmail.com",';
echo '"'.$_POST['mail'].'",';
echo '"'.$objet.'","'.$text.'","smtp.gmail.com","optionaffectation@gmail.com",mdp,"http://theodore.gueguen.etu.perso.luminy.univ-amu.fr/Resultat_Affectation_Scolarite.pdf");';

echo 'document.location.href="/site/enseignant/AccueilEnseignant.php"';
echo '}</script>';
echo '</body>';
?>