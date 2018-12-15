<?php

         $IdEtudiant=$_POST['id'];
         $Motdepasse=$_POST['Motdepasse'];

         $serveur = "$_SERVER[dbHost]";
         $nom = "$_SERVER[dbLogin]";
         $pass = "$_SERVER[dbPass]";
        
         $bdd = mysql_connect($serveur, $nom, $pass);
         if (!$bdd) {
            die ('Impossible de se connecter à la base de données : ' . mysql_error());
         }

         
         $db = mysql_select_db($nom, $bdd); // Selection de notre bdd
         if (!$db) {
            die ('Impossible de sélectionner la base de données : ' . mysql_error());
         }

         $rows = mysql_fetch_row($query);
         $rows1 = mysql_result($Nom, 0);
         $rows2 = mysql_result($Prenom, 0);

         if($rows){
            session_start();
            $_SESSION['id'] = $IdEtudiant;
            $_SESSION['nom'] = $rows1;
            $_SESSION['prenom'] = $rows2;
            header("Location: http://sebastien.lamblin.etu.perso.luminy.univ-amu.fr/ephe.php");
         }
   mysql_close($bdd); 
?>
