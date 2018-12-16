<?php

$servername = "$_SERVER[dbHost]";
$username = "$_SERVER[dbLogin]";
$password = "$_SERVER[dbPass]";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else
	echo "Connection etablie<br />";

/********NB OPTION********/
$sql = "SELECT COUNT(*)
FROM INFORMATION_SCHEMA.TABLES
WHERE TABLE_TYPE = 'BASE TABLE'";
$req = mysqli_query($conn, $sql);
$test = mysqli_fetch_array($req);
$nbOption = ($test[0])/2;
/*************************/

//On actualise la table BDetu correspondant au numero de l'option transmis dans l'ajout manuel d'un etudiant
$sql = "INSERT INTO ".$username.".BDetu".$_POST['numOption']." (id, nom, prenom, mail, valided) VALUES('".$_POST['id']."','".$_POST['nom']."','".$_POST['prenom']."','".$_POST['mail']."',".$_POST['valided'].");";

//execution de la requete SQL
if (mysqli_query($conn, $sql)) {
	echo "New record created successfully<br>";
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo $sql."<br>";

$conn->close();
header('Location: AccueilEnseignant.php');
?>
