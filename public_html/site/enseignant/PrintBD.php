<!-- Ce fichier permettait de suivre l'evotulion de la BD de facon plus efficace (pas besoin d'aller sur phpmyadmin) 
neanmoins cette version des BD n'est plus fonctionnelle -->

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

$sql = "SELECT * FROM 'BDetu'";
$result = $conn->query($sql);

echo "result :". $result. "<br>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Nom: " . $row["nom"]. " " . $row["prenom"]. "Mail : ". $row["mail"]. "<br>";
    }
} else {
    echo "0 results";
}
?>