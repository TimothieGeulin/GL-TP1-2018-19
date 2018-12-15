<!DOCTYPE html>
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
		<br>
		<br>
		<br>
		<div class="encadrer">
			<p  style="font-size: 25px; text-align: center;">Vos voeux ont bien été enregistrés !</p>
		
			<input class="button" type="button" value="Retour page d'accueil "onclick="window.location.href='../../index.php'">
		</div>
		<div class="footer" style="text-align: center; bottom: 0;"> Affectation des options 1</div>
	</body>
</html>









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
	//echo "Connection etablie<br />";

// foreach( $_POST as $cle=>$value )
//     $sql = "UPDATE ".$username.".BDetu SET ".$cle." = ".$value." WHERE id = '".$_SERVER['REMOTE_USER']."'";
//     if ($conn->query($sql) === TRUE) {
//         echo "New record created successfully";
//     } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }
// }

$sql = "SELECT COUNT(*)
FROM INFORMATION_SCHEMA.TABLES
WHERE TABLE_TYPE = 'BASE TABLE'";
$req = mysqli_query($conn, $sql);
$test = mysqli_fetch_array($req);
$nbOption = ($test[0])/2;

$UEparOpt = array();

for ($i=0; $i < $nbOption; $i++) { 
    $sql1 = "SELECT COUNT(*)
    FROM ".$username.".DataOptions".$i;
    $req1 = mysqli_query($conn, $sql1);
    $test1 = mysqli_fetch_array($req1);
   // echo $test1[0].'<br>';
    array_push($UEparOpt, $test1[0]);
}
//var_dump($UEparOpt);

echo '<br><br><br>';
$indiceOpt = 0;
$indiceUE = 0;
foreach ($_POST as $key => $value) {
	if ($indiceUE < $UEparOpt[$indiceOpt]) {
		$sql = 'UPDATE '.$username.'.BDetu'.$indiceOpt.' SET '.$key.' = '.$value.' WHERE id = "'.$_SERVER['REMOTE_USER'].'"';
		
		// if (mysqli_query($conn, $sql)) {
		// 	echo "New record created successfully<br>";
		// } else {
		// 	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		// }

		// echo $sql .'<br>';
		$indiceUE ++;
	} else {
		$indiceUE = 0;
		$indiceOpt ++;
		$sql = 'UPDATE '.$username.'.BDetu'.$indiceOpt.' SET '.$key.' = '.$value.' WHERE id = "'.$_SERVER['REMOTE_USER'].'"';
		
		// if (mysqli_query($conn, $sql)) {
		// 	echo "New record created successfully<br>";
		// } else {
		// 	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		// }

		//echo $sql .'<br>';
	}
}

?>