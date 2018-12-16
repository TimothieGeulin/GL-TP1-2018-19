<!-- Dans cette partie on met a jour les informations concernant les etudiants dans les BD grace aux informations presentes dans le CSV -->

<?php

$servername = "$_SERVER[dbHost]";
$username = "$_SERVER[dbLogin]";
$password = "$_SERVER[dbPass]";
$sqltmp1 = NULL;
$sqltmp2 = NULL;

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else
	echo "Connection etablie<br />";

/* Recuperation du .csv */ 
$file = $_FILES['csvfile'];
$filename = $_FILES['csvfile']['name'];
$filetype = $_FILES['csvfile']['type'];
$fileerror = $_FILES['csvfile']['error'];
$filetemp = $_FILES['csvfile']['tmp_name'];
$filePath = "file/";

$etu = array('nom' => null,'prenom' => null,'id' => null,'mail' => null );

$row = 1;

if(move_uploaded_file($filetemp, $filePath . $filename)) {echo "Fichier upload avec succes<br><br>";} 
else {echo "Le fichier n'a pas etait upload<br><br>";}

$sql = "SELECT COUNT(*)
FROM INFORMATION_SCHEMA.TABLES
WHERE TABLE_TYPE = 'BASE TABLE'";
$req = mysqli_query($conn, $sql);
$test = mysqli_fetch_array($req);
$nbOption = ($test[0])/2;

for($i = 0; $i<$nbOption; $i++){
    if (($handle = fopen("file/".$filename, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            $num = count($data);
            //echo "<p> $num fields in line $row: <br /></p>\n";
            $row++;
            for ($c=0; $c < $num; $c++) {
                //echo $data[$c] . "<br />\n";
                if ($c == 0)
                    $etu['nom'] = $data[$c];
                if ($c == 1)
                    $etu['prenom'] = $data[$c];
                if ($c == 2)
                    $etu['id'] = $data[$c];
                if ($c == 3)
                    $etu['mail'] = $data[$c];
            }
            $sql = "INSERT INTO ".$username.".BDetu".$i." (nom, prenom, id, mail, valided) VALUES('".$etu['nom']."','".$etu['prenom']."','".$etu['id']."','".$etu['mail']."', 0)";
            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully<br>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn).'<br>';
            }
            echo "NOM : ".$etu['nom']." PRENOM : ".$etu['prenom']." IDENTIFI : ".$etu['id']." MAIL : ".$etu['mail']."<br>";
        }
    }
}

fclose($handle);
header('Location: AccueilEnseignant.php');
?>