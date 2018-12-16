<!-- Creation des BD des options et des etudiants grace aux informations recupérées dans la page CreateForm1.php 
Toutes les BD sont crées grace a des requetes SQL appelées avec mysqli -->

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

/********************************************/
/*************** CREATION TABLE *************/
/********************************************/

$sql = "CREATE TABLE ".$username.".DataOptions".$_POST['jour']." (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		OptionName VARCHAR(100) NOT NULL DEFAULT '',
		Code VARCHAR(100) NOT NULL DEFAULT '',
		Effectif INT(6) NOT NULL DEFAULT '0'
		)";

if ($conn->query($sql) === TRUE) {
    echo "Table DataOptions created successfully <br />";
   
} else {
    echo "Error creating table: " . $conn->error."<br /><br />";
    
}

$sql = "CREATE TABLE ".$username.".BDetu".$_POST['jour']." (
		nom VARCHAR(100) NOT NULL DEFAULT '',
		prenom VARCHAR(100) NOT NULL DEFAULT '',
		id VARCHAR(100) PRIMARY KEY NOT NULL DEFAULT '', 
		mail VARCHAR(100) NOT NULL DEFAULT '',
		valided INT(10) NOT NULL DEFAULT '0'
		)";

if ($conn->query($sql) === TRUE) {
    echo "Table BDetu created successfully <br />";
    
} else {
    echo "Error creating table: " . $conn->error."<br /><br />";
    
}

/********************************************/
/*********** REMPLISSAGE TABLE **************/
/********************************************/
foreach( $_POST as $cle=>$value ){
	if (preg_match('#nbOpt#', $cle)) {
		$nbOption = $value;
	}
	if (preg_match('#Opti#', $cle)) {
		$sqltmp1 = $value;
		$trimsqltmp1 = $value;
		$trimsqltmp1=str_replace(' ','',$trimsqltmp1);
	} else if (preg_match('#Effectif#', $cle)) {
		$sqltmp2 = $value;
	} else if (preg_match('#Code#' , $cle)){
		$sqltmp3 = $value;
	}

	if ($sqltmp1 != NULL && $sqltmp2 != NULL && $sqltmp3 != NULL) {
		$sql = "INSERT INTO ".$username.".DataOptions".$_POST['jour']." (OptionName, Effectif, Code) VALUES('".$sqltmp1."',".$sqltmp2.",'".$sqltmp3."')";
		if (mysqli_query($conn, $sql)) {
			echo "New record created successfully<br>";
			
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			
		}
		$sql = 'ALTER TABLE '.$username.'.BDetu'.$_POST['jour'].' ADD '.$trimsqltmp1.' int DEFAULT 0';
		$sqltmp2 = NULL;
		$sqltmp1 = NULL;
		$trimsqltmp1 = NULL;
		$sqltmp3 = NULL;
		
	    if ($conn->query($sql) === TRUE) {
	    	echo "New record created successfully";
	    	
		} else {
	    	echo "Error: " . $sql . "<br>" . $conn->error;
	    	
		}
	}
	echo $cle." => ".$value."<br>";
}





$conn->close();
header('Location: AccueilEnseignant.php');
?>

<!-- <a href="/site/enseignant/CreateForm1.php"><button type="button">Ajouter une nouvelle option</button></a> -->