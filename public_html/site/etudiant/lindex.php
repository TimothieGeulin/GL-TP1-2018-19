<?php
    
         $IdProf=$_POST['id'];
         $Motdepasse1=$_POST['Motdepasse'];

         $serveur2 = "$_SERVER[dbHost]";
         $nom2 = "$_SERVER[dbLogin]";
         $pass2 = "$_SERVER[dbPass]";
        
         $bdd2 = new mysqli($serveur2, $nom2, $pass2);
         if ($bdd2->connect_error) {
            die("Erreur de connexion: " . $bdd2->connect_error);
         } 
         
         $db2 = mysqli_select_db($bdd2, $nom2);
    

         $query2 = mysqli_query($bdd2,"SELECT * FROM Prof WHERE IdProf = '$IdProf' AND Motdepasse = '$Motdepasse1'");
         

         $rows2 = mysqli_num_rows($query2);

         if($rows2 == 1){
          header("https://www.youtube.com/watch?v=GYeT31XgPsQ");
         }

         mysqli_close($bdd2); 
  
?>
