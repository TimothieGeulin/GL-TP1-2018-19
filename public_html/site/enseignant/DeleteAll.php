
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
    
    $sql = "SELECT COUNT(*)
    FROM INFORMATION_SCHEMA.TABLES
    WHERE TABLE_TYPE = 'BASE TABLE'";
    $req = mysqli_query($conn, $sql);
    $test = mysqli_fetch_array($req);
    $nbOption = ($test[0])/2;

    for ($i=0; $i < $nbOption; $i++) { 
        $sql1 = "DROP TABLE ".$username.".DataOptions".$i;
        $sql2 = "DROP TABLE ".$username.".BDetu".$i;
        if (mysqli_query($conn, $sql1)) {
            echo "L'option ".$i." a bien etait supprimé<br>";
            header('Location: DeleteOption.php');  
        } else {
            echo "Error: " . $sql1 . " " . mysqli_error($conn)."<br>";
            header('Location: DeleteOption.php');  
        }
        if (mysqli_query($conn, $sql2)) {
            echo "La base de donnée etudiante pour l'option ".$i." a bien etait supprimé <br>";
            header('Location: DeleteOption.php');  
        } else {
            echo "Error: " . $sql2 . " " . mysqli_error($conn)."<br>";
            header('Location: DeleteOption.php');  
        }   
    }
?>