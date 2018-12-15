<?php include("pindex.php"); ?>
<?php



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

 /*******************************Récupération des crédits ***********************************************/

                        /*********************JOUR 1 *********************/
                         // Récupération total crédits premier jour 
      $query = "SELECT count(*) FROM DataOptions0";             
     $result = mysql_query($query) or die (mysql_error()); 
     
     $resultat=mysql_fetch_row($result); 
     $credit1 = ($resultat[0]) * 2;
     $maxcredit1 = $credit1 * 0.7; 

                        /*********************JOUR 2 *********************/

      $query2 = "SELECT count(*) FROM DataOptions1";             
      $result2 = mysql_query($query2) or die (mysql_error()); 

      $resultat2 = mysql_fetch_row($result2); 
      $credit2 = ($resultat2[0]) * 2; 
      $maxcredit2 = $credit2 * 0.7;                       // Récupération total crédits premier jour 


/*******************************Récupération des noms D'UE***********************************************/

    /*********************JOUR 1 *********************/

    $Nom = "SELECT OptionName FROM DataOptions0";
    $ResultNom = mysql_query($Nom) or die (mysql_error()); 

    $TabResultat0 = mysql_fetch_row($ResultNom); 
    $TabResultat1 = mysql_fetch_array($ResultNom);
    $TabResultat2 = mysql_fetch_row($ResultNom); 
    $TabResultat3 = mysql_fetch_array($ResultNom); 
    $TabResultat4 = mysql_fetch_row($ResultNom); 
    $TabResultat5 = mysql_fetch_array($ResultNom); 
    $TabResultat6 = mysql_fetch_row($ResultNom); 
    $TabResultat7 = mysql_fetch_array($ResultNom);
    $TabResultat8 = mysql_fetch_array($ResultNom); 
    $TabResultat9 = mysql_fetch_row($ResultNom); 
    $TabResultat10 = mysql_fetch_array($ResultNom); 
    $TabResultat11 = mysql_fetch_row($ResultNom); 
    $TabResultat12 = mysql_fetch_array($ResultNom); 
    $TabResultat13 = mysql_fetch_array($ResultNom); 
    $TabResultat14 = mysql_fetch_row($ResultNom); 
    $TabResultat15 = mysql_fetch_array($ResultNom); 
    $TabResultat16 = mysql_fetch_row($ResultNom); 
    $TabResultat17 = mysql_fetch_array($ResultNom);
    $TabResultat18 = mysql_fetch_row($ResultNom); 
    $TabResultat19 = mysql_fetch_array($ResultNom);  
    $TabResultat20 = mysql_fetch_row($ResultNom); 
    $TabResultat21 = mysql_fetch_array($ResultNom);  
  


    /*********************JOUR 2 *********************/

    $Nom2 = "SELECT OptionName FROM DataOptions1";
    $ResultNom2 = mysql_query($Nom2) or die (mysql_error()); 

    $TabResultat0_2 = mysql_fetch_row($ResultNom2); 
    $TabResultat1_2 = mysql_fetch_array($ResultNom2);
    $TabResultat2_2 = mysql_fetch_row($ResultNom2); 
    $TabResultat3_2 = mysql_fetch_array($ResultNom2);                 /* Récupération de tous les noms de la table Matiere */
    $TabResultat4_2 = mysql_fetch_row($ResultNom2);
    $TabResultat5_2 = mysql_fetch_array($ResultNom2);
    $TabResultat6_2 = mysql_fetch_row($ResultNom2);
    $TabResultat7_2 = mysql_fetch_row($ResultNom2); 
    $TabResultat8_2 = mysql_fetch_array($ResultNom2);
    $TabResultat9_2 = mysql_fetch_row($ResultNom2); 
    $TabResultat10_2 = mysql_fetch_array($ResultNom2); 
    $TabResultat11_2 = mysql_fetch_row($ResultNom2); 
    $TabResultat12_2 = mysql_fetch_array($ResultNom2); 
    $TabResultat13_2 = mysql_fetch_row($ResultNom2); 
    $TabResultat14_2 = mysql_fetch_array($ResultNom2);
    $TabResultat15_2 = mysql_fetch_array($ResultNom2); 
    $TabResultat16_2 = mysql_fetch_row($ResultNom2); 
    $TabResultat17_2 = mysql_fetch_array($ResultNom2); 
    $TabResultat18_2 = mysql_fetch_row($ResultNom2); 
    $TabResultat19_2 = mysql_fetch_array($ResultNom2); 
    $TabResultat20_2 = mysql_fetch_array($ResultNom2); 
    $TabResultat21_2 = mysql_fetch_row($ResultNom2); 
    
    
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

    $Option1_2 = $_POST['Option1_2'];
    $Option2_2 = $_POST['Option2_2'];
    $Option3_2 = $_POST['Option3_2'];
    $Option4_2 = $_POST['Option4_2'];
    $Option5_2 = $_POST['Option5_2'];
    $Option6_2 = $_POST['Option6_2'];
    $Option7_2 = $_POST['Option7_2'];
    $Option8_2 = $_POST['Option8_2'];
    $Option9_2 = $_POST['Option9_2'];
    $Option10_2 = $_POST['Option10_2'];
    $Option11_2 = $_POST['Option11_2'];
    $Option12_2 = $_POST['Option12_2'];
    $Option13_2 = $_POST['Option13_2'];
    $Option14_2 = $_POST['Option14_2'];
    $Option15_2 = $_POST['Option15_2'];
    $Option16_2 = $_POST['Option16_2'];
    $Option17_2 = $_POST['Option17_2'];
    $Option18_2 = $_POST['Option18_2'];
    $Option19_2 = $_POST['Option19_2'];
    $Option20_2 = $_POST['Option20_2'];
    $Option21_2 = $_POST['Option21_2'];


   $totalJ1 = $Option1 + $Option2 + $Option3 + $Option4 + $Option5 + $Option6 + $Option7 +
   $Option8 + $Option9 + $Option10 + $Option11 + $Option12 + $Option13 + $Option14 + $Option15 +
   $Option16 + $Option17 + $Option18 + $Option19 + $Option20 + $Option21;

   $totalJ2 = $Option1_2 + $Option2_2 + $Option3_2 + $Option4_2 + $Option5_2 + $Option6_2 + $Option7_2 +
   $Option8_2 + $Option9_2 + $Option10_2 + $Option11_2 + $Option12_2 + $Option13_2 + $Option14_2 + $Option15_2 +
   $Option16_2 + $Option17_2 + $Option18_2 + $Option19_2 + $Option20_2 + $Option21_2;

   $credit1 = $credit1 - $totalJ1;
   $credit2 = $credit2 - $totalJ2;
// foreach ($_POST as $key => $value) {
//   echo $key.' => '.$value.'sedfiuyh<br>';
// }
//    mysql_close($bdd); 
?>