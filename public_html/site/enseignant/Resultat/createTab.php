<head>
<meta charset="utf-8" />
</head>


<?php
$servername = "$_SERVER[dbHost]";
$username = "$_SERVER[dbLogin]";
$password = "$_SERVER[dbPass]";

// Create connection
$conn = new mysqli($servername, $username, $password);
$conn->set_charset('utf8');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else
	//echo "Connection etablie<br />";

$sql = "SELECT COUNT(*)
FROM INFORMATION_SCHEMA.TABLES
WHERE TABLE_TYPE = 'BASE TABLE'";
$req = mysqli_query($conn, $sql);
$test = mysqli_fetch_array($req);
$nbOption = ($test[0])/2;

$UEName = array();
$OptionName = array();
$GlobTab = array();
$sql = "SELECT TABLE_NAME
FROM INFORMATION_SCHEMA.TABLES
WHERE TABLE_TYPE = 'BASE TABLE'";
$req = mysqli_query($conn,$sql);

while($data = mysqli_fetch_array($req)) {
    $OptionName[] = $data['TABLE_NAME'];
    //echo $data['TABLE_NAME']." ok <br>";
}


// while($data = mysqli_fetch_array($req)) {
//     $OptionName[] = json_encode($data['TABLE_NAME']);
//     //echo $data['TABLE_NAME']." ok <br>";
// }

for ($k=0; $k < $nbOption; $k++) {   
      
    $sql1 = 'SELECT * FROM '.$username.'.'.$OptionName[$k+$nbOption];
    $req1 =  mysqli_query($conn,$sql1);
    while($data1 = mysqli_fetch_array($req1)) {
        array_push($UEName,$data1);
        $data1 = array();
    }
    array_push($GlobTab,$UEName);
    $UEName = array();
}

// //echo '<br><br>';
// var_dump($GlobTab[0]);


$tabEtu = array();
$tmpTabEtu = array();
for ($i=0; $i < $nbOption; $i++) { 
    $sql = "SELECT * FROM ".$username.".BDetu".$i;
    //echo $sql ."<br>";
    $req = mysqli_query($conn, $sql);
    while($data1 = mysqli_fetch_array($req)) {
        array_push($tmpTabEtu, $data1);
        $data1 = array();
    }
    array_push($tabEtu,$tmpTabEtu);
    $tmpTabEtu = array();
    array_shift($tabEtu[$i]);
}

 //var_dump($tabEtu);
 //var_dump($GlobTab);

// for ($i=0; $i <= $nbOption; $i++) {
//     for ($j=0; $j < sizeof($GlobTab[$i]); $j++) { 
//         for ($k=0; $k < 4; $k++) { 
//             echo $GlobTab[$i][$j][$k];
//             echo '<br>';
//         }
//     }
// }

//Fonctionnement de GlobTab :
//GlobTab est un tableau 3d
//L'indice 1 de globtab est l'option courrente (ex: globtab[0] represente l'option 0)
//L'indice 2 de globtab est l'ue courrente (ex: si il y a 3 UE dans l'option 1 globtab[1][1] represente la premiere UE de l'option 1)
//L'indice 3 represente les parametres de l'UE courrente : 
// - 0 = id
// - 1 = OptionName
// - 2 = Code
// - 3 = Effectif
//!\ Il est aussi possible de recupérer l'id/nom/code/effectif en mettant ['id'] ou ['code'] ... a la place d'un entier
//!\ Si vous n'etes pas sur du nom de la variable, il est le meme que le nom de la colonne dans la BD

//Fonctionnement de tabEtu :
//tabetu est un tableau 3 dimension
//le premier indice comme pour globtab represente l'option courrente
//le deuxieme indice represente l'etudiant courrent 
//le 3eme indice represente les parametres de l'etudiant courrente :
// - 0 : nom
// - 1 : prenom
// - 2 : id (etudiant ex: g14013040)
// - 3 : mail
// - 4 : (si l'etudiant a deja validé ou pas une option)
// - 5-fin : les crédits alloue aux UE (seul les UE presente dans l'option courrente sont presents)
//!\ comme pour globtab il est possible de recupérer les parametre d'un etudiant en utilisant le nom en toutes lettres du parametre souhaité


?>