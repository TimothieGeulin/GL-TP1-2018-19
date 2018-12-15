 <?php  

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


      $query2 = "SELECT count(*) FROM DataOptions1";             
      $result2 = mysql_query($query2) or die (mysql_error()); 

      $resultat2 = mysql_fetch_row($result2); 
      $credit2 = ($resultat2[0]) * 2;                       // Récupération total crédits 
      $maxcredit2 = $credit2 * 0.7; 


      $totalJ2 = $Option1_2 + $Option2_2 + $Option3_2 + $Option4_2 + $Option5_2 + $Option6_2 + $Option7_2 +
   $Option8_2 + $Option9_2 + $Option10_2 + $Option11_2 + $Option12_2 + $Option13_2 + $Option14_2 + $Option15_2 +
   $Option16_2 + $Option17_2 + $Option18_2 + $Option19_2 + $Option20_2 + $Option21_2;

      $credit2 = $credit2 - $totalJ2;

      if($credit2 < 0){
      echo "Crédits Insuffisants !!";
      return 0;
     }

      echo $credit2;

?>