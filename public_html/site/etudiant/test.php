<?php
  $Option1 = $_POST['Option1'];
  $Option2 = $_POST['Option2'];
  $Option3 = $_POST['Option3'];
  $Option4 = $_POST['Option4'];
  $Option5 = $_POST['Option5'];
  $Option6 = $_POST['Option6'];
  $Option7 = $_POST['Option7'];
  $Option8 = $_POST['Option8'];
  $Option9 = $_POST['Option9'];
  $Option10 = $_POST['Option10'];
  $Option11 = $_POST['Option11'];
  $Option12 = $_POST['Option12'];
  $Option13 = $_POST['Option13'];
  $Option14 = $_POST['Option14'];
  $Option15 = $_POST['Option15'];
  $Option16 = $_POST['Option16'];
  $Option17 = $_POST['Option17'];
  $Option18 = $_POST['Option18'];
  $Option19 = $_POST['Option19'];
  $Option20 = $_POST['Option20'];
  $Option21 = $_POST['Option21'];

   $serveur = "$_SERVER[dbHost]";
   $nom = "$_SERVER[dbLogin]";                                                  /* Log bdd */
   $pass = "$_SERVER[dbPass]";


  $bdd = mysql_connect($serveur, $nom, $pass);
  if (!$bdd) {
       die ('Impossible de se connecter à la base de données : ' . mysql_error());
  }

  $db = mysql_select_db($nom, $bdd); // Selection de notre bdd
    if (!$db) {
       die ('Impossible de sélectionner la base de données : ' . mysql_error());
  }

     $query = "SELECT count(*) FROM DataOptions0";             
     $result = mysql_query($query) or die (mysql_error()); 
     
     $resultat=mysql_fetch_row($result); 
     $credit1 = ($resultat[0]) * 2; 
     $maxcredit1 = $credit1 * 0.7; 

     $totalJ1 = $Option1 + $Option2 + $Option3 + $Option4 + $Option5 + 
     $Option6 + $Option7 + $Option8 + $Option9 + $Option10 + $Option11 + 
     $Option12 + $Option13 + $Option14 + $Option15 + $Option16 + 
        $Option17 + $Option18 + $Option19 + $Option20 + $Option21;

     $credit1 = $credit1 - $totalJ1;

     if($credit1 < 0){
      echo "Crédits Insuffisants !!";
      return 0;
     }

     echo $credit1;

?>