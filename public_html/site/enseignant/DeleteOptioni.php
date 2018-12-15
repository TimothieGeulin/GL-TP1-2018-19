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

    $numOpt = $_POST['numOption'];

    $sql1 = "DROP TABLE ".$username.".DataOptions".$numOpt;
    $sql2 = "DROP TABLE ".$username.".BDetu".$numOpt;
    if (mysqli_query($conn, $sql1)) {
        echo "L'option ".$numOpt." a bien etait supprimé<br>";
         header('Location: DeleteOption.php');  
    } else {
        echo "Error: " . $sql1 . " " . mysqli_error($conn)."<br>";
        header('Location: DeleteOption.php');  
    }
    if (mysqli_query($conn, $sql2)) {
        echo "La base de donnée etudiante pour l'option ".$numOpt." a bien etait supprimé <br>";
        header('Location: DeleteOption.php');  
    } else {
        echo "Error: " . $sql2 . " " . mysqli_error($conn)."<br>";
        header('Location: DeleteOption.php');  
    }
?>