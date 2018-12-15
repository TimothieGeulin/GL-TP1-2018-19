
<?php

  $Option1 = $_POST['Option1'];
  $Option2 = $_POST['Option2'];
  $Option3 = $_POST['Option3'];
  $Option4 = $_POST['Option4'];
  $Option5 = $_POST['Option5'];
  $Option6 = $_POST['Option6'];

  $Option1_2 = $_POST['Option1_2'];
  $Option2_2 = $_POST['Option2_2'];
  $Option3_2 = $_POST['Option3_2'];
  $Option4_2 = $_POST['Option4_2'];
  $Option5_2 = $_POST['Option5_2'];
  $Option6_2 = $_POST['Option6_2'];

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

    $TabResultat = mysql_fetch_row($ResultNom); 
    $TabResultat1 = mysql_fetch_array($ResultNom);
    $TabResultat2 = mysql_fetch_row($ResultNom); 
    $TabResultat3 = mysql_fetch_array($ResultNom);                    /* Récupération de tous les noms de la table Matiere */
    $TabResultat4 = mysql_fetch_row($ResultNom);
    $TabResultat5 = mysql_fetch_array($ResultNom);
    $TabResultat6 = mysql_fetch_row($ResultNom);  

    /*********************JOUR 2 *********************/

    $Nom2 = "SELECT OptionName FROM DataOptions1";
    $ResultNom2 = mysql_query($Nom2) or die (mysql_error()); 

    $TabResultat_2 = mysql_fetch_row($ResultNom2); 
    $TabResultat1_2 = mysql_fetch_array($ResultNom2);
    $TabResultat2_2 = mysql_fetch_row($ResultNom2); 
    $TabResultat3_2 = mysql_fetch_array($ResultNom2);                 /* Récupération de tous les noms de la table Matiere */
    $TabResultat4_2 = mysql_fetch_row($ResultNom2);
    $TabResultat5_2 = mysql_fetch_array($ResultNom2);
    $TabResultat6_2 = mysql_fetch_row($ResultNom2);  
    
    
   $totalJ1 = $Option1 + $Option2 + $Option3 + $Option4 + $Option5 + $Option6;
   $totalJ2 = $Option1_2 + $Option2_2 + $Option3_2 + $Option4_2 + $Option5_2 + $Option6_2;

   $credit1 = $credit1 - $totalJ1;
   $credit2 = $credit2 - $totalJ2;
   
   mysql_close($bdd); 
?>