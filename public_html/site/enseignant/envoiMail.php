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
// Creation d'un script en JS qui permet d'envoyer les mails d'affectations a tous les etudiants present dans la BD
echo '<body>';
echo '<button onclick="envoiMail()">Valider envoi</button>';
echo '<script src="https://smtpjs.com/v2/smtp.js">';
echo '</script>';

$servername = "$_SERVER[dbHost]";
$username = "$_SERVER[dbLogin]";
$password = "$_SERVER[dbPass]";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$req =  mysqli_query($conn,"SELECT mail FROM ".$username.".BDetu0");
$tab = array();

echo '<script>function envoiMail(){ ';
echo 'var mdp = "affectopt1";';
while($data = mysqli_fetch_array($req)) {
	$tab[] = $data['mail'];
	echo 'Email.sendWithAttachment("optionaffectation@gmail.com",';
	echo '"'.$data['mail'].'",';
	echo '"'.$objet.'","'.$text.'","smtp.gmail.com","optionaffectation@gmail.com",mdp,"http://theodore.gueguen.etu.perso.luminy.univ-amu.fr/Resultat_Affectation.pdf");';
}

echo 'document.location.href="/site/enseignant/AccueilEnseignant.php"';
echo '}</script>';
echo '</body>';
?>